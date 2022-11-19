<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Index_model');
    }

    public function index()
    {
        $data['profilsekolah'] = $this->Index_model->Profil_sekolah();

        $data['title'] = 'Kontak - Pengumuman Kelulusan ' .  $data['profilsekolah']['nama_sekolah'];
        $data['system'] = $this->db->get('t_system')->row();
        $data['kontak'] = $this->db->get('t_cp')->result();

        $this->load->view('templates/index_header', $data);
        $this->load->view('public/kontak', $data);
        $this->load->view('templates/index_footer');
    }
}
