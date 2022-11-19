<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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

        $data['system'] = $this->Admin_model->getSystem();
        $data['jumlahsiswa'] = $this->Admin_model->getJumlahsiswa();
        $data['contactperson'] = $this->Admin_model->getContactperson();
        $data['jumlahsiswapustaka'] = $this->Admin_model->getJumlahsiswapustaka();
        $data['jumlahsiswatatausaha'] = $this->Admin_model->getJumlahsiswatatausaha();
        $data['informasiadmin'] = $this->Admin_model->getInformasiadmin();
        $data['informasipustaka'] = $this->Admin_model->getInformasipustaka();
        $data['informasitatausaha'] = $this->Admin_model->getInformasitatausaha();
        $data['sudahbisa'] = $this->Admin_model->getJumlahsiswabisa();
        $data['satuadmlagi'] = $this->Admin_model->getJumlahsiswasatuadmlagi();
        $data['tidakbisa'] = $data['jumlahsiswa'] - $data['sudahbisa'] - $data['satuadmlagi'];

        if ($this->session->userdata('email') == '') {
            redirect('auth');
        } else {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('templates/admin_footer', $data);
        }
    }

    public function sabanta()
    {
        $data = $this->db->get('t_bio_siswa')->result();
        
        $update = [];
        
        $numrow = 1;
        
        foreach($data as $row){
            $nama = $row->nama;
            $foto = $row->nama. '.jpg';
            
            if($numrow > 0){
                array_push($update, [
                    'nama' => $nama,
                    'foto' => $foto,
                    ]);
            }
            
            $numrow++;
        }
        
        $this->db->update_batch('t_bio_siswa', $update, 'nama');
        
    }
}
