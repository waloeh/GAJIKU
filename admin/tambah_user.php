<?php 

session_start();

if (!isset($_SESSION["login"]) ) {
	
	header("Location: login_admin.php");
	exit;
}

require '../functions.php';

if (isset($_POST["submit"]) ) {

	var_dump($_FILES);

	//cek apakah data berhasil di tambahkan
	if (tambah($_POST) > 0) {
		echo "<script>
			alert('data berhasil ditambahkan');
			document.location.href = 'data_user.php';
		</script>";
	}
	else{
		echo "<script>
			alert('data gagal ditambahkan');
			document.location.href = 'data_user.php';
		</script>";
	}
}

 ?>



<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../design/style.css">
	<title>Tambah Data Karyawan Betso</title>
</head>
<body class="background-tambah-karyawann">
<form action="" method="post" enctype="multipart/form-data">

	<div class="tabel-tambah-user">

		<h1 class="judul-tambah-user">Tambah Data Karyawan Betso</h1>

		<div>
			<label class="colo-25-" for="nama_user">Nama :</label>
			<input class="colo-75-" type="text" name="nama" id="nama_user" required autocomplete="off"></input>
		</div>

		<div>
			<label class="colo-25-" for="nik">Nik :</label>
			<input class="colo-75-"  type="text" name="nik" id="nik" autocomplete="off"></input>
		</div>

	    <div>
			<label class="colo-25-" for="bagian">Bagian :</label>
			<input class="colo-75-" type="text" name="bagian" id="bagian" autocomplete="off"></input>
		</div>

		<div>
			<label class="colo-25-" for="jabatan">Jabatna :</label>
			<input class="colo-75-" type="jabatan" name="jabatan" id="jabatan" autocomplete="off"></input>
		</div>

		<div>
			<label class="colo-25-" for="username">Username :</label>
			<input class="colo-75-" type="text" name="username" id="username" autocomplete="off"></input>
		</div>

		<div>
			<label class="colo-25-" for="password">Password :</label>
			<input class="colo-75-" type="text" name="password" id="password" autocomplete="off"></input>
		</div>

		<div>
			<label class="colo-25-" for="gapok">Gaji Pokok :</label>
			<input class="colo-75-" type="text" name="gapok" id="gapok" autocomplete="off"></input>
		</div>

		<div>
			<label class="colo-25-" for="jabatan">Tunjangan Jabatan :</label>
			<input class="colo-75-" type="text" name="t_jabatan" id="jabatan" autocomplete="off"></input>
		</div>

		<div>
			<label class="colo-25-" for="insentive">Insentive Hadir :</label>
			<input class="colo-75-" type="text" name="insentive" id="insentive" autocomplete="off"></input>
		</div>

		<div>
			<label class="colo-25-" for="prestasi">Tunjangan Prestasi :</label>
			<input class="colo-75-" type="text" name="prestasi" id="prestasi" autocomplete="off"></input>
		</div>

		<div>
			<label class="colo-25-" for="gambar">Gambar :</label>
			<input class="colo-75-" type="file" name="gambar" id="gambar" autocomplete="off"></input>
		</div>
	
			<button class="button-simpan-user" type="submit" name="submit">Simpan</button>
	</div>
	
</form>
</body>
</html>