<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pustaka extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pustaka_model');
        if ($this->session->userdata('email') == '') {
            redirect('auth');
        }

        if ($this->session->userdata('level') != 'pp') {
            redirect(base_url('admin/'));
        }
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['profilsekolah'] = $this->Pustaka_model->Profil_sekolah();
        $data['title'] = $data['user']['nama'] . ' - Pengumuman Kelulusan ' . $data['profilsekolah']['nama_sekolah'];


        $data['pustaka'] = $this->Pustaka_model->getAll();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('page/pustaka/daftar', $data);
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


        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['profilsekolah'] = $this->Pustaka_model->Profil_sekolah();
            $data['title'] = $data['user']['nama'] . ' - Pengumuman Kelulusan ' . $data['profilsekolah']['nama_sekolah'];
            $data['siswa'] = $this->db->get('t_bio_siswa')->result();

            $this->load->view('templates/admin_header', $data);
            $this->load->view('page/pustaka/tambah', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $system = $this->db->get('t_system')->row_array();
            $cek = $this->db->get_where('t_adm', ['no_pes' => $this->input->post('no_pes'), 'tahun_adm' => $system['tahun_data']])->num_rows();


            if ($cek > 0) {

                $cek_pustaka = $this->db->get_where('t_adm', ['no_pes' => $this->input->post('no_pes'), 'tahun_adm' => $system['tahun_data']])->row_array();

                if ($cek_pustaka['pustaka'] == '0') {

                    $pustaka = $this->Pustaka_model;
                    $pustaka->update();
                    $this->session->set_flashdata('alert', 'Data Berhasil Disimpan');
                    redirect(base_url('page/pustaka/'));
                } else {
                    $this->session->set_flashdata('alert', 'Data Sudah Ada');
                    redirect(base_url('page/pustaka/'));
                }
            } else {
                $pustaka = $this->Pustaka_model;
                $pustaka->save();
                $this->session->set_flashdata('alert', 'Data Berhasil Disimpan');
                redirect(base_url('page/pustaka/'));
            }
        }
    }

    public function delete($no_pes = null)
    {
        if (!isset($no_pes)) show_404();

        if ($this->Pustaka_model->delete($no_pes)) {
            redirect(site_url('page/pustaka/'));
        }
    }
}
