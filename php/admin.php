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

$name=$_POST['name'];
$password=$_POST['password'];

$sql="select *from admin where user='".$name."'";
$rs=mysql_query($sql,$conn);

while ($row=mysql_fetch_array($rs)) 
{
	if($password==$row['password'])
		{   $_SESSION['index']=$row['index'];
	
			echo "0";
			exit;
		}
}
echo "1";


?>