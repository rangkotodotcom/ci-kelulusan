<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Editprofil extends CI_Controller
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

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', [
            'required' => 'Nama Lengkap wajib di isi!'
        ]);

        if ($this->session->userdata('email') == '') {
            redirect('auth');
        } else {
            if ($this->form_validation->run() == false) {
                $this->load->view('templates/admin_header', $data);
                $this->load->view('admin/editprofil', $data);
                $this->load->view('templates/admin_footer');
            } else {
                $email = $data['user']['email'];
                $nama = $this->input->post('nama');

                $foto = $_FILES['foto']['name'];
                $pecah = explode('@', $email);
                $awal = $pecah[0];

                if ($foto) {

                    $config['upload_path']          = './upload/admin/';
                    $config['allowed_types']        = 'jpeg|jpg|png';
                    $config['file_name']            = $awal;
                    $config['overwrite']            = true;
                    $config['max_size']             = 1024; // 0,5MB
                    // $config['max_width']            = 1024;
                    // $config['max_height']           = 768;

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('foto')) {
                        $new_foto = $this->upload->data('file_name');
                        $this->db->set('foto', $new_foto);
                    } else {
                        echo $this->upload->display_errors();
                    }
                }

                $this->db->set('nama', $nama);
                $this->db->where('email', $email);
                $this->db->update('user');

                $data = [
                    'kegiatan' => 'Edit Profil',
                    'oleh' => $this->session->userdata('email'),
                    'waktu' => NULL
                ];

                $this->db->insert('t_history', $data);

                $this->session->set_flashdata('alert', 'Profil Berhasil Diedit');
                redirect(base_url('setting/profil'));
            }
        }
    }
}
