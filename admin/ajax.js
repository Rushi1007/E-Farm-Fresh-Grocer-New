var x = false;
if(window.XMLHttpRequest)
{	
	//code for IE7+,FireFox,Chrome,Opera,Safari
	x=new XMLHttpRequest();
}
else if(window.ActiveXObject)
{ 
	//code for IE6,IE5
	x=new ActiveXObject("Microsoft.XMLHTTP");
}
function searchstud()
{
	if(x)
	{	
		var path = "data.php?name="+document.getElementById("txt_search").value;
		x.open("GET",path);
		x.onreadystatechange=function()
		{
			if(x.readyState==4 && x.status==200)
			{
				document.getElementById("result_div").innerHTML=x.responseText;
			}
		}
		x.send(null);
	}
}