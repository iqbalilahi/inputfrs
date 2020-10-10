<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tahunperiode extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tahunperiode_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','tahunperiode/tbl_tahunperiode_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tahunperiode_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tahunperiode_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_thperiode' => $row->id_thperiode,
		'periode' => $row->periode,
		'tahun_akademik' => $row->tahun_akademik,
		'ket_periode' => $row->ket_periode,
	    );
            $this->template->load('template','tahunperiode/tbl_tahunperiode_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tahunperiode'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tahunperiode/create_action'),
	    'id_thperiode' => set_value('id_thperiode'),
	    'periode' => set_value('periode'),
	    'tahun_akademik' => set_value('tahun_akademik'),
	    'ket_periode' => set_value('ket_periode'),
	);
        $this->template->load('template','tahunperiode/tbl_tahunperiode_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'periode' => $this->input->post('periode',TRUE),
		'tahun_akademik' => $this->input->post('tahun_akademik',TRUE),
		'ket_periode' => $this->input->post('ket_periode',TRUE),
	    );

            $this->Tahunperiode_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('tahunperiode'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tahunperiode_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tahunperiode/update_action'),
		'id_thperiode' => set_value('id_thperiode', $row->id_thperiode),
		'periode' => set_value('periode', $row->periode),
		'tahun_akademik' => set_value('tahun_akademik', $row->tahun_akademik),
		'ket_periode' => set_value('ket_periode', $row->ket_periode),
	    );
            $this->template->load('template','tahunperiode/tbl_tahunperiode_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tahunperiode'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_thperiode', TRUE));
        } else {
            $data = array(
		'periode' => $this->input->post('periode',TRUE),
		'tahun_akademik' => $this->input->post('tahun_akademik',TRUE),
		'ket_periode' => $this->input->post('ket_periode',TRUE),
	    );

            $this->Tahunperiode_model->update($this->input->post('id_thperiode', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tahunperiode'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tahunperiode_model->get_by_id($id);

        if ($row) {
            $this->Tahunperiode_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tahunperiode'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tahunperiode'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('periode', 'periode', 'trim|required');
	$this->form_validation->set_rules('tahun_akademik', 'tahun akademik', 'trim|required');
	$this->form_validation->set_rules('ket_periode', 'ket periode', 'trim|required');

	$this->form_validation->set_rules('id_thperiode', 'id_thperiode', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_tahunperiode.xls";
        $judul = "tbl_tahunperiode";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Periode");
	xlsWriteLabel($tablehead, $kolomhead++, "Tahun Akademik");
	xlsWriteLabel($tablehead, $kolomhead++, "Ket Periode");

	foreach ($this->Tahunperiode_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->periode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tahun_akademik);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ket_periode);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_tahunperiode.doc");

        $data = array(
            'tbl_tahunperiode_data' => $this->Tahunperiode_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tahunperiode/tbl_tahunperiode_doc',$data);
    }

}

/* End of file Tahunperiode.php */
/* Location: ./application/controllers/Tahunperiode.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-08-31 05:22:07 */
/* http://harviacode.com */