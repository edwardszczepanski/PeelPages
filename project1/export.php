<?php
    include('connectionData.txt');
    $mysqli = new mysqli($server, $user, $pass, $dbname, $port)
    or die('Error connecting');
?>
<?php
    // Get addId from the previews page
    $addId = $_POST['addId'];
    // Set the MySql query for get the address book's name 
    $stmt = $mysqli -> prepare("SELECT add_name FROM address WHERE add_id =".$addId);
    // Excute the query
    $stmt->execute();
    $r1=NULL;
    // Get the address book name
    $stmt->bind_result($r1);
    while($stmt->fetch());
    $r2=$r1;
?>
<?php
    // Create variables to store the contact's attributes' name
    $s_city='CITY';
    $s_state='STATE';
    $s_zip='ZIP';
    $s_add1='Delivery';
    $s_add2='Second';
    $s_lname='LastName';
    $s_fname='FirstName';
    $s_phone='Phone';
    $addId = $_POST['addId'];
    // Set the MySql query for get the contact's information
    $stmt = $mysqli -> prepare("SELECT fName,lName, address1,address2,phone_num,e_address,city,state,zip,contact_id FROM contact WHERE addre_id =".$addId);
    $stmt->execute();
    // Create variables to store the contact's information
    $fname=null;
    $lname=null;
    $addr1=null;
    $addr2=null;
    $phone_num=null;
    $e_address=null;
    $city=null;
    $state=null;
    $zip=null;
    $contact_id=null;
    // Get the contact's information
    $stmt->bind_result($fname,$lname,$addr1,$addr2,$phone_num,$e_address,$city,$state,$zip,$contact_id);
    // Set the download file's name
    $filename = $r2.'.tsv';
    // Donwload the file
    header("Content-Type: application/octet-stream");
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    // Write attributes's name into the file
    echo$s_city."\t".$s_state."\t".$s_zip."\t".$s_add1."\t".$s_add2."\t".$s_lname."\t".$s_fname."\t".$s_phone."\n";
    // Write contact's information into the file
    while($stmt->fetch())
    echo$city."\t".$state."\t".$zip."\t".$addr1."\t".$addr2."\t".$lname."\t".$fname."\t".$phone_num."\n";
    exit;
?>