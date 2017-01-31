 <?php
// first thing is to start session 
session_start();
// now to check if variable is true

if(!$_SESSION['auth'])
{
   // header('location:login.php');
}
?>
 <?php
 
 include('connectionData.txt');
 
 $mysqli = new mysqli($server, $user, $pass, $dbname, $port)
 or die('Error connecting');
 ?>


  <html>
 <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="icon" href="./assets/favicon.jpg">
     <title>PeelPages</title>
         <link href="./css/bootstrap.min.css" rel="stylesheet">
         <link rel="stylesheet" href="css/styles.css"> 
         <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
         <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
         <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
         <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
		header("Location: index.php");
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
?>  

<?php
		
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
		header("Location: index.php");
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
?>  

<?php
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
           <h2 id="titleh2">Address Books: 
		   <?php
				$addId = $_POST['addId'];
				$stmt = $mysqli -> prepare("SELECT add_name FROM address WHERE add_id =".$addId);
				$stmt->execute();
				$addName = null;
				$stmt->bind_result($addName);				
				while($stmt->fetch())
				printf('%s', $addName);
			?>
			</h2>
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
           <table id="myTable" class="table" >
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
            </table>	
			
			
			<!--edit contact modal-->
			<!-- Modal content -->
		<div id="edit_myModal" class="modal">
            <div class="modal-content">
            <span class="close">&times;</span>
            <h3>Please fill information</h3>
            <form action="contacts.php" method="POST" id="sendForm" style="margin-top: 2%;">	
            	<table class="addContact">
                <tr>
                <td>
                <p>First Name:	</p>
                </td>
                <td>
                <input type="text" name="edit_fName" id="edit_fn" >
                </td>
                <td>
                <p>Last Name:	</p>
                </td>
                <td>
                <input type="text" name="edit_lName" id="edit_ln" >
                </td>
                </tr>                
                <tr>
                <td>
                <p>Phone:	</p>
                </td>
                <td>
                <input type="text" name="edit_phone" id="edit_ph">
                </td>
                <td>
                <p>Email:	</p></td>
                <td>
                <input type="text" name="edit_email" id="edit_em">
                </td>
                </tr>                
                <tr>		
					<td>
					<p>Address1:	</p>
					</td>					
					<td><input type="text" name="edit_address1" id="edit_ad1">
					</td>					
					<td>
					<p>Address2:	</p>
					</td>					
					<td><input type="text" name="edit_address2" id="edit_ad2">
					</td>					
				</tr>                
                <tr>				
					<td>
					<p>City: </p>
					</td>
					
					<td>
					<input type="text" name="edit_city" id="edit_ci">
					</td>
					
					<td>
					<p>State: </p>
					</td>
				   
					<td>
					<input type="text" name="edit_state" id="edit_st">
					</td>			
                </tr>				
				<tr>               
			    <td>
					<p>Zip:	</p>
					</td>
						
					<td><input type="text" name="edit_zip" id="edit_zi">			
					</td>				
                <td>
				<input style="width: 50px; display: none;"type="text" name="addId" value="<?php echo $addId;?>">
				<input style="width: 50px; display: none;"type="text" name="contact_Id" id="edit_contact_Id">		
				</td>
				
                <td>
				<input class="btn btn-success" type="button" value="Save" style="float: right;" onClick="checkk();">
                <input class="btn btn-success" type="reset" value="Erase" style="float: right; margin-right: 20px;">		
                </td>
                </tr>
				
                </table>
            </form> 
                 
            </div>
		</div>	
			
			
			<!--create contact modal-->
			<button id="myBtn" type="button" class="btn btn-info" >Add New Person</button>
	
			<!--create contact modal-->
			<button id="sortName" type="button" class="btn btn-info" >Sort by Name</button>
			<button id="sortZIP" type="button" class="btn btn-info" >Sort by ZIP</button>
			<a class="btn btn-success" href="logout.php">Logout</a>				

            <div id="myModal" class="modal">
            
            <!-- Modal content -->
            <div class="modal-content">
            <span id="add_close" class="close">&times;</span>
            <h3>Please fill information</h3>
            <form action="contacts.php" method="POST" id="senddForm" style="margin-top: 2%;">	
            	<table class="addContact">
                <tr>
                <td>
                <p>First Name:	</p>
                </td>
                <td>
                <input type="text" name="add_fName" id="add_fName">
                </td>
                <td>
                <p>Last Name:	</p>
                </td>
                <td>
                <input type="text" name="add_lName" id="add_lName">
                </td>
                </tr>
                
                <tr>
                <td>
                <p>Phone:	</p>
                </td>
                <td>
                <input type="text" name="add_phone" id="add_phone">
                </td>
                <td>
                <p>Email:	</p></td>
                <td>
                <input type="text" name="add_email" id="add_email">
                </td>
                </tr>
                
                <tr>
				
					<td><p>Address1:	</p></td>
					<td><input type="text" name="add_address1" id="add_address1">
					</td>
					
					<td><p>Address2:	</p></td>
					<td><input type="text" name="add_address2" id="add_address2">
					</td>
					
				
                </tr>
                
                <tr>					
					
					<td><p>City: </p></td>
					<td>
					<input type="text" name="add_city" id="add_city">
					</td>
					
					<td><p>State: </p></td>
					<td>
					<input type="text" name="add_state" id="add_state">
					</td>
                </tr>
				
				<tr>
                <td>
					<p>Zip:	</p>
				</td>
                <td>
					<input type="text" name="add_zip" id="add_zip">	
                </td>
                <td>
								    <input style="display: none;"type="text" name="addId" value="<?php echo $addId;?>">								

				</td>
                <td>
				<input class="btn btn-success" type="button" value="Save" style="float: right;" onClick="check();">
                <input class="btn btn-success" type="reset" value="Erase" style="float: right; margin-right: 20px;">		
                </td>
                </tr>
				
                </table>
            </form> 
                 
            </div>

</div>


		<!--delete contact modal-->
		<!-- Modal content -->
		<div id="delete_myModal" class="modal">
            <div class="modal-content">
            <span class="close">&times;</span>
            <h3>Do you want to delete <span class="delete_contact_label" id="delete_contact_label"></span></h3>
            <form action="contacts.php" method="POST" id="sendForm" style="margin-top: 2%;">	
            	
				<input style="width: 50px;display: none;" type="text" name="addId" value="<?php echo $addId;?>">
				<input style="width: 50px;display: none;" type="text" name="del_contact_Id" id="del_contact_Id">		
			
				<input class="btn btn-success" type="submit" value="Yes" style="float: right;">
                <button type="button" class="btn btn-success" id="delete_modal_no" style="float: right; margin-right: 20px;" >No</button>

				<input style="width: 20px; display: none;"type="text" name="del_flag" id="del_flag">		

			
            </form> 
                 
            </div>
		</div>	


          </div>
     </div>
     <div>
     </div>
 </body>
 
 
 <script type="text/JavaScript"language="javascript">
   function check(){
     var add_f =document.getElementById('add_fName').value;
     var add_l =document.getElementById('add_lName').value;
     var add_p =document.getElementById('add_phone').value;
     var add_a1 =document.getElementById('add_address1').value; 
     var add_a2 =document.getElementById('add_address2').value;
     var add_c =document.getElementById('add_city').value;
     var add_s =document.getElementById('add_state').value;
     var add_z =document.getElementById('add_zip').value;
     var add_e =document.getElementById('add_email').value;

     if(((add_f == '') && (add_l == '')) || ((add_p == '') && (add_a1 == '') && (add_a2 == '')
     && (add_c == '') && (add_s == '') && (add_z == ''))){
     		if((add_f == '') && (add_l == '')){
     		alert("Please enter at least your first name or last name!");
     		}
     		else{
     		alert("Please enter at least one address information!");
     		}
     }
     
     else{
      
     var ch = "";
     var dh = "";
     if(add_f == ''){
      ch += 'first name\n';
     }
     if(add_l == ''){
      ch += 'last name\n';
     }
     if(add_p == ''){
      ch += 'phone number\n';
     }
     if(add_a1 == ''){
      ch += 'address 1\n';
     }
     if(add_a2 == ''){
      ch += 'address 2\n';
     }
     if(add_c == ''){
      ch += 'city\n';
     }
     if(add_s == ''){
      ch += 'state\n';
     }
     if(add_z == ''){
      ch += 'zip\n';
     }
     if(add_p != ''){
     	if(((add_p.length == 7) && !(isNaN(add_p)))|| ((add_p.length == 10) && !(isNaN(add_p)))){
     		dh += '';
     	}
     	else{
     		dh += 'WARRING: Your phone number is wrong!\n';
     	}
     }
     
     if(add_z != ''){
     	if(((add_z.length == 5) && !(isNaN(add_z)))|| ((add_z.length == 10))){
     		if(add_z.length == 10){
     			if(!(isNaN(add_z.slice(0,4))) && (add_z.charAt(5) == '-') && !(isNaN(add_z.slice(6,9)))){
     				dh += '';
     			}
     			else{
     				dh += 'WARRING: Your zip code is wrong!\n';
     			}
     		}
     		else{
     			dh += '';
     		}

     		
     	}
     	else{
     		dh += 'WARRING: Your zip code is wrong!\n';
     	}
     }


     if(add_e != ''){
     	if(add_e.indexOf('@') > -1){
     		dh += '';
     	}
     	else{
     		dh += 'WARRING: Your email address is invalid\n';
     	}
     }


     if(ch != '' || dh != ''){
     if(ch == ''){var re = confirm(dh + 'Do you still want to save it?');}
     if(ch !=''){var re = confirm('WARRING: You did not fill your:\n' + ch + dh + 'Do you still want to save it?');}
     if(re == true){
     document.getElementById("senddForm").submit();
     }else{
     //alert('buhao');
     }
     
     }
     if(ch =='' && dh ==''){
     document.getElementById("senddForm").submit();
     }
     }
      
   }
</script>


<script type="text/JavaScript"language="javascript">
   function checkk(){
     var edit_f =document.getElementById('edit_fn').value;
     var edit_l =document.getElementById('edit_ln').value;
     var edit_p =document.getElementById('edit_ph').value;
     var edit_a1 =document.getElementById('edit_ad1').value; 
     var edit_a2 =document.getElementById('edit_ad2').value;
     var edit_c =document.getElementById('edit_ci').value;
     var edit_s =document.getElementById('edit_st').value;
     var edit_z =document.getElementById('edit_zi').value;
     var edit_e =document.getElementById('edit_em').value;

     if(((edit_f == '') && (edit_l == '')) || ((edit_p == '') && (edit_a1 == '') && (edit_a2 == '')
     && (edit_c == '') && (edit_s == '') && (edit_z == ''))){
     		if((edit_f == '') && (edit_l == '')){
     		alert("Please enter at least your first name or last name!");
     		}
     		else{
     		alert("Please enter at least one address information!");
     		}
     }
     
     else{
      
     var ch = "";
     var dh = "";
     if(edit_f == ''){
      ch += 'first name\n';
     }
     if(edit_l == ''){
      ch += 'last name\n';
     }
     if(edit_p == ''){
      ch += 'phone number\n';
     }
     if(edit_a1 == ''){
      ch += 'address 1\n';
     }
     if(edit_a2 == ''){
      ch += 'address 2\n';
     }
     if(edit_c == ''){
      ch += 'city\n';
     }
     if(edit_s == ''){
      ch += 'state\n';
     }
     if(edit_z == ''){
      ch += 'zip\n';
     }
     if(edit_p != ''){
     	if(((edit_p.length == 7) && !(isNaN(edit_p)))|| ((edit_p.length == 10) && !(isNaN(edit_p)))){
     		dh += '';
     	}
     	else{
     		dh += 'WARRING: Your phone number is wrong!\n';
     	}
     }
     
     if(edit_z != ''){
     	if(((edit_z.length == 5) && !(isNaN(edit_z)))|| ((edit_z.length == 10))){
     		if(edit_z.length == 10){
     			if(!(isNaN(edit_z.slice(0,4))) && (edit_z.charAt(5) == '-') && !(isNaN(edit_z.slice(6,9)))){
     				dh += '';
     			}
     			else{
     				dh += 'WARRING: Your zip code is wrong!\n';
     			}
     		}
     		else{
     			dh += '';
     		}

     		
     	}
     	else{
     		dh += 'WARRING: Your zip code is wrong!\n';
     	}
     }


     if(edit_e != ''){
     	if(edit_e.indexOf('@') > -1){
     		dh += '';
     	}
     	else{
     		dh += 'WARRING: Your email address is invalid\n';
     	}
     }


     if(ch != '' || dh != ''){
     if(ch == ''){var re = confirm(dh + 'Do you still want to save it?');}
     if(ch !=''){var re = confirm('WARRING: You did not fill your:\n' + ch + dh + 'Do you still want to save it?');}
     if(re == true){
     document.getElementById("sendForm").submit();
     }else{
     //alert('buhao');
     }
     
     }
     if(ch =='' && dh ==''){
     document.getElementById("sendForm").submit();
     }
     }
      
     
           
     
   }
</script>
 
     <script src="./js/contacts.js"></script>
     <script src="./js/bootstrap.min.js"></script>
	 <script >
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
		delete_flag.value="1";
		
		//}
		// When the user clicks on <span> (x), close the modal
		delete_span.onclick = function() {
		delete_modal.style.display = "none";
		delete_flag.value="0";
		}
		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		if (event.target == delete_modal) {
			delete_modal.style.display = "none";
			delete_flag.value="0";
		}
		}	
		//when click no
		var delete_no_btn = document.getElementById("delete_modal_no");
		delete_no_btn.onclick = function() {
			delete_modal.style.display = "none";
			delete_flag.value="0";
		}

	}
	
	</script>

 </html>


