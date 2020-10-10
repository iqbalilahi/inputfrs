<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Status extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Status_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','status/tbl_status_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Status_model->json();
    }

    public function read($id) 
    {
        $row = $this->Status_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_status' => $row->id_status,
		'kode_status' => $row->kode_status,
		'nama_status' => $row->nama_status,
	    );
            $this->template->load('template','status/tbl_status_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('status'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('status/create_action'),
	    'id_status' => set_value('id_status'),
	    'kode_status' => set_value('kode_status'),
	    'nama_status' => set_value('nama_status'),
	);
        $this->template->load('template','status/tbl_status_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_status' => $this->input->post('kode_status',TRUE),
		'nama_status' => $this->input->post('nama_status',TRUE),
	    );

            $this->Status_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('status'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Status_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('status/update_action'),
		'id_status' => set_value('id_status', $row->id_status),
		'kode_status' => set_value('kode_status', $row->kode_status),
		'nama_status' => set_value('nama_status', $row->nama_status),
	    );
            $this->template->load('template','status/tbl_status_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('status'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_status', TRUE));
        } else {
            $data = array(
		'kode_status' => $this->input->post('kode_status',TRUE),
		'nama_status' => $this->input->post('nama_status',TRUE),
	    );

            $this->Status_model->update($this->input->post('id_status', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('status'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Status_model->get_by_id($id);

        if ($row) {
            $this->Status_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('status'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('status'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_status', 'kode status', 'trim|required');
	$this->form_validation->set_rules('nama_status', 'nama status', 'trim|required');

	$this->form_validation->set_rules('id_status', 'id_status', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_status.xls";
        $judul = "tbl_status";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Status");

	foreach ($this->Status_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_status);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_status.doc");

        $data = array(
            'tbl_status_data' => $this->Status_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('status/tbl_status_doc',$data);
    }

}

/* End of file Status.php */
/* Location: ./application/controllers/Status.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-08-31 05:21:53 */
/* http://harviacode.com */