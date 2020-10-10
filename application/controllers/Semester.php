<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Semester extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Semester_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','semester/tbl_semester_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Semester_model->json();
    }

    public function read($id) 
    {
        $row = $this->Semester_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_semester' => $row->id_semester,
		'semester' => $row->semester,
	    );
            $this->template->load('template','semester/tbl_semester_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('semester'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('semester/create_action'),
	    'id_semester' => set_value('id_semester'),
	    'semester' => set_value('semester'),
	);
        $this->template->load('template','semester/tbl_semester_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'semester' => $this->input->post('semester',TRUE),
	    );

            $this->Semester_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('semester'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Semester_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('semester/update_action'),
		'id_semester' => set_value('id_semester', $row->id_semester),
		'semester' => set_value('semester', $row->semester),
	    );
            $this->template->load('template','semester/tbl_semester_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('semester'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_semester', TRUE));
        } else {
            $data = array(
		'semester' => $this->input->post('semester',TRUE),
	    );

            $this->Semester_model->update($this->input->post('id_semester', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('semester'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Semester_model->get_by_id($id);

        if ($row) {
            $this->Semester_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('semester'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('semester'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('semester', 'semester', 'trim|required');

	$this->form_validation->set_rules('id_semester', 'id_semester', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_semester.xls";
        $judul = "tbl_semester";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Semester");

	foreach ($this->Semester_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->semester);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_semester.doc");

        $data = array(
            'tbl_semester_data' => $this->Semester_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('semester/tbl_semester_doc',$data);
    }

}

/* End of file Semester.php */
/* Location: ./application/controllers/Semester.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-08-31 05:21:26 */
/* http://harviacode.com */