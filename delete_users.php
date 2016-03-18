<?php
require_once 'connect_db.php';
if(!empty($_GET['login']))
{
	$login = $_GET['login'];
	deleteUsers($login);	
}
function deleteUsers($login){
	if (empty($login)) {
		return false;
	}
	else {
		$mysqli_deleteUsers = connect_db();
		$mysqli_deleteUsers->query("DELETE FROM users WHERE login='$login'");
	}
}
?>