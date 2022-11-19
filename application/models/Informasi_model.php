<?php defined('BASEPATH') or exit('No direct script access allowed');

class Informasi_model extends CI_Model
{
    private $_table = "t_info";

    public $id;
    public $subjek;
    public $isi;
    public $tujuan;
    public $tanggal_kirim;
    public $tahun_info;

    public function Profil_sekolah()
    {
        return $this->db->get('t_profilsekolah')->row_array();
    }

    public function getAll()
    {
        $system = $this->db->get('t_system')->row_array();

        $this->db->select('*');
        $this->db->from('t_info');
        $this->db->where('tahun_info', $system['tahun_data']);
        $this->db->order_by('tanggal_kirim', 'DESC');

        return $this->db->get()->result();
    }

    public function getById($id)
    {
        $system = $this->db->get('t_system')->row_array();
        return $this->db->get_where($this->_table, ["id" => $id, "tahun_info" => $system['tahun_data']])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id = '';
        $this->subjek = ucwords($post["subjek"]);
        $this->isi = $post["isi"];
        $this->tujuan = $post["tujuan"];
        $this->tanggal_kirim = NULL;
        $this->tahun_info = date('Y');
        $this->db->insert($this->_table, $this);

        $data = [
            'kegiatan' => 'Tambah Informasi (' . $this->subjek = ucwords($post["subjek"]) . ')',
            'oleh' => $this->session->userdata('email'),
            'waktu' => NULL
        ];

        $this->db->insert('t_history', $data);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->subjek = ucwords($post["subjek"]);
        $this->isi = $post["isi"];
        $this->tujuan = $post["tujuan"];
        $this->tanggal_kirim = NULL;
        $this->tahun_info = $post["tahun_info"];
        $this->db->update($this->_table, $this, array("id" => $post['id']));

        $data = [
            'kegiatan' => 'Edit Informasi (' . $this->subjek = ucwords($post["subjek"]) . ')',
            'oleh' => $this->session->userdata('email'),
            'waktu' => NULL
        ];

        $this->db->insert('t_history', $data);
    }

    public function delete($id)
    {

        $info = $this->db->get_where('t_info', ["id" => $id])->row_array();

        $data = [
            'kegiatan' => 'Hapus Informasi (' . $info['subjek'] . ')',
            'oleh' => $this->session->userdata('email'),
            'waktu' => NULL
        ];

        $this->db->insert('t_history', $data);

        return $this->db->delete($this->_table, array("id" => $id));
    }
}
