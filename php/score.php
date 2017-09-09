<?php
session_start();
$db_host="qdm15749068.my3w.com";
$db_user='qdm15749068';
$db_password='taohansi';
$db_database="qdm15749068_db";
// $db_host="localhost";
// $db_user='root';
// $db_password='root';
// $db_database="database";
$conn=mysql_connect($db_host,$db_user,$db_password);
mysql_select_db($db_database,$conn);
?>
<!DOCTYPE html>
<html>
<head>
	<title>answer</title>
	<meta http-equiv="content-Type" content="text/html; charset=UTF-8" /> 
     <meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="../css/answer.css" type ="text/css">
   <script language="javascript" type="text/javascript" src="../js/score.js"></script> 
	<link rel="stylesheet" href="../css/w3c.css" type ="text/css">	
</head>
<body>
<div class='w3-card-4 '>
<div class='w3-container w3-teal'><h2>得分页面</h2></div>
<div class='w3-container '><p><h3>
<?php

if(isset($_SESSION['name'])||isset($_SESSION['scoretotal']))
{
	

$action=$_REQUEST['action'];
echo "你的得分为";


$sql="select *from user where user='".$_SESSION['name']."'";
$rs=mysql_query($sql,$conn);
$row=mysql_fetch_array($rs);
$score=$row['score'];
if ($action=='alerget')
{
   echo $score;
}
if($action=='get')
{

   $newscore=$_SESSION['scoretotal'];
    $sqlup="update user set score =".$newscore." where user='".$_SESSION['name']."'";
    $rs2=mysql_query($sqlup,$conn);
  

    echo $newscore;
            
}

session_destroy();

}
else
{
   header("Location:../../index.html");
}
?>分
</h3></p>

<p><button type="button" class="w3-btn w3-blue" onclick="relogin()"><h7>返回登陆界面</h7></button></p>
<h3><div id='timeline' class='w3-container w3-yellow'> </div></h3>
</div>
</div>

<script type="text/javascript">
function relogin()
{
	window.location="../../index.html";
}
</script>
</body>
</html>