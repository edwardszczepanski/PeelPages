$(function() {
    document.getElementById("sortName").onclick = function() {
        var table = document.getElementById("myTable");
        sortTable(table, 1, false);
    };
    document.getElementById("sortZIP").onclick = function() {
        var table = document.getElementById("myTable");
        sortTable(table, 8, false);
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
    });

    searchIndex = 0;
    var selector = document.getElementById("sel1");
    var myInputBox = document.getElementById("myInput");
    selector.onchange = function() {
        searchIndex = selector.selectedIndex;
        myInputBox.placeholder = "Search for " + selector.value;
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
            modal.style.display = "none";
        }
    }

    //edit contact modal set contact_Id
    $(edit_contact).click(function() {
        var $contact_id_val = $(this).prev().val();
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
        var $fn11 = $fn1[0].innerHTML;
        var $ln1 = $ln.children;
        var $ln11 = $ln1[0].innerHTML;
        var $ph1 = $ph.children;
        var $ph11 = $ph1[0].innerHTML;
        var $em1 = $em.children;
        var $em11 = $em1[0].innerHTML;
        var $ad1 = $ad.children;
        var $ad11 = $ad1[0].innerHTML;
        var $ad21 = $ad2.children;
        var $ad211 = $ad21[0].innerHTML;
        var $ci1 = $ci.children;
        var $ci11 = $ci1[0].innerHTML;
        var $st1 = $st.children;
        var $st11 = $st1[0].innerHTML;
        var $zi1 = $zi.children;
        var $zi11 = $zi1[0].innerHTML;
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
    $(delete_contact).click(function() {
        //var $del_contact_id_val = $( this ).prev().val();
        //alert($target);
        //$(del_contact_Id).val($del_contact_id_val);

        var $del_fn = $(this).parent().parent().children()[0];
        var $del_ln = $(this).parent().parent().children()[1];
        var $del_contact_id_val = $(this).parent().parent().children()[9];

        var $del_fn1 = $del_fn.children;
        var $del_fn11 = $del_fn1[0].innerHTML;
        var $del_ln1 = $del_ln.children;
        var $del_ln11 = $del_ln1[0].innerHTML;
        //var $del_contact_id_val1 = $del_contact_id_val.children;
        var $del_contact_id_val11 = $del_contact_id_val.children[0].value

        $(delete_contact_label).text($del_fn11 + " " + $del_ln11);
        $(del_contact_Id).val($del_contact_id_val11);
        //$(del_edit_fn).val($del_fn11);
        //$(del_edit_ln).val($del_ln11);
    });
});

function sortTable(table, col, reverse) {
    var tb = table.tBodies[0];
    var tr = Array.prototype.slice.call(tb.rows, 0);
    var i;
    reverse = -((+reverse) || -1);
    tr = tr.sort(function(a, b) { // sort rows
        return reverse // `-1 *` if want opposite order
            *
            (a.cells[col].textContent.trim() // using `.textContent.trim()` for test
                .localeCompare(b.cells[col].textContent.trim())
            );
    });
    for (i = 0; i < tr.length; ++i) tb.appendChild(tr[i]); // append each row in order
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

//delete contact modal
function pop_delete() {
    // Get the modal
    var delete_modal = document.getElementById('delete_myModal');
    // Get the button that opens the modal
    var delete_btn = document.getElementById("delete_contact");
    // Get the <span> element that closes the modal
    var delete_span = document.getElementsByClassName("close")[2];
    // When the user clicks the button, open the modal
    //edit_btn.onclick = function() {
    delete_modal.style.display = "block";

    var delete_flag = document.getElementById("del_flag");
    delete_flag.value = "1";

    //}
    // When the user clicks on <span> (x), close the modal
    delete_span.onclick = function() {
        delete_modal.style.display = "none";
        delete_flag.value = "0";
    }
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == delete_modal) {
            delete_modal.style.display = "none";
            delete_flag.value = "0";
        }
    }
    //when click no
    var delete_no_btn = document.getElementById("delete_modal_no");
    delete_no_btn.onclick = function() {
        delete_modal.style.display = "none";
        delete_flag.value = "0";
    }

}

function myFunction() {
    // Declare variables
    var input, filter, table, tr, td, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        //td = tr[i].getElementsByTagName("td")[0];
        td = tr[i].getElementsByTagName("td")[searchIndex];
        if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

function checkk() {

    //document.getElementById("senddForm").submit();
    //var su = document.getElementById("sendForm");
    //su.action="contacts.php";

    //su.method="POST";
    //su.submit();
    //alert('ddd');

    var edit_f = document.getElementById('edit_fn').value;
    var edit_l = document.getElementById('edit_ln').value;
    var edit_p = document.getElementById('edit_ph').value;
    var edit_a1 = document.getElementById('edit_ad1').value;
    var edit_a2 = document.getElementById('edit_ad2').value;
    var edit_c = document.getElementById('edit_ci').value;
    var edit_s = document.getElementById('edit_st').value;
    var edit_z = document.getElementById('edit_zi').value;
    var edit_e = document.getElementById('edit_em').value;

    if (((edit_f == '') && (edit_l == '')) || ((edit_p == '') && (edit_a1 == '') && (edit_a2 == '') &&
            (edit_c == '') && (edit_s == '') && (edit_z == ''))) {
        //alert("ddd");
        if ((edit_f == '') && (edit_l == '')) {
            alert("Please enter at least your first name or last name!");
        } else {
            alert("Please enter at least one address information!");
        }
    } else {

        var ch = "";
        if (edit_f == '') {
            ch += 'first name\n';
        }
        if (edit_l == '') {
            ch += 'last name\n';
        }
        if (edit_p == '') {
            ch += 'phone number\n';
        }
        if (edit_a1 == '') {
            ch += 'address 1\n';
        }
        if (edit_a2 == '') {
            ch += 'address 2\n';
        }
        if (edit_c == '') {
            ch += 'city\n';
        }
        if (edit_s == '') {
            ch += 'state\n';
        }
        if (edit_z == '') {
            ch += 'zip\n';
        }
        if (edit_p != '') {
            if (((edit_p.length == 7) && !(isNaN(edit_p))) || ((edit_p.length == 10) && !(isNaN(edit_p)))) {
                ch += '';
            } else {
                ch += 'WARRING: Your phone number is wrong!\n';
            }
        }

        if (edit_z != '') {
            if (((edit_z.length == 5) && !(isNaN(edit_z))) || ((edit_z.length == 10))) {
                if (edit_z.length == 10) {
                    if (!(isNaN(edit_z.slice(0, 4))) && (edit_z.charAt(5) == '-') && !(isNaN(edit_z.slice(6, 9)))) {
                        ch += '';
                    } else {
                        ch += 'WARRING: Your zip code is wrong!\n';
                    }
                } else {
                    ch += '';
                }


            } else {
                ch += 'WARRING: Your zip code is wrong!\n';
            }
        }


        if (edit_e != '') {
            if (edit_e.indexOf('@') > -1) {
                ch += '';
            } else {
                ch += 'WARRING: Your email address is invalid\n';
            }
        }


        if (ch != '') {
            var re = confirm('WARRING: You did not fill your:\n' + ch + 'Do you still want to save it?');
            if (re == true) {
                document.getElementById("sendForm").submit();
            } else {
                //alert('buhao');
            }

        }
        if (ch == '') {
            document.getElementById("sendForm").submit();
        }
    }
}


function check() {

    //document.getElementById("senddForm").submit();
    //var su = document.getElementById("sendForm");
    //su.action="contacts.php";

    //su.method="POST";
    //su.submit();
    //alert('ddd');

    var add_f = document.getElementById('add_fName').value;
    var add_l = document.getElementById('add_lName').value;
    var add_p = document.getElementById('add_phone').value;
    var add_a1 = document.getElementById('add_address1').value;
    var add_a2 = document.getElementById('add_address2').value;
    var add_c = document.getElementById('add_city').value;
    var add_s = document.getElementById('add_state').value;
    var add_z = document.getElementById('add_zip').value;
    var add_e = document.getElementById('add_email').value;

    if (((add_f == '') && (add_l == '')) || ((add_p == '') && (add_a1 == '') && (add_a2 == '') &&
            (add_c == '') && (add_s == '') && (add_z == ''))) {
        //alert("ddd");
        if ((add_f == '') && (add_l == '')) {
            alert("Please enter at least your first name or last name!");
        } else {
            alert("Please enter at least one address information!");
        }
    } else {

        var ch = "";
        if (add_f == '') {
            ch += 'first name\n';
        }
        if (add_l == '') {
            ch += 'last name\n';
        }
        if (add_p == '') {
            ch += 'phone number\n';
        }
        if (add_a1 == '') {
            ch += 'address 1\n';
        }
        if (add_a2 == '') {
            ch += 'address 2\n';
        }
        if (add_c == '') {
            ch += 'city\n';
        }
        if (add_s == '') {
            ch += 'state\n';
        }
        if (add_z == '') {
            ch += 'zip\n';
        }
        if (add_p != '') {
            if (((add_p.length == 7) && !(isNaN(add_p))) || ((add_p.length == 10) && !(isNaN(add_p)))) {
                ch += '';
            } else {
                ch += 'WARRING: Your phone number is wrong!\n';
            }
        }

        if (add_z != '') {
            if (((add_z.length == 5) && !(isNaN(add_z))) || ((add_z.length == 10))) {
                if (add_z.length == 10) {
                    if (!(isNaN(add_z.slice(0, 4))) && (add_z.charAt(5) == '-') && !(isNaN(add_z.slice(6, 9)))) {
                        ch += '';
                    } else {
                        ch += 'WARRING: Your zip code is wrong!\n';
                    }
                } else {
                    ch += '';
                }


            } else {
                ch += 'WARRING: Your zip code is wrong!\n';
            }
        }


        if (add_e != '') {
            if (add_e.indexOf('@') > -1) {
                ch += '';
            } else {
                ch += 'WARRING: Your email address is invalid\n';
            }
        }


        if (ch != '') {
            var re = confirm('WARRING: You did not fill your:\n' + ch + 'Do you still want to save it?');
            if (re == true) {
                document.getElementById("senddForm").submit();
            } else {
                //alert('buhao');
            }

        }
        if (ch == '') {
            document.getElementById("senddForm").submit();
        }
    }
}
