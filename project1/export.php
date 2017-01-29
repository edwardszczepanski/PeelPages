<?php
include('connectionData.txt');
$mysqli = new mysqli($server, $user, $pass, $dbname, $port)
or die('Error connecting');
?>
<?php                
                $s_city='CITY';
                $s_state='STATE';
                $s_zip='ZIP';
                $s_add1='Delivery';
                $s_add2='Second';
                $s_lname='LastName';
                $s_fname='FirstName';
                $s_phone='Phone';
                $addId = $_POST['addId'];           
                $stmt = $mysqli -> prepare("SELECT fName,lName, address1,address2,phone_num,e_address,city,state,zip,contact_id FROM contact WHERE addre_id =".$addId);
                $stmt->execute();
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
                $stmt->bind_result($fname,$lname,$addr1,$addr2,$phone_num,$e_address,$city,$state,$zip,$contact_id);
                $filename = 'Please change a name.tsv';
                header("Content-Type: application/octet-stream");
                header('Content-Disposition: attachment; filename="' . $filename . '"');
                echo$s_city."\t".$s_state."\t".$s_zip."\t".$s_add1."\t".$s_add2."\t".$s_lname."\t".$s_fname."\t".$s_phone."\n";
                while($stmt->fetch())
                echo$city."\t".$state."\t".$zip."\t".$addr1."\t".$addr2."\t".$lname."\t".$fname."\t".$phone_num."\n";
                exit;
            ?>