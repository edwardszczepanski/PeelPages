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
 <div class="container" style="margin-left: 30%;margin-top: 5%;">
<div style="position:relative;">
<form action="import.php" method="POST" id="importform" style="margin-top: 2%;" enctype="multipart/form-data">

<a href="#" >Please Click to open a .tsv file and type a name for a new address book, then click save!</a>
<div>
<input type="text" value="" style="float: left;" name="aname" required>
<input type='file' style="opacity:0;filter:alpha(opactiy=0);position:absolute;top:0;left:0;width:200px;height:20px;cursor:pointer;" id = "input" name = "input" style="float: left; margin-left: 25px;">
<input class="btn btn-success" type="submit" value="Save" style="float: left; margin-left: 25px;" >
</div>
</form>
</div>
</div>
</body>

<?php
	include('connectionData.txt');
	//echo$_FILES["input"]["error"];
	//echo$_FILES["input"]["tmp_name"];
	$aname = $_POST['aname'];
	if ($_FILES["input"]["error"] <= 0 && $aname != '')
	{
		$con = mysqli_connect($server, $user, $pass, $dbname, $port);
		//echo$server;
		$addressname = $_POST['aname'];
		$sql = "insert into address(add_name, add_date) values('".$addressname."', sysdate())";
		mysqli_query($con, $sql);
		$addId = mysqli_insert_id($con);
		
		$d = date('YmdHis',time());
		$filename = $d.".tsv";
		move_uploaded_file($_FILES["input"]["tmp_name"], "upload/".$filename);
		$file = fopen("upload/".$filename, "r");
		$user=array();
		$i=0;
		while(!feof($file))
		{
			$user[$i]= fgets($file);
			$users = explode('	', $user[$i]);

			//print_r($users);

			if (0 != $i && count($users) == 8)
			{
				//
				$sql = "insert into contact(fName,lName,address1,address2,phone_num,city,state,zip,addre_id) values('$users[6]','$users[5]','$users[3]','$users[4]','$users[7]','$users[0]','$users[1]','$users[2]',$addId)";
				//echo"nihao";
				//echo$users[0];
				mysqli_query($con, $sql);
			}
			$i++;
		}
		fclose($file);
		echo"<script language=javascript>alert('Import Successful!');</script>";
	}
	if($_FILES["input"]["error"] > 0)
	{
		//echo"alert('Please choose a .tsv file!')";
		echo"<script language=javascript>alert('Please choose a .tsv file!');</script>";
	}

?>

</html>





