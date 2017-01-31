 <?php
// first thing is to start session 
session_start();
// now to check if variable is true

if(!$_SESSION['auth'])
{
    header('location:login.php');
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
	$del_addr_Id = $_POST['del_addr_Id'];			
	$del_addr_flag = $_POST['del_addr_flag'];		
	//echo "addr ID->".$del_addr_Id."<-addr flag->".$del_addr_flag."<-<br>";	
	$addr_name = $_POST['addr_name'];			
	
	if($del_addr_flag == 1){
		$stmt = $mysqli -> prepare("DELETE FROM peelPages.address WHERE add_id ='".$del_addr_Id."';");
		//echo "</br>DELETE FROM peelPages.address WHERE add_id ='".$del_addr_Id."';";
		//$stmt = $mysqli -> prepare("SELECT COUNT(*) FROM peelPages.contact c WHERE c.fName =".$add_fName." AND c.lName =".$add_lName." AND (c.address = '".$add_address."' OR c.address IS NULL);");

		$stmt->execute();
	
	}
	
	//echo "SELECT COUNT(*) FROM peelPages.contact c WHERE c.fName ='".$add_fName."' AND c.lName ='".$add_lName."' AND c.address = '".$add_address."' AND c.e_address ='".$add_email ."' AND c.phone_num ='". $add_phone."' AND c.city ='".$add_city."' AND c.state ='".$add_state."' AND c.zip ='". $add_zip."';";
	
	if(isset($addr_name) && !empty($addr_name) ){	
		
//		echo "SELECT COUNT(*) FROM peelPages.address  WHERE add_name ='".$addr_name."';";
		$stmt = $mysqli -> prepare("SELECT COUNT(*) FROM peelPages.address  WHERE add_name ='".$addr_name."';");
		//echo "</br>SELECT COUNT(*) FROM peelPages.contact c WHERE c.fName =".$add_fName." AND c.lName =".$add_lName." AND (c.address = '".$add_address."' OR c.address = NULL);";
		//$stmt = $mysqli -> prepare("SELECT COUNT(*) FROM peelPages.contact c WHERE c.fName =".$add_fName." AND c.lName =".$add_lName." AND (c.address = '".$add_address."' OR c.address IS NULL);");

		$stmt->execute();
		$count_Num=null;
		$stmt->bind_result($count_Num);
		
		while($stmt->fetch())printf('',$count_Num);	
		//printf('----->%s',$countNum);
		
		
		//echo "INSERT INTO peelPages.contact (fName, lName, address, phone_num, e_address, city, state, zip, addre_id) VALUES (".$add_fName.",".$add_lName.");";
		if($count_Num<1)
		{			
			//echo "INSERT INTO peelPages.contact (fName, lName, addre_id,phone_num, e_address,address, city, state, zip) VALUES ('".$add_fName."','".$add_lName."','".$addId."','".$add_phone."','".$add_email."','".$add_address."','".$add_city."','".$add_state."','".$add_zip."');";

			$stmt = $mysqli -> prepare("INSERT INTO address (add_name) VALUES ('".$addr_name."');");
			
			
			$stmt->execute();
		}

	}	
	$_POST['addr_name']=null;
	$addr_name;
?>  
 
 
 
 
         <div class="container">
           <h2>Address Books</h2>
           <p>Find your address books here!</p>            
          <p>Address Book Name</p>
                 
			 
			<select size="10" form="sendForm" name="addId" class="form-control" style="height: 240px;" id="abc" required>

 	      <?php
			$stmt = $mysqli -> prepare("SELECT add_name, add_id FROM address");

			$stmt->execute();
			$r1=null;
			$r3=null;
			$stmt->bind_result($r1,$r3);
			while($stmt->fetch())
			printf('<option value="%s"><p>%s</p></option>', $r3,$r1);
  	      ?>
            </select>                      


			<form method="POST" id="sendForm" style="margin-top: 2%;" target="_blank">
				<input class="btn btn-success" type="submit" value="Open" onClick="openAction()">
				<button id="add_addr_myBtn" type="button" class="btn btn-success" onclick="pop_add_addr()">New</button>
				<button id="delete_addr_contact" type="button" class="btn btn-danger" onclick="pop_delete()">Delete</button>
                <a class="btn btn-success" href="logout.php">Logout</a>
                <input class="btn btn-info" type="submit" value="Export" style="float: right;" onClick="exportAction()">
                <input class="btn btn-info" type="submit" value="Import" style="float: right; margin-right: 10px;" onClick="importAction()">                
			</form>
			
			
			<!--delete contact modal-->
			<!-- Modal content -->
			<div id="delete_addr_myModal" class="modal">
				<div class="modal-content">
				<span class="close">&times;</span>
				<h3>Do you want to delete <span class="delete_addr_label" id="delete_addr_label"></span></h3>
				<form action="index.php" method="POST" id="sendForm" style="margin-top: 2%;">	
					
					<!--<input style="width: 50px;display: none;" type="text" name="addId" value="<?php echo $addId;?>">-->
					<input style="width: 50px; display: none;" type="text" name="del_addr_Id" id="del_addr_Id">		
				
					<input class="btn btn-success" type="submit" value="Yes" style="float: right;">
					<button type="button" class="btn btn-success" id="delete_addr_modal_no" style="float: right; margin-right: 20px;" >No</button>

					<input style="width: 20px; display: none;"type="text" name="del_addr_flag" id="del_addr_flag">		

				
				</form> 
					 
				</div>
			</div>	
			
            <div id="add_addr_myModal" class="modal">
            
            <!-- Modal content -->
            <div class="modal-content" style="height: 270px; width: 570px;">
            <span id="add_close" class="close">&times;</span>
            <h3>Please fill information</h3>
            <form action="index.php" method="POST" id="senddForm" style="margin-top: 2%;">	
            	<table class="addContact">
                <tr>
                <td>
                <p>Address Name:	</p>
                </td>
                <td>
                <input type="text" name="addr_name" id="addr_name" required>
                </td>
                <td>
                </td>
                <td>
                </td>
                </tr>
                
				
				<tr>
                <td>
				</td>
                <td>
				
                </td>
                <td>
					<input class="btn btn-success" type="submit" value="Save" style="float: right;" >
					<button type="button" class="btn btn-success" id="addr_modal_no" style="float: right; margin-right: 20px;" >Cancel</button>
					
				</td>
                <td>
				
                </td>
                </tr>
				
                </table>
            </form> 
                 
            </div>

		</div>
		  
		  
		  
		  
		  </div>
     
   
 <script type="text/JavaScript"language="javascript">
 function openAction(){

  if(document.getElementById("abc").value == ''){
    document.getElementById("sendForm").target='';
    document.getElementById("sendForm").action="index.php";
  }
  else{
  //alert("w");
  document.getElementById("sendForm").target='_blank';  
 	document.getElementById("sendForm").action="contacts.php";
 	document.getElementById("sendForm").submit();
  }
 }
 
 </script>

<script type="text/JavaScript"language="javascript">
 function exportAction(){
  if(document.getElementById("abc").value == ''){
    document.getElementById("sendForm").target='';
    document.getElementById("sendForm").action="index.php";

    //alert("wrong");

  }
  else{
  //alert("w");
  document.getElementById("sendForm").target='_blank';  
  document.getElementById("sendForm").action="export.php";
  document.getElementById("sendForm").submit();
  }
 }
 
 </script>
 
<script type="text/JavaScript"language="javascript">
 function importAction(){

  document.getElementById("sendForm").target='_blank';  
  document.getElementById("sendForm").action="import.php";
  document.getElementById("sendForm").submit();
  
 }
 
 </script>
 
 
 
 </body>
     <script src="./js/demo.js"></script>
     <script src="./js/bootstrap.min.js"></script>
	 <script >
	 //add address modal
	function pop_add_addr() {	
		// Get the modal
		var add_addr_modal = document.getElementById('add_addr_myModal');
		// Get the button that opens the modal
		var add_addr_btn = document.getElementById("add_addr_myBtn");
		// Get the <span> element that closes the modal
		var add_addr_span = document.getElementsByClassName("close")[1];
		// When the user clicks the button, open the modal
		//edit_btn.onclick = function() {
		add_addr_modal.style.display = "block";
		
		//}
		// When the user clicks on <span> (x), close the modal
		add_addr_span.onclick = function() {
		add_addr_modal.style.display = "none";
		}
		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		if (event.target == add_addr_modal) {
			add_addr_modal.style.display = "none";
		}
		}	
		//when click no
		var add_addr_no_btn = document.getElementById("addr_modal_no");
		add_addr_no_btn.onclick = function() {
			add_addr_modal.style.display = "none";
		}
	}
	
	 //delete contact modal
	function pop_delete() {	
		if(document.getElementById('abc').value != ""){
		// Get the modal
		var delete_addr_modal = document.getElementById('delete_addr_myModal');
		// Get the button that opens the modal
		var delete_addr_btn = document.getElementById("delete_addr_contact");
		// Get the <span> element that closes the modal
		var delete_addr_span = document.getElementsByClassName("close")[0];
		// When the user clicks the button, open the modal
		//edit_btn.onclick = function() {
		delete_addr_modal.style.display = "block";
		
		var delete_addr_flag = document.getElementById("del_addr_flag");
		delete_addr_flag.value="1";
		
		//}
		// When the user clicks on <span> (x), close the modal
		delete_addr_span.onclick = function() {
			delete_addr_modal.style.display = "none";
			delete_addr_flag.value="0";
			$(del_addr_Id).val("");
		}
		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		if (event.target == delete_addr_modal) {
			delete_addr_modal.style.display = "none";
			delete_addr_flag.value="0";
			$(del_addr_Id).val("");
		}
		}	
		//when click no
		var delete_addr_no_btn = document.getElementById("delete_addr_modal_no");
		delete_addr_no_btn.onclick = function() {
			delete_addr_modal.style.display = "none";
			delete_addr_flag.value="0";
			$(del_addr_Id).val("");
		}
		
		var getSelection = document.getElementById("abc");
		var getOptionTxt = getSelection.options[getSelection.selectedIndex].text;
		var getOptionVal = getSelection.options[getSelection.selectedIndex].value;
		$(delete_addr_label).text(getOptionTxt);
        $(del_addr_Id).val(getOptionVal);
		}else{
     		alert("Please select one address book to delete!");
		}

	}
	
	</script>
 </html>
