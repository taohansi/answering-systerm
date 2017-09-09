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

$sql="select *from user where user='";
$name=$_POST['name'];
$password=$_POST["password"];
$sql=$sql.$name."'";
$rs=mysql_query($sql,$conn);
$_SESSION['name']=$name;

while($row=mysql_fetch_array($rs))
{
	$score=$row["score"];
	if($score!="")
		{
		echo "-1";
	     return ;
	    }

	if (0==strcmp($password, $row["password"]))
	{
		echo "1";
		$_SESSION['login']=1;
		return;
	}
}
echo "0";
?>
