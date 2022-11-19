<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notfound extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Index_model');
    }

    public function index()
    {
        $data['profilsekolah'] = $this->Index_model->Profil_sekolah();
        $data['title'] = '404 - Pengumuman Kelulusan ' . $data['profilsekolah']['nama_sekolah'];

        $this->load->view('errors/404', $data);
    }
}
