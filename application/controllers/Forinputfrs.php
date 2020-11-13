<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Forinputfrs extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        is_loginmhs();
        $this->load->database();
        $this->load->model('Mhs_model');
        $this->load->model('Inputfrs_model');
        $this->load->model('Detail_dosen_model');
    }

    function index(){
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
        $dataku = $this->Inputfrs_model->cari_matkul1($smt,$periode,$prodi);

        $row = $this->Mhs_model->trx_mhs($id);
        if ($row == True && $dataku == True) {
            $data = array(
        'id_mhs' => $row->id_mhs,
        'npm' => $row->npm,
        'nama_mhs' => $row->nama_mhs,
        'nama_studi' => $row->nama_studi,
        'nama_prodi' => $row->nama_prodi,
        'nama_status' => $row->nama_status,
        'images' => $row->images,
        'matkul_data' => $this->Inputfrs_model->cari_matkul($smt,$periode,$prodi),
        'semester'=> $dataku->semester,
        'tahun_akademik'=> $dataku->tahun_akademik,
        );
            $this->template->load('template','frs/input_frs', $data);
        }else{
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
    }

    public function insertrow()
    {
        $id_mhs = $this->session->userdata('id_mhs');

        $smt = $this->input->get_post('semester');
        $periode = $this->input->get_post('tahun_akademik');
        $prodi = $this->input->get_post('nama_prodi');
        $nm = $this->input->post('id_matkul');
        $data = array();
        $row = 0;
        foreach ($nm as $key => $val) {
            $sql = $this->db->query("SELECT id_matkul,id_mhs FROM frs where id_matkul='".$_POST['id_matkul'][$key]."' and id_mhs='".$_POST['id_mhs'][$key]."'");
            // echo $this->db->last_query();exit;
            $cek_matkul = $sql->num_rows();
            if ($cek_matkul > 0 ) {
                $this->session->set_flashdata('message', 'Sudah Input sebelumnya');
            }else{
            // print_r($_POST['id_matkul'][$key]);
                $data = array(
                        //'id_frs' => $_POST[][$key],
                        'id_mhs' => $_POST['id_mhs'][$key],
                        'id_matkul' => $_POST['id_matkul'][$key],
                        'kode_matkul' => $_POST['kode_matkul'][$key],
                        'id_dosen' => $_POST['id_dosen'][$key],
                        'status_nilai' => $_POST['status_nilai'][$key],
                        'sks' => $_POST['sks'][$key],
                        'nama_prodi' => $_POST['nama_prodi'],
                        'kode_studi' => $_POST['kode_studi'][$key],
                        'semester' => $_POST['semester'],
                        'tahun_akademik' => $_POST['tahun_akademik']
                     );
                    //  print_r($data);
                $this->db->insert('frs',$data);
            }
            $row++;
        };
        // exit;
        $this->session->set_flashdata('message', 'Create Record Success ');
        //print_r($id_mhs);exit;
        $this->load->library('Pdf');
        //$anu = $this->Detail_dosen_model->cari_dosenprodi($prodi);
        $frs = $this->Inputfrs_model->trx_inputfrs($id_mhs);
        //print_r($frs);exit;
        if ($frs) {
            $data = array(
            'id_mhs' => $frs->id_mhs,
            'npm' => $frs->npm,
            'nama_mhs' => $frs->nama_mhs,
            'kode_studi' => $frs->kode_studi,
            'nama_prodi' => $frs->nama_prodi,
            'nama_status' => $frs->nama_status,
            'semester' => $frs->semester,
            'tahun_akademik' => $frs->tahun_akademik,
            'frs_data' => $this->Inputfrs_model->trx_inputfrs1($id_mhs,$smt,$periode),
            'dosen_data' => $this->Detail_dosen_model->cari_dosenprodi($prodi)
            );
            $a = $this->Inputfrs_model->trx_inputfrs1($id_mhs,$smt,$periode);
            // print_r($a[0]->sks);exit;
            $this->load->view('frs/frs_pdf', $data);
        }
    }

}