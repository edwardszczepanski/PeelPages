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

		//create contact modal
		// Get the modal
		var modal = document.getElementById('myModal');
		// Get the button that opens the modal
		var btn = document.getElementById("myBtn");
		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[1];
		//var span = document.getElementById('add_close');
		//		var modal = document.getElementById('myModal');

		// When the user clicks the button, open the modal
		btn.onclick = function() {
		modal.style.display = "block";
		}
		// When the user clicks on <span> (x), close the modal
		//var modal = document.getElementById('myModal');

		span.onclick = function() {
		//var modal = document.getElementById('myModal');	
		modal.style.display = "none";
		}
		// When the user clicks anywhere outside of the modal, close it
		//var modal = document.getElementById('myModal');
		window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
		}
	
	//edit contact modal set contact_Id
	$(edit_contact).click(function(){
		 var $contact_id_val = $( this ).prev().val();
		//alert($target);
		$(edit_contact_Id).val($contact_id_val);
		
		var $fn = $(this).parent().parent().children()[0];
		var $ln = $(this).parent().parent().children()[1];
		var $ph = $(this).parent().parent().children()[2];
		var $em = $(this).parent().parent().children()[3];
		var $ad = $(this).parent().parent().children()[4];
		var $ci = $(this).parent().parent().children()[5];
		var $st = $(this).parent().parent().children()[6];
		var $zi = $(this).parent().parent().children()[7];
		var $fn1 = $fn.children;
		var $fn11=$fn1[0].innerHTML;
		var $ln1 = $ln.children;
		var $ln11=$ln1[0].innerHTML;
		var $ph1 = $ph.children;
		var $ph11=$ph1[0].innerHTML;
		var $em1 = $em.children;
		var $em11=$em1[0].innerHTML;
		var $ad1 = $ad.children;
		var $ad11=$ad1[0].innerHTML;
		var $ci1 = $ci.children;
		var $ci11=$ci1[0].innerHTML;
		var $st1 = $st.children;
		var $st11=$st1[0].innerHTML;
		var $zi1 = $zi.children;
		var $zi11=$zi1[0].innerHTML;
		$(edit_fn).val($fn11);
		$(edit_ln).val($ln11);
		$(edit_ph).val($ph11);
		$(edit_em).val($em11);
		$(edit_ad).val($ad11);
		$(edit_ci).val($ci11);
		$(edit_st).val($st11);
		$(edit_zi).val($zi11);
		
	});
});
	//edit contact modal
	function pop_Edit() {
		// Get the modal
		var edit_modal = document.getElementById('edit_myModal');
		// Get the button that opens the modal
		var edit_btn = document.getElementById("edit_contact");
		// Get the <span> element that closes the modal
		var edit_span = document.getElementsByClassName("close")[0];
		// When the user clicks the button, open the modal
		//edit_btn.onclick = function() {
		edit_modal.style.display = "block";
		//}
		// When the user clicks on <span> (x), close the modal
		edit_span.onclick = function() {
		edit_modal.style.display = "none";
		}
		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		if (event.target == edit_modal) {
			edit_modal.style.display = "none";
		}
		}	
	}
	
	//add contact modal
	//function pop_add() {	}
	
