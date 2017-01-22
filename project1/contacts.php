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
	$_SESSION['submit']=false;
	if($_SESSION['submit']==0){echo "---->".$_SESSION['submit'];}
	else{echo "++++>".$_SESSION['submit'];}
	$add_fName = $_POST['add_fName'];			
	$add_lName = $_POST['add_lName'];			
	$add_phone = $_POST['add_phone'];			
	$add_email = $_POST['add_email'];			
	$add_address = $_POST['add_address'];			
	$add_city = $_POST['add_city'];			
	$add_state = $_POST['add_state'];			
	$add_zip = $_POST['add_zip'];			
	$addId = $_POST['addId'];

	if((!empty($add_fName))&&(!empty($add_lName))){
		echo "INSERT INTO peelPages.contact (fName, lName, address, phone_num, e_address, city, state, zip, addre_id) VALUES (".$add_fName.",".$add_lName.");";
				
		$stmt = $mysqli -> prepare("INSERT INTO peelPages.contact (fName, lName, addre_id) VALUES (".$add_fName.",".$add_lName.",".$addId.");		");
	
	$stmt->execute();
	

		}
			

	
?>  
     <div>
         <button id="second" type="button" class="btn btn-danger">Quit App</button>
         <button id="second" type="button" class="btn btn-danger">New Address Book</button>
         <button id="second" type="button" class="btn btn-danger">Import</button>
		 <a class="btn btn-success" href="http://ix.cs.uoregon.edu/~wang18/CIS422Team1/project1/index.php">Back</a>


 
 
         <div class="container">
           <h2>Address Books: 
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
           <p>Find yo contacts here!</p>            
           <table class="table" >
             <thead>
               <tr>
                 <th>Contact Name</th>
                 <th>Phone</th>
                 <th>Email</th>
                 <th>Address</th> 
				 <th>City</th>
                 <th>State</th>
                 <th>Zip Code</th>				
               </tr>
             </thead>
             <tbody>			 
 	        <?php
				$addId = $_POST['addId'];			

				$stmt = $mysqli -> prepare("SELECT CONCAT(fName,' ' ,lName), address,phone_num,e_address,city,state,zip FROM contact WHERE addre_id =".$addId);
				$stmt->execute();
				$name=null;
				$addr=null;
				$phone_num=null;
				$e_address=null;
				$city=null;
				$state=null;
				$zip=null;
				//$r3=null;
				$stmt->bind_result($name,$addr,$phone_num,$e_address,$city,$state,$zip);
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
				 <button id="second" type="button" class="btn btn-info">Edit</button>
        
				</td>
				<td>
				 <button id="second" type="button" class="btn btn-danger">Delete</button>
				</td>  				
				</tr>',$name,$phone_num,$e_address,$addr,$city,$state,$zip);
			?>
              
              </tbody>
            </table>	
			<button id="myBtn" type="button" class="btn btn-info">Add New Person</button>

            <div id="myModal" class="modal">
            
            <!-- Modal content -->
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
                <input type="text" name="add_fName" required>
                </td>
                <td>
                <p>Last Name:	</p>
                </td>
                <td>
                <input type="text" name="add_lName" required>
                </td>
                </tr>
                
                <tr>
                <td>
                <p>Phone:	</p>
                </td>
                <td>
                <input type="text" name="add_phone">
                </td>
                <td>
                <p>Email:	</p></td>
                <td>
                <input type="text" name="add_email">
                </td>
                </tr>
                
                <tr>
                <td><p>Address:	</p></td>
                <td><input type="text" name="add_address">
                </td>
                <td><p>City: </p></td>
                <td>
                <input type="text" name="add_city">
                </td>
                </tr>
                
                <tr>
                <td>
                <p>State: </p></td>
                <td>
                <input type="text" name="add_state">
                </td>
                <td>
                <p>Zip:	</p></td>
                <td><input type="text" name="add_zip">			
                </td>
                </tr>
                </table>
                <input type="text" name="addId" value="<?php echo $addId;?>">								

            	<input class="btn btn-success" type="submit" value="Submit" >
                <input class="btn btn-success" type="reset" value="Erase">


            </form> 
                 
            </div>

</div>
          </div>
     </div>
     <div>
     </div>
 </body>
 
  <script>
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
</script>
<script>
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
</script>
     <script src="./js/demo.js"></script>
     <script src="./js/bootstrap.min.js"></script>
     
 </html>











