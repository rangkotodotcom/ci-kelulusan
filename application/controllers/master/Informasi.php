<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Informasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Informasi_model');

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
        $data['profilsekolah'] = $this->Informasi_model->Profil_sekolah();
        $data['title'] = $data['user']['nama'] . ' - Pengumuman Kelulusan ' . $data['profilsekolah']['nama_sekolah'];

        $data['informasi'] = $this->Informasi_model->getAll();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('master/informasi/daftar', $data);
        $this->load->view('templates/admin_footer');
    }

    public function detail($id = null)
    {
        if (!isset($id)) {
            redirect('master/informasi');
        }

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['profilsekolah'] = $this->Informasi_model->Profil_sekolah();
        $data['title'] = $data['user']['nama'] . ' - Pengumuman Kelulusan ' . $data['profilsekolah']['nama_sekolah'];

        $informasi = $this->Informasi_model;
        $data["informasi"] = $informasi->getById($id);
        if (!$data["informasi"]) show_404();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('master/informasi/detail', $data);
        $this->load->view('templates/admin_footer');
    }

    public function add()
    {

        $this->form_validation->set_rules('subjek', 'Subjek', 'required|trim', [
            'required' => 'Subjek wajib diisi!'
        ]);

        $this->form_validation->set_rules('isi', 'Isi Pengumuman', 'required|trim', [
            'required' => 'Isi Pengumuman harus ada!'
        ]);

        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required|trim', [
            'required' => 'Tujuan wajib di isi!',
        ]);

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['profilsekolah'] = $this->Informasi_model->Profil_sekolah();
            $data['title'] = $data['user']['nama'] . ' - Pengumuman Kelulusan ' . $data['profilsekolah']['nama_sekolah'];

            $this->load->view('templates/admin_header', $data);
            $this->load->view('master/informasi/tambah', $data);
            $this->load->view('templates/admin_footer');
        } else {

            $informasi = $this->Informasi_model;
            $informasi->save();
            $this->session->set_flashdata('alert', 'Informasi Berhasil Disimpan');
            redirect(base_url('master/informasi/'));
        }
    }

    public function edit($id = null)
    {

        if (!isset($id)) {
            redirect('master/informasi');
        }

        $this->form_validation->set_rules('subjek', 'Subjek', 'required|trim', [
            'required' => 'Subjek wajib diisi!'
        ]);

        $this->form_validation->set_rules('isi', 'Isi Pengumuman', 'required|trim', [
            'required' => 'Isi Pengumuman harus ada!'
        ]);

        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required|trim', [
            'required' => 'Tujuan wajib di isi!',
        ]);

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['profilsekolah'] = $this->Informasi_model->Profil_sekolah();
            $data['title'] = $data['user']['nama'] . ' - Pengumuman Kelulusan ' . $data['profilsekolah']['nama_sekolah'];
            $informasi = $this->Informasi_model;
            $data["informasi"] = $informasi->getById($id);
            if (!$data["informasi"]) show_404();
            $this->load->view('templates/admin_header', $data);
            $this->load->view('master/informasi/edit', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $informasi = $this->Informasi_model;
            $informasi->update();
            $this->session->set_flashdata('alert', 'Informasi Berhasil Diedit');
            redirect(base_url('master/informasi/'));
        }
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->Informasi_model->delete($id)) {
            redirect(site_url('master/informasi/'));
        }
    }
}
