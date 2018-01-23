jQuery('.foobar').on('click', function () { alert('You clicked on the `.foobar` element.'); }).children().on('click', function (event) {
event.stopPropagation();
});
