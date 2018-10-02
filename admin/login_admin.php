<?php 

session_start();

require '../functions.php';

if (isset($_POST["submit"]) ) {
	
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($coon, "SELECT * FROM admin WHERE username = '$username'");

	if (mysqli_num_rows($result) === 1) {

		$rows = mysqli_fetch_assoc($result);
		
		if ($rows["password"] === $password) {

			$_SESSION["login"] = true;
			
			header("Location: data_user.php");
			exit;
		}
		
	}
	$error = true;
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../design/style.css">
	<title>Login Admin</title>
</head>
<body class="login">

<div class="container">
	<img src="../img/man.png">
	<?php if (isset($error)) : ?>
	<p style="color: red; font-style: italic;">username / password  salah</p>
<?php endif; ?>
	<form action="" method="post">
		<div class="form-input">
			<ul>
				<input type="text" name="username" autocomplete="off" placeholder="Masukan Username"><br>
		
				<input type="password" name="password" autocomplete="off" placeholder="Masukan Password"><br>
		
				<button type="submit" name="submit" class="btn-login">LOGIN</button>
			</ul>
			<ul>
				<a href="#" class="lupa-pass">Lupa password?</a>
			</ul>
		</div>
	</form>
</div>

</body>
</html>