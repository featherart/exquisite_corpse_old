<?php
$db = new SQLite3('db/ExquisiteCorpse.sqlite3',SQLITE3_OPEN_READWRITE);
$user_uid = null;
$user_id = null;
require_once("userid.php");



$q = $db->query('SELECT * FROM users');
while($r = $q->fetchArray(SQLITE3_ASSOC)) {
	var_dump($r);
	echo "<br/r>";
}
