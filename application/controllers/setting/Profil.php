<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['profilsekolah'] = $this->Admin_model->Profil_sekolah();
        $data['title'] = $data['user']['nama'] . ' - Pengumuman Kelulusan ' . $data['profilsekolah']['nama_sekolah'];

        if ($this->session->userdata('email') == '') {
            redirect('auth');
        } else {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('admin/profil', $data);
            $this->load->view('templates/admin_footer');
        }
    }

    public function editprofil()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['profilsekolah'] = $this->Admin_model->Profil_sekolah();
        $data['title'] = $data['user']['nama'] . ' - Pengumuman Kelulusan ' . $data['profilsekolah']['nama_sekolah'];

        if ($this->session->userdata('email') == '') {
            redirect('auth');
        } else {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('admin/editprofil', $data);
            $this->load->view('templates/admin_footer');
        }
    }
}
