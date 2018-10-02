<?php 

$coon = mysqli_connect("localhost", "root", "root","Gaji");

function query($query){
	global $coon;
	$result = mysqli_query($coon, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function tambah($data){
	global $coon;
	$nama_usr = htmlspecialchars($data["nama"]);
	$usr = htmlspecialchars($data["username"]);
	$pass = htmlspecialchars($data["password"]);
	$nik = htmlspecialchars($data["nik"]);
	$bgn = htmlspecialchars($data["bagian"]);
	$jbtn = htmlspecialchars($data["jabatan"]);
	$gapok = htmlspecialchars($data["gapok"]);
	$jabatan = htmlspecialchars($data["t_jabatan"]);
	$insentive = htmlspecialchars($data["insentive"]);
	$prestasi = htmlspecialchars($data["prestasi"]);
	
	//upload gambar
	$gbmr = upload();
	if (!$gbmr) {
		return false;
	}

	$query = "INSERT INTO user VALUES ('', '$nama_usr', '$usr', '$pass', '$nik', '$bgn', '$jbtn', '$gapok', '$jabatan', '$insentive', '$prestasi','$gbmr')";
	mysqli_query($coon, $query);

	return mysqli_affected_rows($coon);
}


function upload(){
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFille = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];


	//cek tidak ada gambar yang di upload
	if ($error === 4) {
		echo "<script>
				alert('pilih gambar terlebih dahulu');
			  </script>";
		return false;	  
	}
	//cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ["jpg", "jpeg", "png"];
	$ekstensiGambar = explode(".", $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>
				alert('yang anda upload bukan gambar');
			  </script>";
		return false;	
	}
	//ukuran gambar terlau besar
	if ($ukuranFille > 1000000) {
		echo "<script>
				alert('ukuran gambar terlalu besar');
			  </script>";
		return false;	
	}
	//lolos pengecekan, gambar siap diupload
	move_uploaded_file($tmpName,'img/' .$namaFile);

	return $namaFile;

}


function hapus_user($id){
	global $coon;
	mysqli_query($coon, "DELETE FROM user WHERE id_user=$id");

	return mysqli_affected_rows($coon);
}

function ubah($data, $id){
	global $coon;

	$nama_usr = htmlspecialchars($data["nama"]);
	$usr = htmlspecialchars($data["username"]);
	$pass = htmlspecialchars($data["password"]);
	$nik = htmlspecialchars($data["nik"]);
	$bgn = htmlspecialchars($data["bagian"]);
	$jbtn = htmlspecialchars($data["jabatan"]);
	$gapok = htmlspecialchars($data["gapok"]);
	$jabatan = htmlspecialchars($data["t_jabatan"]);
	$insentive = htmlspecialchars($data["insentive"]);
	$prestasi = htmlspecialchars($data["prestasi"]);
	$gbmr = htmlspecialchars($data["gambar"]);

	$query = "UPDATE user SET 
				nama_user = '$nama_usr',
				username = '$usr',
				password = '$pass',
				nik = '$nik',
				bagian = '$bgn',
				jabatan = '$jbtn',
				gapok = '$gapok',
				t_jabatan = '$jabatan',
				insentive_hadir = '$insentive',
				prestasi = '$prestasi',
				gambar = '$gbmr'
				WHERE id_user = $id";

	mysqli_query($coon, $query);


	return mysqli_affected_rows($coon);
}

function ubah_slip($data, $id){
	global $coon;

	$tanggal = htmlspecialchars($data["tanggal"]);
	$transport = htmlspecialchars($data["transport"]);
	$gapok = htmlspecialchars($data["gaji_pokok"]);
	$jabatan = htmlspecialchars($data["jabatan"]);
	$inst = htmlspecialchars($data["insentive"]);
	$makan = htmlspecialchars($data["makan"]);
	$t_transport = htmlspecialchars($data["t_transport"]);
	$thr = htmlspecialchars($data["hari_raya"]);
	$shift = htmlspecialchars($data["shift"]);
	$h_shift = htmlspecialchars($data["harga_shift"]);
	$prestasi = htmlspecialchars($data["prestasi"]);
	$lembur1 = htmlspecialchars($data["lembur1"]);
	$lembur2 = htmlspecialchars($data["lembur2"]);
	$h_lembur1 = htmlspecialchars($data["h_lembur1"]);
	$h_lembur2 = htmlspecialchars($data["h_lembur2"]);
	$jamsos = htmlspecialchars($data["jamsos"]);
	$pph21 = htmlspecialchars($data["pph21"]);
	$pensiun = htmlspecialchars($data["pensiun"]);
	$pot_jamsos = htmlspecialchars($data["pot_jamsos"]);
	$bpjs = htmlspecialchars($data["pot_bpjs"]);
	$pendapatan = htmlspecialchars($data["pendapatan"]);
	$koreksi = htmlspecialchars($data["koreksi"]);
	$terima = htmlspecialchars($data["terima"]);
	$kasbon = htmlspecialchars($data["kasbon"]);

	$query = "UPDATE slip_gaji SET 
				tanggal = '$tanggal',
				transport = '$transport',
				t_makan = '$makan',
				t_transport = '$t_transport',
				t_hari_raya = '$thr',
				shift = '$shift',
				lembur_1 = '$lembur1',
				lembur_2 = '$lembur2',
				harga_shift = '$h_shift',
				harga_lembur1 = '$h_lembur1',
				harga_lembur2 = '$h_lembur2',
				t_jamsostek = '$jamsos',
				pph_21 = '$pph21',
				pot_pensiun = '$pensiun',
				pot_jamsos = '$pot_jamsos',
				pot_bpjs = '$bpjs',
				total_pen = '$pendapatan',
				koreksi = '$koreksi',
				total_trma = '$terima',
				kasbon = '$kasbon'
				WHERE id_gaji = $id;";

	mysqli_query($coon, $query);

	return mysqli_affected_rows($coon);

}

function tambah_slip($data, $id){
	global $coon;

	$tanggal = htmlspecialchars($data["tanggal"]);
	$transport = htmlspecialchars($data["transport"]);
	$gapok = htmlspecialchars($data["gaji_pokok"]);
	$jabatan = htmlspecialchars($data["jabatan"]);
	$inst = htmlspecialchars($data["insentive"]);
	$makan = htmlspecialchars($data["makan"]);
	$t_transport = htmlspecialchars($data["t_transport"]);
	$thr = htmlspecialchars($data["hari_raya"]);
	$shift = htmlspecialchars($data["shift"]);
	$h_shift = htmlspecialchars($data["harga_shift"]);
	$prestasi = htmlspecialchars($data["prestasi"]);
	$lembur1 = htmlspecialchars($data["lembur1"]);
	$lembur2 = htmlspecialchars($data["lembur2"]);
	$h_lembur_1 = htmlspecialchars($data["h_lembur1"]);
	$h_lembur_2 = htmlspecialchars($data["h_lembur2"]);
	$t_jamsos = htmlspecialchars($data["jamsos"]);
	$pph21 = htmlspecialchars($data["pph21"]);
	$pensiun = htmlspecialchars($data["pensiun"]);
	$pot_jamsos = htmlspecialchars($data["pot_jamsos"]);
	$bpjs = htmlspecialchars($data["pot_bpjs"]);
	$pendapatan = htmlspecialchars($data["pendapatan"]);
	$koreksi = htmlspecialchars($data["koreksi"]);
	$terima = htmlspecialchars($data["terima"]);
	$kasbon = htmlspecialchars($data["kasbon"]);

	$query = "INSERT INTO slip_gaji VALUES ('', '$id', '$tanggal', '$transport', '$makan', '$t_transport', '$thr', '$shift', '$lembur1', '$lembur2', '$h_shift', '$h_lembur_1', '$h_lembur_2', '$t_jamsos', '$pph21', '$pensiun', '$pot_jamsos', '$bpjs', '$pendapatan', '$koreksi', '$terima', '$kasbon')";
	mysqli_query($coon, $query);
	
	return mysqli_affected_rows($coon);
}


function hapus_slip($id){
	global $coon;
	mysqli_query($coon, "DELETE FROM slip_gaji WHERE id_gaji=$id");

	return mysqli_affected_rows($coon);
}

?>
 