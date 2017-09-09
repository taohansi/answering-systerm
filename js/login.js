

function login()
{
	var xmlhttp;
    
	if(window.XMLHttpRequest)
	{
		xmlhttp= new XMLHttpRequest();
	}
	else if(window.ActiveXObject) 
	{
		xmlhttp= new ActiveXObject("Mircosoft.XMlHTTP");
	}

	var name =document.getElementById('name').value;
	var password=document.getElementById("password").value;
	if (name==null||name=="")
	{
		 innerhtml("请输入用户名 ");
		return;
	}
	if (password==null||password=="")
	{
		innerhtml("请输入密码 ");
		return;
	}
	
	xmlhttp.onreadystatechange=function()
	{
	
		if(xmlhttp.readyState==4 &&xmlhttp.status==200)
		{
			var response =xmlhttp.responseText;
				
			if(response=='1')
			{
				relocate();
			}
			if(response=='0')
			{
				innerhtml("用户名或者密码错误");
			}
			if(response=='-1')
			{
				alert("你已经答过题目");
				window.location="../php/score.php?action=alerget";
			}
		}
	}
	xmlhttp.open("POST","../php/user.php",true);
	xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); 
	xmlhttp.send("name="+name+"&password="+password);
 
	
}
function innerhtml(message)
{
	document.getElementById("tip").innerHTML=message;
	
}

function relocate()
{
	window.location="answer.php?q="+Math.random
	();
}

function register()
{
	var name =document.getElementById('name').value;
	var password=document.getElementById("password").value;
	if (name==null||name=="")
	{
		 innerhtml("请输入用户名 ");
		return;
	}
	if (password==null||password=="")
	{
		innerhtml("请输入密码 ");
		return;
	}
	
	 $.ajax(
    {
      type:'post',
      url:"../php/register.php",      
      data:{'name':name,'password':password
           },
      success:function(response){
      	if(response=="1")
      	{
      		innerhtml("注册成功");
      	}
      	else
      	{
      		innerhtml("此账号已完成注册");
      	}
      
      	
      }
});
	}

function admin()
{
	var name =document.getElementById('name').value;
	var password=document.getElementById("password").value;
	 $.ajax(
    {
      type:'post',
      url:"../php/admin.php",      
      data:{'name':name,'password':password
           },
      success:function(response){
      	if(response=="0")
      	{
      		window.location="../php/allscore.php";
      	}
      	else
      	{
      		innerhtml("用户名或者密码错误");
      	}
      
      	
      }
});
	}