<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tatausaha extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tatausaha_model');
        if ($this->session->userdata('email') == '') {
            redirect('auth');
        }

        if ($this->session->userdata('level') != 'tu') {
            redirect(base_url('admin/'));
        }
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['profilsekolah'] = $this->Tatausaha_model->Profil_sekolah();
        $data['title'] = $data['user']['nama'] . ' - Pengumuman Kelulusan ' . $data['profilsekolah']['nama_sekolah'];


        $data['tatausaha'] = $this->Tatausaha_model->getAll();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('page/tatausaha/daftar', $data);
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
            $data['profilsekolah'] = $this->Tatausaha_model->Profil_sekolah();
            $data['title'] = $data['user']['nama'] . ' - Pengumuman Kelulusan ' . $data['profilsekolah']['nama_sekolah'];
            $data['title'] = $data['user']['nama'] . ' - Pengumuman Kelulusan SMAN 1 2x11 ENAM LINGKUNG';
            $data['siswa'] = $this->db->get('t_bio_siswa')->result();

            $this->load->view('templates/admin_header', $data);
            $this->load->view('page/tatausaha/tambah', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $system = $this->db->get('t_system')->row_array();
            $cek = $this->db->get_where('t_adm', ['no_pes' => $this->input->post('no_pes'), 'tahun_adm' => $system['tahun_data']])->num_rows();


            if ($cek > 0) {

                $cek_tatausaha = $this->db->get_where('t_adm', ['no_pes' => $this->input->post('no_pes'), 'tahun_adm' => $system['tahun_data']])->row_array();

                if ($cek_tatausaha['komite'] == '0') {

                    $tatausaha = $this->Tatausaha_model;
                    $tatausaha->update();
                    $this->session->set_flashdata('alert', 'Data Berhasil Disimpan');
                    redirect(base_url('page/tatausaha/'));
                } else {
                    $this->session->set_flashdata('alert', 'Data Sudah Ada');
                    redirect(base_url('page/tatausaha/'));
                }
            } else {
                $tatausaha = $this->Tatausaha_model;
                $tatausaha->save();
                $this->session->set_flashdata('alert', 'Data Berhasil Disimpan');
                redirect(base_url('page/tatausaha/'));
            }
        }
    }

    public function delete($no_pes = null)
    {
        if (!isset($no_pes)) show_404();

        if ($this->Tatausaha_model->delete($no_pes)) {
            redirect(site_url('page/tatausaha/'));
        }
    }
}
