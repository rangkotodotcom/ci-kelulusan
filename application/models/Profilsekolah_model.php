<?php defined('BASEPATH') or exit('No direct script access allowed');

class Profilsekolah_model extends CI_Model
{

    private $_table = "t_profilsekolah";

    public $id;
    public $npsn;
    public $nama_sekolah;
    public $alamat;
    public $daerah;
    public $kab_kota;
    public $prov;
    public $kode_pos;
    public $telp;
    public $email;
    public $website;
    public $logo_prov;
    public $logo_sekolah;
    public $kepsek;
    public $nip_kepsek;
    public $last_update;


    public function getAll()
    {
        return $this->db->get_where($this->_table, ["id" => "1"])->row();
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->npsn = $post["npsn"];
        $this->nama_sekolah = strtoupper($post["nama_sekolah"]);
        $this->alamat = ucwords($post["alamat"]);
        $this->daerah = $post["daerah"];
        $this->kab_kota = ucwords($post["kab_kota"]);
        $this->prov = ucwords($post["prov"]);
        $this->kode_pos = $post["kode_pos"];
        $this->telp = $post["telp"];
        $this->email = $post["email"];
        $this->website = $post["website"];
        if (!empty($_FILES["logo_prov"]["name"]) && !empty($_FILES["logo_sekolah"]["name"])) {
            $this->logo_prov = $this->_uploadLogoprov();
            $this->logo_sekolah = $this->_uploadLogosekolah();
        } else if (!empty($_FILES["logo_prov"]["name"])) {
            $this->logo_prov = $this->_uploadLogoprov();
            $this->logo_sekolah = $post["old_logo_sekolah"];
        } else if (!empty($_FILES["logo_sekolah"]["name"])) {
            $this->logo_prov = $post["old_logo_prov"];
            $this->logo_sekolah = $this->_uploadLogosekolah();
        } else {
            $this->logo_prov = $post["old_logo_prov"];
            $this->logo_sekolah = $post["old_logo_sekolah"];
        }
        $this->kepsek = $post["kepsek"];
        $this->nip_kepsek = $post["nip_kepsek"];
        $this->tahun_ajaran = $post["tahun_ajaran"];
        $this->last_update = NULL;
        $this->db->update($this->_table, $this, ["id" => $post['id']]);

        $data = [
            'kegiatan' => 'Edit Profil Sekolah',
            'oleh' => $this->session->userdata('email'),
            'waktu' => NULL
        ];

        $this->db->insert('t_history', $data);
    }

    private function _uploadLogoprov()
    {
        $config['upload_path']          = './upload/logo/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['file_name']            = 'Logo_Prov_' . $this->prov;
        $config['overwrite']            = true;
        $config['max_size']             = 512; // 0,5MB
        $config['max_width']            = 244;
        $config['max_height']           = 300;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('logo_prov')) {
            return $this->upload->data("file_name");
        }

        return "prov.png";
    }

    private function _uploadLogosekolah()
    {
        $config['upload_path']          = './upload/logo/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['file_name']            = 'Logo_Sekolah_' . $this->npsn;
        $config['overwrite']            = true;
        $config['max_size']             = 512; // 0,5MB
        $config['max_width']            = 300;
        $config['max_height']           = 303;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('logo_sekolah')) {
            return $this->upload->data("file_name");
        }

        return "pdd.png";
    }
}
