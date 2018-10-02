<?php 

session_start();

if (!isset($_SESSION["login"]) ) {
	
	header("Location: login_admin.php");
	exit;
}

require '../functions.php';

$id = $_GET["id_yang_dipilih"];

$data  = mysqli_query($coon, "SELECT * FROM user WHERE id_user = $id");
$hasil = mysqli_fetch_assoc($data);

$user = query("SELECT user.id_user, user.nama_user, user.username, user.password, user.nik, user.bagian, user.jabatan, user.gapok, user.t_jabatan, user.insentive_hadir, user.prestasi, user.gambar, slip_gaji.id_gaji, slip_gaji.id_user, slip_gaji.tanggal, slip_gaji.transport, slip_gaji.t_makan, slip_gaji.t_transport, slip_gaji.t_hari_raya, slip_gaji.shift, slip_gaji.lembur_1, slip_gaji.lembur_2, slip_gaji.harga_shift, slip_gaji.harga_shift, slip_gaji.harga_lembur1, slip_gaji.harga_lembur2, slip_gaji.t_jamsostek, slip_gaji.pph_21, slip_gaji.pot_pensiun, slip_gaji.pot_jamsos, slip_gaji.pot_bpjs, slip_gaji.total_pen, slip_gaji.koreksi, slip_gaji.total_trma, slip_gaji.kasbon FROM user INNER JOIN slip_gaji ON user.id_user = slip_gaji.id_user WHERE slip_gaji.id_user ='$id'");
var_dump($user);

 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Gaji Karyawan</title>
	<link rel="stylesheet" type="text/css" href="../design/style.css">
</head>
<body class="background-lihat-user">

<table border="2" cellspacing="0" cellpadding="10" width="600" align="center" class="tabel-lihat-user">
	<tr>
		<th colspan="4">Betso Tech Indonesia</th>
	</tr>
	<tr>
		<td colspan="4">
			<p align="center">Nama : <?php echo $hasil["nama_user"]; ?></p>
			<p align="center">Nik : <?php echo $hasil["nik"]; ?></p>
			<p align="center">Jabatan : <?php echo $hasil["jabatan"]; ?></p>
		</td>
	</tr>
	<tr>
		<th width="20">No.</th>
		<th width="190">Tanggal</th>
		<th width="190">Gaji</th>
		<th width="200">Aksi</th>
	</tr>

	<?php $i = 1; ?>
	<?php foreach ($user as $usr) {  ?>
	<tr>
		<td align="center"> <?php echo $i ?></td>
		<td align="center"><?php echo $usr["tanggal"]; ?></td>
		<td align="center">Rp. <?php echo $usr["total_trma"]; ?></td>
		<td align="center">
			<a href="slip_gaji/ubah_slip.php?id_usr=<?php echo $usr["id_gaji"]; ?>" class="button-ling-u">Ubah</a>
			<a href="slip_gaji/hapus_slip.php?id=<?php echo $usr["id_gaji"]; ?>" onclick = "return confirm('yakin');" class="button-ling-h">Hapus</a> 
			<a href="slip_gaji/detail_slip.php?id_gji=<?php echo $usr["id_gaji"]; ?>" class="button-ling-d">Detail</a>
		</td>
	</tr>
	<?php $i++ ?>
	<?php } ?>

</table>
	<a href="slip_gaji/tambah_slip.php?id_user=<?php echo $id ?>" class="button-ling-buat">Buat Slip Gaji</a>
</body>
</html>