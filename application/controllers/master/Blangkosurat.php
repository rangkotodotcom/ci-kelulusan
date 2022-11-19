<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Blangkosurat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Blangkosurat_model');
        if ($this->session->userdata('email') == '') {
            redirect('auth');
        }

        if ($this->session->userdata('level') != 'admin') {
            redirect(base_url('admin/'));
        }
    }

    public function index()
    {
        $data['profilsekolah'] = $this->Blangkosurat_model->Profil_sekolah();
        $data['blangkosurat'] = $this->Blangkosurat_model->getAll();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = $data['user']['nama'] . ' - Pengumuman Kelulusan ' . $data['profilsekolah']->nama_sekolah;


        $this->load->view('templates/admin_header', $data);
        $this->load->view('master/blangko/index', $data);
        $this->load->view('templates/admin_footer');
    }

    public function edit($id = null)
    {

        if (!isset($id)) {
            redirect('master/blangkosurat');
        }

        $this->form_validation->set_rules('id', 'ID', 'required|trim', [
            'required' => 'ID wajib di isi!'
        ]);

        $this->form_validation->set_rules('nama_surat', 'Nama Surat', 'required|trim', [
            'required' => 'Nama Surat wajib di isi!'
        ]);

        $this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'required|trim', [
            'required' => 'Nomor Surat wajib di isi!'
        ]);

        $this->form_validation->set_rules('tempat_surat', 'Tempat Surat', 'required|trim', [
            'required' => 'Tempat Surat wajib di isi!'
        ]);

        $this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'required|trim', [
            'required' => 'Tanggal Surat wajib di isi!'
        ]);

        $this->form_validation->set_rules('p_us', 'Sekolah Penyelenggaran US', 'required|trim', [
            'required' => 'Sekolah Penyelenggaran US wajib di isi!'
        ]);

        $this->form_validation->set_rules('p_un', 'Sekolah Penyelenggara UN', 'required|trim', [
            'required' => 'Sekolah Penyelenggara UN wajib di isi!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['profilsekolah'] = $this->Blangkosurat_model->Profil_sekolah();
            $data['blangkosurat'] = $this->Blangkosurat_model->getAll();
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = $data['user']['nama'] . ' - Pengumuman Kelulusan ' . $data['profilsekolah']->nama_sekolah;
            $blangkosurat = $this->Blangkosurat_model;
            if (!$data["blangkosurat"]) show_404();
            $this->load->view('templates/admin_header', $data);
            $this->load->view('master/blangko/edit', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $blangkosurat = $this->Blangkosurat_model;
            $blangkosurat->update();
            $this->session->set_flashdata('alert', 'Blangko Surat Berhasil Diedit');
            redirect(base_url('master/blangkosurat/'));
        }
    }
}
