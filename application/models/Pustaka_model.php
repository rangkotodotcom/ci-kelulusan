<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pustaka_model extends CI_Model
{
    private $_table = "t_adm";

    public $no_pes;
    public $komite;
    public $pustaka;

    public function Profil_sekolah()
    {
        return $this->db->get('t_profilsekolah')->row_array();
    }

    public function getAll()
    {
        $system = $this->db->get('t_system')->row_array();

        $this->db->select('*');
        $this->db->from('t_adm');
        $this->db->join('t_bio_siswa', 't_bio_siswa.no_pes = t_adm.no_pes');
        $this->db->where('pustaka', '1');
        $this->db->where('tahun_adm', $system['tahun_data']);

        return $this->db->get()->result();
    }

    public function getById($id)
    {
        $system = $this->db->get('t_system')->row_array();
        return $this->db->get_where($this->_table, ["id" => $id, "tahun_adm" => $system['tahun_data']])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->no_pes = $post["no_pes"];
        $this->komite = '0';
        $this->pustaka = '1';
        $this->tahun_adm = date('Y');
        $this->db->insert($this->_table, $this);

        $data = [
            'kegiatan' => 'Tambah Siswa Bebas Pustaka (' . $this->no_pes = $post["no_pes"] . ')',
            'oleh' => $this->session->userdata('email'),
            'waktu' => NULL
        ];

        $this->db->insert('t_history', $data);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->no_pes = $post["no_pes"];
        $this->pustaka = '1';
        $this->db->update($this->_table, ["pustaka" => $this->pustaka], array("no_pes" => $post['no_pes']));

        $data = [
            'kegiatan' => 'Tambah Siswa Bebas Pustaka (' . $this->no_pes = $post["no_pes"] . ')',
            'oleh' => $this->session->userdata('email'),
            'waktu' => NULL
        ];

        $this->db->insert('t_history', $data);
    }

    public function delete($no_pes)
    {
        $data = [
            'kegiatan' => 'Hapus Siswa Bebas Pustaka (' . $no_pes . ')',
            'oleh' => $this->session->userdata('email'),
            'waktu' => NULL
        ];

        $this->db->insert('t_history', $data);

        $this->pustaka = '0';
        return $this->db->update($this->_table, ["pustaka" => $this->pustaka], array("no_pes" => $no_pes));
    }
}
