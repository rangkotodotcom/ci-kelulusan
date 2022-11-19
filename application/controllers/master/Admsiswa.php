<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admsiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');

        if ($this->session->userdata('email') == '') {
            redirect('auth');
        }

        if ($this->session->userdata('level') != 'admin') {
            redirect(base_url('admin/'));
        }
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['profilsekolah'] = $this->Admin_model->Profil_sekolah();
        $data['title'] = $data['user']['nama'] . ' - Pengumuman Kelulusan ' . $data['profilsekolah']['nama_sekolah'];

        $system = $this->db->get('t_system')->row_array();

        $this->db->select('*');
        $this->db->from('t_adm');
        $this->db->join('t_bio_siswa', 't_bio_siswa.no_pes = t_adm.no_pes');
        $this->db->where('tahun_adm', $system["tahun_data"]);
        $data['admsiswa'] = $this->db->get()->result();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('master/admsiswa/daftar', $data);
        $this->load->view('templates/admin_footer');
    }
}
