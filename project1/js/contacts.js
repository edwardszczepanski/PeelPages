$(function() {
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

	// Get the modal
	var modal = document.getElementById('myModal');

	// Get the button that opens the modal
	var btn = document.getElementById("myBtn");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks the button, open the modal
	btn.onclick = function() {
	modal.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	if (event.target == modal) {
		modal.style.display = "none";
	}
	}
});
