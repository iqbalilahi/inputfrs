<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dosen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Dosen_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','dosen/tbl_dosen_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Dosen_model->json();
    }

    public function read($id) 
    {
        $row = $this->Dosen_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_dosen' => $row->id_dosen,
		'nid' => $row->nid,
		'nama_dosen' => $row->nama_dosen,
		'telp_dosen' => $row->telp_dosen,
		'alamat_dosen' => $row->alamat_dosen,
		'jeniskelamin' => $row->jeniskelamin,
		'pendidikan_akhir' => $row->pendidikan_akhir,
		'agama' => $row->agama,
		'email_dosen' => $row->email_dosen,
		'tempat_lahir' => $row->tempat_lahir,
		'tanggal_lahir' => $row->tanggal_lahir,
	    );
            $this->template->load('template','dosen/tbl_dosen_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dosen'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('dosen/create_action'),
	    'id_dosen' => set_value('id_dosen'),
	    'nid' => set_value('nid'),
	    'nama_dosen' => set_value('nama_dosen'),
	    'telp_dosen' => set_value('telp_dosen'),
	    'alamat_dosen' => set_value('alamat_dosen'),
	    'jeniskelamin' => set_value('jeniskelamin'),
	    'pendidikan_akhir' => set_value('pendidikan_akhir'),
	    'agama' => set_value('agama'),
	    'email_dosen' => set_value('email_dosen'),
	    'tempat_lahir' => set_value('tempat_lahir'),
	    'tanggal_lahir' => set_value('tanggal_lahir'),
	);
        $this->template->load('template','dosen/tbl_dosen_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nid' => $this->input->post('nid',TRUE),
		'nama_dosen' => $this->input->post('nama_dosen',TRUE),
		'telp_dosen' => $this->input->post('telp_dosen',TRUE),
		'alamat_dosen' => $this->input->post('alamat_dosen',TRUE),
		'jeniskelamin' => $this->input->post('jeniskelamin',TRUE),
		'pendidikan_akhir' => $this->input->post('pendidikan_akhir',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'email_dosen' => $this->input->post('email_dosen',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
	    );

            $this->Dosen_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('dosen'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Dosen_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('dosen/update_action'),
		'id_dosen' => set_value('id_dosen', $row->id_dosen),
		'nid' => set_value('nid', $row->nid),
		'nama_dosen' => set_value('nama_dosen', $row->nama_dosen),
		'telp_dosen' => set_value('telp_dosen', $row->telp_dosen),
		'alamat_dosen' => set_value('alamat_dosen', $row->alamat_dosen),
		'jeniskelamin' => set_value('jeniskelamin', $row->jeniskelamin),
		'pendidikan_akhir' => set_value('pendidikan_akhir', $row->pendidikan_akhir),
		'agama' => set_value('agama', $row->agama),
		'email_dosen' => set_value('email_dosen', $row->email_dosen),
		'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
		'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
	    );
            $this->template->load('template','dosen/tbl_dosen_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dosen'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_dosen', TRUE));
        } else {
            $data = array(
		'nid' => $this->input->post('nid',TRUE),
		'nama_dosen' => $this->input->post('nama_dosen',TRUE),
		'telp_dosen' => $this->input->post('telp_dosen',TRUE),
		'alamat_dosen' => $this->input->post('alamat_dosen',TRUE),
		'jeniskelamin' => $this->input->post('jeniskelamin',TRUE),
		'pendidikan_akhir' => $this->input->post('pendidikan_akhir',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'email_dosen' => $this->input->post('email_dosen',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
	    );

            $this->Dosen_model->update($this->input->post('id_dosen', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('dosen'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Dosen_model->get_by_id($id);

        if ($row) {
            $this->Dosen_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('dosen'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dosen'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nid', 'nid', 'trim|required');
	$this->form_validation->set_rules('nama_dosen', 'nama dosen', 'trim|required');
	$this->form_validation->set_rules('telp_dosen', 'telp dosen', 'trim|required|numeric|min_length[10]|max_length[13]');
	$this->form_validation->set_rules('alamat_dosen', 'alamat dosen', 'trim|required');
	$this->form_validation->set_rules('jeniskelamin', 'jeniskelamin', 'trim|required');
	$this->form_validation->set_rules('pendidikan_akhir', 'pendidikan akhir', 'trim|required');
	$this->form_validation->set_rules('agama', 'agama', 'trim|required');
	$this->form_validation->set_rules('email_dosen', 'email dosen', 'trim|required');
	$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
	$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');

	$this->form_validation->set_rules('id_dosen', 'id_dosen', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_dosen.xls";
        $judul = "tbl_dosen";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nid");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Dosen");
	xlsWriteLabel($tablehead, $kolomhead++, "Telp Dosen");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Dosen");
	xlsWriteLabel($tablehead, $kolomhead++, "Jeniskelamin");
	xlsWriteLabel($tablehead, $kolomhead++, "Pendidikan Akhir");
	xlsWriteLabel($tablehead, $kolomhead++, "Agama");
	xlsWriteLabel($tablehead, $kolomhead++, "Email Dosen");
	xlsWriteLabel($tablehead, $kolomhead++, "Tempat Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Lahir");

	foreach ($this->Dosen_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nid);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_dosen);
	    xlsWriteLabel($tablebody, $kolombody++, $data->telp_dosen);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_dosen);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jeniskelamin);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pendidikan_akhir);
	    xlsWriteNumber($tablebody, $kolombody++, $data->agama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email_dosen);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tempat_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_lahir);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_dosen.doc");

        $data = array(
            'tbl_dosen_data' => $this->Dosen_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('dosen/tbl_dosen_doc',$data);
    }

}

/* End of file Dosen.php */
/* Location: ./application/controllers/Dosen.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-08-31 05:19:20 */
/* http://harviacode.com */