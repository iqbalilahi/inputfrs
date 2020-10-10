<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inputfrs extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        is_loginmhs();
        $this->load->database();
        $this->load->model('Mhs_model');
        $this->load->model('Inputfrs_model');
        $this->load->library('form_validation');        
        $this->load->library('datatables');
    }
    public function index() {
        //$this->load->view('table');
        $id = $this->session->userdata('id_mhs');
        $row = $this->Mhs_model->trx_mhs($id);
        if ($row) {
            $data = array(
        'id_mhs' => $row->id_mhs,
        'npm' => $row->npm,
        'nama_mhs' => $row->nama_mhs,
        'nama_studi' => $row->nama_studi,
        'nama_prodi' => $row->nama_prodi,
        'nama_status' => $row->nama_status,
        'id_prodi' => set_value('id_prodi', $row->id_prodi),
        'id_semester' => set_value('id_semester'),
        'id_thperiode' => set_value('id_thperiode'),
        );
            $this->template->load('template','frs/form_frs', $data);
        }
    }
    public function cari_matkul() {
        //$this->load->view('table');
        $id = $this->session->userdata('id_mhs');

        $smt = $this->input->get('id_semester');
        $prodi = $this->input->get('id_prodi');
        $periode = $this->input->get('id_thperiode');
        
        //$data1 = array('matkul_data' => $row1);

        $row = $this->Mhs_model->trx_mhs($id);
        if ($row) {
            $data = array(
        
        'id_mhs' => $row->id_mhs,
        'npm' => $row->npm,
        'nama_mhs' => $row->nama_mhs,
        'nama_studi' => $row->nama_studi,
        'nama_prodi' => $row->nama_prodi,
        'nama_status' => $row->nama_status,
        'images' => $row->images,
        'matkul_data' => $this->Inputfrs_model->cari_matkul($smt,$periode,$prodi),
        
        );
            $this->template->load('template','frs/input_frs', $data);
        }
    }
    public function insertrow()
    {
        $nm = $this->input->post('id_frs');
        $data = array();
        foreach ($nm as $key => $val) {
            $sql = $this->db->query("SELECT id_matkul FROM frs where id_matkul='".$_POST['id_matkul'][$key]."'");
            // echo $this->db->last_query();exit;
            $cek_matkul = $sql->num_rows();
            if ($cek_matkul > 0 ) {
                $this->session->set_flashdata('message', 'Sudah Input sebelumnya');
            }else{
            // print_r($_POST['id_matkul'][$key]);
                $data = array(
                        'id_frs' => $_POST['id_frs'][$key],
                        'id_mhs' => $_POST['id_mhs'][$key],
                        'id_matkul' => $_POST['id_matkul'][$key],
                        'kode_matkul' => $_POST['kode_matkul'][$key],
                        'id_dosen' => $_POST['id_dosen'][$key],
                        'status_nilai' => $_POST['status_nilai'][$key],
                        'sks' => $_POST['sks'][$key],
                        'nama_prodi' => $_POST['nama_prodi'][$key],
                        'kode_studi' => $_POST['kode_studi'][$key],
                        'semester' => $_POST['semester'][$key],
                        'tahun_akademik' => $_POST['tahun_akademik'][$key]
                     );
                $test = $this->db->insert('frs',$data);
            }
        };
        $this->session->set_flashdata('message', 'Create Record Success ');
        $this->template->load('template','frs/frs_pdf', $data);
    }

    public function frs_pdf()
    {
         $this->load->library('Pdf');
        //     $frs = $this->Inputfrs_model->trx_inputfrs();
        //     $data = array(
        //     'frs_data' => $frs
        // );
            $this->template->load('template','frs/frs_pdf', $data);
    } 

    function upload_foto(){
        $config['upload_path']          = './assets/foto_mhs';
        $config['allowed_types']        = 'gif|jpg|png';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        if( ! $this->upload->do_upload("images")){
            //echo the errors
            echo $this->upload->display_errors();
        }
        return $this->upload->data();
    }
    

    public function _rules() 
    {
    $this->form_validation->set_rules('npm', 'npm', 'trim|required|min_length[14]|max_length[15]');
    $this->form_validation->set_rules('nama_mhs', 'nama mhs', 'trim|required');
    $this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
    $this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
    $this->form_validation->set_rules('jeniskelamin', 'jeniskelamin', 'trim|required');
    $this->form_validation->set_rules('agama', 'agama', 'trim|required');
    $this->form_validation->set_rules('nohp_mhs', 'nohp mhs', 'trim|required|numeric|min_length[10]|max_length[13]');
    $this->form_validation->set_rules('email_mhs', 'email mhs', 'trim|required');
    $this->form_validation->set_rules('id_jenjangstudi', 'id jenjangstudi', 'trim|required');
    $this->form_validation->set_rules('id_prodi', 'id prodi', 'trim|required');
    $this->form_validation->set_rules('id_status', 'id status', 'trim|required');
    // $this->form_validation->set_rules('password', 'password', 'trim|required');
    $this->form_validation->set_rules('id_user_level', 'id user level', 'trim|required');
    $this->form_validation->set_rules('is_aktif', 'is aktif', 'trim|required');

    $this->form_validation->set_rules('id_mhs', 'id_mhs', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}