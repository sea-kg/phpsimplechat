
<pre>
<?
$file = 'chat.php';
$handle = fopen($file, "r");
$contents = fread($handle, filesize($file));
fclose($handle);
echo htmlspecialchars($contents);
?>
</pre>
