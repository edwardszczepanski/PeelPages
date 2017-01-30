<html>

<div style="position:relative;">
<form action="import.php" method="POST" id="importform" style="margin-top: 2%;" enctype="multipart/form-data">

<a href="#" >Please Click to open a .tsv file and type a name for a new address book, then click save!</a>
<div>
<input type="text" value="" style="float: left;" name="aname">
<input type='file' style="opacity:0;filter:alpha(opactiy=0);position:absolute;top:0;left:0;width:200px;height:20px;cursor:pointer;" id = "input" name = "input" style="float: left; margin-left: 25px;">
<input class="btn btn-success" type="submit" value="Save" style="float: left; margin-left: 25px;">
</div>
</form>
</div>


<?php
	include('connectionData.txt');
	//echo$_FILES["input"]["error"];
	//echo$_FILES["input"]["tmp_name"];
	if ($_FILES["input"]["error"] <= 0 && isset($_POST['aname']))
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
		echo"gongxifacai!";
	}
?>

</html>





