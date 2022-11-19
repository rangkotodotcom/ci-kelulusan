<?php defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class Nilaiusbn_model extends CI_Model
{
    private $_table = "t_n_us";

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
        $data = [
            "no_pes" => $post["no_pes"],
            "pai" => $post["pai"],
            "ppkn" => $post["ppkn"],
            "ind" => $post["ind"],
            "mtk" => $post["mtk"],
            "sejind" => $post["sejind"],
            "ing" => $post["ing"],
            "senbud" => $post["senbud"],
            "pjok" => $post["pjok"],
            "pkwu" => $post["pkwu"],
            "mat_sej" => $post["mat_sej"],
            "fis_eko" => $post["fis_eko"],
            "kim_sos" => $post["kim_sos"],
            "bio_geo" => $post["bio_geo"],
            "lm" => $post["lm"],
            "tahun_us" => date("Y")
        ];
        $this->db->insert($this->_table, $this);

        $data = [
            'kegiatan' => 'Tambah Nilai USBN (' . $this->no_pes = $post["no_pes"] . ')',
            'oleh' => $this->session->userdata('email'),
            'waktu' => NULL
        ];

        $this->db->insert('t_history', $data);

        return $data;
    }

    public function update($id_us)
    {
        $post = $this->input->post();
        $data = [
            "no_pes" => $post["no_pes"],
            "pai" => $post["pai"],
            "ppkn" => $post["ppkn"],
            "ind" => $post["ind"],
            "mtk" => $post["mtk"],
            "sejind" => $post["sejind"],
            "ing" => $post["ing"],
            "senbud" => $post["senbud"],
            "pjok" => $post["pjok"],
            "pkwu" => $post["pkwu"],
            "mat_sej" => $post["mat_sej"],
            "fis_eko" => $post["fis_eko"],
            "kim_sos" => $post["kim_sos"],
            "bio_geo" => $post["bio_geo"],
            "lm" => $post["lm"],
            "tahun_us" => date("Y"),
            "smansic_key" => 'oksg8kg8ks8s048ooc0occsok0gcwc4k40w48kcg',
            "id_us" => $id_us
        ];
        // $data = [
        //     'kegiatan' => 'Edit Nilai USBN (' . $this->no_pes = $post["no_pes"] . ')',
        //     'oleh' => $this->session->userdata('email'),
        //     'waktu' => NULL
        // ];

        // $this->db->insert('t_history', $data);

        $response = $this->_client->request('PUT', 'us', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return true;
    }

    public function delete($id_us)
    {
        // $data = [
        //     'kegiatan' => 'Hapus Nilai USBN (' . $no_pes . ')',
        //     'oleh' => $this->session->userdata('email'),
        //     'waktu' => NULL
        // ];

        // $this->db->insert('t_history', $data);

        // return $this->db->delete($this->_table, array("no_pes" => $no_pes));

        $response = $this->_client->request('DELETE', 'us', [
            'form_params' => [
                'smansic_key' => 'oksg8kg8ks8s048ooc0occsok0gcwc4k40w48kcg',
                'id_us' => $id_us
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return true;
    }
}
