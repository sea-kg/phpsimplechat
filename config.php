<?
        $database_name = "testsql";
        $user_name = "testsql";
        $host = "localhost";
        $user_password = "testsql";
        error_reporting(E_ALL);
        $LINK = mysql_connect($host, $user_name, $user_password);
        if (!$LINK)
                die('Error');

        $db=mysql_select_db($database_name, $LINK);
        if (!$db) {
                die('Error');
        }
?>
