<?php
$session = createSession();
echo getHTML($session);

function createSession() {
	$session = null;
	if (isset($_REQUEST['login']) && isset($_REQUEST['pw'])) {
		$session = authenticate($_REQUEST['login'], $_REQUEST['pw']);
	}	
	return $session;
}

function authenticate($login, $pw) {
	$query = 'SELECT id_user FROM User WHERE login = "' . $login .  '" AND pw = md5("' . $pw . '");';
	$link = mysqli_connect("127.0.0.1", "root", "1111", "test");
	$res = mysqli_query($link, $query);
	if (count($res) > 1) {
		throw new Exception("Something went wrong", 1);
	}
	$user = count($res) == 0 ? null : mysqli_fetch_assoc($res)['id_user'];	
	mysqli_close($link);
	return $user;
}

function getHTML($session) {	
	$template = $session ? 'auth_success.php': 'auth_form.php';
	return file_get_contents($template);
}