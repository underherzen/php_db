<?php
    require_once 'connect_db.php';
    if(isset($_POST['sub'])) {
        if(!empty($_POST['login_auth']) &&
           !empty($_POST['password_auth'])) {
               $login = $_POST['login_auth'];
               $password = $_POST['password_auth'];
                $mysqli_auth = connect_db();
				$result = $mysqli_auth->query("SELECT 
									 login,
									 password
									 FROM users_auth"
							);
				$rows = $result->fetch_assoc();
				do {
				    if(($login == $rows['login']) && ($password == $rows['password'])) {
                        $_SESSION["auth"] = "ok";
                        $_SESSION["user"] = $login;
                        header('Location: users.php');
                        exit;
				    }
				    
				} while($rows = $result->fetch_assoc());
           }
    }
    ?>