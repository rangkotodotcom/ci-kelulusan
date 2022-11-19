<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Waktupengumuman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('System_model');
        if ($this->session->userdata('email') == '') {
            redirect('auth');
        }

        if ($this->session->userdata('level') != 'admin') {
            redirect(base_url('admin/'));
        }

        if ($this->session->userdata('nama') != 'Jamilur Rusydi Al Miichtari') {
            redirect(base_url('admin/'));
        }
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['profilsekolah'] = $this->System_model->Profil_sekolah();
        $data['title'] = $data['user']['nama'] . ' - Pengumuman Kelulusan ' . $data['profilsekolah']['nama_sekolah'];

        $data['system'] = $this->System_model->getAll();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('master/system/waktupengumuman', $data);
        $this->load->view('templates/admin_footer');
    }

    public function edit($id = null)
    {

        if (!isset($id)) {
            redirect('master/waktupengumuman');
        }

        $this->form_validation->set_rules('tgl', 'Tanggal', 'required|trim', [
            'required' => 'Tanggal wajib di isi!'
        ]);

        $this->form_validation->set_rules('jam', 'Jam', 'required|trim', [
            'required' => 'Jam Pilihan wajib di isi!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['profilsekolah'] = $this->System_model->Profil_sekolah();
            $data['title'] = $data['user']['nama'] . ' - Pengumuman Kelulusan ' . $data['profilsekolah']['nama_sekolah'];
            $system = $this->System_model;
            $data["system"] = $system->getById($id);
            if (!$data["system"]) show_404();
            $this->load->view('templates/admin_header', $data);
            $this->load->view('master/system/edit_waktupengumuman', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $system = $this->System_model;
            $system->updateWaktuPengumuman();
            $this->session->set_flashdata('alert', 'Waktu Pengumuman Telah Diatur');
            redirect(base_url('master/waktupengumuman/'));
        }
    }
}
