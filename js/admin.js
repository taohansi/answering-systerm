function sort(message)
{
	
	$.ajax(
    {
      type:'get',
      url:'../php/sort.php',      
      data:{'way':message
           },
      success:function(response){

      document.getElementById("table").innerHTML=response;
      
      	
      }});
}

function back()
{
  window.location="../../index.html";
}