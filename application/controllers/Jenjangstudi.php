<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenjangstudi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Jenjangstudi_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','jenjangstudi/tbl_jenjangstudi_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Jenjangstudi_model->json();
    }

    public function read($id) 
    {
        $row = $this->Jenjangstudi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_jenjangstudi' => $row->id_jenjangstudi,
		'kode_studi' => $row->kode_studi,
		'nama_studi' => $row->nama_studi,
	    );
            $this->template->load('template','jenjangstudi/tbl_jenjangstudi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenjangstudi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenjangstudi/create_action'),
	    'id_jenjangstudi' => set_value('id_jenjangstudi'),
	    'kode_studi' => set_value('kode_studi'),
	    'nama_studi' => set_value('nama_studi'),
	);
        $this->template->load('template','jenjangstudi/tbl_jenjangstudi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_studi' => $this->input->post('kode_studi',TRUE),
		'nama_studi' => $this->input->post('nama_studi',TRUE),
	    );

            $this->Jenjangstudi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('jenjangstudi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jenjangstudi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenjangstudi/update_action'),
		'id_jenjangstudi' => set_value('id_jenjangstudi', $row->id_jenjangstudi),
		'kode_studi' => set_value('kode_studi', $row->kode_studi),
		'nama_studi' => set_value('nama_studi', $row->nama_studi),
	    );
            $this->template->load('template','jenjangstudi/tbl_jenjangstudi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenjangstudi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jenjangstudi', TRUE));
        } else {
            $data = array(
		'kode_studi' => $this->input->post('kode_studi',TRUE),
		'nama_studi' => $this->input->post('nama_studi',TRUE),
	    );

            $this->Jenjangstudi_model->update($this->input->post('id_jenjangstudi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenjangstudi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenjangstudi_model->get_by_id($id);

        if ($row) {
            $this->Jenjangstudi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenjangstudi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenjangstudi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_studi', 'kode studi', 'trim|required');
	$this->form_validation->set_rules('nama_studi', 'nama studi', 'trim|required');

	$this->form_validation->set_rules('id_jenjangstudi', 'id_jenjangstudi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_jenjangstudi.xls";
        $judul = "tbl_jenjangstudi";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Studi");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Studi");

	foreach ($this->Jenjangstudi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_studi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_studi);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_jenjangstudi.doc");

        $data = array(
            'tbl_jenjangstudi_data' => $this->Jenjangstudi_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('jenjangstudi/tbl_jenjangstudi_doc',$data);
    }

}

/* End of file Jenjangstudi.php */
/* Location: ./application/controllers/Jenjangstudi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-08-31 05:20:15 */
/* http://harviacode.com */