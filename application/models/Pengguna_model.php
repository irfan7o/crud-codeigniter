<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna_model extends CI_Model
{
    private $table = 'pengguna';

    //validasi form, method ini akan mengembailkan data berupa rules validasi form       
    public function rules()
    {
        return [
            [
                'field' => 'login',  //samakan dengan atribute name pada tags input
                'label' => 'ID User',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'pswd',
                'label' => 'Password',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'deskripsi',
                'label' => 'Deskripsi',
                'rules' => 'trim|required'
            ]
        ];
    }

    //menampilkan data mahasiswa berdasarkan id login pengguna
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["login" => $id])->row();
        //query diatas seperti halnya query pada mysql 
        //select * from pengguna where login='$id'
    }

    //menampilkan semua data pengguna
    public function getAll()
    {
        $this->db->from($this->table);
        $this->db->order_by("login", "desc");
        $query = $this->db->get();
        return $query->result();
        //fungsi diatas seperti halnya query 
        //select * from pengguna order by login desc
    }

    //menyimpan data pengguna
    public function save()
    {
        $data = array(
            "login" => $this->input->post('login'),
            "pswd" => md5 ($this->input->post ('pswd')),
            "email" => $this->input->post('email'),
            "deskripsi" => $this->input->post('deskripsi')
        );
        return $this->db->insert($this->table, $data);
    }

    //edit data pengguna
    public function update()
    {
        $data = array(
            "login" => $this->input->post('login'),
            "pswd" => md5 ($this->input->post('pswd')),
            "email" => $this->input->post('email'),
            "deskripsi" => $this->input->post('deskripsi')
        );
        return $this->db->update($this->table, $data, array('login' => $this->input->post('login')));
    }

    //hapus data pengguna
    public function delete($id)
    {
        return $this->db->delete($this->table, array("login" => $id));
    }
}