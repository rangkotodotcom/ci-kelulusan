<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Datadiri extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
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
        $data['profilsekolah'] = $this->Datadiri_model->Profil_sekolah();
        $data['title'] = $data['user']['nama'] . ' - Pengumuman Kelulusan ' . $data['profilsekolah']['nama_sekolah'];

        $data['datadiri'] = $this->Datadiri_model->getAll();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('master/datadiri/daftar', $data);
        $this->load->view('templates/admin_footer');
    }

    public function detail($id = null)
    {
        if (!isset($id)) {
            redirect('master/datadiri');
        }

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['profilsekolah'] = $this->Datadiri_model->Profil_sekolah();
        $data['title'] = $data['user']['nama'] . ' - Pengumuman Kelulusan ' . $data['profilsekolah']['nama_sekolah'];

        $datadiri = $this->Datadiri_model;
        $data["datadiri"] = $datadiri->getById($id);
        
        if (!$data["datadiri"]) show_404();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('master/datadiri/detail', $data);
        $this->load->view('templates/admin_footer');
    }

    public function add()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama wajib di isi!'
        ]);

        $this->form_validation->set_rules('t_lahir', 'Tempat Lahir', 'required|trim', [
            'required' => 'Tempat Lahir wajib di isi!'
        ]);

        $this->form_validation->set_rules('tgl_lhr', 'Tanggal Lahir', 'required|trim', [
            'required' => 'Tanggal Lahir wajib di isi!'
        ]);

        $this->form_validation->set_rules('n_ortu', 'Nama Orang Tua', 'required|trim', [
            'required' => 'Nama Orang Tua wajib di isi!'
        ]);

        $this->form_validation->set_rules('nis', 'NIS', 'required|trim|numeric', [
            'required' => 'NIS wajib di isi!',
            'numeric' => 'NIS harus angka!'
        ]);

        $this->form_validation->set_rules('nisn', 'NISN', 'required|trim|numeric|max_length[10]', [
            'required' => 'NISN wajib di isi!',
            'numeric' => 'NISN harus angka!',
            'max_length' => 'NISN harus 10 karakter!'
        ]);

        $this->form_validation->set_rules('no_pes', 'No Peserta', 'required|trim', [
            'required' => 'No Peserta wajib di isi!'
        ]);

        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim', [
            'required' => 'Jurusan wajib di isi!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['profilsekolah'] = $this->Datadiri_model->Profil_sekolah();
            $data['title'] = $data['user']['nama'] . ' - Pengumuman Kelulusan ' . $data['profilsekolah']['nama_sekolah'];

            $this->load->view('templates/admin_header', $data);
            $this->load->view('master/datadiri/tambah', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $system = $this->db->get('t_system')->row_array();
            $cek = $this->db->get_where('t_bio_siswa', ['no_pes' => $this->input->post('no_pes'), "tahun" => $system['tahun_data']])->num_rows();

            if ($cek < 1) {
                $datadiri = $this->Datadiri_model;
                $datadiri->save();
                $this->session->set_flashdata('alert', 'Data Siswa Berhasil Disimpan');
                redirect(base_url('master/datadiri/'));
            } else {
                $this->session->set_flashdata('alert', 'Data Siswa Sudah Ada');
                redirect(base_url('master/datadiri/'));
            }
        }
    }

    public function edit($id = null)
    {

        if (!isset($id)) {
            redirect('master/datadiri');
        }

        $this->form_validation->set_rules('id', 'ID', 'required|trim', [
            'required' => 'Nama wajib di isi!'
        ]);

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama wajib di isi!'
        ]);

        $this->form_validation->set_rules('t_lahir', 'Tempat Lahir', 'required|trim', [
            'required' => 'Tempat Lahir wajib di isi!'
        ]);

        $this->form_validation->set_rules('tgl_lhr', 'Tanggal Lahir', 'required|trim', [
            'required' => 'Tanggal Lahir wajib di isi!'
        ]);

        $this->form_validation->set_rules('n_ortu', 'Nama Orang Tua', 'required|trim', [
            'required' => 'Nama Orang Tua wajib di isi!'
        ]);

        $this->form_validation->set_rules('nis', 'NIS', 'required|trim|numeric', [
            'required' => 'NIS wajib di isi!',
            'numeric' => 'NIS harus angka!'
        ]);

        $this->form_validation->set_rules('nisn', 'NISN', 'required|trim|numeric', [
            'required' => 'NISN wajib di isi!',
            'numeric' => 'NISN harus angka!'
        ]);

        $this->form_validation->set_rules('no_pes', 'No Peserta', 'required|trim', [
            'required' => 'No Peserta wajib di isi!'
        ]);

        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim', [
            'required' => 'Jurusan wajib di isi!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['profilsekolah'] = $this->Datadiri_model->Profil_sekolah();
            $data['title'] = $data['user']['nama'] . ' - Pengumuman Kelulusan ' . $data['profilsekolah']['nama_sekolah'];
            $datadiri = $this->Datadiri_model;
            $data["datadiri"] = $datadiri->getById($id);
            if (!$data["datadiri"]) show_404();
            $this->load->view('templates/admin_header', $data);
            $this->load->view('master/datadiri/edit', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $datadiri = $this->Datadiri_model;
            $datadiri->update();
            $this->session->set_flashdata('alert', 'Data Siswa Berhasil Diedit');
            redirect(base_url('master/datadiri/'));
        }
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->Datadiri_model->delete($id)) {
            redirect(base_url('master/datadiri/'));
        }
    }

    // public function get_detail()
    // {
    //     $no_pes = $this->input->post('no_pes');
    //     $biodata = $this->db->query("SELECT * FROM t_bio_siswa WHERE no_pes = '$no_pes' ")->row_array();
    //     $jur = $biodata['jurusan'];
    //     $data = $this->db->query("SELECT * FROM t_mapel_pil WHERE jurusan = '$jur'");
    //     echo json_encode($data);
    // }
}
