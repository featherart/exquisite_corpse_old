<?php
if(!isset($_COOKIE['ec'])) {
	header("HTTP/1.0 404 Not Found");
	die;
}
$db = new SQLite3('db/ExquisiteCorpse.sqlite3',SQLITE3_OPEN_READWRITE);
$user_uid = null;
$user_id = null;
require_once("userid.php");

if($_SERVER['REQUEST_METHOD'] === 'POST') {
	$imageurl = $_POST["image"];
	$imageurl = str_replace("data:","data://",$imageurl);  // @todo only do the first one?
	$image = file_get_contents($imageurl);
	$dir = "saves";
	$filename = undef;
	$postfix = 0;
	do {  
		// @todo this is actually wrong and broken, has race, fix it eventually, tempnam doesn't support extensions?!
		// http://us2.php.net/manual/en/function.tempnam.php has a function that supposedly works...
		$filename = $dir . '/img' . time() . "-$postfix" . ".png";
		++$postfix;
	} while(file_exists($filename));
	file_put_contents($filename,$image);
	$basename = $dir . '/' . basename($filename);
	if($db->exec("INSERT INTO drawings(type,path,artist) VALUES (0,'" . $basename  . "',$user_id)")) {	
		echo $basename;
	} else {
		header("HTTP/1.0 404 Not Found");
	}
} else {
	header("HTTP/1.0 404 Not Found");
}
?>