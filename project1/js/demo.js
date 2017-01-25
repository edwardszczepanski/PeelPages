$(function() {
	filesystem = null;
    var pages = new Array();
    $('#first').on('click', function(){
        pages.push(window.open('./childWindow.html?' + guid()));
    });
    $('#closeAll').on('click', function(){
        for (var i = 0; i < pages.length; ++i){
            pages[i].close();
        }
    });

	$("input:checkbox").on('click', function() {
	// in the handler, 'this' refers to the box clicked on
	var $box = $(this);
	if ($box.is(":checked")) {
	// the name of the box is retrieved using the .attr() method
	// as it is assumed and expected to be immutable
	var group = "input:checkbox[name='" + $box.attr("name") + "']";
	// the checked state of the group/box on the other hand will change
	// and the current value is retrieved using .prop() method
	$(group).prop("checked", false);
	$box.prop("checked", true);
	} else {
	$box.prop("checked", false);
	}
});
});

