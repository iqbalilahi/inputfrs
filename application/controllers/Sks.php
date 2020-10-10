<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sks extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Sks_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','sks/tbl_sks_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Sks_model->json();
    }

    public function read($id) 
    {
        $row = $this->Sks_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_sks' => $row->id_sks,
		'sks' => $row->sks,
	    );
            $this->template->load('template','sks/tbl_sks_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sks'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('sks/create_action'),
	    'id_sks' => set_value('id_sks'),
	    'sks' => set_value('sks'),
	);
        $this->template->load('template','sks/tbl_sks_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'sks' => $this->input->post('sks',TRUE),
	    );

            $this->Sks_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('sks'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Sks_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sks/update_action'),
		'id_sks' => set_value('id_sks', $row->id_sks),
		'sks' => set_value('sks', $row->sks),
	    );
            $this->template->load('template','sks/tbl_sks_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sks'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_sks', TRUE));
        } else {
            $data = array(
		'sks' => $this->input->post('sks',TRUE),
	    );

            $this->Sks_model->update($this->input->post('id_sks', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('sks'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Sks_model->get_by_id($id);

        if ($row) {
            $this->Sks_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('sks'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sks'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('sks', 'sks', 'trim|required');

	$this->form_validation->set_rules('id_sks', 'id_sks', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_sks.xls";
        $judul = "tbl_sks";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Sks");

	foreach ($this->Sks_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->sks);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_sks.doc");

        $data = array(
            'tbl_sks_data' => $this->Sks_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('sks/tbl_sks_doc',$data);
    }

}

/* End of file Sks.php */
/* Location: ./application/controllers/Sks.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-08-31 05:21:40 */
/* http://harviacode.com */