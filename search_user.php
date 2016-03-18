<?php
function connect_db() {
$mysqli_connect_db = new mysqli("localhost",
					"underher_her",
					"1gf1hj1km@Q",
					"underher_users"
					);
return $mysqli_connect_db;
}
if(isset($_POST['search_user']) OR !empty($_POST['search_user'])) {
	//echo "<script>document.querySelector('"'#search_user_name'"').value = '" . $_POST['search_user_name']."'</script>";
	$mysqli = connect_db();
	$ordering = $_POST['search_user_name'];
	$result = $mysqli->query("SELECT 
									 login,
									 full_name,
									 date_of_registration
									 FROM users
									 WHERE full_name LIKE '%$ordering%'
							");
	$rows = $result->fetch_assoc();
	do {
	
	echo "Delete user<a href = '?delete=".$rows['login']."'>[x]</a> | <a href = '?update=".$rows['login']." '>Update</a> user";
	echo "<p>Полное имя: <b>" . $rows['full_name'] . "</b></p>"	;
	echo "<p>Login: <b>" . $rows['login'] . "</b></p>"	;
	echo "<p>Дата регистрации: <b>" . $rows['date_of_registration'] . "</b></p><hr />"	;
	}
	while($rows = $result->fetch_assoc());
} else {
	showUsers();
	
}
function showUsers() {
	$mysqli = connect_db();
	$result = $mysqli->query("SELECT 
									 login,
									 full_name,
									 date_of_registration
									 FROM users"
							);
	$rows = $result->fetch_assoc();
	do {
	
	echo "Delete user<a href = '?delete=".$rows['login']."'>[x]</a> | <a href = '?update=".$rows['login']." '>Update</a> user";
	echo "<p>Полное имя: <b>" . $rows['full_name'] . "</b></p>"	;
	echo "<p>Login: <b>" . $rows['login'] . "</b></p>"	;
	echo "<p>Дата регистрации: <b>" . $rows['date_of_registration'] . "</b></p><hr />"	;
	}
	while($rows = $result->fetch_assoc());
}
?>