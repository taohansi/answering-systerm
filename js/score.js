var time=59;
var interval=setInterval(timeline,1000);
function timeline()
{
   var second =Math.floor(time%60);
    if(time<0)
    	window.location="../../index.html";
    else
    {
    	var message=second+"秒后返回登陆界面";
    	document.getElementById("timeline").innerHTML=message;
    }
     time--;
    
}