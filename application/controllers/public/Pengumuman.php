<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Index_model');
    }

    public function index()
    {
        $data['profilsekolah'] = $this->Index_model->Profil_sekolah();
        $data['title'] = 'News - Pengumuman Kelulusan ' .  $data['profilsekolah']['nama_sekolah'];
        $data['system'] = $this->db->get('t_system')->row();

        $system = $this->db->get('t_system')->row_array();
        $tujuan = ['all', 'public'];

        $this->db->select('*');
        $this->db->from('t_info');
        $this->db->where_in('tujuan', $tujuan);
        $this->db->where('tahun_info', $system['tahun_data']);
        $this->db->order_by('tanggal_kirim', 'DESC');

        $data['pengumuman'] = $this->db->get()->result();

        $this->load->view('templates/index_header', $data);
        $this->load->view('public/pengumuman', $data);
        $this->load->view('templates/index_footer');
    }
}
