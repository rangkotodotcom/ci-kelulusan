<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lisensi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Index_model');
    }

    public function index()
    {
        $data['profilsekolah'] = $this->Index_model->Profil_sekolah();
        $data['title'] = 'Lisensi - Pengumuman Kelulusan ' . $data['profilsekolah']['nama_sekolah'];

        $this->load->view('errors/lisensi', $data);
    }
}
