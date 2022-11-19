<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dataadmin_model extends CI_Model
{
    private $_table = "user";

    public $id;
    public $nama;
    public $email;
    public $foto;
    public $pass;
    public $password;
    public $level;
    public $is_active;

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

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->nama = ucwords($post["nama"]);
        $this->email = $post["email"];
        $this->level = $post["level"];
        $this->db->update($this->_table, ["nama" => $this->nama, "email" => $this->email, "level" => $this->level], array("id" => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
}
