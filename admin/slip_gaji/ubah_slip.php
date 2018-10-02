<?php 

session_start();

if (!isset($_SESSION["login"]) ) {
	
	header("Location: ../login_admin.php");
	exit;
}

require '../../functions.php';

$id = $_GET["id_usr"];

$user = mysqli_query($coon, "SELECT user.id_user, user.nama_user, user.username, user.password, user.nik, user.bagian, user.jabatan, user.gapok, user.t_jabatan, user.insentive_hadir, user.prestasi, user.gambar, slip_gaji.id_gaji, slip_gaji.id_user, slip_gaji.tanggal, slip_gaji.transport, slip_gaji.t_makan, slip_gaji.t_transport, slip_gaji.t_hari_raya, slip_gaji.shift, slip_gaji.lembur_1, slip_gaji.lembur_2, slip_gaji.harga_shift, slip_gaji.harga_shift, slip_gaji.harga_lembur1, slip_gaji.harga_lembur2, slip_gaji.t_jamsostek, slip_gaji.pph_21, slip_gaji.pot_pensiun, slip_gaji.pot_jamsos, slip_gaji.pot_bpjs, slip_gaji.total_pen, slip_gaji.koreksi, slip_gaji.total_trma, slip_gaji.kasbon FROM user INNER JOIN slip_gaji ON user.id_user = slip_gaji.id_user WHERE slip_gaji.id_gaji ='$id'");
$query = mysqli_fetch_assoc($user);

if (isset($_POST["submit"]) ) {
	if (ubah_slip($_POST, $query["id_gaji"]) > 0) {
			echo "
				<script>
					alert('data berhasil diubah');
					document.location.href = '../data_user.php';
				</script>";
	}
	else{
			echo "
				<script>
					alert('data gagal diubah');
					document.location.href = '../data_user.php';
				</script>";
	}
}


 ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../../design/style.css">
	<title>Ubah Slip Gaji</title>
</head>
<body class="background-ubah-slip">

<div class="back-ubah-user">
	<h1 align="center">Ubah Slip Gaji</h1>
	<form action="" method="post" enctype="multipart/form-data" class="form-ubah-slip">

	<div class="colom-1">
		<div class="row">
			<div>
				<label class="col-25-label" for="id_user" >No. Absen :</label>
			</div>
			<div>
				<input class="col-75-input" name="id_user" type="text" id="no_user" autocomplete="off" value="<?php echo $query["id_gaji"]; ?>">
			</div>
		</div>	

		<div class="row">
			<div>
				<label class="col-25-label" for="tanggal">Tanggal :</label>
			</div>
			<div>
				<input class="col-75-input" name="tanggal" type="date" id="tanggal" autocomplete="off" value="<?php echo $query["tanggal"]; ?>">
			</div>
		</div>	

		<div class="row">
			<div >
				<label class="col-25-label" for="transport">Transport :</label>
			</div>
			<div>
				<input class="col-75-input" name="transport" type="text" id="transport" autocomplete="off" value="<?php echo $query["transport"]; ?>">
			</div>
		</div>	
		
		<div class="row">
			<div>
				<label class="col-25-label" for="nama_user">Nama Karyawan :</label>
			</div>
			<div>
				<input class="col-75-input" name="nama_user" type="text" id="nama_user" autocomplete="off" value="<?php echo $query["nama_user"]; ?>">
			</div>
		</div>

		<div class="row">	
			<div>
				<label class="col-25-label" for="jabatan">Jabatan :</label>
			</div>
			<div>
				<input class="col-75-input" name="jabatan" type="text" id="jabatan" autocomplete="off" value="<?php echo $query["jabatan"]; ?>">
			</div>
		</div>

		<div class="row">
			<div>
				<label class="col-25-label" for="gapok">Gaji Pokok :</label>
			</div>
			<div>
				<input class="col-75-input" name="gaji_pokok" type="text" id="gapok" autocomplete="off" value="<?php echo $query["gapok"]; ?>">
			</div>
		</div>	
			
		<div class="row">	
			<div>
				<label class="col-25-label" for="jabatan">Tunjangan Jabatan :</label>
			</div>
			<div>
				<input class="col-75-input" name="jabatan" type="text" id="jabatan" autocomplete="off" value="<?php echo $query["t_jabatan"]; ?>">
			</div>
		</div>

		<div class="row">
			<div>
				<label class="col-25-label" for="intensive">Intensive Hadir :</label>
			</div>
			<div>
				<input class="col-75-input" name="insentive" type="text" id="intensive" autocomplete="off" value="<?php echo $query["insentive_hadir"]; ?>">
			</div>
		</div>

		<div class="row">	
			<div>
				<label class="col-25-label" for="makan">T. Makan :</label>
			</div>
			<div>
				<input class="col-75-input" name="makan" type="text" id="makan" autocomplete="off" value="<?php echo $query["t_makan"]; ?>">
			</div>
		</div>

		<div class="row"> 
			<div>
				<label class="col-25-label" for="transport">T. Transport :</label>
			</div>
			<div>
				<input class="col-75-input" name="t_transport" type="text" id="transport" autocomplete="off" value="<?php echo $query["t_transport"]; ?>">
			</div>
		</div>

		<div class="row">
			<div>
				<label class="col-25-label" for="hari_raya">T. Hari Raya</label>
			</div>
			<div>
				<input class="col-75-input" name="hari_raya" type="text" id="hari_raya" autocomplete="off" value="<?php echo $query["t_hari_raya"]; ?>">
			</div>
		</div>

		<div class="row">
			<div>
				<label class="col-25-label" for="shift">Jumlah Shift Malam :</label>
			</div>
			<div>
				<input class="col-75-input" name="shift" type="text" id="shift" autocomplete="off" value="<?php echo $query["shift"]; ?>">
			</div>
		</div>

		<div class="row">
			<div>
				<label class="col-25-label" for="shift">T. Shift :</label>
			</div>
			<div>
				<input class="col-75-input" name="harga_shift" type="text" id="shift" autocomplete="off" value="<?php echo $query["harga_shift"]; ?>">
			</div>
		</div>
		<div class="row">	
				<div>		
					<label class="col-25-label" for="bonus_pres">Bonus Prestasi :</label>
				</div>
				<div>
					<input class="col-75-input" name="prestasi" type="text" id="bonus_pres" autocomplete="off" value="<?php echo $query["prestasi"]; ?>">
				</div>
			</div>
	</div>

		<div class="colom-2">

			<div class="row">
				<div>
					<label class="col-25-label" for="lembur1">Lembur ke-1 :</label>
				</div>
				<div>
					<input class="col-75-input" name="lembur1" type="text" id="lembur1" autocomplete="off" value="<?php echo $query["lembur_1"]; ?>">
				</div>
			</div>

			<div class="row">
				<div>		
					<label class="col-25-label" for="lembur2">Lembur ke-2 :</label>
				</div>
				<div>
					<input class="col-75-input" name="lembur2" type="text" id="lembur2" autocomplete="off" value="<?php echo $query["lembur_2"]; ?>">
				</div>
			</div>

			<div class="row">
				<div>
					<label class="col-25-label" for="lembur1">Harga Lembur ke-1 :</label>
				</div>
				<div>
					<input class="col-75-input" name="h_lembur1" type="text" id="lembur1" autocomplete="off" value="<?php echo $query["harga_lembur1"]; ?>">
				</div>
			</div>

			<div class="row">
				<div>
					<label class="col-25-label" for="lembur2">Harga Lembur ke-2 :</label>
				</div>
				<div>
					<input class="col-75-input" name="h_lembur2" type="text" id="lembur2" autocomplete="off" value="<?php echo $query["harga_lembur2"]; ?>">
				</div>
			</div>

			<div class="row">
				<div>
					<label class="col-25-label" for="jamsos">T. Jamsostek :</label>
				</div>
				<div>
					<input class="col-75-input" name="jamsos" type="text" id="jamsos" autocomplete="off" value="<?php echo $query["t_jamsostek"]; ?>">
				</div>
			</div>

			<div class="row">
				<div>
					<label class="col-25-label" for="pph21"> PPH 21 :</label>
				</div>
				<div>
					<input class="col-75-input" name="pph21" type="text" id="pph21" autocomplete="off" value="<?php echo $query["pph_21"]; ?>">
				</div>
			</div>

			<div class="row">
				<div>
					<label class="col-25-label" for="pensiun"> Pot. Pensiun :</label>
				</div>
				<div>
					<input class="col-75-input" name="pensiun" type="text" id="pensiun" autocomplete="off" value="<?php echo $query["pot_pensiun"]; ?>">
				</div>
			</div>
			
			<div class="row">	
				<div>		
					<label class="col-25-label"  for="pot">Pot. Jamsoste :</label>
				</div>
				<div>
					<input class="col-75-input" name="pot_jamsos" type="text" id="pot" autocomplete="off" value="<?php echo $query["pot_jamsos"]; ?>">
				</div>
			</div>

			<div class="row">	
				<div>
					<label class="col-25-label" for="pot">Pot. BPJS :</label>
				</div>
				<div>
					<input class="col-75-input" name="pot_bpjs" type="text" id="pot" autocomplete="off" value="<?php echo $query["pot_bpjs"]; ?>">
				</div>
			</div>

			<div class="row">
				<div>
					<label class="col-25-label" for="pot">Total Pendapatan :</label>
				</div>
				<div>
					<input class="col-75-input" name="pendapatan" type="text" id="pot" autocomplete="off" value="<?php echo $query["total_pen"]; ?>">
				</div>
			</div>

			<div class="row">
				<div>
					<label class="col-25-label" for="pot">Koreksi :</label>
				</div>
				<div>
					<input class="col-75-input" name="koreksi" type="text" id="pot" autocomplete="off" value="<?php echo $query["koreksi"]; ?>">
				</div>
			</div>

			<div class="row">
				<div>
					<label class="col-25-label" for="pot">Total Terima :</label>
				</div>
				<div>
					<input class="col-75-input" name="terima" type="text" id="pot" autocomplete="off" value="<?php echo $query["total_trma"]; ?>">
				</div>
			</div>

			<div class="row">
				<div>		
					<label class="col-25-label" for="pot">Kasbo :</label>
				</div>
				<div>		
					<input class="col-75-input" name="kasbon" type="text" id="pot" autocomplete="off" value="<?php echo $query["kasbon"]; ?>">
				</div>	
			</div>	
			<div >
				<button type="submit" name="submit" class="button-ubah-slip">Ubah Data</button>
			</div>
		</div>
	</form>
</div>
</body>
</html>