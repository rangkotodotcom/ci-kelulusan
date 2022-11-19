<?php defined('BASEPATH') or exit('No direct script access allowed');

class System_model extends CI_Model
{

    private $_table = "t_system";

    public $id;
    public $tgl;
    public $jam;
    public $waktu_pengumuman;
    public $tahun;
    public $akses;

    public function Profil_sekolah()
    {
        return $this->db->get('t_profilsekolah')->row_array();
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function updateWaktuPengumuman()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->tgl = $post["tgl"];
        $this->jam = $post["jam"];
        $this->waktu_pengumuman = $this->tgl . ' ' . $this->jam . ':00';
        $this->db->update($this->_table, ["waktu_pengumuman" => $this->waktu_pengumuman], array("id" => $post['id']));
    }

    public function updateTahundata()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->tahun = $post["tahun"];
        $this->db->update($this->_table, ["tahun_data" => $this->tahun], array("id" => $post['id']));
    }

    public function updateAkses()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->akses = $post["akses"];
        $this->db->update($this->_table, ["akses" => $this->akses], array("id" => $post['id']));
    }
}
