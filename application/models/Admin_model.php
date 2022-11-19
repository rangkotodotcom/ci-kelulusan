<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_model
{
    public function Profil_sekolah()
    {
        return $this->db->get('t_profilsekolah')->row_array();
    }

    public function getSystem()
    {
        return $this->db->get('t_system')->row_array();
    }

    public function getJumlahsiswa()
    {
        $system = $this->db->get('t_system')->row_array();
        return $this->db->get_where('t_bio_siswa', ["tahun" => $system['tahun_data']])->num_rows();
    }

    public function getContactperson()
    {
        return $this->db->get('t_cp')->result();
    }

    public function getJumlahsiswapustaka()
    {
        $system = $this->db->get('t_system')->row_array();

        $this->db->select('*');
        $this->db->from('t_adm');
        $this->db->where('pustaka', '1');
        $this->db->where('tahun_adm', $system['tahun_data']);

        return $this->db->get()->num_rows();
    }

    public function getJumlahsiswatatausaha()
    {
        $system = $this->db->get('t_system')->row_array();

        $this->db->select('*');
        $this->db->from('t_adm');
        $this->db->where('komite', '1');
        $this->db->where('tahun_adm', $system['tahun_data']);

        return $this->db->get()->num_rows();
    }

    public function getInformasiadmin()
    {
        $system = $this->db->get('t_system')->row_array();
        $tujuan = ['all', 'admin'];

        $this->db->select('*');
        $this->db->from('t_info');
        $this->db->where_in('tujuan', $tujuan);
        $this->db->where('tahun_info', $system['tahun_data']);
        $this->db->order_by('tanggal_kirim', 'DESC');

        return $this->db->get()->result();
    }

    public function getInformasipustaka()
    {
        $system = $this->db->get('t_system')->row_array();
        $tujuan = ['all', 'pp'];

        $this->db->select('*');
        $this->db->from('t_info');
        $this->db->where_in('tujuan', $tujuan);
        $this->db->where('tahun_info', $system['tahun_data']);
        $this->db->order_by('tanggal_kirim', 'DESC');

        return $this->db->get()->result();
    }

    public function getInformasitatausaha()
    {
        $system = $this->db->get('t_system')->row_array();
        $tujuan = ['all', 'tu'];

        $this->db->select('*');
        $this->db->from('t_info');
        $this->db->where_in('tujuan', $tujuan);
        $this->db->where('tahun_info', $system['tahun_data']);
        $this->db->order_by('tanggal_kirim', 'DESC');

        return $this->db->get()->result();
    }

    public function getJumlahsiswabisa()
    {
        $system = $this->db->get('t_system')->row_array();

        $this->db->select('*');
        $this->db->from('t_adm');
        $this->db->where('komite', '1');
        $this->db->where('pustaka', '1');
        $this->db->where('tahun_adm', $system['tahun_data']);

        return $this->db->get()->num_rows();
    }
    public function getJumlahsiswasatuadmlagi()
    {
        $system = $this->db->get('t_system')->row_array();

        $where = "komite = '1' AND pustaka = '0' OR komite = '0' AND pustaka = '1'";

        $this->db->select('*');
        $this->db->from('t_adm');
        $this->db->where($where);
        $this->db->where('tahun_adm', $system['tahun_data']);

        return $this->db->get()->num_rows();
    }
}
