<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Pengguna_model"); //load model pengguna
    }

    //method pertama yang akan di eksekusi
    public function index()
    {

        $data["title"] = "List Pengguna";
        //ambil fungsi getAll untuk menampilkan semua data pengguna
        $data["data_pengguna"] = $this->Pengguna_model->getAll();
        //load view header.php pada folder views/templates
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        //load view index.php pada folder views/pengguna
        $this->load->view('pengguna/index', $data);
        $this->load->view('templates/footer');
    }

    //method add digunakan untuk menampilkan form tambah data pengguna
    public function add()
    {
        $Pengguna = $this->Pengguna_model; //objek model
        $validation = $this->form_validation; //objek form validation
        $validation->set_rules($Pengguna->rules()); //menerapkan rules validasi pada pengguna_model
        //kondisi jika semua kolom telah divalidasi, maka akan menjalankan method save pada pengguna_model
        if ($validation->run()) {
            $Pengguna->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Pengguna berhasil disimpan. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect("pengguna");
        }
        $data["title"] = "Tambah Data Pengguna";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('pengguna/add', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('pengguna');

        $Pengguna = $this->Pengguna_model;
        $validation = $this->form_validation;
        $validation->set_rules($Pengguna->rules());

        if ($validation->run()) {
            $Pengguna->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Pengguna berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect("pengguna");
        }
        $data["title"] = "Edit Data Pengguna";
        $data["data_pengguna"] = $Pengguna->getById($id);
        if (!$data["data_pengguna"]) show_404();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('pengguna/edit', $data);
        $this->load->view('templates/footer');
    }

    public function delete()
    {
        $id = $this->input->get('id');
        if (!isset($id)) show_404();
        $this->Pengguna_model->delete($id);
        $msg['success'] = true;
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Pengguna berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
        $this->output->set_output(json_encode($msg));
    }
}