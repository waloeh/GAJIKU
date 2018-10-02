<?php 

session_start();

if (!isset($_SESSION["login"]) ) {

	header("Location:login_user.php");
	exit;
}

require '../functions.php';

$id = $_SESSION["id_user"];

$user = mysqli_query($coon, "SELECT slip_gaji.tanggal, slip_gaji.total_trma FROM user INNER JOIN slip_gaji ON user.id_user = slip_gaji.id_user WHERE user.id_user = '$id'");
$hasil = mysqli_fetch_assoc($user);

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Gaji Karyawan</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<a href="logout.php">LOGOUT</a>

<table border="2" cellspacing="0" cellpadding="10" width="600" align="center">
	<tr>
		<th colspan="4">Betso Tech Indonesia</th>
	</tr>
	<tr>
		<td colspan="4">
			<p align="center">Nama : <?php  echo $_SESSION["nama_user"];?></p>
			<p align="center">Nik : <?php echo $_SESSION["nik"]; ?></p>
			<p align="center">Jabatan : <?php echo $_SESSION["jabatan"]; ?></p>
		</td>
	</tr>
	<tr>
		<th width="20">No.</th>
		<th width="190">Tanggal</th>
		<th width="190">Gaji</th>
		<th width="200">Aksi</th>
	</tr>

	<?php $i=1 ?>
	<?php foreach ($user as $h ) { ?>
	<tr>
		<td align="center"><?php echo $i ?></td>
		<td align="center"><?php echo $h["tanggal"]; ?></td>
		<td align="center">Rp. <?php echo $h["total_trma"]; ?></td>
		<td align="center">
			<a href=detail_slip_user.php?id=<?php echo $id ?>>Detail</a>
		</td>
	</tr>
	<?php $i++ ?>
<?php } ?>

</table>
</body>
</html>