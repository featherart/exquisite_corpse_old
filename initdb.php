<?php
if($db = new SQLite3('db/ExquisiteCorpse.sqlite3')) {
	$db->query("CREATE TABLE users (id INTEGER PRIMARY KEY, uid VARCHAR)"); 	
	$db->query("CREATE TABLE drawings (id INTEGER PRIMARY KEY, type TINYINT(1), path VARCHAR, artist INTEGER)"); 	
	echo "created";
}
