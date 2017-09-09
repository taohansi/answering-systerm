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
mysql_set_charset("utf8");
$action=$_GET['action'];
$selecNum=3;
$judgeNum=2;

if($action=="get")
{
	$aname=0;
	$judgeName=0;

	$quesList=array();
    $quesJudge=array();

    $quesList=getRandom(1,5,$selecNum);
    $quesJudge=getRandom(1,3,$judgeNum);
    $_SESSION['quesList']=$quesList;
    $_SESSION['quesJudge']=$quesJudge;
    echo "<h2>一.选择题</h2>";
	while($aname<$selecNum)
	{       

	$sqlget="select * from question where id=".$quesList[$aname];
	$record=mysql_query($sqlget,$conn);
while($row=mysql_fetch_array($record))
    {
   	   
       $question=$row["question"];
       $option=array();
       $option[0]=$row['a'];
       $option[1]=$row['b'];
       $option[2]=$row['c'];
       $option[3]=$row['d'];
       echo "<div class='size w3-card-2 w3-hover-shadow  '>";
       echo "<p id='".$aname."' style='font-size:1.2em;'>";
       echo $aname+1;
       echo ".";
       echo $question;
       echo "</p>";
       
       for ($i=0;$i<4;$i++)
       {
       	echo "<input type='radio' class='w3-radio' name='answer".$aname."' onclick=change('".$aname."') value ='".$i."'><label class='w3-validate'>";
       	
       	echo $option[$i];
       	echo "</label><br>";

       }
      echo "</div>";
       $aname++;
     }
   }
   echo "<h2>二.判断题</h2>";
    while($judgeName<$judgeNum)
    {
    	
    	$sqlget="select * from judge where id=".$quesJudge[$judgeName];
	    $record=mysql_query($sqlget,$conn);
	    while($row=mysql_fetch_array($record))
	    {
	   $question=$row["question"];
       $option=array();
       $option[0]='对';
       $option[1]='错';
       echo "<div class='size w3-card-2 w3-hover-shadow  '>";
       echo "<p id='".($judgeName+$selecNum)."' style='font-size:1.2em;'>";
       echo ($judgeName+$selecNum)+1;
       echo ".";
       echo $question;
       echo '</p>';
      for ($i=0;$i<2;$i++)
       {
       	echo "<input type='radio' class='w3-radio' name='answer".($judgeName+$selecNum)."' onclick=change('".($judgeName+$selecNum)."') value ='".$i."'> <label class='w3-validate'>";
       	
       	echo $option[$i];
       	echo "</label> <br>";

       }

	    }
	     echo "</div>";
	    $judgeName++;

    }
   echo "<br> ";
   echo "<div class='w3-container w3-center'>";
   echo "<button type='button' class='w3-btn w3-xlarge w3-teal ' onclick=dosubmit() ><h7>提交答案</h7> </button>";
   echo "</div><br><br><br>";
   
}

mysql_close($conn);

function getRandom($first,$second,$num)
{
	$idList=array();
    $count=1;
    $idList[0]=rand($first,$second);
 
    $mark=0;
    while($count<$num)
    {
    	$id=rand($first,$second);
    	for($i=0;$i<$count;$i++)
    	{
    		if($id==$idList[$i])
    				{
    					$mark=1;
    					break;
    				}

    	}
    	if($mark==0)
    	{
    		$idList[$count]=$id;

 
    		$count++;

    	}
    	$mark=0;

    }
    return $idList;
}

// function enutf($message)
// {
//  	return iconv('gbk', 'utf-8', $message);
// }
 



?>