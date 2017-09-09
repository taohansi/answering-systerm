function getselection(action)
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

	xmlhttp.onreadystatechange=function()
	{
		
		if(xmlhttp.readyState==4 &&xmlhttp.status==200)
		{
			
			var response =xmlhttp.responseText;
            document.getElementById("question").innerHTML=response;
        }
	}	
	
	xmlhttp.open("GET","../php/answer.php?q="+Math.random()+"&action="+action,true);
	xmlhttp.send();

}
function getvalue(radioname)
{
	var arr=document.getElementsByName(radioname);
	
	
	for (var i=0;i<arr.length;i++)
	{

       if(arr[i].checked)
       {
       	 return arr[i].value;
       }
	}
	return -1;
}


function dosubmit()
{
    var answer=new Array();
    for(var i=0;i<5;i++)
    {
    	var name="answer"+i.toString();
    	
    	var value=getvalue(name);
    	if((value<0)&&(time>0))//test
    	{
    		
    		alert("存在未完成的题目");
    		return ;
    	}
    	else
    	{
           var index=i;
            answer[index]=value;
    	}
    }
    
    $.ajax(
    {
      type:'post',
      url:"../php/answer2.php",      
      data:{'data':answer},
      success:function(response){
      	relocate();
      
      	
      }

    });

}
function relocate()
{
	window.location="../php/score.php?action=get";
}
function change(index)
{
	var name="div#ques"+index;
	$(name).css("background-color","#33FF00");
}
var time=60;
var timer=setInterval(getTime,1000);

function getTime()
{
 

	if(time>0)
	{
		var minutes=Math.floor(time/60);
        var seconds=Math.floor(time%60);
        var message="距离答题结束还有"+minutes+"分钟 "+seconds+"秒";
	    document.getElementById("time2").innerHTML=message;
	   }
	 else
	 {
	 	
	 	clearInterval(timer);
	 	dosubmit();

	 }
   time--;
}


