<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Grafik extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Index_model');
    }

    public function index()
    {

        $data['profilsekolah'] = $this->Index_model->Profil_sekolah();


        $data['title'] = 'Grafik Nilai - Pengumuman Kelulusan ' .  $data['profilsekolah']['nama_sekolah'];
        $data['system'] = $this->db->get('t_system')->row();

        // $ipa = ['Biologi', 'Fisika', 'Kimia'];

        // $this->db->select_avg('bin');
        // $this->db->select_avg('bing');
        // $this->db->select_avg('mat');
        // $this->db->select_avg('pil');
        // $this->db->from('t_n_un');
        // $this->db->where_in('mapel_pil', $ipa);
        // $this->db->where('tahun', $data['system']->tahun_data);
        // $data['grafik_ipa'] = $this->db->get()->row();

        // $ips = ['Sosiologi', 'Ekonomi', 'Geografi'];

        // $this->db->select_avg('bin');
        // $this->db->select_avg('bing');
        // $this->db->select_avg('mat');
        // $this->db->select_avg('pil');
        // $this->db->from('t_n_un');
        // $this->db->where_in('mapel_pil', $ips);
        // $this->db->where('tahun', $data['system']->tahun_data);
        // $data['grafik_ips'] = $this->db->get()->row();

        $this->db->select_avg('pai');
        $this->db->select_avg('ppkn');
        $this->db->select_avg('ind');
        $this->db->select_avg('mtk');
        $this->db->select_avg('sejind');
        $this->db->select_avg('ing');
        $this->db->select_avg('senbud');
        $this->db->select_avg('pjok');
        $this->db->select_avg('pkwu');
        $this->db->select_avg('mat_sej');
        $this->db->select_avg('fis_eko');
        $this->db->select_avg('kim_sos');
        $this->db->select_avg('bio_geo');
        $this->db->select_avg('lm');
        $this->db->from('t_n_us');
        $this->db->where('tahun', $data['system']->tahun_data);
        $data['grafik'] = $this->db->get()->row();

        $this->load->view('templates/index_header', $data);
        $this->load->view('public/grafik', $data);
        $this->load->view('templates/index_footer');
    }
}
