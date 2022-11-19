<?php defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class Datadiri_model extends CI_Model
{

    private $_table = "t_bio_siswa";

    public $id;
    public $nama;
    public $t_lahir;
    public $tgl_lhr;
    public $n_ortu;
    public $nis;
    public $nisn;
    public $no_pes;
    public $jurusan;
    public $foto;

    
    public function Profil_sekolah()
    {
        return $this->db->get('t_profilsekolah')->row_array();
    }

    public function getAll()
    {
        $system = $this->db->get('t_system')->row_array();
        return $this->db->get_where($this->_table, ["tahun" => $system['tahun_data']])->result();
    }

    public function getById($id)
    {
        $system = $this->db->get('t_system')->row_array();
        return $this->db->get_where($this->_table, ["id" => $id, "tahun" => $system['tahun_data']])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id = '';
        $this->nama = strtoupper($post["nama"]);
        $this->t_lahir = ucwords($post["t_lahir"]);
        $this->tgl_lhr = $post["tgl_lhr"];
        $this->n_ortu = ucwords($post["n_ortu"]);
        $this->nis = $post["nis"];
        $this->nisn = $post["nisn"];
        $this->no_pes = $post["no_pes"];
        $this->jurusan = $post["jurusan"];
        $this->foto = $this->_uploadFoto();
        $this->tahun = date('Y');
        $this->db->insert($this->_table, $this);

        $data = [
            'kegiatan' => 'Tambah Data (' . $this->no_pes = $post["no_pes"] . ')',
            'oleh' => $this->session->userdata('email'),
            'waktu' => NULL
        ];

        $this->db->insert('t_history', $data);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->nama = strtoupper($post["nama"]);
        $this->t_lahir = ucwords($post["t_lahir"]);
        $this->tgl_lhr = $post["tgl_lhr"];
        $this->n_ortu = ucwords($post["n_ortu"]);
        $this->nis = $post["nis"];
        $this->nisn = $post["nisn"];
        $this->no_pes = $post["no_pes"];
        $this->jurusan = $post["jurusan"];
        if (!empty($_FILES["foto"]["name"])) {
            $this->foto = $this->_uploadFoto();
        } else {
            $this->foto = $post["old_foto"];
        }
        $this->tahun = $post["tahun"];
        $this->db->update($this->_table, $this, array("id" => $post['id']));

        $data = [
            'kegiatan' => 'Edit Data (' . $this->no_pes = $post["no_pes"] . ')',
            'oleh' => $this->session->userdata('email'),
            'waktu' => NULL
        ];

        $this->db->insert('t_history', $data);
    }

    public function delete($id)
    {
        $siswa = $this->db->get_where('t_bio_siswa', ["id" => $id])->row_array();

        $data = [
            'kegiatan' => 'Hapus Data (' . $siswa['no_pes'] . ')',
            'oleh' => $this->session->userdata('email'),
            'waktu' => NULL
        ];

        $this->db->insert('t_history', $data);

        $this->_deleteFoto($id);
        return $this->db->delete($this->_table, array("id" => $id));

        $data = [
            'kegiatan' => 'Hapus Siswa (' . $id . ')',
            'oleh' => $this->session->userdata('email'),
            'waktu' => NULL
        ];

        $this->db->insert('t_history', $data);
    }

    private function _uploadFoto()
    {
        $config['upload_path']          = './upload/siswa/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['file_name']            = $this->no_pes;
        $config['overwrite']            = true;
        $config['max_size']             = 512; // 0,5MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }

    private function _deleteFoto($id)
    {
        $dd = $this->getById($id);
        if ($dd->foto != "default.jpg") {
            $filename = explode(".", $dd->foto)[0];
            return array_map('unlink', glob(FCPATH . "upload/siswa/$filename.*"));
        }
    }
}
