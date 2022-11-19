<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }

    public function index()
    {
        if ($this->session->userdata('email') != '') {
            redirect(base_url('admin/'));
        }
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email wajib di isi!',
            'valid_email' => 'Email anda tidak valid'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim',  [
            'required' => 'Password tidak boleh Kosong!'
        ]);

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['profilsekolah'] = $this->Admin_model->Profil_sekolah();
        $data['title'] = 'Login Admin - Pengumuman Kelulusan ' . $data['profilsekolah']['nama_sekolah'];

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // jika user ada
        if ($user) {
            // cek password
            if (password_verify($password, $user['password'])) {

                $is_active = '1';
                $last_login = time();

                $this->db->set('is_active', $is_active);
                $this->db->set('last_login', $last_login);
                $this->db->where('email', $user['email']);
                $this->db->update('user');

                $data = [
                    'email' => $user['email'],
                    'nama' => $user['nama'],
                    'level' => $user['level'],
                    'foto' => $user['foto']
                ];

                $this->session->set_userdata($data);
                redirect(base_url('admin/'));
            } else {
                $this->session->set_flashdata('alert', 'Password Salah');
                redirect(base_url('auth/'));
            }
        } else {
            $this->session->set_flashdata('alert', 'Email Tidak Terdaftar');
            redirect(base_url('auth/'));
        }
    }

    public function lupapassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email wajib di isi!',
            'valid_email' => 'Email anda tidak valid'
        ]);

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['profilsekolah'] = $this->Admin_model->Profil_sekolah();
        $data['title'] = 'Reset Password Admin - Pengumuman Kelulusan ' . $data['profilsekolah']['nama_sekolah'];

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/lupapassword');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email');

            $user = $this->db->get_where('user', ['email' => $email])->row_array();

            if ($user) {

                $pass = kodeAcak(6);
                $password_hash = password_hash($pass, PASSWORD_DEFAULT);

                $this->db->set('password', $password_hash);
                $this->db->where('email', $email);
                $this->db->update('user');

                $data_email = [
                    'title' => 'Password Baru',
                    'nama'  => $user['nama'],
                    'web'   => 'Kelulusan SMAN 1 2x11 Enam Lingkung',
                    'email' => $user['email'],
                    'pass'  => $pass,
                    'url'   => base_url('auth/')
                ];

                $this->_resetpassword($data_email);

                $this->session->set_flashdata('alert', 'Reset Password Berhasil, Silahkan Cek Email Anda');
                redirect(base_url('auth/'));
            } else {
                $this->session->set_flashdata('alert', 'Email Tidak Terdaftar');
                redirect(base_url('auth/lupapassword'));
            }
        }
    }

    private function _resetpassword($data_email)
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
        $this->email->to($this->input->post('email'));
        $this->email->subject('Reset Password Admin Kelulusan');

        $body = $this->load->view('templates/email/reset_pass', $data_email, true);
        $this->email->message($body);

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function logout()
    {
        $is_active = '0';
        $last_login = time();

        $this->db->set('is_active', $is_active);
        $this->db->set('last_login', $last_login);
        $this->db->where('email', $this->session->userdata('email'));
        $this->db->update('user');

        $this->session->unset_userdata('email');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('foto');

        $this->session->set_flashdata('alert', 'Logout Berhasil');
        redirect(base_url('auth/'));
    }
}
