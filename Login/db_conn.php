
<?php

$sname= "sql303.epizy.com";
$uname= "epiz_30490579";
$password = "utwknhjE7cQDeC";

$db_name = "epiz_30490579_bookshelf_db_user";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}