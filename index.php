<?php
$db = new SQLite3('db/ExquisiteCorpse.sqlite3',SQLITE3_OPEN_READWRITE);
$user_uid = null;
$user_id = null;
require_once("userid.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8"/>
<meta name="Description" content="A Game of Exquisite Corpse"/>
<meta name="Keywords" content="drawing, art, games, monsters, exquisite corpse"/>
<title>Exquisite Corpse</title>
<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen"/>
<script type="text/javascript" src="js/jquery-1.9.0-uncompressed.js"></script>
<script type="text/javascript" src="js/draw_corpse.js"></script>

</head>

<body>
	<div id="outer">
		<div id="canvas">
			<canvas id="drawing" width="500" height="200"><p>Your browser doesn't support canvas</p></canvas>
		</div>
		<div id="save">
			<button id="save">Save</button>
		</div>
	</div>
	<div id="previous">
	<?php
		$q = $db->query("SELECT * FROM drawings WHERE artist = $user_id ORDER BY id DESC");
		while($r = $q->fetchArray(SQLITE3_ASSOC)) {
			echo '<div class="prevdiv"><img class="previmg" width="250" height="100" src="' . $r['path'] . '"/></div>';
		}
	?>
	</div>
	<div id="debug">
		<div class="dbout"><?php echo "hi lisa"; ?></div>
	</div>
</body>
</html>