<?php	

session_start();

if (!isset($_SESSION["login"]) ) {
	
	header("Location: login_admin.php");
}

 require '../functions.php';

 $id = $_GET["id_anu_aya_dina_hate"];

//query data user user berdasarkan id_user
 $user_yang_dipilih = query("SELECT * FROM user WHERE id_user = $id")[0];

if (isset($_POST["submit"]) ) {

	//cek apakah data berhasil diubah atau tidak
	if (ubah($_POST, $id) > 0 ) {
			echo "
		<script>
			alert('data berhasil diubah');
			document.location.href = 'data_user.php';
		</script>";
}
else{
	echo "
		<script>
			alert('data gagal diubah');
			document.location.href = 'data_user.php';
		</script>";
}
	
}

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../design/style.css">
	<title>Ubah Data Karyawan Betso</title>
	<style type="text/css">

    </style>
</head>
<body class="container-ubah-user">

<div class="background-ubah-user">
<h1 align="center" > <font color="white">Ubah Data Karyawan Betso</font></h1>
	<form action="" method="post" enctype="multipart/form-data" >
		<div class="row">
			<div class="col-25">
				<label class="label-ubah-user" for="nama_user">Nama :</label>
			</div>
			<div class="col-75">	
				<input class="input-ubah-user" type="text" name="nama" id="nama_user" required autocomplete="off" value="<?php echo $user_yang_dipilih["nama_user"]; ?>"></input>
			</div>
		</div>	
		<div class="row">
			<div class="col-25">
				<label class="label-ubah-user" for="nik">Nik :</label>
			</div>
			<div class="col-75">
				<input class="input-ubah-user" type="text" name="nik" id="nik" autocomplete="off" value="<?php echo $user_yang_dipilih["nik"]; ?>"></input>
			</div>
		</div>	
		<div class="row">
			<div class="col-25">
				<label class="label-ubah-user" for="bagian">Bagian :</label>
			</div>
			<div class="col-75">
				<input class="input-ubah-user" type="text" name="bagian" id="bagian" autocomplete="off" value="<?php echo $user_yang_dipilih["bagian"]; ?>"></input>
			</div>
		</div>	
		<div class="row">
			<div class="col-25">
				<label class="label-ubah-user" for="jabatan">Jabatna :</label>
			</div>
			<div class="col-75">
				<input class="input-ubah-user" type="text" name="jabatan" id="jabatan" autocomplete="off" value="<?php echo $user_yang_dipilih["jabatan"]; ?>"></input>
			</div>
		</div>
		<div class="row">	
			<div class="col-25">
				<label class="label-ubah-user" for="username">Username :</label>
			</div>	
			<div class="col-75">
				<input class="input-ubah-user" type="text" name="username" id="username" autocomplete="off" value="<?php echo $user_yang_dipilih["username"]; ?>"></input>
			</div>
		</div>	
		<div class="row">	
			<div class="col-25">
				<label class="label-ubah-user" for="password">Password :</label>
			</div>
			<div class="col-75">
				<input class="input-ubah-user" type="text" name="password" id="password" autocomplete="off" value="<?php echo $user_yang_dipilih["password"]; ?>"></input>
			</div>
		</div>	
		<div class="row">
			<div class="col-25">
				<label class="label-ubah-user" for="gapok">Gaji Pokok :</label>
			</div>
			<div class="col-75">
				<input class="input-ubah-user" type="text" name="gapok" id="gapok" autocomplete="off" value="<?php echo $user_yang_dipilih["gapok"]; ?>"></input>
			</div>
		</div>	
		<div class="row">
			<div class="col-25">
				<label class="label-ubah-user" for="t_jabatan">Tunjangan Jabatan :</label>
			</div>
			<div class="col-75">
				<input class="input-ubah-user" type="text" name="t_jabatan" id="t_jabatan" autocomplete="off" value="<?php echo $user_yang_dipilih["t_jabatan"]; ?>"></input>
			</div>
		</div>	
		<div class="row">
			<div class="col-25">
				<label class="label-ubah-user" for="insentive">Insentive Kehadiran :</label>
			</div>
			<div class="col-75">
				<input class="input-ubah-user" type="text" name="insentive" id="insentive" autocomplete="off" value="<?php echo $user_yang_dipilih["insentive_hadir"]; ?>"></input>
			</div>
		</div>	
		<div class="row">
			<div class="col-25">
				<label class="label-ubah-user" for="prestasi">Tunjangan Prestasi :</label>
			</div>
			<div class="col-75">
				<input class="input-ubah-user" type="text" name="prestasi" id="prestasi" autocomplete="off" value="<?php echo $user_yang_dipilih["prestasi"]; ?>"></input>
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label class="label-ubah-user" for="gambar">Gambar :</label>
			</div>
			<div class="col-75">
				<input class="input-ubah-user" type="text" name="gambar" id="gambar" autocomplete="off" value="<?php echo $user_yang_dipilih["gambar"]; ?>"></input>
			 </div>
		</div>	
		<div>
			<button class="button-ubah-user" type="submit" name="submit">Simpan</button>
		</div> 
	</form>

</div>	

</body>
</html>
