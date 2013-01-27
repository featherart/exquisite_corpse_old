<?php
if(isset($_COOKIE['ec'])) {
	// get it and make sure it's real
	$user_uid = $_COOKIE['ec'];
	$q = $db->query("SELECT * FROM users WHERE uid = '" . $db->escapeString($user_uid) . "'");
	if($r = $q->fetchArray(SQLITE3_ASSOC)) {
		$user_id = $r['id'];
	} else {
		echo "invalid ec cookie";
		die;
	}
} else {
	// generate a new one and make the table
	$user_uid = uniqid();
	setcookie('ec',$user_uid,time()+60*60*24*30);
	if($db->exec("INSERT INTO users(uid) VALUES ('" . $db->escapeString($user_uid) . "')")) {	
		$user_id = $db->lastInsertRowID();
	}
}
