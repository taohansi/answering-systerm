<?php
session_start();

if(!isset($_SESSION['login']))
{

    header("Location:../index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>answer</title>
	<meta http-equiv="content-Type" content="text/html; charset=utf-8" /> 
	<script language="javascript" type="text/javascript" src="../js/answer.js"></script> 
	<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.0.js"></script>
	<link rel="stylesheet" href="../css/answer.css" type ="text/css">
	<link rel="stylesheet" href="../css/w3c.css" type ="text/css">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	
</head>

<body class="w3-card-4">
<div class="w3-container w3-teal w3-top topbox"><h4 id="time2">开始答题:</h4></div>
<div class="floatBox w3-card-4 w3-yellow " id="box">
<div class=" boxTitle ">你的答题情况：</div>
<br>
<?php
for($i=0;$i<5;$i++)
{
	
	echo "<div class='index0' id=ques".$i.">";
	echo ($i+1);
	echo "</div>";
}

?>

<div class="boxTitle  " id="time"></div>


</div>

<br><br><br><br>
<div id="question" class='noselect w3-container buttonsize'>
</div>


<script type="text/javascript">

getselection("get");

</script>
<?php
unset($_SESSION['login']);
?>

</body>
</html>