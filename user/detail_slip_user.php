<?php 

session_start();

if (!isset($_SESSION["login"]) ) {

	header("Location:login_user.php");
	exit;
}  	

require '../functions.php';

$id = $_GET["id"];

$user = mysqli_query($coon, "SELECT user.id_user, user.nama_user, user.username, user.password, user.nik, user.bagian, user.jabatan, user.gapok, user.t_jabatan, user.insentive_hadir, user.prestasi, user.gambar, slip_gaji.id_gaji, slip_gaji.id_user, slip_gaji.tanggal, slip_gaji.transport, slip_gaji.t_makan, slip_gaji.t_transport, slip_gaji.t_hari_raya, slip_gaji.shift, slip_gaji.lembur_1, slip_gaji.lembur_2, slip_gaji.harga_shift, slip_gaji.harga_shift, slip_gaji.harga_lembur1, slip_gaji.harga_lembur2, slip_gaji.t_jamsostek, slip_gaji.pph_21, slip_gaji.pot_pensiun, slip_gaji.pot_jamsos, slip_gaji.pot_bpjs, slip_gaji.total_pen, slip_gaji.koreksi, slip_gaji.total_trma, slip_gaji.kasbon FROM user INNER JOIN slip_gaji ON user.id_user = slip_gaji.id_user WHERE user.id_user = '$id'");

$hasil = mysqli_fetch_assoc($user);

 ?>



<!DOCTYPE html>
<html>
<head>
	<title>gaji</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<table class="table" border="2" align="center" width="600">
	<tr>
		<th class="style" colspan="3">Betso Tech Indonesia</th>
	</tr>
	<tr>
		<td colspan="3">
			<p align="center">Slip Gaji : <?php echo $hasil["tanggal"]; ?></p>
			<p align="center">Nama : <?= $hasil["nama_user"]; ?></p>
			<p align="center">Bagaian : <?php echo $hasil["bagian"]; ?></p>
			<p align="center">Jabatan : <?php echo $hasil["jabatan"]; ?></p>
		</td>
	</tr>	
	<tr>
		<td class="pading" width="250">Gaji Pokok</td>
		<td width="100" align="center">-</td>
		<td width="250" align="center"><?php echo $hasil["gapok"]; ?></td>
	</tr>
	<tr>
		<td class="pading" width="200">T. Jabatan</td>
		<td width="200" align="center">-</td>
		<td width="200" align="center"><?php echo $hasil["t_jabatan"]; ?></td>
	</tr>
	<tr>
		<td class="pading" width="200">T. Insentive Hadir</td>
		<td width="200" align="center">-</td>
		<td width="200" align="center"><?php echo $hasil["insentive_hadir"]; ?></td>
	</tr>
	<tr>
		<td class="pading" width="200">T. Makan</td>
		<td width="200" align="center">-</td>
		<td width="200" align="center"><?php echo $hasil["t_makan"]; ?></td>
	</tr>
	<tr>
		<td class="pading" width="200">T. Transport</td>
		<td width="200" align="center"><?php echo $hasil["transport"]; ?></td>
		<td width="200" align="center"><?php echo $hasil["t_transport"]; ?></td>
	</tr>	
	<tr>
		<td class="pading" width="200">T. Hari Raya</td>
		<td width="200" align="center">-</td>
		<td width="200" align="center"><?php echo $hasil["t_hari_raya"]; ?></td>
	</tr>
	<tr>
		<td class="pading" width="200">T. Shift</td>
		<td width="200" align="center"><?php echo $hasil["shift"]; ?></td>
		<td width="200" align="center"><?php echo $hasil["harga_shift"]; ?></td>
	</tr>
	<tr>
		<td class="pading" width="200">T. Bonus Prestasi</td>
		<td width="200" align="center">-</td>
		<td width="200" align="center"><?php echo $hasil["prestasi"]; ?></td>
	</tr>
	<tr>
		<td class="pading" width="200">Lembur ke-1</td>
		<td width="200" align="center"><?php echo $hasil["lembur_1"]; ?></td>
		<td width="200" align="center"><?php echo $hasil["harga_lembur1"]; ?></td>
	</tr>
	<tr>
		<td class="pading" width="200">Lembur ke-2</td>
		<td width="200" align="center"><?php echo $hasil["lembur_2"]; ?></td>
		<td width="200" align="center"><?php echo $hasil["harga_lembur2"]; ?></td>
	</tr>
	<tr>
		<td class="pading" width="200">T. Jamsostek</td>
		<td width="200" align="center">-</td>
		<td width="200" align="center"><?php echo $hasil["t_jamsostek"]; ?></td>
	</tr>
	<tr>
		<td class="pading" width="200">PPH 21</td>
		<td width="200" align="center">-</td>
		<td width="200" align="center"><?php echo $hasil["pph_21"]; ?></td>
	</tr>
	<tr>
		<td class="pading" width="200">Pot. Dana Pensiun</td>
		<td width="200" align="center">1 %</td>
		<td width="200" align="center"><?php echo $hasil["pot_pensiun"]; ?></td>
	</tr>
	<tr>
		<td class="pading" width="200">Pot. Jamsostek</td>
		<td width="200" align="center">-</td>
		<td width="200" align="center"><?php echo $hasil["pot_jamsos"]; ?></td>
	</tr>
	<tr>
		<td class="pading" width="200">Pot. BPJS KST</td>
		<td width="200" align="center">1 %</td>
		<td width="200" align="center"><?php echo $hasil["pot_bpjs"]; ?></td>
	</tr>
	<tr>
		<td class="pading" width="200">Total Pendapatan</td>
		<td width="200" align="center">-</td>
		<td width="200" align="center"><?php echo $hasil["total_pen"]; ?></td>
	</tr>
	<tr>
		<td class="pading" width="200">Koreksi Bulan Lalau</td>
		<td width="200" align="center">-</td>
		<td width="200" align="center"><?php echo $hasil["koreksi"]; ?></td>
	</tr>
	<tr>
		<td class="pading" width="200">Khas Bon</td>
		<td width="200" align="center">-</td>
		<td width="200" align="center"><?php echo $hasil["kasbon"]; ?></td>
	</tr>
	<tr>
		<td class="pading_satu" width="200">Total Penerimaan</td>
		<td width="200" align="center">-</td>
		<td class="pading_satu" width="200" align="center"><?php echo $hasil["total_trma"]; ?></td>
	</tr>

</table>
</body>
</html>