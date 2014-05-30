<?
	include_once("config.php");
?>

<html>
	<head>
		<meta charset="utf-8" />
		<script>
function refresh_list()
{
  if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
     xmlhttp=new XMLHttpRequest();
  };
  xmlhttp.onreadystatechange=function()
  {
	if (xmlhttp.readyState==4 && xmlhttp.status==200)
	{
		if(xmlhttp.responseText != "")
			document.getElementById("list").innerHTML=xmlhttp.responseText;
	}
  }
  xmlhttp.open("GET","ajax_msg.php",true);
  xmlhttp.send();
}

function insert_message()
{
  if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
     xmlhttp=new XMLHttpRequest();
  };
  xmlhttp.onreadystatechange=function()
  {
	if (xmlhttp.readyState==4 && xmlhttp.status==200)
	{
		document.getElementById("msg").value = "";
		refresh_list();
	}
  }
	xmlhttp.open("GET","ajax_msg.php?"
		+ "insert_msg=" + encodeURIComponent(document.getElementById("msg").value)
		+ "&author=" + encodeURIComponent(document.getElementById("author").value)
	,true);
  xmlhttp.send();
}


var i = 1;
var timer = setInterval(function() {
		// i++;
		refresh_list();
		// document.getElementById('chat').innerHTML = i + " refreshed page";
	},
	1000
);

</script>
	</head>
</html>
<body onload="document.getElementById('msg').focus();">
<h1> simple chat </h1>
 <a href="https://github.com/sea-kg/phpsimplechat">github sources</a> |
 <a href="chat_source.php">local sources</a>
<form>
	<table>
		<tr>
			<td>Author:</td>
			<td>Message:</td>
			<td></td>
		</tr>
		<tr>
			<td><input type="text" id="author" name="author" value="<? echo (isset($_GET['author']) ? $_GET['author'] : "Test"); ?>" size="20"/></td>
			<td><input id="msg" type="text" onkeydown="if ( event.keyCode == 13 ) insert_message();" name="msg" size="50"/></td>
			<td>
				<a class="btn btn-small btn-info" href="javascript:void(0);" onclick="insert_message();">send</a>
			</td>
		</tr>
	</table>
</form>
<!-- pre id="chat">
</pre -->
<pre id="list">
</pre>
</body>
</html>

