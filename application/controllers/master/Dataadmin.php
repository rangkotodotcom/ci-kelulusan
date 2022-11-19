<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dataadmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dataadmin_model');
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
        $data['profilsekolah'] = $this->Dataadmin_model->Profil_sekolah();
        $data['title'] = $data['user']['nama'] . ' - Pengumuman Kelulusan ' . $data['profilsekolah']['nama_sekolah'];

        $data['dataadmin'] = $this->Dataadmin_model->getAll();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('master/dataadmin/daftar', $data);
        $this->load->view('templates/admin_footer');
    }

    public function detail($id = null)
    {

        if (!isset($id)) {
            redirect('master/dataadmin');
        }
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['profilsekolah'] = $this->Dataadmin_model->Profil_sekolah();
        $data['title'] = $data['user']['nama'] . ' - Pengumuman Kelulusan ' . $data['profilsekolah']['nama_sekolah'];

        $data['dataadmin'] = $this->Dataadmin_model->getById($id);

        $this->load->view('templates/admin_header', $data);
        $this->load->view('master/dataadmin/detail', $data);
        $this->load->view('templates/admin_footer');
    }

    public function add()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama wajib di isi!'
        ]);

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email wajib di isi!',
            'valid_email' => 'Email anda tidak valid'
        ]);

        $this->form_validation->set_rules('level', 'Level', 'required|trim', [
            'required' => 'Level wajib di isi!'
        ]);


        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['profilsekolah'] = $this->Dataadmin_model->Profil_sekolah();
            $data['title'] = $data['user']['nama'] . ' - Pengumuman Kelulusan ' . $data['profilsekolah']['nama_sekolah'];

            $this->load->view('templates/admin_header', $data);
            $this->load->view('master/dataadmin/tambah', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $nama = ucwords($this->input->post('nama'));
            $email = $this->input->post('email');
            $foto = 'default.jpg';
            $pass = kodeAcak(6);
            $password = password_hash($pass, PASSWORD_DEFAULT);
            $level = $this->input->post('level');
            $is_active = '0';

            $cek = $this->db->get_where('user', ['email' => $email])->num_rows();

            if ($cek < 1) {
                $data = [
                    'nama' => $nama,
                    'email' => $email,
                    'foto' => $foto,
                    'password' => $password,
                    'level' => $level,
                    'is_active' => $is_active
                ];

                $data_email = [
                    'title' => 'Akun Admin Baru',
                    'nama'  => $nama,
                    'web'   => 'Kelulusan SMAN 1 2x11 Enam Lingkung',
                    'email' => $email,
                    'pass'  => $pass,
                    'url'   => base_url('auth/')
                ];

                $this->db->insert('user', $data);
                $this->_sendEmail($data_email);
                $this->session->set_flashdata('alert', 'Admin Baru Berhasil Ditambah');
                redirect(base_url('master/dataadmin/'));
            } else {
                $this->session->set_flashdata('alert', 'Data Sudah Ada');
                redirect(base_url('master/dataadmin/'));
            }
        }
    }

    public function edit($id = null)
    {

        if (!isset($id)) {
            redirect('master/dataadmin');
        }

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama wajib di isi!'
        ]);

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email wajib di isi!',
            'valid_email' => 'Email anda tidak valid'
        ]);

        $this->form_validation->set_rules('level', 'Level', 'required|trim', [
            'required' => 'Level wajib di isi!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['profilsekolah'] = $this->Dataadmin_model->Profil_sekolah();
            $data['title'] = $data['user']['nama'] . ' - Pengumuman Kelulusan ' . $data['profilsekolah']['nama_sekolah'];
            $dataadmin = $this->Dataadmin_model;
            $data["dataadmin"] = $dataadmin->getById($id);
            if (!$data["dataadmin"]) show_404();
            $this->load->view('templates/admin_header', $data);
            $this->load->view('master/dataadmin/edit', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $dataadmin = $this->Dataadmin_model;
            $dataadmin->update();
            $this->session->set_flashdata('alert', 'Data Berhasil Disimpan');
            redirect(base_url('master/dataadmin/'));
        }
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->Dataadmin_model->delete($id)) {
            redirect(site_url('master/dataadmin/'));
        }
    }

    private function _sendEmail($data_email)
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
        $this->email->subject('Akun Web Kelulusan');

        $body = $this->load->view('templates/email/akun_admin', $data_email, true);
        $this->email->message($body);

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
}
