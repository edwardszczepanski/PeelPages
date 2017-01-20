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

     <div>
         <button id="second" type="button" class="btn btn-danger">Quit App</button>
         <button id="second" type="button" class="btn btn-danger">New Address Book</button>
         <button id="second" type="button" class="btn btn-danger">Import</button>
		 <a class="btn btn-success" href="http://ix.cs.uoregon.edu/~wang18/peelPages/index.php">Back</a>


 
 
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
				</tr>',$name,$phone_num,$e_address,$addr,$city,$state,$zip);
			?>
              
              </tbody>
            </table>	
			
			
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
     <script src="./js/demo.js"></script>
     <script src="./js/bootstrap.min.js"></script>
 </html>











