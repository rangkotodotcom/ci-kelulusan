<?php defined('BASEPATH') or exit('No direct script access allowed');

class Nilaiun_model extends CI_Model
{
    private $_table = "t_n_un";

    public $no_pes;
    public $mapel_pil;
    public $bin;
    public $bing;
    public $mat;
    public $pil;
    public $ket;

    public function Profil_sekolah()
    {
        return $this->db->get('t_profilsekolah')->row_array();
    }

    public function getAll()
    {
        $system = $this->db->get('t_system')->row_array();
        return $this->db->get_where($this->_table, ["tahun" => $system['tahun_data']])->result();
    }

    public function getById($no_pes)
    {
        $system = $this->db->get('t_system')->row_array();
        return $this->db->get_where($this->_table, ["no_pes" => $no_pes, "tahun" => $system['tahun_data']])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->no_pes = $post["no_pes"];
        $this->mapel_pil = ucwords($post["mapel_pil"]);
        $this->bin = $post["bin"];
        $this->bing = $post["bing"];
        $this->mat = $post["mat"];
        $this->pil = $post["pil"];
        $this->ket = $post["ket"];
        $this->tahun = date('Y');
        $this->db->insert($this->_table, $this);

        $data = [
            'kegiatan' => 'Tambah Nilai UN (' . $this->no_pes = $post["no_pes"] . ')',
            'oleh' => $this->session->userdata('email'),
            'waktu' => NULL
        ];

        $this->db->insert('t_history', $data);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->no_pes = $post["no_pes"];
        $this->mapel_pil = $post["mapel_pil"];
        $this->bin = $post["bin"];
        $this->bing = $post["bing"];
        $this->mat = $post["mat"];
        $this->pil = $post["pil"];
        $this->ket = $post["ket"];
        $this->tahun = $post["tahun"];
        $this->db->update($this->_table, $this, array("no_pes" => $post['no_pes']));

        $data = [
            'kegiatan' => 'Edit Nilai UN (' . $this->no_pes = $post["no_pes"] . ')',
            'oleh' => $this->session->userdata('email'),
            'waktu' => NULL
        ];

        $this->db->insert('t_history', $data);
    }

    public function delete($no_pes)
    {
        $data = [
            'kegiatan' => 'Hapus Nilai UN (' . $no_pes . ')',
            'oleh' => $this->session->userdata('email'),
            'waktu' => NULL
        ];

        $this->db->insert('t_history', $data);

        return $this->db->delete($this->_table, array("no_pes" => $no_pes));
    }
}
