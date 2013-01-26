<?php
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
	echo $basename;
} else {
	header("HTTP/1.0 404 Not Found");
}
?>