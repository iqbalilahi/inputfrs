<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detail_dosen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Detail_dosen_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','detail_dosen/detail_dosen_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Detail_dosen_model->json();
    }

    public function read($id) 
    {
        $row = $this->Detail_dosen_model->trx_detail_dosen($id);
        if ($row) {
            $data = array(
		'id_detail_dosen' => $row->id_detail_dosen,
		'nama_dosen' => $row->nama_dosen,
		'jabatan' => $row->jabatan,
	    );
            $this->template->load('template','detail_dosen/detail_dosen_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_dosen'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('detail_dosen/create_action'),
	    'id_detail_dosen' => set_value('id_detail_dosen'),
	    'id_dosen' => set_value('id_dosen'),
	    'id_jabatan' => set_value('id_jabatan'),
	);
        $this->template->load('template','detail_dosen/detail_dosen_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_dosen' => $this->input->post('id_dosen',TRUE),
		'id_jabatan' => $this->input->post('id_jabatan',TRUE),
	    );

            $this->Detail_dosen_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('detail_dosen'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Detail_dosen_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('detail_dosen/update_action'),
		'id_detail_dosen' => set_value('id_detail_dosen', $row->id_detail_dosen),
		'id_dosen' => set_value('id_dosen', $row->id_dosen),
		'id_jabatan' => set_value('id_jabatan', $row->id_jabatan),
	    );
            $this->template->load('template','detail_dosen/detail_dosen_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_dosen'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_detail_dosen', TRUE));
        } else {
            $data = array(
		'id_dosen' => $this->input->post('id_dosen',TRUE),
		'id_jabatan' => $this->input->post('id_jabatan',TRUE),
	    );

            $this->Detail_dosen_model->update($this->input->post('id_detail_dosen', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('detail_dosen'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Detail_dosen_model->get_by_id($id);

        if ($row) {
            $this->Detail_dosen_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('detail_dosen'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_dosen'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_dosen', 'id dosen', 'trim|required');
	$this->form_validation->set_rules('id_jabatan', 'id jabatan', 'trim|required');

	$this->form_validation->set_rules('id_detail_dosen', 'id_detail_dosen', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "detail_dosen.xls";
        $judul = "detail_dosen";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Dosen");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Jabatan");

	foreach ($this->Detail_dosen_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_dosen);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_jabatan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=detail_dosen.doc");

        $data = array(
            'detail_dosen_data' => $this->Detail_dosen_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('detail_dosen/detail_dosen_doc',$data);
    }

}

/* End of file Detail_dosen.php */
/* Location: ./application/controllers/Detail_dosen.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-08-31 05:16:08 */
/* http://harviacode.com */