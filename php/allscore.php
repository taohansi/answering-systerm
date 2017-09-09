<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>score</title>
	<meta http-equiv="content-Type" content="text/html; charset=UTF-8" /> 
     <meta name="viewport" content="width=device-width, initial-scale=1" />
     <script language="javascript" type="text/javascript" src="../js/admin.js"></script> 
	<link rel="stylesheet" href="../css/answer.css" type ="text/css">
	<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.0.js"></script>
	<link rel="stylesheet" href="../css/w3c.css" type ="text/css">	
</head>
<body>
<div class="w3-container w3-teal"><h2>查询得分</h2></div>
<button type="button" class="w3-btn w3-xlarge w3-blue"onclick="sort('id')"><h7>按学号排列</h7></button>
<button type="button" class="w3-btn w3-blue w3-xlarge"onclick="sort('score')"><h7>按成绩排列</h7></button>
<button type="button" class="w3-btn w3-blue w3-xlarge"onclick="back()"><h7>返回首界面</h7></button>

<div id="table"></div>
