<?php

session_start();
$host = 'localhost';
$db = 'koelkast';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<link
    href='https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap'
    rel='stylesheet'
  />

    <title>Login</title>
	
</head>
<body>
<header>
   <a class="cta" href="index.html">Home</a>
  </header>
    <?php
    try {
        $connect = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (isset($_POST['username'])) {
            if (empty($_POST['username']) || empty($_POST['wachtwoord'])) {
                $message = '<label>All field is required</label>';
            } else {
                $query =
                    'SELECT * FROM users WHERE username = :username AND wachtwoord = :wachtwoord';
                $statement = $connect->prepare($query);
                $statement->bindParam(':username', $_POST['username']);
                $statement->bindParam(':wachtwoord', $_POST['wachtwoord']);
                $statement->execute();
                $count = $statement->rowCount();
                if ($count > 0) {
                    $_SESSION['username'] = $_POST['username'];
                    header('Location: index.html');
                } else {
                    $message = '<label>users/wachtwoord onjuist</label>';
                }
            }
        }
    } catch (PDOException $error) {
        $message = $error->getMessage();
    }
    echo '<br><center><div class="wrapper">
			<div class="title">
			<img class= pfp-pic src="pfp.png" alt="login foto" style="width:100px;height:100px;><h2 class="loginn"></div>
	  <form action="" method="POST">
			  <div class="field">
				<input type="text" name="username" required>
				<label>Username</label>
			  </div>
	  <div class="field">
				<input type="password" name="wachtwoord" required>
				<label>Password</label>
			  </div>
	  <div class="content">
				</div>
	  <div class="pass-link">
	  </div>
	  <div class="field">
				<input type="submit" value="Login">
			  </div>
	  </form>
	  </div></center>';
    ?>  	<style>
		.wrapper {
			width: 400px;
			height: 400px;
			background: #fff;
			border-radius: 10px;
			box-shadow: 0 15px 25px rgba(0, 0, 0, 0.6);
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			padding: 80px 40px;
		}
		.cta {
			color: #42413f;
			text-decoration: none;
			border-radius: 50px;
			transform: translate(-50%, -50%);
			border : 3px solid #42413f;
			padding	: 5px 10px;
		}
		.wrapper .title {
			position: absolute;
			top: -60px;
			left: 50%;
			transform: translate(-50%);
			color: #24a0ed;
			font-size: 24px;
			font-weight: 500;
		}
		.wrapper .title::before {
			content: "";
			position: absolute;
			top: 0;
			left: -30px;
			width: 100px;
			height: 100px;
			background: #24a0ed;
			border-radius: 50%;
			z-index: -1;
			transform: rotate(45deg);
		}
		.wrapper .title::after {
			content: "";
			position: absolute;
			top: 0;
			right: -30px;
			width: 100px;
			height: 100px;
			background: #24a0ed;
			border-radius: 50%;
			z-index: -1;
			transform: rotate(45deg);
		}
		.wrapper .field {
			position: relative;
			margin-top: 45px;
		}
		.wrapper .field input {
			width: 100%;
			padding: 0 5px;
			height: 40px;
			color: #948d8d;
			font-size: 16px;
			border-radius: 5px;
			border: 2px solid;
			outline: none;
			transition: 0.5s;
		}
		.wrapper .field input:focus,
		.wrapper .field input:valid {
			border-color: #948d8d;
		}
		.wrapper .field label {
			position: absolute;
			top: 50%;
			left: 5px;
			color: black;
			font-size: 16px;
			pointer-events: none;
			transform: translateY(-50%);
		}
			body{
    background-color: rgb(112, 159, 165);
    color: white;
}
</style>
</body>
</html>