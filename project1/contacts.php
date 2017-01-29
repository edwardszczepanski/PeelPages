<?php
// first thing is to start session
session_start();
// now to check if variable is true

if(!$_SESSION['auth'])
{
   // header('location:login.php');
}
?><?php

 include('connectionData.txt');

 $mysqli = new mysqli($server, $user, $pass, $dbname, $port)
 or die('Error connecting');
 ?>

<!DOCTYPE html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="icon" href="./assets/favicon.jpg" />

  <title>PeelPages</title>
  <link href="./css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="css/styles.css" type="text/css" />
  <link rel="stylesheet" href=
  "https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type=
  "text/css" />
  <script src="https://code.jquery.com/jquery-1.12.4.js" type="text/javascript">
</script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" type="text/javascript">
</script>
  <style type="text/css">
/*<![CDATA[*/
  input.c8 {width: 20px; display: none;}
  button.c7 {float: right; margin-right: 20px;}
  input.c6 {width: 50px;display: none;}
  input.c5 {display: none;}
  form.c4 {margin-top: 2%;}
  input.c3 {float: right; margin-right: 20px;}
  input.c2 {float: right;}
  input.c1 {width: 50px; display: none;}
  /*]]>*/
  </style>
</head>

<body>
  <?php

          $add_fName = $_POST['add_fName'];
          $add_lName = $_POST['add_lName'];
          $add_phone = $_POST['add_phone'];
          $add_email = $_POST['add_email'];
          $add_address1 = $_POST['add_address1'];
          $add_address2 = $_POST['add_address2'];
          $add_city = $_POST['add_city'];
          $add_state = $_POST['add_state'];
          $add_zip = $_POST['add_zip'];
          $addId = $_POST['addId'];
          //echo "cao addID--->".$addId."</br>";
          if($addId==null)
          {
                  header("Location: http://ix.cs.uoregon.edu/~wang18/CIS422Team1/project1/index.php");
                  exit();
          }
          //echo "SELECT COUNT(*) FROM peelPages.contact c WHERE c.fName ='".$add_fName."' AND c.lName ='".$add_lName."' AND c.address = '".$add_address."' AND c.e_address ='".$add_email ."' AND c.phone_num ='". $add_phone."' AND c.city ='".$add_city."' AND c.state ='".$add_state."' AND c.zip ='". $add_zip."';";

          if((!empty($add_fName))||(!empty($add_lName))){
                  //echo "SELECT COUNT(*) FROM peelPages.contact c WHERE c.fName ='".$add_fName."' AND c.lName ='".$add_lName."' AND c.address = '".$add_address."' AND c.e_address ='".$add_email ."' AND c.phone_num ='". $add_phone."' AND c.city ='".$add_city."' AND c.state ='".$add_state."' AND c.zip ='". $add_zip."';";

                  $stmt = $mysqli -> prepare("SELECT COUNT(*) FROM peelPages.contact c WHERE (c.fName ='".$add_fName."'OR c.fName IS NULL) AND (c.lName ='".$add_lName."' OR c.lName IS NULL) AND (c.address1 = '".$add_address1."' OR c.address1 IS NULL) AND (c.address2 ='".$add_address2."' OR c.address2 IS NULL) AND (c.e_address ='".$add_email."' OR c.e_address IS NULL) AND (c.phone_num ='". $add_phone."' OR c.phone_num IS NULL) AND (c.city ='".$add_city."' OR c.city IS NULL) AND (c.state ='".$add_state."' OR c.state IS NULL) AND (c.zip ='". $add_zip."'OR c.zip IS NULL) AND c.addre_id = ".$addId.";");
                  //echo "</br>SELECT COUNT(*) FROM peelPages.contact c WHERE c.fName =".$add_fName." AND c.lName =".$add_lName." AND (c.address = '".$add_address."' OR c.address = NULL);";
                  //$stmt = $mysqli -> prepare("SELECT COUNT(*) FROM peelPages.contact c WHERE c.fName =".$add_fName." AND c.lName =".$add_lName." AND (c.address = '".$add_address."' OR c.address IS NULL);");

                  $stmt->execute();
                  $countNum=null;
                  $stmt->bind_result($countNum);

                  while($stmt->fetch())printf('',$countNum);
                  //printf('----->%s',$countNum);


                  //echo "INSERT INTO peelPages.contact (fName, lName, address, phone_num, e_address, city, state, zip, addre_id) VALUES (".$add_fName.",".$add_lName.");";
                  if($countNum<1)
                  {
                          //echo "INSERT INTO peelPages.contact (fName, lName, addre_id,phone_num, e_address,address, city, state, zip) VALUES ('".$add_fName."','".$add_lName."','".$addId."','".$add_phone."','".$add_email."','".$add_address."','".$add_city."','".$add_state."','".$add_zip."');";
                          $stmt = $mysqli -> prepare("INSERT INTO peelPages.contact (fName, lName, addre_id,phone_num, e_address,address1,address2, city, state, zip) VALUES ('".$add_fName."','".$add_lName."','".$addId."','".$add_phone."','".$add_email."','".$add_address1."','".$add_address2."','".$add_city."','".$add_state."','".$add_zip."');");
                          $stmt->execute();
                  }

          }
  ?><?php

          $edit_fName = $_POST['edit_fName'];
          $edit_lName = $_POST['edit_lName'];
          $edit_phone = $_POST['edit_phone'];
          $edit_email = $_POST['edit_email'];
          $edit_address1 = $_POST['edit_address1'];
          $edit_address2 = $_POST['edit_address2'];
          $edit_city = $_POST['edit_city'];
          $edit_state = $_POST['edit_state'];
          $edit_zip = $_POST['edit_zip'];
          $addId = $_POST['addId'];
          $contact_Id = $_POST['contact_Id'];
          //echo "cao addID--->".$addId."</br>";
          if($addId==null)
          {
                  header("Location: http://ix.cs.uoregon.edu/~wang18/CIS422Team1/project1/index.php");
                  exit();
          }
          //echo "SELECT COUNT(*) FROM peelPages.contact c WHERE c.fName ='".$add_fName."' AND c.lName ='".$add_lName."' AND c.address = '".$add_address."' AND c.e_address ='".$add_email ."' AND c.phone_num ='". $add_phone."' AND c.city ='".$add_city."' AND c.state ='".$add_state."' AND c.zip ='". $add_zip."';";

          if((!empty($edit_fName))||(!empty($edit_lName))){
                  $stmt = $mysqli -> prepare("SELECT COUNT(*) FROM peelPages.contact c WHERE c.contact_id ='".$contact_Id."';");
                  $stmt->execute();
                  $countNum=null;
                  $stmt->bind_result($countNum);

                  while($stmt->fetch())printf('',$countNum);
                  //printf('----->%s',$countNum);

                  //echo "INSERT INTO peelPages.contact (fName, lName, address, phone_num, e_address, city, state, zip, addre_id) VALUES (".$add_fName.",".$add_lName.");";
                  if($countNum==1)
                  {
                          //echo "UPDATE peelPages.contact SET fname='".$edit_fName ."', lname='".$edit_lName ."', phone_num='".$edit_phone."', e_address='".$edit_email."', address1='".$edit_address1."', address2='".$edit_address2 ."', city='".$edit_city."', state='".$edit_state."', zip='".$edit_zip."' WHERE contact_id ='".$contact_Id." ';" ;
                          $stmt = $mysqli -> prepare("UPDATE peelPages.contact SET fname='".$edit_fName ."', lname='".$edit_lName ."', phone_num='".$edit_phone."', e_address='".$edit_email."', address1='".$edit_address1."', address2='".$edit_address2 ."', city='".$edit_city."', state='".$edit_state."', zip='".$edit_zip."' WHERE contact_id ='".$contact_Id." '; ");
                          $stmt->execute();

                  }

          }
  ?><?php
          $del_flag = $_POST['del_flag'];
          $del_contact_Id = $_POST['del_contact_Id'];
          //echo "-->".$del_flag."<--".$del_contact_Id;
          if($del_flag==1){

                  //echo "<br>DELETE FROM peelPages.contact WHERE contact_id = '".$del_contact_Id."';";
                  $stmt = $mysqli -> prepare("DELETE FROM peelPages.contact WHERE contact_id = '".$del_contact_Id."';");
                  $stmt->execute();
          }
  ?>

  <div>
    <!--button id="second" type="button" class="btn btn-danger">Quit App</button>
         <button id="second" type="button" class="btn btn-danger">New Address Book</button>
         <button id="second" type="button" class="btn btn-danger">Import</button>
                 <a class="btn btn-success" href="http://ix.cs.uoregon.edu/~wang18/CIS422Team1/project1/index.php">Back</a-->

    <div class="container">
      <h2>Address Books: <?php
                                      $addId = $_POST['addId'];
                                      $stmt = $mysqli -> prepare("SELECT add_name FROM address WHERE add_id =".$addId);
                                      $stmt->execute();
                                      $addName = null;
                                      $stmt->bind_result($addName);
                                      while($stmt->fetch())
                                      printf('%s', $addName);
                              ?></h2>

      <p>Find your contacts here!</p>
      <div class="form-group">
	  <label for="sel1">Search Address Book:</label>
	  <select class="form-control" id="sel1">
		<option>First Name</option>
		<option>Last Name</option>
		<option>Phone</option>
		<option>Email</option>
		<option>Address1</option>
		<option>Address2</option>
		<option>City</option>
		<option>State</option>
		<option>Zip Code</option>
	  </select>
        <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Searching through First Names">
      </div>

      <table id="myTable" class="table">
        <thead>
          <tr>
            <th>First Name</th>

            <th>Last Name</th>

            <th>Phone</th>

            <th>Email</th>

            <th>Address1</th>

            <th>Address2</th>

            <th>City</th>

            <th>State</th>

            <th>Zip Code</th>
          </tr>
        </thead>

        <tbody>
          <?php
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
                                          while($stmt->fetch())
                                          printf('<tr>
                                          <td>
                                          <p>%s</p>
                                          </td>
                                          <td>
                                          <p>%s</p>
                                          </td>
                                          <td>
                                          <p>%s</p>
                                          </td>
                                          <td>
                                          <p>%s</p>
                                          </td>
                                          <td>
                                          <p>%s</p>
                                          </td>
                                          <td>
                                          <p>%s</p>
                                          </td>
                                          <td>
                                          <p>%s</p>
                                          </td>
                                          <td>
                                          <p>%s</p>
                                          </td><td>
                                          <p>%s</p>
                                          </td>
                                          <td>
                                          <input style="display:none;" type="text" name="%s" style="width:50px;" value="%s" >

                                           <button id="edit_contact" type="button" class="btn btn-info" onclick="pop_Edit()">Edit</button>

                                          </td>
                                          <td>
                                           <button id="delete_contact" type="button" class="btn btn-danger" onclick="pop_delete()">Delete</button>
                                          </td>
                                          </tr>',$fname,$lname,$phone_num,$e_address,$addr1,$addr2,$city,$state,$zip,$contact_id,$contact_id);
                                  ?>
        </tbody>
      </table><!--edit contact modal-->
      <!-- Modal content -->

      <div id="edit_myModal" class="modal modal-content">
        <span class="close">&#215;</span>

        <h3>Please fill information</h3>

        <form action="contacts.php" method="post" id="sendForm" class="c4">
          <table class="addContact">
            <tr>
              <td>
                <p>First Name:</p>
              </td>

              <td><input type="text" name="edit_fName" id="edit_fn" /></td>

              <td>
                <p>Last Name:</p>
              </td>

              <td><input type="text" name="edit_lName" id="edit_ln" /></td>
            </tr>

            <tr>
              <td>
                <p>Phone:</p>
              </td>

              <td><input type="text" name="edit_phone" id="edit_ph" /></td>

              <td>
                <p>Email:</p>
              </td>

              <td><input type="text" name="edit_email" id="edit_em" /></td>
            </tr>

            <tr>
              <td>
                <p>Address1:</p>
              </td>

              <td><input type="text" name="edit_address1" id="edit_ad1" /></td>

              <td>
                <p>Address2:</p>
              </td>

              <td><input type="text" name="edit_address2" id="edit_ad2" /></td>
            </tr>

            <tr>
              <td>
                <p>City:</p>
              </td>

              <td><input type="text" name="edit_city" id="edit_ci" /></td>

              <td>
                <p>State:</p>
              </td>

              <td><input type="text" name="edit_state" id="edit_st" /></td>
            </tr>

            <tr>
              <td>
                <p>Zip:</p>
              </td>

              <td><input type="text" name="edit_zip" id="edit_zi" /></td>

              <td><input class="c1" type="text" name="addId" value=
              "<?php echo $addId;?>" /> <input class="c1" type="text" name="contact_Id"
              id="edit_contact_Id" /></td>

              <td><input class="btn btn-success c2" type="button" value="Save" onclick=
              "checkk();" /> <input class="btn btn-success c3" type="reset" value=
              "Erase" /></td>
            </tr>
          </table>
        </form>
      </div><!--create contact modal-->
      <button id="myBtn" type="button" class="btn btn-info">Add New Person</button> 
      <!--create contact modal-->
       <button id="sortName" type="button" class="btn btn-info">Sort by Name</button>
      <button id="sortZIP" type="button" class="btn btn-info">Sort by ZIP</button>
      <a class="btn btn-success" href="logout.php">Logout</a>

      <div id="myModal" class="modal">
        <!-- Modal content -->

        <div class="modal-content">
          <span id="add_close" class="close">&#215;</span>

          <h3>Please fill information</h3>

          <form action="contacts.php" method="post" id="senddForm" class="c4">
            <table class="addContact">
              <tr>
                <td>
                  <p>First Name:</p>
                </td>

                <td><input type="text" name="add_fName" id="add_fName" /></td>

                <td>
                  <p>Last Name:</p>
                </td>

                <td><input type="text" name="add_lName" id="add_lName" /></td>
              </tr>

              <tr>
                <td>
                  <p>Phone:</p>
                </td>

                <td><input type="text" name="add_phone" id="add_phone" /></td>

                <td>
                  <p>Email:</p>
                </td>

                <td><input type="text" name="add_email" id="add_email" /></td>
              </tr>

              <tr>
                <td>
                  <p>Address1:</p>
                </td>

                <td><input type="text" name="add_address1" id="add_address1" /></td>

                <td>
                  <p>Address2:</p>
                </td>

                <td><input type="text" name="add_address2" id="add_address2" /></td>
              </tr>

              <tr>
                <td>
                  <p>City:</p>
                </td>

                <td><input type="text" name="add_city" id="add_city" /></td>

                <td>
                  <p>State:</p>
                </td>

                <td><input type="text" name="add_state" id="add_state" /></td>
              </tr>

              <tr>
                <td>
                  <p>Zip:</p>
                </td>

                <td><input type="text" name="add_zip" id="add_zip" /></td>

                <td><input class="c5" type="text" name="addId" value=
                "<?php echo $addId;?>" /></td>

                <td><input class="btn btn-success c2" type="button" value="Save" onclick=
                "check();" /> <input class="btn btn-success c3" type="reset" value=
                "Erase" /></td>
              </tr>
            </table>
          </form>
        </div>
      </div><!--delete contact modal-->
      <!-- Modal content -->

      <div id="delete_myModal" class="modal modal-content">
        <span class="close">&#215;</span>

        <h3>Do you want to delete <span class="delete_contact_label" id=
        "delete_contact_label"></span></h3>

        <form action="contacts.php" method="post" id="sendForm" class="c4">
          <input class="c6" type="text" name="addId" value="<?php echo $addId;?>" />
          <input class="c6" type="text" name="del_contact_Id" id="del_contact_Id" />
          <input class="btn btn-success c2" type="submit" value="Yes" /> <button type=
          "button" class="btn btn-success c7" id="delete_modal_no">No</button>
          <input class="c8" type="text" name="del_flag" id="del_flag" />
        </form>
      </div>
    </div>
  </div><script src="./js/contacts.js" type="text/javascript">
</script><script src="./js/bootstrap.min.js" type="text/javascript">
</script>
</body>
</html>

