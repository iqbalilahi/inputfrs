<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Matkul extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Matkul_model');
        $this->load->model('Dosen_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','matkul/tbl_matkul_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Matkul_model->json();
    }

    public function read($id) 
    {
        $row = $this->Matkul_model->trx_matkul($id);
        if ($row) {
            $data = array(
		'id_matkul' => $row->id_matkul,
		'kode_matkul' => $row->kode_matkul,
		'nama_matkul' => $row->nama_matkul,
		'sks' => $row->sks,
		'status_nilai' => $row->status_nilai,
		'nama_dosen' => $row->nama_dosen,
		'nama_studi' => $row->nama_studi,
		'nama_prodi' => $row->nama_prodi,
		'semester' => $row->semester,
        'semester' => $row->semester,
        'tahun_akademik' => $row->tahun_akademik,
	    );
            $this->template->load('template','matkul/tbl_matkul_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('matkul'));
        }
    }

    public function create() 
    {
    $dosen = $this->Dosen_model->get_all();
        $data = array(
            'button' => 'Create',
            'action' => site_url('matkul/create_action'),
	    'id_matkul' => set_value('id_matkul'),
	    'kode_matkul' => set_value('kode_matkul'),
	    'nama_matkul' => set_value('nama_matkul'),
	    'id_sks' => set_value('id_sks'),
	    'status_nilai' => set_value('status_nilai'),
        'dosen' => $dosen,
	    'id_jenjangstudi' => set_value('id_jenjangstudi'),
	    'id_prodi' => set_value('id_prodi'),
	    'id_semester' => set_value('id_semester'),
        'id_thperiode' => set_value('id_thperiode'),
	);
        $this->template->load('template','matkul/tbl_matkul_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_matkul' => $this->input->post('kode_matkul',TRUE),
		'nama_matkul' => $this->input->post('nama_matkul',TRUE),
		'id_sks' => $this->input->post('id_sks',TRUE),
		'status_nilai' => $this->input->post('status_nilai',TRUE),
		'id_dosen' => $this->input->post('id_dosen',TRUE),
		'id_jenjangstudi' => $this->input->post('id_jenjangstudi',TRUE),
		'id_prodi' => $this->input->post('id_prodi',TRUE),
		'id_semester' => $this->input->post('id_semester',TRUE),
        'id_thperiode' => $this->input->post('id_thperiode',TRUE),
	    );

            $this->Matkul_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('matkul'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Matkul_model->get_by_id($id);
        
        if ($row) {
            $dosen = $this->$this->Dosen_model->get_all();
            $data = array(
                'button' => 'Update',
                'action' => site_url('matkul/update_action'),
		'id_matkul' => set_value('id_matkul', $row->id_matkul),
		'kode_matkul' => set_value('kode_matkul', $row->kode_matkul),
		'nama_matkul' => set_value('nama_matkul', $row->nama_matkul),
		'id_sks' => set_value('id_sks', $row->id_sks),
		'status_nilai' => set_value('status_nilai', $row->status_nilai),
        'dosen' => set_value($dosen, $row->status_nilai),
		'id_jenjangstudi' => set_value('id_jenjangstudi', $row->id_jenjangstudi),
		'id_prodi' => set_value('id_prodi', $row->id_prodi),
		'id_semester' => set_value('id_semester', $row->id_semester),
        'id_thperiode' => set_value('id_thperiode', $row->id_thperiode),
	    );
            $this->template->load('template','matkul/tbl_matkul_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('matkul'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_matkul', TRUE));
        } else {
            $data = array(
		'kode_matkul' => $this->input->post('kode_matkul',TRUE),
		'nama_matkul' => $this->input->post('nama_matkul',TRUE),
		'id_sks' => $this->input->post('id_sks',TRUE),
		'status_nilai' => $this->input->post('status_nilai',TRUE),
		'id_dosen' => $this->input->post('id_dosen',TRUE),
		'id_jenjangstudi' => $this->input->post('id_jenjangstudi',TRUE),
		'id_prodi' => $this->input->post('id_prodi',TRUE),
		'id_semester' => $this->input->post('id_semester',TRUE),
        'id_thperiode' => $this->input->post('id_thperiode',TRUE),
	    );

            $this->Matkul_model->update($this->input->post('id_matkul', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('matkul'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Matkul_model->get_by_id($id);

        if ($row) {
            $this->Matkul_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('matkul'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('matkul'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_matkul', 'kode matkul', 'trim|required');
	$this->form_validation->set_rules('nama_matkul', 'nama matkul', 'trim|required');
	$this->form_validation->set_rules('id_sks', 'id sks', 'trim|required');
	$this->form_validation->set_rules('status_nilai', 'status nilai', 'trim|required');
	//$this->form_validation->set_rules('id_dosen', 'id dosen', 'trim|required');
	$this->form_validation->set_rules('id_jenjangstudi', 'id jenjangstudi', 'trim|required');
	$this->form_validation->set_rules('id_prodi', 'id prodi', 'trim|required');
	$this->form_validation->set_rules('id_semester', 'id semester', 'trim|required');
    $this->form_validation->set_rules('id_thperiode', 'id tahun periode', 'trim|required');

	$this->form_validation->set_rules('id_matkul', 'id_matkul', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_matkul.xls";
        $judul = "tbl_matkul";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Matkul");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Matkul");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Sks");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Nilai");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Dosen");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Jenjangstudi");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Prodi");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Semester");
    xlsWriteLabel($tablehead, $kolomhead++, "Id Periode");

	foreach ($this->Matkul_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_matkul);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_matkul);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_sks);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_nilai);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_dosen);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_jenjangstudi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_prodi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_semester);
        xlsWriteLabel($tablebody, $kolombody++, $data->id_thperiode);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_matkul.doc");

        $data = array(
            'tbl_matkul_data' => $this->Matkul_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('matkul/tbl_matkul_doc',$data);
    }

}

/* End of file Matkul.php */
/* Location: ./application/controllers/Matkul.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-08-31 05:20:44 */
/* http://harviacode.com */