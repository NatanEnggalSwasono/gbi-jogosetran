<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('email')) {
      redirect('auth');
    }
    $this->load->model('ModelGaleri');
  }

  // fungsi untuk mengambil data
  public function index()
  {

    $dataGaleri = $this->ModelGaleri->getAll();
    $data = array(
      "galeris" => $dataGaleri
    );

    $data['title'] = 'Galeri';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('galeri/v_list_image', $data);
    $this->load->view('template/footer');
  }

  // untuk menampilkan halaman tambah data
  public function tambah()
  {
    $data['title'] = 'Form Tambah Gambar';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('galeri/v_add_image', $data);
    $this->load->view('template/footer');
  }

  // untuk memasukan data ke database
  public function insert()
  {
    // get foto
    $config['upload_path'] = './assets/picture/';
    $config['allowed_types'] = 'jpg|png|jpeg|gif';
    $config['max_size'] = 10000;
    $config['max_width'] = 10000;
    $config['max_height'] = 10000;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('userfile')) {
      echo "Gagal Upload";
    } else {
      $gambar = $this->upload->data();
      $gambar = $gambar['file_name'];

      $data = array(
        "foto" => $gambar
      );
      $id = $this->ModelGaleri->insertGetId($data);
      redirect('galeri');
    }
  }

  public function ubah($id)
  {
    $galeri = $this->ModelGaleri->getByPrimaryKey($id);
    $data = array(
      "galeri" => $galeri,
    );
    $data['title'] = 'Form Ubah Gambar';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('galeri/v_update_image', $data);
    $this->load->view('template/footer');
  }

  public function update()
  {
    $config['upload_path']          = './assets/picture';
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['max_size']             = 10000;
    $config['max_width']            = 10000;
    $config['max_height']           = 10000;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('userfile')) {
      echo "Gagal Diupload";
    } else {
      $gambar = $this->upload->data();
      $gambar = $gambar['file_name'];
      $id = $this->input->post('id');

      $data = array(
        "foto" => $gambar
      );

      $id = $this->ModelGaleri->update($id, $data);
      redirect('galeri');
    }
  }

  public function delete()
  {
    $id = $this->input->post('id');
    $this->ModelGaleri->delete($id);
    redirect('galeri');
  }
} // end class
