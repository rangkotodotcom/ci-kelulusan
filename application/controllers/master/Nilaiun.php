<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Nilaiun extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Nilaiun_model');
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
        $data['profilsekolah'] = $this->Nilaiun_model->Profil_sekolah();
        $data['title'] = $data['user']['nama'] . ' - Pengumuman Kelulusan ' . $data['profilsekolah']['nama_sekolah'];

        $data['nilaiun'] = $this->Nilaiun_model->getAll();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('master/nilaiun/daftar', $data);
        $this->load->view('templates/admin_footer');
    }

    public function add()
    {

        $this->form_validation->set_rules('nama', 'Siswa', 'required|trim', [
            'required' => 'Siswa wajib dipilih!'
        ]);

        $this->form_validation->set_rules('no_pes', 'No Peserta', 'required|trim', [
            'required' => 'No Peserta wajib diisi!'
        ]);

        $this->form_validation->set_rules('mapel_pil', 'Mapel Pilihan', 'required|trim', [
            'required' => 'Mapel Pilihan wajib diisi!'
        ]);

        $this->form_validation->set_rules('bin', 'Nilai', 'required|trim|numeric', [
            'required' => 'Nilai wajib diisi!',
            'numeric' => 'Nilai harus angka!'
        ]);

        $this->form_validation->set_rules('bing', 'Nilai', 'required|trim|numeric', [
            'required' => 'Nilai wajib diisi!',
            'numeric' => 'Nilai harus angka!'
        ]);

        $this->form_validation->set_rules('mat', 'Nilai', 'required|trim|numeric', [
            'required' => 'Nilai wajib diisi!',
            'numeric' => 'Nilai harus angka!'
        ]);

        $this->form_validation->set_rules('pil', 'Nilai', 'required|trim|numeric', [
            'required' => 'Nilai wajib diisi!',
            'numeric' => 'Nilai harus angka!'
        ]);

        $this->form_validation->set_rules('ket', 'Keterangan', 'required|trim', [
            'required' => 'Keterangan wajib diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['profilsekolah'] = $this->Nilaiun_model->Profil_sekolah();
            $data['title'] = $data['user']['nama'] . ' - Pengumuman Kelulusan ' . $data['profilsekolah']['nama_sekolah'];

            $system = $this->db->get('t_system')->row_array();
            $data['siswa'] = $this->db->get_where('t_bio_siswa', ['tahun' => $system['tahun_data']])->result();

            $this->load->view('templates/admin_header', $data);
            $this->load->view('master/nilaiun/tambah', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $system = $this->db->get('t_system')->row_array();
            $cek = $this->db->get_where('t_n_un', ['no_pes' => $this->input->post('no_pes'), "tahun" => $system['tahun_data']])->num_rows();

            if ($cek < 1) {

                $nilaiun = $this->Nilaiun_model;
                $nilaiun->save();
                $this->session->set_flashdata('alert', 'Nilai Siswa Berhasil Disimpan');
                redirect(base_url('master/nilaiun/'));
            } else {
                $this->session->set_flashdata('alert', 'Nilai Siswa Sudah Ada');
                redirect(base_url('master/nilaiun/'));
            }
        }
    }

    public function edit($no_pes = null)
    {

        if (!isset($no_pes)) {
            redirect('master/nilaiun');
        }

        $this->form_validation->set_rules('no_pes', 'No Peserta', 'required|trim', [
            'required' => 'No Peserta wajib di isi!'
        ]);

        $this->form_validation->set_rules('mapel_pil', 'Mapel Pilihan', 'required|trim', [
            'required' => 'Mapel Pilihan wajib di isi!'
        ]);

        $this->form_validation->set_rules('bin', 'Nilai', 'required|trim|numeric', [
            'required' => 'Nilai wajib di isi!',
            'numeric' => 'Nilai harus angka!'
        ]);

        $this->form_validation->set_rules('bing', 'Nilai', 'required|trim|numeric', [
            'required' => 'Nilai wajib di isi!',
            'numeric' => 'Nilai harus angka!'
        ]);

        $this->form_validation->set_rules('mat', 'Nilai', 'required|trim|numeric', [
            'required' => 'Nilai wajib di isi!',
            'numeric' => 'Nilai harus angka!'
        ]);

        $this->form_validation->set_rules('pil', 'Nilai', 'required|trim|numeric', [
            'required' => 'Nilai wajib di isi!',
            'numeric' => 'Nilai harus angka!'
        ]);

        $this->form_validation->set_rules('ket', 'Keterangan', 'required|trim', [
            'required' => 'Keterangan wajib di isi!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['profilsekolah'] = $this->Nilaiun_model->Profil_sekolah();
            $data['title'] = $data['user']['nama'] . ' - Pengumuman Kelulusan ' . $data['profilsekolah']['nama_sekolah'];
            $nilaiun = $this->Nilaiun_model;
            $data["nilaiun"] = $nilaiun->getById($no_pes);
            if (!$data["nilaiun"]) show_404();
            $this->load->view('templates/admin_header', $data);
            $this->load->view('master/nilaiun/edit', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $nilaiun = $this->Nilaiun_model;
            $nilaiun->update();
            $this->session->set_flashdata('alert', 'Nilai Siswa Berhasil Diedit');
            redirect(base_url('master/nilaiun/'));
        }
    }

    public function delete($no_pes = null)
    {
        if (!isset($no_pes)) show_404();

        if ($this->Nilaiun_model->delete($no_pes)) {
            redirect(site_url('master/nilaiun/'));
        }
    }
}
