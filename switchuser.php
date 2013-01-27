<?php
$db = new SQLite3('db/ExquisiteCorpse.sqlite3',SQLITE3_OPEN_READWRITE);
if($_SERVER['REQUEST_METHOD'] === 'POST') {
	// this setcookie has to come before all other output because it's an http header
	setcookie('ec',$_POST['user'],time()+60*60*24*30);
}
?>
<html><head><title>Switch User</title></head>
<body>
	<?php
	$user_uid = null;
	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		$user_uid = $_POST['user'];
		echo "user set to " . $user_uid . "<br/>";
	} else if(isset($_COOKIE['ec'])) {
		$user_uid = $_COOKIE['ec'];
		echo "current user: " . $user_uid . "<br/>";
	}
	?>
	<br/>
	<form name="switch" action="switchuser.php" method="post">
	<table border=0>
	<tr><th>User</th><th>Drawings</th></tr>
	<?php
		$q = $db->query('SELECT users.uid, COUNT(drawings.path) FROM users LEFT OUTER JOIN drawings ON users.id = drawings.artist GROUP BY users.id;');
		while($r = $q->fetchArray(SQLITE3_NUM)) {
			$checked = "";
			if($user_uid == $r[0]) {
				$checked = 'checked="checked"';
			}
			echo '<td><input type="radio" name="user" value="' . $r[0] . '"' . $checked . '>' . $r[0] . '</input></td><td align=center>' . $r[1] . '</td></tr>';
		}
	?>
	</table>
	<input type="submit" value="Switch"/>
	</form>
</body>