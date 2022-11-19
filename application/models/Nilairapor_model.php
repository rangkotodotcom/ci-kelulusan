<?php defined('BASEPATH') or exit('No direct script access allowed');

class Nilairapor_model extends CI_Model
{
    private $_table = "t_n_rapor";

    public $no_pes;
    public $pai;
    public $ppkn;
    public $ind;
    public $mtk;
    public $sejind;
    public $ing;
    public $senbud;
    public $pjok;
    public $pkwu;
    public $mat_sej;
    public $fis_eko;
    public $kim_sos;
    public $bio_geo;
    public $lm;

    public function Profil_sekolah()
    {
        return $this->db->get('t_profilsekolah')->row_array();
    }

    public function getAll()
    {
        $system = $this->db->get('t_system')->row_array();
        return $this->db->get_where($this->_table, ["tahun" => $system['tahun_data']])->result();
    }

    public function getById($no_pes)
    {
        $system = $this->db->get('t_system')->row_array();
        return $this->db->get_where($this->_table, ["no_pes" => $no_pes, "tahun" => $system['tahun_data']])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->no_pes = $post["no_pes"];
        $this->pai = $post["pai"];
        $this->ppkn = $post["ppkn"];
        $this->ind = $post["ind"];
        $this->mtk = $post["mtk"];
        $this->sejind = $post["sejind"];
        $this->ing = $post["ing"];
        $this->senbud = $post["senbud"];
        $this->pjok = $post["pjok"];
        $this->pkwu = $post["pkwu"];
        $this->mat_sej = $post["mat_sej"];
        $this->fis_eko = $post["fis_eko"];
        $this->kim_sos = $post["kim_sos"];
        $this->bio_geo = $post["bio_geo"];
        $this->lm = $post["lm"];
        $this->tahun = date('Y');
        $this->db->insert($this->_table, $this);

        $data = [
            'kegiatan' => 'Tambah Nilai Rapor (' . $this->no_pes = $post["no_pes"] . ')',
            'oleh' => $this->session->userdata('email'),
            'waktu' => NULL
        ];

        $this->db->insert('t_history', $data);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->no_pes = $post["no_pes"];
        $this->pai = $post["pai"];
        $this->ppkn = $post["ppkn"];
        $this->ind = $post["ind"];
        $this->mtk = $post["mtk"];
        $this->sejind = $post["sejind"];
        $this->ing = $post["ing"];
        $this->senbud = $post["senbud"];
        $this->pjok = $post["pjok"];
        $this->pkwu = $post["pkwu"];
        $this->mat_sej = $post["mat_sej"];
        $this->fis_eko = $post["fis_eko"];
        $this->kim_sos = $post["kim_sos"];
        $this->bio_geo = $post["bio_geo"];
        $this->lm = $post["lm"];
        $this->tahun = $post["tahun"];
        $this->db->update($this->_table, $this, array("no_pes" => $post['no_pes']));

        $data = [
            'kegiatan' => 'Edit Nilai Rapor (' . $this->no_pes = $post["no_pes"] . ')',
            'oleh' => $this->session->userdata('email'),
            'waktu' => NULL
        ];

        $this->db->insert('t_history', $data);
    }

    public function delete($no_pes)
    {
        $data = [
            'kegiatan' => 'Edit Nilai UN (' . $no_pes . ')',
            'oleh' => $this->session->userdata('email'),
            'waktu' => NULL
        ];

        $this->db->insert('t_history', $data);

        return $this->db->delete($this->_table, array("no_pes" => $no_pes));
    }
}
