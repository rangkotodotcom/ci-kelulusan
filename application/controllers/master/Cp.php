<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cp_model');
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
        $data['profilsekolah'] = $this->Cp_model->Profil_sekolah();
        $data['title'] = $data['user']['nama'] . ' - Pengumuman Kelulusan ' . $data['profilsekolah']['nama_sekolah'];

        $data['cp'] = $this->Cp_model->getAll();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('master/cp/daftar', $data);
        $this->load->view('templates/admin_footer');
    }


    public function add()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama wajib di isi!'
        ]);

        $this->form_validation->set_rules('no_hp', 'No HP', 'required|trim|numeric', [
            'required' => 'No HP wajib di isi!',
            'numeric' => 'No HP harus angka!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['profilsekolah'] = $this->Cp_model->Profil_sekolah();
            $data['title'] = $data['user']['nama'] . ' - Pengumuman Kelulusan ' . $data['profilsekolah']['nama_sekolah'];

            $this->load->view('templates/admin_header', $data);
            $this->load->view('master/cp/tambah', $data);
            $this->load->view('templates/admin_footer');
        } else {

            $cek = $this->db->get_where('t_cp', ['nama' => $this->input->post('nama')])->num_rows();

            if ($cek < 1) {
                $cp = $this->Cp_model;
                $cp->save();
                $this->session->set_flashdata('alert', 'Contact Person Berhasil Disimpan');
                redirect(base_url('master/cp/'));
            } else {
                $this->session->set_flashdata('alert', 'Data Sudah Ada');
                redirect(base_url('master/cp/'));
            }
        }
    }

    public function edit($id = null)
    {

        if (!isset($id)) {
            redirect('master/cp');
        }

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama wajib di isi!'
        ]);

        $this->form_validation->set_rules('no_hp', 'No HP', 'required|trim|numeric', [
            'required' => 'No HP wajib di isi!',
            'numeric' => 'No HP harus angka!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['profilsekolah'] = $this->Cp_model->Profil_sekolah();
            $data['title'] = $data['user']['nama'] . ' - Pengumuman Kelulusan ' . $data['profilsekolah']['nama_sekolah'];
            $cp = $this->Cp_model;
            $data["cp"] = $cp->getById($id);
            if (!$data["cp"]) show_404();
            $this->load->view('templates/admin_header', $data);
            $this->load->view('master/cp/edit', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $cp = $this->Cp_model;
            $cp->update();
            $this->session->set_flashdata('alert', 'Contact Person Berhasil Diedit');
            redirect(base_url('master/cp/'));
        }
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->Cp_model->delete($id)) {
            redirect(site_url('master/cp/'));
        }
    }
}
