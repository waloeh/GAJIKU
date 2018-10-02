<?php 

session_start();

if (!isset($_SESSION["login"]) ) {
	
	header("Location: ../login_admin.php");
	exit;
}

require '../../functions.php';

$id = $_GET["id_user"];

$data  = mysqli_query($coon, "SELECT * FROM user WHERE id_user = $id");
$hasil = mysqli_fetch_assoc($data);

if (isset($_POST["submit"]) ) {
	
	if (tambah_slip($_POST, $id) > 0) {
		echo "
		<script>
			alert('data berhasil ditambahkan');
			document.location.href = '../data_user.php';
		</script>";
	}
	else{
		echo "
		<script>
			alert('data gagal ditambahkan');
			document.location.href = '../data_user.php';
		</script>;
		";
	}
}

 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Tambah Slip Gaji</title>
	<link rel="stylesheet" type="text/css" href="../../design/style.css">
</head>
<body class="background-tambah-slip">

<div>
	<h1>Tambah Slip Gaji</h1>

		<form action="" method="post" enctype="multipart/form-data">
			<div class="page-1">
				<div class="row-tambah-slip">
					<div>
						<label class="col-11" for="nama">Nama Karyawn :</label>
					</div>
					<div>
						<input class="col-12" name="nama" type="text" id="nama" autocomplete="off" value="<?php echo $hasil["nama_user"]; ?>">
					</div>
				</div>
				
				<div>
					<div>
						<label class="col-11" for="tanggal">Tanggal :</label>
					</div>
					<div>
						<input class="col-12" name="tanggal" type="date" id="tanggal" autocomplete="off">
					</div>
				</div>
				
				<div>
					<div>
						<label class="col-11" for="transport">Transport :</label>
					</div>
					<div>
						<input class="col-12" type="text" name="transport" id="transport" autocomplete="off"></input>
					</div>
				</div>
				
				<div>
					<div>
						<label class="col-11" for="gapok">Gaji Pokok :</label>
					</div>
					<div>
						<input class="col-12" name="gaji_pokok" type="text" id="gapok" autocomplete="off" value="<?php echo $hasil["gapok"]; ?>">
					</div>
				</div>
				
				<div>
					<div>
						<label class="col-11" for="jabatan">Jabatan :</label>
					</div>
					<div>
						<input class="col-12" name="jabatan" type="text" id="jabatan" autocomplete="off" value="<?php echo $hasil["jabatan"]; ?>">
					</div>
				</div>
				
				<div>
					<div>
						<label class="col-11" for="jabatan">Tunjangan Jabatan :</label>
					</div>
					<div>
						<input class="col-12" name="t_jabatan" type="text" id="jabatan" autocomplete="off" value="<?php echo $hasil["t_jabatan"]; ?>">
					</div>
				</div>
				
				<div>
					<div>
						<label class="col-11" for="intensive">Intensive Hadir :</label>
					</div>
					<div>
						<input class="col-12" name="insentive" type="text" id="intensive" autocomplete="off" value="<?php echo $hasil["t_jabatan"]; ?>">
					</div>
				</div>
				
				<div>
					<div>
						<label class="col-11" for="makan">T. Makan :</label>
					</div>
					<div>
						<input class="col-12" name="makan" type="text" id="makan" autocomplete="off">
					</div>
				</div>
				
				<div>
					<div>
						<label class="col-11" for="transport">T. Transport :</label>
					</div>
					<div>
						<input class="col-12" name="t_transport" type="text" id="transport" autocomplete="off">
					</div>
				</div>
				
				<div>
					<div>
						<label class="col-11" for="hari_raya">T. Hari Raya</label>
					</div>
					<div>
						<input class="col-12" name="hari_raya" type="text" id="hari_raya" autocomplete="off">
					</div>
				</div>
				
				<div>
					<div>
						<label class="col-11" for="shift">Jumlah Shift Malam :</label>
					</div>
					<div>
						<input class="col-12" name="shift" type="text" id="shift" autocomplete="off">
					</div>
				</div>
				
				<div>
					<div>
						<label class="col-11" for="shift">T. Shift :</label>
					</div>
					<div>
						<input class="col-12" name="harga_shift" type="text" id="shift" autocomplete="off">
					</div>
				</div>
			</div>	
			
			<div class="page-2">
				<div>
					<div>
						<label class="col-11" for="bonus_pres">Bonus Prestasi :</label>
					</div>
					<div>
						<input class="col-12" name="prestasi" type="text" id="bonus_pres" autocomplete="off" value="<?php echo $hasil["prestasi"]; ?>">
					</div>
				</div>

				<div>
					<div>
						<label class="col-11" for="lembur1">Lembur ke-1 :</label>
					</div>
					<div>
						<input class="col-12" name="lembur1" type="text" id="lembur1" autocomplete="off">
					</div>
				</div>
				
				<div>
					<div>
						<label class="col-11" for="lembur2">Lembur ke-2 :</label>
					</div>
					<div>
						<input class="col-12" name="lembur2" type="text" id="lembur2" autocomplete="off">
					</div>
				</div>
				
				<div>
					<div>
						<label class="col-11" for="lembur1">Harga Lembur ke-1 :</label>
					</div>
					<div>
						<input class="col-12" name="h_lembur1" type="text" id="lembur1" autocomplete="off">
					</div>
				</div>
				
				<div>
					<div>
						<label class="col-11" for="lembur2">Harga Lembur ke-2 :</label>
					</div>
					<div>
						<input class="col-12" name="h_lembur2" type="text" id="lembur2" autocomplete="off">
					</div>
				</div>
				
				<div>
					<div>
						<label class="col-11" for="jamsos">T. Jamsostek :</label>
					</div>
					<div>
						<input class="col-12" name="jamsos" type="text" id="jamsos" autocomplete="off">
					</div>
				</div>
				
				<div>
					<div>
						<label class="col-11" for="pph21"> PPH 21 :</label>
					</div>
					<div>
						<input class="col-12" name="pph21" type="text" id="pph21" autocomplete="off">
					</div>
				</div>
				
				<div>
					<div>
						<label class="col-11" for="pensiun"> Pot. Pensiun :</label>
					</div>
					<div>
						<input class="col-12" name="pensiun" type="text" id="pensiun" autocomplete="off">
					</div>
				</div>
				
				<div>
					<div>
						<label class="col-11" for="pot">Pot. Jamsoste :</label>
					</div>
					<div>
						<input class="col-12" name="pot_jamsos" type="text" id="pot" autocomplete="off">
					</div>
				</div>
				
				<div>
					<div>
						<label class="col-11" for="pot">Pot. BPJS :</label>
					</div>
					<div>
						<input class="col-12" name="pot_bpjs" type="text" id="pot" autocomplete="off">
					</div>
				</div>
				
				<div>
					<div>
						<label class="col-11" for="pot">Total Pendapatan :</label>
					</div>
					<div>
						<input class="col-12" name="pendapatan" type="text" id="pot" autocomplete="off">
					</div>
				</div>
				
				<div>
					<div>
						<label class="col-11" for="pot">Koreksi :</label>
					</div>
					<div>
						<input class="col-12" name="koreksi" type="text" id="pot" autocomplete="off">
					</div>
				</div>
				
				<div>
					<div>	
						<label class="col-11" for="pot">Total Terima :</label>
					</div>
					<div>
						<input class="col-12" name="terima" type="text" id="pot" autocomplete="off">
					</div>
				</div>
				
				<div>
					<div>
						<label class="col-11" for="pot">Kasbo :</label>
					</div>
					<div>
						<input class="col-12" name="kasbon" type="text" id="pot" autocomplete="off">
					</div>
				</div>
			</div>
			<div>
				<button type="submit" name="submit">Tambah Data</button>
			</div> 		
		</form>
</div>

</body>
</html>