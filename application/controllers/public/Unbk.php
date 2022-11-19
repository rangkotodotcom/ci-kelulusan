<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unbk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Index_model');
    }

    public function index()
    {
        $data['profilsekolah'] = $this->Index_model->Profil_sekolah();

        $data['title'] = 'UNBK - Pengumuman Kelulusan ' .  $data['profilsekolah']['nama_sekolah'];
        $data['kontak'] = $this->db->get('t_cp')->result();

        $this->load->view('public/unbk', $data);
    }

    public function cari()
    {
        $nisn = $this->input->post('nisn');
        $email = $this->input->post('email');


        $this->form_validation->set_rules('nisn', 'NISN', 'required|trim|numeric', [
            'required' => 'NISN wajib di isi!',
            'numeric' => 'NISN harus angka!'
        ]);

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email wajib di isi!',
            'valid_email' => 'Email anda tidak valid'
        ]);

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['profilsekolah'] = $this->Index_model->Profil_sekolah();
        $data['title'] = 'UNBK - Pengumuman Kelulusan ' .  $data['profilsekolah']['nama_sekolah'];

        if ($this->form_validation->run() == false) {
            $this->load->view('public/unbk', $data);
        } else {
            $cek = $this->db->get_where('t_bio_siswa', ['nisn' => $nisn])->row_array();

            if ($cek) {

                $data_email = [
                    'title' => 'No Peserta UNBK',
                    'nama'  => $cek['nama'],
                    'web'   => 'Kelulusan SMAN 1 2x11 Enam Lingkung',
                    'url'   => base_url(),
                    'no_pes' => $cek['no_pes']
                ];

                $this->_sendNoun($data_email, $email);

                $this->session->set_flashdata('alert', 'Berhasil');
                redirect(base_url('public/unbk/'));
            } else {
                $this->session->set_flashdata('alert', 'NISN Tidak Ditemukan');
                redirect(base_url('public/unbk/'));
            }
        }
    }

    private function _sendNoun($data_email, $email)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://pengumuman.sman12x11el.sch.id',
            'smtp_user' => 'info@pengumuman.sman12x11el.sch.id',
            'smtp_pass' => 'smansa2x11el',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->email->initialize($config);
        // $this->load->library('email', $config);

        $this->email->from('info@pengumuman.sman12x11el.sch.id', 'Admin Web Kelulusan SMAN 1 2x11 Enam Lingkung');
        $this->email->to($email);
        $this->email->subject('No Peserta UNBK ' . $data_email['nama']);

        $body = $this->load->view('templates/email/no_unbk', $data_email, true);
        $this->email->message($body);

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
}
