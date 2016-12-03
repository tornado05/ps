<?php 
echo '<pre>'; print_r($_REQUEST); echo '</pre>';
$user = null;
if (isset($_REQUEST['login']) && isset($_REQUEST['pw'])) {
	$user = authenticate($_REQUEST['login'], $_REQUEST['pw']);
}
echo '<pre>'; print_r(!$user ? 'no': 'yes'); echo '</pre>';
echo ($user ? 'Auth success' : 'Auth failed') . '<br />';
	if (!$user) {
?>
		<form method="POST">
			<div>
			<label>Login</label>
			<input type="text" name="login"/>
			</div>
			<div>
			<label>Password</label>
			<input type="password" name="pw"/>
			</div>
			<div>
			<input type="submit"/>
			<input type="reset"/>
			</div>
		</form>
<?php
	} else {
?> 
		<div>I'm here</div>
<?php
	}
/**
 * Use this one
 */
$link = mysqli_connect("127.0.0.1", "root", "1111", "test");
if (mysqli_connect_errno()) {
	echo 'Connection failed';
}
echo '<pre>'; print_r($link); echo '</pre>';
$res = mysqli_query($link, 'SELECT * FROM User');
echo '<pre>'; print_r($res); echo '</pre>';
foreach ($res as $row) {
	echo '<pre>'; print_r($row); echo '</pre>';
}
mysqli_close($link);

/**
 * Old connector version, depricated since 5.4 and unsupported 7.0
 */
$linkOld = mysql_connect("127.0.0.1", "root", "1111");
mysql_select_db("test");
if (mysql_errno()) {
	echo 'Connection failed old';
}
$resOld = mysql_query('SELECT * FROM User', $linkOld);
echo '<pre>'; print_r($resOld); echo '</pre>';
$rowsCount = mysql_num_rows($resOld);
for ($i = 0; $i < $rowsCount; ++$i) {
	echo '<pre>'; print_r(mysql_fetch_assoc($resOld)); echo '</pre>';
}
mysql_close($linkOld);

function authenticate($login, $pw) {
	$query = 'SELECT id_user FROM User WHERE login = "' . $login .  '" AND pw = md5("' . $pw . '");';
	$link = mysqli_connect("127.0.0.1", "root", "1111", "test");
	$res = mysqli_query($link, $query);
	echo '<pre>'; print_r(count($res)); echo '</pre>';
	if (count($res) > 1) {
		throw new Exception("Something went wrong", 1);
	}
	// DO NOT USE mysqli_fetch_assoc TWICE!
	//echo '<pre>'; print_r(mysqli_fetch_assoc($res)); echo '</pre>';
	//$row = (mysqli_fetch_assoc($res));
	$user = count($res) == 0 ? null : mysqli_fetch_assoc($res)['id_user'];	
	mysqli_close($link);
	return $user;
}

authenticate('root', '1');