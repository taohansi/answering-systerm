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

$selecNum=3;
$judgeNum=2;

$array=$_POST['data'];
$scoreSelect=0;

$i=0;


$count=0;
$countJudge=0;

while($count<$selecNum)
{
$sql="select * from question where id=".$_SESSION['quesList'][$count];
$rs=mysql_query($sql,$conn);
while($row=mysql_fetch_array($rs))
{
	
	$ans=$row['answer'];
	if($ans==($array[$i]+1))
		{
			$scoreselect+=2;

		}
	
	$i=$i+1;
	
}
    
   $count++; 
}

while($countJudge<$judgeNum)
{
   $sql="select * from judge where id=".$_SESSION['quesJudge'][$countJudge];
   $rs=mysql_query($sql,$conn);
   while($row=mysql_fetch_array($rs))
{
	
	$ans=$row['answer'];
	if($ans==($array[$i]+1))
		{
			$scoreselect+=2;

		}
		$i++;

}
$countJudge++;
}

$_SESSION['scoretotal']=$scoreselect;

mysql_close($conn);
    


?>