<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gantipassword extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['profilsekolah'] = $this->Admin_model->Profil_sekolah();
        $data['title'] = $data['user']['nama'] . ' - Pengumuman Kelulusan ' . $data['profilsekolah']['nama_sekolah'];

        $this->form_validation->set_rules('pass_lam', 'Password Lama', 'required|trim', [
            'required' => 'Password Lama wajib di isi!'
        ]);

        $this->form_validation->set_rules('pass_baru1', 'Password Baru', 'required|trim|min_length[6]|matches[pass_baru2]', [
            'required' => 'Password Baru wajib di isi!',
            'min_length' => 'Password Minimal 6 Karakter'
        ]);

        $this->form_validation->set_rules('pass_baru2', 'Ulangi Password Baru', 'required|trim|min_length[6]|matches[pass_baru1]', [
            'required' => 'Ulangi Password Baru wajib di isi!',
            'min_length' => 'Password Minimal 6 Karakter',
            'matches' => 'Ulangi Password Baru Harus Sama Dengan Password Baru'
        ]);

        if ($this->session->userdata('email') == '') {
            redirect('auth');
        } else {
            if ($this->form_validation->run() == false) {
                $data['profilsekolah'] = $this->Admin_model->Profil_sekolah();
                $data['title'] = $data['user']['nama'] . ' - Pengumuman Kelulusan ' . $data['profilsekolah']['nama_sekolah'];
                $this->load->view('templates/admin_header', $data);
                $this->load->view('admin/gantipassword', $data);
                $this->load->view('templates/admin_footer');
            } else {
                $email = $data['user']['email'];
                $pass_lam = $this->input->post('pass_lam');
                $pass_baru = $this->input->post('pass_baru1');

                if (!password_verify($pass_lam, $data['user']['password'])) {

                    $this->session->set_flashdata('alert', 'Password Lama Anda Salah');
                    redirect(base_url('setting/gantipassword'));
                } else {
                    if ($pass_lam == $pass_baru) {

                        $this->session->set_flashdata('alert', 'Password Baru Tidak Boleh Sama Dengan Yang Lama');
                        redirect(base_url('setting/gantipassword'));
                    } else {
                        $pass_hash = password_hash($pass_baru, PASSWORD_DEFAULT);

                        $this->db->set('password', $pass_hash);
                        $this->db->where('email', $email);
                        $this->db->update('user');

                        $data = [
                            'kegiatan' => 'Ganti Password',
                            'oleh' => $this->session->userdata('email'),
                            'waktu' => NULL
                        ];

                        $this->db->insert('t_history', $data);

                        $this->session->set_flashdata('alert', 'Password Berhasil Diganti');
                        redirect(base_url('setting/profil'));
                    }
                }
            }
        }
    }
}
