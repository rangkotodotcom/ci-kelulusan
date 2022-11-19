<?php defined('BASEPATH') or exit('No direct script access allowed');

class Cp_model extends CI_Model
{
    private $_table = "t_cp";

    public $id;
    public $nama;
    public $no_hp;

    public function Profil_sekolah()
    {
        return $this->db->get('t_profilsekolah')->row_array();
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id = '';
        $this->nama = ucwords($post["nama"]);
        $this->no_hp = $post["no_hp"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->nama = ucwords($post["nama"]);
        $this->no_hp = $post["no_hp"];
        $this->db->update($this->_table, $this, array("id" => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
}
