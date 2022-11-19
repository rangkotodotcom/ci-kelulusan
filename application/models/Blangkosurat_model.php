<?php defined('BASEPATH') or exit('No direct script access allowed');

class Blangkosurat_model extends CI_Model
{

    private $_table = "t_blangko";

    public $id;
    public $nama_surat;
    public $nomor_surat;
    public $tempat_surat;
    public $tanggal_surat;
    public $p_us;
    public $p_un;
    public $last_update;

    public function Profil_sekolah()
    {
        return $this->db->get('t_profilsekolah')->row();
    }

    public function getAll()
    {
        return $this->db->get_where($this->_table, ["id" => "1"])->row();
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->nama_surat = strtoupper($post["nama_surat"]);
        $this->nomor_surat = $post["nomor_surat"];
        $this->tempat_surat = ucwords($post["tempat_surat"]);
        $this->tanggal_surat = $post["tanggal_surat"];
        $this->p_us = ucwords($post["p_us"]);
        $this->p_un = ucwords($post["p_un"]);
        $this->last_update = NULL;
        $this->db->update($this->_table, $this, ["id" => $post['id']]);

        $data = [
            'kegiatan' => 'Edit Blangko Surat',
            'oleh' => $this->session->userdata('email'),
            'waktu' => NULL
        ];

        $this->db->insert('t_history', $data);
    }
}
