<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Prodi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Prodi_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','prodi/tbl_prodi_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Prodi_model->json();
    }

    public function read($id) 
    {
        $row = $this->Prodi_model->trx_prodi($id);
        if ($row) {
            $data = array(
		'id_prodi' => $row->id_prodi,
		'kode_prodi' => $row->kode_prodi,
        'kode_studi' => $row->kode_studi,
		'nama_prodi' => $row->nama_prodi,
	    );
            $this->template->load('template','prodi/tbl_prodi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('prodi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('prodi/create_action'),
	    'id_prodi' => set_value('id_prodi'),
	    'kode_prodi' => set_value('kode_prodi'),
        'id_jenjangstudi' => set_value('id_jenjangstudi'),
	    'nama_prodi' => set_value('nama_prodi'),
	);
        $this->template->load('template','prodi/tbl_prodi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_prodi' => $this->input->post('kode_prodi',TRUE),
        'id_jenjangstudi' => $this->input->post('id_jenjangstudi',TRUE),
		'nama_prodi' => $this->input->post('nama_prodi',TRUE),
	    );

            $this->Prodi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('prodi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Prodi_model->trx_prodi($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('prodi/update_action'),
		'id_prodi' => set_value('id_prodi', $row->id_prodi),
		'kode_prodi' => set_value('kode_prodi', $row->kode_prodi),
        'id_jenjangstudi' => set_value('id_jenjangstudi', $row->id_jenjangstudi),
		'nama_prodi' => set_value('nama_prodi', $row->nama_prodi),
	    );
            $this->template->load('template','prodi/tbl_prodi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('prodi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_prodi', TRUE));
        } else {
            $data = array(
		'kode_prodi' => $this->input->post('kode_prodi',TRUE),
        'id_jenjangstudi' => $this->input->post('id_jenjangstudi',TRUE),
		'nama_prodi' => $this->input->post('nama_prodi',TRUE),
	    );

            $this->Prodi_model->update($this->input->post('id_prodi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('prodi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Prodi_model->trx_prodi($id);

        if ($row) {
            $this->Prodi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('prodi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('prodi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_prodi', 'kode prodi', 'trim|required');
	$this->form_validation->set_rules('nama_prodi', 'nama prodi', 'trim|required');
    $this->form_validation->set_rules('id_jenjangstudi', 'id jenjang studi', 'trim|required');
	$this->form_validation->set_rules('id_prodi', 'id_prodi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_prodi.xls";
        $judul = "tbl_prodi";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Prodi");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Prodi");

	foreach ($this->Prodi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_prodi);
        xlsWriteLabel($tablebody, $kolombody++, $data->id_jenjangstudi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_prodi);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_prodi.doc");

        $data = array(
            'tbl_prodi_data' => $this->Prodi_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('prodi/tbl_prodi_doc',$data);
    }

}

/* End of file Prodi.php */
/* Location: ./application/controllers/Prodi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-08-31 05:21:15 */
/* http://harviacode.com */