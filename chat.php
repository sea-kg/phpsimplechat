<?
	error_reporting(E_ALL);
	$LINK = mysql_connect("localhost", "testsql", "testsql");
	if (!$LINK)
		die('Error');

	$db=mysql_select_db('testsql', $LINK);
	if (!$db) {
		die("err");
	}
	if (isset($_GET['msg']) && strlen($_GET['msg']) > 0) {
		$author = (isset($_GET['author']) ? $_GET['author'] : "Test");
		$msg = "[".date("Y-m-d H:i:s")."] ".$author.": ".$_GET['msg'];
		mysql_query("insert into chat(msg) values('".$msg."');");
		header ("Location: ".basename(__FILE__)."?author=".$author);
		exit;
	}
?>

<html>
	<head>
		<meta charset="utf-8" />
		<script>
			var i = 1;
			var timer = setInterval(function() {
				i++;
				document.getElementById('chat').innerHTML = i + " sec after last refresh page";
			}, 1000);
		</script>
	</head>
</html>
<body onload="document.getElementById('msg').focus();">
<h1> simple chat </h1>
<form>
	<table>
		<tr>
			<td>ааВбаОб:</td>
			<td>аЁаОаОаБбаЕаНаИаЕ:</td>
			<td></td>
		</tr>
		<tr>
			<td><input type="text" name="author" value="<? echo (isset($_GET['author']) ? $_GET['author'] : "Test"); ?>" size="20"/></td>
			<td><input id="msg" type="text" name="msg" size="50"/></td>
			<td><input type="submit" value="абаПбаАаВаИбб"/></td>
		</tr>
	</table>
</form>
<pre id="chat">
</pre>
<pre>
<?php
$r = mysql_query("SELECT * FROM chat ORDER BY id DESC LIMIT 20");
while($row = mysql_fetch_assoc($r)) {
	echo $row['msg']."\r\n";
}
?>
</pre>
</body>
</html>

