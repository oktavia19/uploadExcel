<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
class : hibahbansos
dev : Oktavia
date : 07/04/2022
co : BAPPEDA Tuban
version : 0.5
*/

class hibahbansos extends Models{

    protected $table = 'hibah_2022';
    protected $primarykey = 'id';
    protected $datetime = false;
    /*
	 * list id kecamatan
	 */

    public function all(){

        $tahun=$this->session->userdata('set_tahun');
        $skpd_id = $this->session->userdata('skpd');
        if ($this->session->userdata('group')==1) {
            $data=$this->db->query("SELECT hibah_2022.*, skpd.nama_skpd as skpd from hibah_2022 inner join skpd on hibah_2022.opd_rekomendasi=skpd.id_skpd");
        } else {
            $data=$this->db->query("SELECT hibah_2022.*, skpd.nama_skpd as skpd from hibah_2022 inner join skpd on hibah_2022.opd_rekomendasi=skpd.id_skpd where tahun_pengajuan='$tahun' and opd_rekomendasi='$skpd_id'");
        }
        return $data->result_array();
    }

    public function get_kecamatan(){
        $hasil=$this->db->query("SELECT * FROM kecamatan");
        return $hasil;
    }

    function get_desa($id_kecamatan){
        $query = $this->db->get_where('desa', array('kecamatan_id' => $id_kecamatan));
        return $query;
    }

    function skpd(){
        $tahun=$this->session->userdata('set_tahun');
        $hasil=$this->db->query("SELECT * FROM skpd where tahun='$tahun'");
        return $hasil;
    }

    function program(){
        $tahun=$this->session->userdata('set_tahun');
        $skpd_id = $this->session->userdata('skpd');
        if ($this->session->userdata('group')==1) {
            $hasil=$this->db->query("SELECT * FROM program_2022 where tahun='$tahun'");
        } else {
            $hasil=$this->db->query("SELECT * FROM program_2022 where tahun='$tahun' and skpd_id='$skpd_id' ");
        }
        return $hasil;
    }

    function get_kegiatan($id_program){
        $query = $this->db->get_where('kegiatan_2022', array('program_id' => $id_program));
        return $query;
    }

    function get_sub_kegiatan($id_kegiatan){
        $query = $this->db->get_where('sub_kegiatan_2022', array('kegiatan_id' => $id_kegiatan));
        return $query;
    }

    public function getID()
    {
        $startdate = date('Y-m-d');

        $this->startTransaction();
        $query = $this->exec("SELECT MAX(id) as id FROM hibah_2022 WHERE DATE(created_at)='".$startdate."'");
        $this->completeTransaction();

        $max = $query->result();

        if(count($max) > 0 && $max[0]->id > 0)
        {
            $id = $max[0]->id+1;
            //str_replace('-', '', $startdate).((substr($max[0]->id, 9,4))+1);
        }else{
            $startpoint  = '1111';
            $id          = str_replace('-', '', $startdate).$startpoint;
        }

        return $id;
    }

    function simpan($tabelname,$data){
        $res=$this->db->insert($tabelname,$data);
        return $res;
    }

    public function hapus($tabelname,$where){
        $res=$this->db->delete($tabelname,$where);
        return $res;
    }

    public function GetData($where=""){
        $data=$this->db->query('select*from hibah_2022 '.$where);
        return $data->result_array();
    }
}