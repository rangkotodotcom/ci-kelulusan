<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logaktifitas extends CI_Controller
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

        if ($this->session->userdata('level') == 'admin') {
            if ($this->session->userdata('nama') == 'Jamilur Rusydi Al Miichtari') {
                $this->db->select('*');
                $this->db->from('t_history');
                $this->db->order_by('waktu', 'DESC');
            } else {
                $this->db->select('*');
                $this->db->from('t_history');
                $this->db->where('oleh', $this->session->userdata('email'));
                $this->db->order_by('waktu', 'DESC');
            }

            $data['logaktifitas'] = $this->db->get()->result();
        } else {
            $this->db->select('*');
            $this->db->from('t_history');
            $this->db->where('oleh', $this->session->userdata('email'));
            $this->db->order_by('waktu', 'DESC');

            $data['logaktifitas'] = $this->db->get()->result();
        }

        if ($this->session->userdata('email') == '') {
            redirect('auth');
        } else {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('admin/logaktifitas', $data);
            $this->load->view('templates/admin_footer');
        }
    }
}
