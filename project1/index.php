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
         <!--button id="second" type="button" class="btn btn-danger">Quit App</button>
         <button id="second" type="button" class="btn btn-danger">New Address Book</button>
         <button id="second" type="button" class="btn btn-danger">Import</button-->
 
 
         <div class="container">
           <h2>Address Books</h2>
           <p>Find yo address books here!</p>            
          <p>Address Book Name</p>
                 
			 
			<select size="10" form="sendForm" name="addId" class="form-control" style="height: 240px;" required>

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

			
			<form action="contacts.php" method="POST" id="sendForm" style="margin-top: 2%;" target="_blank">				
				<input class="btn btn-success" type="submit" value="Open">
				<button id="" type="button" class="btn btn-success">Export</button>				
			</form>
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
