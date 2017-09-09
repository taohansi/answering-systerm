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

$index=$_SESSION['index'];
$totalscore=0;
$way=$_GET['way'];


if($way=='id')
   {
          $sqlsort="select * from user order by user";
   }
      
if($way=='score')
  {
        $sqlsort="select * from user order by score  ";       
  }
 echo "<table class='w3-table w3-striped w3-bordered w3-border w3-hoverable' ";
 echo "<tr class='w3-hover-green'>";

 echo "<th>学号</th>";
 echo "<th>密码</th>";
 echo "<th>成绩</th>";
echo "</tr>";
$rs=mysql_query($sqlsort,$conn);
$count=0;
while($row=mysql_fetch_array($rs))
{
   $name=$row['user'];
   $destring=substr($name, 0,3);

   if($destring==$index)
   {

 $score=$row['score'];
  $name=$row['user'];
  $password=$row['password'];
  if($score=="")
  {
  	$score="未答题";
  }
  else
  {
    $totalscore+=$score;
    $count++;
  }
  echo "<tr class='w3-hover-black'>";
  echo "<td>".$name."</td>";
  echo "<td>".$password."</td>";
  echo "<td>".$score."</td>";
  echo "</tr>";
         
   }
           
}
$average=$totalscore/$count;
echo "</table>";
echo "<div class='w3-container'><h3>已答题学员的平均分为".$average."分</h3></div> "
   

?>