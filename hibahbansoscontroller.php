<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * class :HibahbansosController
 * created by:oktavia
 * created at:07/04/2022
 * co BAPPEDA Tuban
 */
class  HibahbansosController extends CI_Controller {

    function __construct(){
        parent::__construct();

        $this->load->model(['hibahbansos']);
    }

    function index(){
    	$data['a'] = $this->hibahbansos->all();
        $data['skpd'] = $this->hibahbansos->skpd();
        if ($this->session->userdata('group')==1) {
            $data['content'] = 'user/hibah_bansos_2022/index';
        } else {
            $data['content'] = 'user/hibah_bansos_2022/user/index';
        }
        $this->load->view('layouts/layout',$data);
    }

    function form_manual_hibah(){
    	$data['data'] = $this->hibahbansos->all();
    	$data['kecamatan'] = $this->hibahbansos->get_kecamatan();
    	$data['skpd'] = $this->hibahbansos->skpd();
        $data['program'] = $this->hibahbansos->program();
        
        $data['content'] = 'user/hibah_bansos_2022/form_manual_hibah';
        $this->load->view('layouts/layout',$data);
    }

    public function get_desa(){
    	$id_kecamatan = $this->input->post('id',TRUE);
    	$data = $this->hibahbansos->get_desa($id_kecamatan)->result();
    	echo json_encode($data); 
    }

    function get_kegiatan(){
        $id_program = $this->input->post('id',TRUE);
        $data = $this->hibahbansos->get_kegiatan($id_program)->result();
        echo json_encode($data);
    }

    function get_sub_kegiatan(){
        $id_kegiatan = $this->input->post('id',TRUE);
        $data = $this->hibahbansos->get_sub_kegiatan($id_kegiatan)->result();
        echo json_encode($data);
    }

    function simpan_hibah(){
        $jenis_pengajuan="hibah";
        $id      = $this->hibahbansos->getID();
        $created_at = date('Y-m-d H:i:s');
        $created_by=$this->session->userdata('username');
        $peruntukan = $_POST['peruntukan'];
        $tahun_pengajuan = $_POST['tahun_pengajuan'];
        $penerima = $_POST['penerima'];
        $pimpinan = $_POST['pimpinan'];
        $kecamatan = $_POST['kecamatan'];
        $desa = $_POST['desa'];
        $bhi = $_POST['bhi'];
        $nominal = $_POST['nominal'];
        $uraian_keg_satuan = $_POST['uraian_keg_satuan'];
        $alamat = $_POST['alamat'];
        $program = $_POST['program'];
        $kegiatan = $_POST['kegiatan'];
        $sub_kegiatan = $_POST['sub_kegiatan'];
        $opd_rekomendasi = $_POST['opd_rekomendasi'];
        $opd_pelaksana = $_POST['opd_pelaksana'];
        $tahun_terakhir_menerima = $_POST['tahun_terakhir_menerima'];
        $tanggal_permohonan = $_POST['tanggal_permohonan'];
        $nomor_permohonan = $_POST['nomor_permohonan'];
        $nomor_penerbitan_rekomendasi = $_POST['nomor_penerbitan_rekomendasi'];
        $tanggal_penerbitan_rekomendasi = $_POST['tanggal_penerbitan_rekomendasi'];
        $pejabat_penerbitan_rekomendasi = $_POST['pejabat_penerbitan_rekomendasi'];
        $tanggal_disposisi_bupati = $_POST['tanggal_disposisi_bupati'];
        $tanggal_pertimbangan_ketua_tapd = $_POST['tanggal_pertimbangan_ketua_tapd'];
        $isi_disposisi_ketua_tapd = $_POST['isi_disposisi_ketua_tapd'];

        $data = array(
            'id' =>$id,
            'jenis_pengajuan' =>$jenis_pengajuan, 
            'kecamatan' =>$kecamatan,
            'desa' =>$desa,
            'peruntukan' =>$peruntukan,
            'uraian_keg_satuan' =>$uraian_keg_satuan,
            'penerima' =>$penerima,
            'pimpinan' =>$pimpinan,
            'bhi' =>$bhi,
            'alamat' =>$alamat,
            'nominal' =>$nominal,
            'opd_rekomendasi' =>$opd_rekomendasi,
            'opd_pelaksana' =>$opd_pelaksana,
            'program' =>$program,
            'kegiatan' =>$kegiatan,
            'sub_kegiatan' =>$sub_kegiatan,
            'tahun_terakhir_menerima' =>$tahun_terakhir_menerima,
            'tanggal_permohonan' =>$tanggal_permohonan,
            'nomor_permohonan' =>$nomor_permohonan,
            'nomor_penerbitan_rekomendasi' =>$nomor_penerbitan_rekomendasi,
            'pejabat_penerbitan_rekomendasi' =>$pejabat_penerbitan_rekomendasi,
            'tanggal_penerbitan_rekomendasi' =>$tanggal_penerbitan_rekomendasi,
            'tanggal_disposisi_bupati' =>$tanggal_disposisi_bupati,
            'tanggal_pertimbangan_ketua_tapd' =>$tanggal_pertimbangan_ketua_tapd,
            'isi_disposisi_ketua_tapd' =>$isi_disposisi_ketua_tapd,
            'created_at' =>$created_at,
            'created_by' =>$created_by,
            'tahun_pengajuan' =>$tahun_pengajuan,
        );

        
        $res=$this->hibahbansos->simpan('hibah_2022',$data);
        if (!$res) {
            ?><script language="JavaScript">alert('Insert Data Gagal');
            document.location='<?php echo site_url('hibahbansos/form_manual_hibah');?>'</script><?php
        } else {
            ?><script language="JavaScript">alert('Insert Data Sukses');
            document.location='<?php echo site_url('hibahbansos/index');?>'</script><?php
        }
    }

    function detail($id){
        $a=$this->hibahbansos->GetData("where id = '$id'");
        $data=array(
            'id'=>$a[0]['id'],
            'jenis_pengajuan'=>$a[0]['jenis_pengajuan'],
            'kecamatan'=> $a[0]['kecamatan'],
            'desa'=> $a[0]['desa'],
            'peruntukan'=> $a[0]['peruntukan'],
            'uraian_keg_satuan'=> $a[0]['uraian_keg_satuan'],
            'penerima'=> $a[0]['penerima'],
            'pimpinan'=> $a[0]['pimpinan'],
            'alamat'=> $a[0]['alamat'],
            'bhi'=> $a[0]['bhi'],
            'nominal'=> $a[0]['nominal'],
            'opd_rekomendasi'=> $a[0]['opd_rekomendasi'],
            'opd_pelaksana'=> $a[0]['opd_pelaksana'],
            'program'=> $a[0]['program'],
            'kegiatan'=> $a[0]['kegiatan'],
            'sub_kegiatan'=> $a[0]['sub_kegiatan'],
            'tahun_terakhir_menerima'=> $a[0]['tahun_terakhir_menerima'],
            'tanggal_permohonan'=> $a[0]['tanggal_permohonan'],
            'nomor_permohonan'=> $a[0]['nomor_permohonan'],
            'nomor_penerbitan_rekomendasi'=> $a[0]['nomor_penerbitan_rekomendasi'],
            'pejabat_penerbitan_rekomendasi'=> $a[0]['pejabat_penerbitan_rekomendasi'],
            'tanggal_penerbitan_rekomendasi'=> $a[0]['tanggal_penerbitan_rekomendasi'],
            'tanggal_disposisi_bupati'=> $a[0]['tanggal_disposisi_bupati'],
            'tanggal_pertimbangan_ketua_tapd'=> $a[0]['tanggal_pertimbangan_ketua_tapd'],
            'isi_disposisi_ketua_tapd'=> $a[0]['isi_disposisi_ketua_tapd'],
            'tahun_pengajuan'=> $a[0]['tahun_pengajuan'],
        );
        $data['data'] = $this->hibahbansos->all();
        $data['kecamatan'] = $this->hibahbansos->get_kecamatan();
        $data['skpd'] = $this->hibahbansos->skpd();
        $data['program'] = $this->hibahbansos->program();

        $data['content'] = 'user/hibah_bansos_2022/form_Edit';
        $this->load->view('layouts/layout',$data);
    }

    public function hapus($id)
    {
     $where=array('id'=>$id);
     $res=$this->hibahbansos->hapus('hibah_2022',$where);
        // redirect ('pengajuan/input');
     ?><script language="JavaScript">alert('Data Terhapus');
     document.location='<?php echo site_url('hibahbansos/index');?>'</script><?php
 }

 function inputExcel(){
    $data['data'] = $this->hibahbansos->all();
    $data['kecamatan'] = $this->hibahbansos->get_kecamatan();
    $data['skpd'] = $this->hibahbansos->skpd();
    $data['program'] = $this->hibahbansos->program();
    $data['content'] = 'user/hibah_bansos_2022/form_excel';
    $this->load->view('layouts/layout',$data);
}

function impor(){
    $this->load->view('excel_hibah2022');
}

}