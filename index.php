<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>index</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 

</head>
<body>
<script>
if( navigator.userAgent.match(/(phone|pad|pod|iPhone|iPod|ios|iPad|Android|Mobile|BlackBerry|IEMobile|MQQBrowser|JUC|Fennec|wOSBrowser|BrowserNG|WebOS|Symbian|Windows Phone)/i))
	    {
              window.location="html/login.html";
              
	
	 
	    }
	 else
	 	{
             window.location="html/loginpc.html";
             
	 	}</script>

	 </body>
	 </html>