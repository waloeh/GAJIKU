<?php 

session_start();

require '../functions.php';

if (isset($_POST["submit"]) ) {
	
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($coon, "SELECT * FROM user WHERE username = '$username'");

	if (mysqli_num_rows($result) === 1) {

		$rows = mysqli_fetch_assoc($result);
		
		if ($rows["password"] === $password) {

			$_SESSION["login"] = true;

			$_SESSION["id_user"]=$rows["id_user"];
			$_SESSION["nama_user"]=$rows["nama_user"];
			$_SESSION["username"];
			$_SESSION["password"]=$rows["password"];
			$_SESSION["nik"]=$rows["nik"];
			$_SESSION["bagian"]=$rows["bagian"];
			$_SESSION["jabatan"]=$rows["jabatan"];
			$_SESSION["gapok"]=$rows["gapok"];
			$_SESSION["t_jabatan"]=$rows["t_jabatan"];
			$_SESSION["insentive_hadir"]=$rows["insentive_hadir"];
			$_SESSION["prestasi"]=$rows["prestasi"];
			$_SESSION["gambar"]=$rows["gambar"];

			header("Location: slip.php");
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
	<title>Login User</title>
</head>
<body class="login-user">
<div class="container-user">
	<img src="../img/man.png">
	<form action="" method="post">
		<div class="form-input">
			<ul>
				<input type="text" name="username" id="usernme" autocomplete="off" placeholder="Masukan Username"><br>

				<input type="password" name="password" id="pass" autocomplete="off" placeholder="Masukan Password"><br>

				<?php if (isset($error)) : ?>
				<p style="color: red; font-style: italic;">username / password  salah</p>
				<?php endif; ?>

				<button type="submit" name="submit" class="btn-login-user">Login</button>
			</ul>
			<ul>
				<a href="#" class="lupa-pass">Lupa password?</a>
			</ul>
		</div>
	</form>
</div>

</body>
</html>