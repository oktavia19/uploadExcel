<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';
// menghubungkan dengan library excel reader
include "excel_reader2.php";
?>

<?php
// upload file xls
$target = basename($_FILES['impor']['name']) ;
move_uploaded_file($_FILES['impor']['tmp_name'], $target);

// beri permisi agar file xls dapat di baca
chmod($_FILES['impor']['name'],0777);
$request = new Request;

// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['impor']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);
 // Cek dahulu apakah data di excel terbaca, biasakan untuk membaca data terlebih dahulu sebelum melakukan saving
// jumlah default data yang berhasil di import

$jenis_pengajuan="hibah";
for ($i=2; $i<=$jumlah_baris; $i++){
	$jenis_pengajuan     = $data->val($i, 1);
	$kecamatan     = $data->val($i, 2);
	$desa     = $data->val($i, 3);
	$uraian_keg_satuan     = $data->val($i, 4);
	$penerima   = $data->val($i, 5);
	$pimpinan  = $data->val($i, 6);
	$bhi  = $data->val($i, 7);
	$alamat  = $data->val($i, 8);
	$nominal  = $data->val($i, 9);
	$tahun_terakhir_menerima  = $data->val($i, 10);
	$tanggal_permohonan  = $data->val($i, 11);
	$nomor_permohonan  = $data->val($i, 12);
	$nomor_penerbitan_rekomendasi  = $data->val($i, 13);
	$pejabat_penerbitan_rekomendasi  = $data->val($i, 14);
	$tanggal_penerbitan_rekomendasi  = date('Y-m-d',strtotime($data->val($i, 15)));
	$tanggal_disposisi_bupati  = $data->val($i, 16);
	$tanggal_penerbitan_rekomendasi  = date('Y-m-d',strtotime($data->val($i, 17)));
	$tanggal_pertimbangan_ketua_tapd  = $data->val($i, 18);
	$created_by  = $request->session('username');
	$created_at  = date('Y-m-d H:i:s');

	$peruntukan  = $request->post('peruntukan');
	$tahun_pengajuan  = $request->post('tahun_pengajuan');
	$kecamatan  = $request->post('kecamatan');
	$desa  = $request->post('desa');
	$program  = $request->post('program');
	$kegiatan  = $request->post('kegiatan');
	$sub_kegiatan  = $request->post('sub_kegiatan');
	$opd_rekomendasi  = $request->post('opd_rekomendasi');
	$opd_pelaksana  = $request->post('opd_pelaksana');

	if($peruntukan != "" && $program != "" && $opd_rekomendasi != ""){
		
		/**
		 * Coba check tulisan pada query ini created_at harusnya $created_at
		 */
		$sql = "INSERT INTO hibah_2022 (peruntukan,tahun_pengajuan,kecamatan,desa,
		program,kegiatan,sub_kegiatan,opd_rekomendasi,opd_pelaksana,
		uraian_keg_satuan,penerima,pimpinan,bhi,alamat,nominal,
		tahun_terakhir_menerima,tanggal_permohonan,nomor_permohonan,
		nomor_penerbitan_rekomendasi,pejabat_penerbitan_rekomendasi,
		tanggal_penerbitan_rekomendasi,tanggal_disposisi_bupati,
		tanggal_pertimbangan_ketua_tapd,isi_disposisi_ketua_tapd,
		created_at,created_by)
		VALUES ('$peruntukan','$tahun_pengajuan', '$kecamatan',
		'$desa','program','$kegiatan','$sub_kegiatan',
		'$opd_rekomendasi','$opd_pelaksana', '$uraian_keg_satuan',
		'$penerima','$pimpinan','$bhi','$alamat',
		'$nominal','$tahun_terakhir_menerima',
		'$tanggal_permohonan','$nomor_permohonan',
		'$nomor_penerbitan_rekomendasi','$pejabat_penerbitan_rekomendasi',
		'$tanggal_penerbitan_rekomendasi','$tanggal_disposisi_bupati',
		'$tanggal_pertimbangan_ketua_tapd','$isi_disposisi_ketua_tapd',
		'$created_at','$created_by'
		)";

		/**
		 * Jika kode di atas hasilnya sudah benar
		 */

		 $save = $this->db->query($sql);

		//$query=mysqli_query($koneksi,"INSERT into hibah_2022 ('peruntukan,tahun_pengajuan,kecamatan,desa,program,kegiatan,sub_kegiatan,opd_rekomendasi,opd_pelaksana,uraian_keg_satuan,penerima,pimpinan,bhi,alamat,nominal,tahun_terakhir_menerima,tanggal_permohonan,nomor_permohonan,nomor_penerbitan_rekomendasi,pejabat_penerbitan_rekomendasi,tanggal_penerbitan_rekomendasi,tanggal_disposisi_bupati,tanggal_pertimbangan_ketua_tapd,isi_disposisi_ketua_tapd','created_at','created_by') values('$peruntukan','$tahun_pengajuan', '$kecamatan','$desa','program','$kegiatan','$sub_kegiatan','$opd_rekomendasi','$opd_pelaksana', $uraian_keg_satuan','$penerima','$pimpinan','$bhi','$alamat','$nominal','$tahun_terakhir_menerima','$tanggal_permohonan','$nomor_permohonan','$nomor_penerbitan_rekomendasi','$pejabat_penerbitan_rekomendasi','$tanggal_penerbitan_rekomendasi','$tanggal_disposisi_bupati','$tanggal_pertimbangan_ketua_tapd','$isi_disposisi_ketua_tapd','$created_at','$created_by')");
		
		
		/**
		 * Kalau di CI
		 */
		
		if(!$save){
			echo "<script>alert('Gagal di tambahkan!');history.go(-1);</script>";
		} else{
			echo "<script>alert('Data berhasil di tambahkan!');history.go(-1);</script>";
		}
	}
}

// hapus kembali file .xls yang di upload tadi
	unlink($_FILES['impor']['name']);
?>