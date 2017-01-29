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
           <p>Find your address books here!</p>            
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
            
            

			
			<form  method="POST" id="sendForm" style="margin-top: 2%;" target="_blank">
				<input class="btn btn-success" type="submit" value="Open" onClick="openAction()">
				<button id="" type="button" class="btn btn-success">Add New Address book</button>
				<button id="closeAll" type="button" class="btn btn-success">Close All</button>
				<input class="btn btn-info" type="submit" value="Export" style="float: right;" onClick="exportAction()">
				<input class="btn btn-info" type="submit" value="Import" style="float: right; margin-right: 10px;" onClick="importAction()">				
			</form>

          </div>
     </div>
     <div>
     </div>
 
 <script type="text/JavaScript"language="javascript">
 function openAction(){
 	document.getElementById("sendForm").action="contacts.php";
 	document.getElementById("sendForm").submit();
 }
 
 </script>

<script type="text/JavaScript"language="javascript">
 function exportAction(){
 	document.getElementById("sendForm").action="export.php";
 	document.getElementById("sendForm").submit();
 }
 
 </script>
 
<script type="text/JavaScript"language="javascript">
 function importAction(){
 	document.getElementById("sendForm").action="import.php";
 	document.getElementById("sendForm").submit();
 }
 
 </script>
 
 
 
 </body>
     <script src="./js/demo.js"></script>
     <script src="./js/bootstrap.min.js"></script>
 </html>
