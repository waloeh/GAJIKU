
<?php 

session_start();

if (!isset($_SESSION["login"]) ) {
	
	header("Location: login_admin.php");
	exit;
}

require '../functions.php';
$user = query("SELECT * FROM user");

 ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../design/style.css">
	<title> Halaman Admin</title>
</head>
<body class="background-admin">
<h1 class="h1-data-user">Data Karyawan PT. Betso Tech Indonesia</h1>

<a href="logout.php" class="button-link">LOGOUT</a>

<a href="tambah_user.php"> 
	<img src="../img/tambah.png" width="30">
</a>
<table border="4" cellspacing="0" cellpadding="5" class="table">
	<tr>
		<th width="5%">No</th>
		<th>Gambar</th>
		<th>Nama</th>
		<th>Nik</th>
		<th>Jabatan</th>
		<th width="20%">Aksi</th>
	</tr>

	<?php $i=1; ?>
	<?php foreach ($user as $usr) : ?>   

	<tr>
		<td class="no"><?php echo $i ?></td>
		<td class="img"><img src="../img/<?= $usr["gambar"]; ?>"width="40" align="center"></td>
		<td><?php echo $usr["nama_user"]; ?></td>
		<td><?php echo $usr["nik"]; ?></td>
		<td><?php echo $usr["jabatan"]; ?></td>
		<td class="aksi">
			<a href="lihat_user.php?id_yang_dipilih=<?php echo $usr["id_user"]; ?>" class="button-link">Lihat</a> 
			<a href="ubah_user.php?id_anu_aya_dina_hate=<?php echo $usr["id_user"]; ?>" class="button-link-u">Ubah</a> 
			<a href="hapus_user.php?id=<?php echo $usr["id_user"]; ?>"  onclick="
			return confirm('yakin?');" class="button-link-h">Hapus</a>
		</td>
	</tr>

	<?php $i++; ?>
	<?php endforeach; ?>
</table>
</body>
</html>