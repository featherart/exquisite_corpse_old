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

	<!--<button onclick="draw(0,0);">draw</button>-->
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
		foreach (glob("saves/*.png") as $filename) {
			echo '<div class="prevdiv"><img class="previmg" width="250" height="100" src="'.$filename.'"/></div>';
		}
	?>
	</div>
	<div id="debug">
		<div class="dbout"><?php echo "hi lisa"; ?></div>
	</div>
</body>
</html>