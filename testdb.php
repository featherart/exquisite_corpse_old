<?php
if($db = new SQLite3('db/ExquisiteCorpse.sqlite3',SQLITE3_OPEN_READWRITE)) {
	$db->query("INSERT INTO users(uid) VALUES (" . time() . ")"); 	

	$q = $db->query('SELECT * FROM users');
	while($r = $q->fetchArray(SQLITE3_ASSOC)) {
		var_dump($r);
		echo "<br/r>";
	}
} else {
	echo "can't open db";
}


//phpinfo();
