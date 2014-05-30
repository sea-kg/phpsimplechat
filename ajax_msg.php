<?
	include_once("config.php");
	if (isset($_GET['last_id'])) {

	} else if (isset($_GET['insert_msg'])) {
		 if (isset($_GET['insert_msg']) && strlen($_GET['insert_msg']) > 0) {
			$insert_msg = $_GET['insert_msg'];
			if ($insert_msg == "admin") {
				$insert_msg = "You are not admin!";
			}
			if ($insert_msg == "fuck")
			{
				$insert_msg = "Bad word!";
			}
			$author = (isset($_GET['author']) ? $_GET['author'] : "Test");
			$msg = "[".date("Y-m-d H:i:s")."] ".$author.": ".$insert_msg;
	                mysql_query("insert into chat(msg) values('".$msg."');");
                	exit;
		}
	} else {
		$r = mysql_query("SELECT * FROM chat ORDER BY id DESC LIMIT 30");
		while($row = mysql_fetch_assoc($r)) {
        		echo $row['msg']."\r\n";
		}
	}
?>
