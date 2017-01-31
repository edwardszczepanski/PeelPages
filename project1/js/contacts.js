$(function() {
<<<<<<< HEAD
    document.title = document.getElementById('titleh2').innerHTML.split(':')[1];

    document.getElementById("sortName").onclick = function() {
        var table = document.getElementById("myTable");
        sortTable(table, 1);
    };
    document.getElementById("sortZIP").onclick = function() {
        var table = document.getElementById("myTable");
        sortTable(table, 8);
=======
	document.getElementById("sortName").onclick = function(){
        table = document.getElementById("myTable");
		sortTable(table, 1, false);
    };
	document.getElementById("sortZIP").onclick = function(){
        table = document.getElementById("myTable");
		sortTable(table, 8, false);
>>>>>>> 0cc81f76bf59145cd92362c0a8670a5c7ac809e1
    };

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
<<<<<<< HEAD
    });

    searchIndex = 0;
    var selector = document.getElementById("sel1");
    var myInputBox = document.getElementById("myInput");
    selector.onchange = function() {
        searchIndex = selector.selectedIndex;
        myInputBox.placeholder = "Searching through " + selector.value + "s";
        if(selector.value == "City"){
            myInputBox.placeholder = "Searching through Cities";
        }
    }

    //create contact modal
    // Get the modal
    var modal = document.getElementById('myModal');
    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[1];
    //var span = document.getElementById('add_close');
    //var modal = document.getElementById('myModal');

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
=======
	});

		//create contact modal
		// Get the modal
		var modal = document.getElementById('myModal');
		// Get the button that opens the modal
		var btn = document.getElementById("myBtn");
		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[1];
		//var span = document.getElementById('add_close');
		//var modal = document.getElementById('myModal');

		// When the user clicks the button, open the modal
		btn.onclick = function() {
		modal.style.display = "block";
		}
		// When the user clicks on <span> (x), close the modal
		//var modal = document.getElementById('myModal');

		span.onclick = function() {
            //var modal = document.getElementById('myModal');	
>>>>>>> 0cc81f76bf59145cd92362c0a8670a5c7ac809e1
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
		var $ad2 = $(this).parent().parent().children()[5];
		var $ci = $(this).parent().parent().children()[6];
		var $st = $(this).parent().parent().children()[7];
		var $zi = $(this).parent().parent().children()[8];
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
		var $ad21 = $ad2.children;
		var $ad211=$ad21[0].innerHTML;
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
		$(edit_ad1).val($ad11);
		$(edit_ad2).val($ad211);
		$(edit_ci).val($ci11);
		$(edit_st).val($st11);
		$(edit_zi).val($zi11);
	});

	//delete contact modal set name
	$(delete_contact).click(function(){
		 //var $del_contact_id_val = $( this ).prev().val();
		//alert($target);
		//$(del_contact_Id).val($del_contact_id_val);
		
		var $del_fn = $(this).parent().parent().children()[0];
		var $del_ln = $(this).parent().parent().children()[1];
		var $del_contact_id_val = $(this).parent().parent().children()[9];

		var $del_fn1 = $del_fn.children;
		var $del_fn11=$del_fn1[0].innerHTML;
		var $del_ln1 = $del_ln.children;
		var $del_ln11=$del_ln1[0].innerHTML;
		//var $del_contact_id_val1 = $del_contact_id_val.children;
		var $del_contact_id_val11=$del_contact_id_val.children[0].value
		
		$(delete_contact_label).text($del_fn11+" "+$del_ln11);
		$(del_contact_Id).val($del_contact_id_val11);
		//$(del_edit_fn).val($del_fn11);
		//$(del_edit_ln).val($del_ln11);		
	});
});

<<<<<<< HEAD
global_col = -1;
checkingFirstName = false;
function sortTable(table, col) {
    // 1 and 8
    var tb = table.tBodies[0];
    var tr = Array.prototype.slice.call(tb.rows, 0);
    var i;
    global_col = col;
    tr = tr.sort(compare);
    for (i = 0; i < tr.length; ++i){
        tb.appendChild(tr[i]);
    }
}

function compare(a, b){
    col = global_col;
    if(checkingFirstName == true){
        col = 0;
    }
    first = a.cells[col].textContent.trim();
    second = b.cells[col].textContent.trim();
    if(first == second && checkingFirstName == false){
        checkingFirstName = true;
        return compare(a, b);
    }
    checkingFirstName = false;
    if(first == "" && second == ""){
        return 0;
    }else if(first == ""){
        return 1;
    }else if (second == ""){
        return -1;
    }
    return first.localeCompare(second);
=======
function sortTable(table, col, reverse) {
    var tb = table.tBodies[0]; 
    var tr = Array.prototype.slice.call(tb.rows, 0); 
    var i;
    reverse = -((+reverse) || -1);
    tr = tr.sort(function (a, b) { // sort rows
        return reverse // `-1 *` if want opposite order
            * (a.cells[col].textContent.trim() // using `.textContent.trim()` for test
                .localeCompare(b.cells[col].textContent.trim())
               );
    });
    for(i = 0; i < tr.length; ++i) tb.appendChild(tr[i]); // append each row in order
>>>>>>> 0cc81f76bf59145cd92362c0a8670a5c7ac809e1
}

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

<<<<<<< HEAD
=======
	
	
	
>>>>>>> 0cc81f76bf59145cd92362c0a8670a5c7ac809e1
