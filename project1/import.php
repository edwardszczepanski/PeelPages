<html>

<div style="position:relative;">
<form action="import.php" method="POST" id="importform" style="margin-top: 2%;">

<a href="#" >open file</a>
<input type='file' style="opacity:0;filter:alpha(opactiy=0);position:absolute;top:0;left:0;width:200px;height:20px;cursor:pointer;" id = "input" name = "input">
<input class="btn btn-success" type="submit" value="Save" style="float: right;">

</form>
</div>
<input type="button" onclick="show();" value="show">

<?php
	$imput = $_POST['input'];
	echo"122222";
	echo$imput;
?>

</html>




<script type="text/javascript">
function show(){
var value = document.getElementById('input').value;
alert(value);
}
</script>

