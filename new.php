<?php


    /** Create new user **/
	function create_user($db,$user_social,$result)
	{
		global $g_cf_user_url,$g_url;
        $mdb = mongoDB();

        $app_params = array();
        $stmt = $db->prepare("SELECT * FROM `app` WHERE `app_name` = :app_code");
        $stmt->bindParam(':app_code',$user_social['app_code']);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        $app_params[$user_social['app_code']] = $res;

		$create_time=time();
		$ip=getIP();
        $install_referrer = (isset($user_social['install_referrer']) && $user_social['install_referrer']!="")?$user_social['install_referrer']:"";
        $install_link = (isset($user_social['install_link']) && $user_social['install_link']!="")?$user_social['install_link']:"";
        $verified = isset($user_social['verified'])?(string)$user_social['verified']:"0";
		$ins_q=$db->prepare("INSERT INTO `user`(`email`,`usr`,`display_name`,`usr_type`,`status`,`create_date`,`ip`,`social_type`,`verified`,`pswd`,`".$user_social['social_id_field']."`,`referee`,`referral_link`) VALUES(:lg_email,:lg_uname,
			:lg_display,1,1,:create_time,:ip,:social_type,:verified,:pswd,:social_id,:referee,:link)") ;
		$user_value=array(':lg_email'=>$user_social['email'],
			':lg_uname'=>$user_social['usr'],
			':lg_display'=>$user_social['usr'],
			':create_time'=>$create_time,
			':ip'=>$ip,
			':social_type'=>$user_social['social_type'],
            ':verified'=>$verified,
			':pswd'=>$user_social['pswd'],
			':social_id'=>$user_social['social_id'],
            ':referee'=>$install_referrer,
            ':link'=>$install_link);
		$ins_q->execute($user_value);
		if($ins_q->rowCount()>0)
		{
			$user_social['uid']= $db->lastInsertId();

            $referrer=get_referral_code($user_social['uid']);
            $referrer_q=$db->prepare("UPDATE `user` SET `referrer` = :referrer WHERE `uid`=:uid") ;
            $referrer_value=array(':referrer'=>$referrer,':uid'=>$user_social['uid']);
            $referrer_q->execute($referrer_value);

	      	$user_social['usr_type']=1;// Default to user type 1
	      	$user_q = $db->prepare("SELECT * FROM `user` WHERE `uid`=:uid");
	      	$user_q->bindParam(':uid', $user_social['uid']);
	      	$user_q->execute();
	      	$no_users=$user_q->rowCount();
	      	if($no_users>0)// Already exists
		    {
                $user=$user_q->fetch();
                $user['invite_link'] = 'https://www.dprp.in/i/'.$referrer;

                if($verified=="0")
                {
                    send_verification_mail($mdb,$g_url,$user,$result);
                }

                //create ne04j node
                $client = graphDB(0);
                $queryString = "CREATE (u:user{uid:".$user["uid"]."})";
                $query = new Everyman\Neo4j\Cypher\Query($client, $queryString);
                $output = $query->getResultSet();

                //make friend connection from the referee if present
                if($install_referrer!="")
                {
                    $referee = "";
                    $user_q = $db->prepare("SELECT * FROM `user` WHERE `referrer` = :referrer");
                    $user_q->bindParam(':referrer',$install_referrer);
                    $user_q->execute();
                    $user_res = $user_q->fetch(PDO::FETCH_ASSOC);

                    $queryString = "MERGE (u:user {uid: ".$user["uid"]."}) MERGE (l:user {uid: ".$user_res['uid']."})  MERGE (u)-[:friend]-(l)";
                    $query = new Everyman\Neo4j\Cypher\Query($client, $queryString);
                    $output = $query->getResultSet();
                }

                //replace user image
                if(isset($user_social['usr_img']) && $user_social['usr_img']!="")
                {
                    profile_replace_image($user['uid'],$user_social['usr_img']);
                }
	      		$user['usr_img'] = $g_cf_user_url.$user['uid'].'-150.jpg';
				$user['lifetime'] = $app_params[$user_social['app_code']]['lifetime'];
				$user['skill_points'] = 0;
				// $user['usr_level'] = get_user_level($user['uid']);
				$user['reward_stat'] = 0;
				$user['multiplier'] = 1;
                $user['device_type'] = "1";
                $user['app_code'] = $user_social['app_code'];
                $token = generate_token(chalkst_encrypt($user));
                $user['auth_token'] = $token['token'];
                $user['auth_expiry'] = $token['expiry'];
                $user['new_user']=1;

                //add user and app to mongo
                $mdb = mongoDB();
                $user_collection = $mdb->users;
                $old_records = $user_collection->count(array('uid'=>(string)$user['uid']));
                if($old_records==0)
                {
                    $time=time();
                    $apps = array();
                    $apps[$user_social['app_code']]=strtotime('today', time());
                    $timezones = array();
                    $timezones[$user_social['app_code']] = $user_social['time_offset'];
                    $user_collection->insert(array(
                        'uid'=>$user['uid'],
                        'usr'=>$user['usr'],
                        'app_code'=>$user_social['app_code'],
                        'create_time'=>$time,
                        'ip'=>getIP(),
                        'apps'=>$apps,
                        'timezones'=>$timezones,
                        'f_l_t'=>$time,
                        'l_l_t'=>$time
                    ));
                    $user['app_start_date'] = $time;
                }else{
                    $old_records = $user_collection->findOne(array('uid'=>(string)$user['uid']));
                    $time=time();
                    $query = array('uid'=>(string)$user['uid']);
                    $update = array('$set'=>array('l_l_t'=>$time));
                    if(!isset($old_records['apps'][$user_social['app_code']]))
                    {
                        $current_apps = $old_records['apps'];
                        $current_apps[$user_social['app_code']] = strtotime('today', time());
                        $current_zones = $old_records['timezones'];
                        $current_zones[$user_social['app_code']] = $user_social['time_offset'];
                        $update = array('$set'=>array('l_l_t'=>$time,'apps'=>$current_apps,'timezones'=>$current_zones));
                        $user['app_start_date'] = $time;
                    }else{
                        $user['app_start_date'] = $old_records['apps'][$user_social['app_code']];
                    }
                    $user_collection->update($query,$update);
                }

                //add fcm token
                if(isset($user_social['fcm_token']) && $user_social['fcm_token']!="" )
                {
                    $collection = $mdb->fcm_token;
                    $old_records = $collection->count(array('token'=>$user_social['fcm_token'],'uid'=>(string)$user['uid']));
                    if($old_records==0)
                    {
                        $time=time();
                        $collection->insert(array(
                            'uid'=>$user['uid'],
                            'usr'=>$user['usr'],
                            'token'=>$user_social['fcm_token'],
                            'app_code'=>$user_social['app_code'],
                            'time'=>$time,
                            'ip'=>getIP()
                        ));
                    }
                }

	      		$result=array('status'=>1,'msg'=>"Success! Your account is created. Please wait while we redirect ...",'user'=>$user_social,'content'=>$user);
	      		//send_welcome_mail($db,$g_url,$user);
	      	}
	  	}
  		return $result;
	}



 ?>
