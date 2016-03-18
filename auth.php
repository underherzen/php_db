<!DOCTYPE html>
<html>
  <head>
    <title>База данных!</title><meta charset="utf-8"> 
		<meta name="author" content="Arthur Ulyashev">
		<meta charset="utf-8"><link rel="stylesheet" href="css/bootstrap.min.css">
		<script  src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<style type="text/css">
		     #auth_form {
                width:33%;
                margin-left:33%;
		        }
		     
		     
		     
		   
		</style>
	</head>
<body>
    
    <div id="auth_form">
    <center><h2>АВТОРИЗАЦИЯ</h2>
    <form method="post">
    <input type="text" name="login" id="login" placeholder="Login" class="form-control"/><br>
    <input type="password" name="password" id="password" placeholder="Пароль" class="form-control"/><br>
    <input type="submit" name="sub" id="sub" value="Войти" class="btn btn-primary btn-sm"/>
    
   <!-- <h4>Если у Вас еще нет аккаунта, <a href = "?registration=1">зарегистрируйтесь.</a></h4><br>-->
    <p>Вернуться назад в отдел <a href="../programming.html">программирование.</a></p>
    <p>Данные для входа: Login: <strong>arthur12</strong> Password:<strong>1gf1hj1km</strong></p>
    <p>Пары логин-пароль находятся в <strong>базе данных</strong>, а не в файле PHP!</p>
    <p><h1>Скоро будет отдел <strong>"РЕГИСТРАЦИЯ"</strong>!!!!!!!!</h1></p></center>
    </form>
    </div>
   
  
    <?php
    session_start();
    if(isset($_POST['sub'])) {
        if(!empty($_POST['login']) &&
           !empty($_POST['password'])) {
               $login = $_POST['login'];
               $password = $_POST['password'];
                $mysqli_auth =  new mysqli("localhost",
				                        	"underher_her",
					                        "1gf1hj1km@Q",
					                        "underher_users"
					                       );
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
</body>
</html>