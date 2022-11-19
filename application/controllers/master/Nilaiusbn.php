<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Nilaiusbn extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Nilaiusbn_model');
        $this->load->model('Datadiri_model');

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
        $data['profilsekolah'] = $this->Nilaiusbn_model->Profil_sekolah();
        $data['title'] = $data['user']['nama'] . ' - Pengumuman Kelulusan ' . $data['profilsekolah']['nama_sekolah'];

        $data['nilaiusbn'] = $this->Nilaiusbn_model->getAll();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('master/nilaiusbn/daftar', $data);
        $this->load->view('templates/admin_footer');
    }

    public function add()
    {

        $this->form_validation->set_rules('nama', 'Siswa', 'required|trim', [
            'required' => 'Siswa wajib dipilih!'
        ]);

        $this->form_validation->set_rules('no_pes', 'No Peserta', 'required|trim', [
            'required' => 'No Peserta wajib di isi!'
        ]);

        $this->form_validation->set_rules('pai', 'Nilai', 'required|trim|numeric', [
            'required' => 'Nilai wajib di isi!',
            'numeric' => 'Nilai harus angka!'
        ]);

        $this->form_validation->set_rules('ppkn', 'Nilai', 'required|trim|numeric', [
            'required' => 'Nilai wajib di isi!',
            'numeric' => 'Nilai harus angka!'
        ]);

        $this->form_validation->set_rules('ind', 'Nilai', 'required|trim|numeric', [
            'required' => 'Nilai wajib di isi!',
            'numeric' => 'Nilai harus angka!'
        ]);

        $this->form_validation->set_rules('mtk', 'Nilai', 'required|trim|numeric', [
            'required' => 'Nilai wajib di isi!',
            'numeric' => 'Nilai harus angka!'
        ]);

        $this->form_validation->set_rules('sejind', 'Nilai', 'required|trim|numeric', [
            'required' => 'Nilai wajib di isi!',
            'numeric' => 'Nilai harus angka!'
        ]);

        $this->form_validation->set_rules('ing', 'Nilai', 'required|trim|numeric', [
            'required' => 'Nilai wajib di isi!',
            'numeric' => 'Nilai harus angka!'
        ]);

        $this->form_validation->set_rules('senbud', 'Nilai', 'required|trim|numeric', [
            'required' => 'Nilai wajib di isi!',
            'numeric' => 'Nilai harus angka!'
        ]);

        $this->form_validation->set_rules('pjok', 'Nilai', 'required|trim|numeric', [
            'required' => 'Nilai wajib di isi!',
            'numeric' => 'Nilai harus angka!'
        ]);

        $this->form_validation->set_rules('pkwu', 'Nilai', 'required|trim|numeric', [
            'required' => 'Nilai wajib di isi!',
            'numeric' => 'Nilai harus angka!'
        ]);

        $this->form_validation->set_rules('mat_sej', 'Nilai', 'required|trim|numeric', [
            'required' => 'Nilai wajib di isi!',
            'numeric' => 'Nilai harus angka!'
        ]);

        $this->form_validation->set_rules('fis_eko', 'Nilai', 'required|trim|numeric', [
            'required' => 'Nilai wajib di isi!',
            'numeric' => 'Nilai harus angka!'
        ]);

        $this->form_validation->set_rules('kim_sos', 'Nilai', 'required|trim|numeric', [
            'required' => 'Nilai wajib di isi!',
            'numeric' => 'Nilai harus angka!'
        ]);

        $this->form_validation->set_rules('bio_geo', 'Nilai', 'required|trim|numeric', [
            'required' => 'Nilai wajib di isi!',
            'numeric' => 'Nilai harus angka!'
        ]);

        $this->form_validation->set_rules('lm', 'Nilai', 'required|trim|numeric', [
            'required' => 'Nilai wajib di isi!',
            'numeric' => 'Nilai harus angka!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['profilsekolah'] = $this->Nilaiusbn_model->Profil_sekolah();
            $data['title'] = $data['user']['nama'] . ' - Pengumuman Kelulusan ' . $data['profilsekolah']['nama_sekolah'];

            $system = $this->db->get('t_system')->row_array();
            $data['siswa'] = $this->Datadiri_model->getAll();

            $this->load->view('templates/admin_header', $data);
            $this->load->view('master/nilaiusbn/tambah', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $system = $this->db->get('t_system')->row_array();
            $cek = $this->db->get_where('t_n_us', ['no_pes' => $this->input->post('no_pes'), "tahun" => $system['tahun_data']])->num_rows();

            if ($cek < 1) {

                $nilaiusbn = $this->Nilaiusbn_model;
                $nilaiusbn->save();
                $this->session->set_flashdata('alert', 'Nilai Siswa Berhasil Disimpan');
                redirect(base_url('master/nilaiusbn/'));
            } else {
                $this->session->set_flashdata('alert', 'Nilai Siswa Sudah Ada');
                redirect(base_url('master/nilaiusbn/'));
            }
        }
    }

    public function edit($id_us = null)
    {

        if (!isset($id_us)) {
            redirect('master/nilaiusbn');
        }

        $this->form_validation->set_rules('no_pes', 'No Peserta', 'required|trim', [
            'required' => 'No Peserta wajib di isi!'
        ]);

        $this->form_validation->set_rules('pai', 'Nilai', 'required|trim|numeric', [
            'required' => 'Nilai wajib di isi!',
            'numeric' => 'Nilai harus angka!'
        ]);

        $this->form_validation->set_rules('ppkn', 'Nilai', 'required|trim|numeric', [
            'required' => 'Nilai wajib di isi!',
            'numeric' => 'Nilai harus angka!'
        ]);

        $this->form_validation->set_rules('ind', 'Nilai', 'required|trim|numeric', [
            'required' => 'Nilai wajib di isi!',
            'numeric' => 'Nilai harus angka!'
        ]);

        $this->form_validation->set_rules('mtk', 'Nilai', 'required|trim|numeric', [
            'required' => 'Nilai wajib di isi!',
            'numeric' => 'Nilai harus angka!'
        ]);

        $this->form_validation->set_rules('sejind', 'Nilai', 'required|trim|numeric', [
            'required' => 'Nilai wajib di isi!',
            'numeric' => 'Nilai harus angka!'
        ]);

        $this->form_validation->set_rules('ing', 'Nilai', 'required|trim|numeric', [
            'required' => 'Nilai wajib di isi!',
            'numeric' => 'Nilai harus angka!'
        ]);

        $this->form_validation->set_rules('senbud', 'Nilai', 'required|trim|numeric', [
            'required' => 'Nilai wajib di isi!',
            'numeric' => 'Nilai harus angka!'
        ]);

        $this->form_validation->set_rules('pjok', 'Nilai', 'required|trim|numeric', [
            'required' => 'Nilai wajib di isi!',
            'numeric' => 'Nilai harus angka!'
        ]);

        $this->form_validation->set_rules('pkwu', 'Nilai', 'required|trim|numeric', [
            'required' => 'Nilai wajib di isi!',
            'numeric' => 'Nilai harus angka!'
        ]);

        $this->form_validation->set_rules('mat_sej', 'Nilai', 'required|trim|numeric', [
            'required' => 'Nilai wajib di isi!',
            'numeric' => 'Nilai harus angka!'
        ]);

        $this->form_validation->set_rules('fis_eko', 'Nilai', 'required|trim|numeric', [
            'required' => 'Nilai wajib di isi!',
            'numeric' => 'Nilai harus angka!'
        ]);

        $this->form_validation->set_rules('kim_sos', 'Nilai', 'required|trim|numeric', [
            'required' => 'Nilai wajib di isi!',
            'numeric' => 'Nilai harus angka!'
        ]);

        $this->form_validation->set_rules('bio_geo', 'Nilai', 'required|trim|numeric', [
            'required' => 'Nilai wajib di isi!',
            'numeric' => 'Nilai harus angka!'
        ]);

        $this->form_validation->set_rules('lm', 'Nilai', 'required|trim|numeric', [
            'required' => 'Nilai wajib di isi!',
            'numeric' => 'Nilai harus angka!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['profilsekolah'] = $this->Nilaiusbn_model->Profil_sekolah();
            $data['title'] = $data['user']['nama'] . ' - Pengumuman Kelulusan ' . $data['profilsekolah']['nama_sekolah'];
            $nilaiusbn = $this->Nilaiusbn_model;
            $data["nilaiusbn"] = $nilaiusbn->getById($id_us);
            if (!$data["nilaiusbn"]) show_404();
            $this->load->view('templates/admin_header', $data);
            $this->load->view('master/nilaiusbn/edit', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $nilaiusbn = $this->Nilaiusbn_model;
            $nilaiusbn->update($id_us);
            $this->session->set_flashdata('alert', 'Nilai Siswa Berhasil Diedit');
            redirect(base_url('master/nilaiusbn/'));
        }
    }

    public function delete($no_pes = null)
    {
        if (!isset($no_pes)) show_404();

        if ($this->Nilaiusbn_model->delete($no_pes)) {
            redirect(site_url('master/nilaiusbn/'));
        }
    }
}
