<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index_model extends CI_model
{
    public function Profil_sekolah()
    {
        return $this->db->get('t_profilsekolah')->row_array();
    }

    public function Blangko_surat()
    {
        return $this->db->get('t_blangko')->row_array();
    }
}
