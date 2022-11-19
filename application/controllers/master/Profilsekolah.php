<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profilsekolah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profilsekolah_model');
        if ($this->session->userdata('email') == '') {
            redirect('auth');
        }

        if ($this->session->userdata('level') != 'admin') {
            redirect(base_url('admin/'));
        }
    }

    public function index()
    {
        $data['profilsekolah'] = $this->Profilsekolah_model->getAll();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = $data['user']['nama'] . ' - Pengumuman Kelulusan ' . $data['profilsekolah']->nama_sekolah;


        $this->load->view('templates/admin_header', $data);
        $this->load->view('master/profilsekolah/index', $data);
        $this->load->view('templates/admin_footer');
    }

    public function edit($id = null)
    {

        if (!isset($id)) {
            redirect('master/profilsekolah');
        }

        $this->form_validation->set_rules('id', 'ID', 'required|trim', [
            'required' => 'NPSN wajib di isi!'
        ]);

        $this->form_validation->set_rules('npsn', 'NPSN', 'required|trim|numeric', [
            'required' => 'NPSN wajib di isi!',
            'numeric' => 'NPSN harus angka!'
        ]);

        $this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah', 'required|trim', [
            'required' => 'Nama Sekolah wajib di isi!'
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Alamat wajib di isi!'
        ]);

        $this->form_validation->set_rules('daerah', 'Daerah Tingkat II', 'required|trim', [
            'required' => 'Daerah Tingkat II wajib di isi!'
        ]);

        $this->form_validation->set_rules('kab_kota', 'Kab / Kota', 'required|trim', [
            'required' => 'Kab / Kota wajib di isi!'
        ]);

        $this->form_validation->set_rules('prov', 'Provinsi', 'required|trim', [
            'required' => 'Provinsi wajib di isi!'
        ]);

        $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required|trim|numeric', [
            'required' => 'Kode Pos wajib di isi!',
            'numeric' => 'Kode Pos harus angka!'
        ]);

        $this->form_validation->set_rules('telp', 'Telp', 'required|trim|numeric', [
            'required' => 'Telp wajib di isi!',
            'numeric' => 'Telp harus angka!'
        ]);

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email wajib di isi!',
            'valid_email' => 'Email tidak valid'
        ]);

        $this->form_validation->set_rules('website', 'Website', 'required|trim', [
            'required' => 'Website wajib di isi!'
        ]);

        $this->form_validation->set_rules('kepsek', 'Nama Kepala Sekolah', 'required|trim', [
            'required' => 'Kepala Sekolah wajib di isi!'
        ]);

        $this->form_validation->set_rules('nip_kepsek', 'NIP Kepala Sekolah', 'required|trim', [
            'required' => 'NIP Kepala Sekolah wajib di isi!'
        ]);

        $this->form_validation->set_rules('tahun_ajaran', 'Tahun Ajaran', 'required|trim', [
            'required' => 'Tahun Ajaran wajib di isi!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['profilsekolah'] = $this->Profilsekolah_model->getAll();
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = $data['user']['nama'] . ' - Pengumuman Kelulusan ' . $data['profilsekolah']->nama_sekolah;
            $profilsekolah = $this->Profilsekolah_model;
            if (!$data["profilsekolah"]) show_404();
            $this->load->view('templates/admin_header', $data);
            $this->load->view('master/profilsekolah/edit', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $profilsekolah = $this->Profilsekolah_model;
            $profilsekolah->update();
            $this->session->set_flashdata('alert', 'Profil Sekolah Berhasil Diedit');
            redirect(base_url('master/profilsekolah/'));
        }
    }
}
