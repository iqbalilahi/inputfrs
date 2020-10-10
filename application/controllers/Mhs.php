<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mhs extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Mhs_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','mhs/tbl_mhs_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mhs_model->json();
    }

    public function read($id) 
    {
        $row = $this->Mhs_model->trx_mhs($id);
        if ($row) {
            $data = array(
		'id_mhs' => $row->id_mhs,
		'npm' => $row->npm,
		'nama_mhs' => $row->nama_mhs,
		'tempat_lahir' => $row->tempat_lahir,
		'tanggal_lahir' => $row->tanggal_lahir,
		'jeniskelamin' => $row->jeniskelamin,
		'agama' => $row->agama,
		'nohp_mhs' => $row->nohp_mhs,
		'email_mhs' => $row->email_mhs,
		'nama_studi' => $row->nama_studi,
		'nama_prodi' => $row->nama_prodi,
		'nama_status' => $row->nama_status,
		'password' => $row->password,
        'images' => $row->images,
        'nama_level' => $row->nama_level,
        'is_aktif'      => $row->is_aktif,
	    );
            $this->template->load('template','mhs/tbl_mhs_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mhs'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mhs/create_action'),
	    'id_mhs' => set_value('id_mhs'),
	    'npm' => set_value('npm'),
	    'nama_mhs' => set_value('nama_mhs'),
	    'tempat_lahir' => set_value('tempat_lahir'),
	    'tanggal_lahir' => set_value('tanggal_lahir'),
	    'jeniskelamin' => set_value('jeniskelamin'),
	    'agama' => set_value('agama'),
	    'nohp_mhs' => set_value('nohp_mhs'),
	    'email_mhs' => set_value('email_mhs'),
	    'id_jenjangstudi' => set_value('id_jenjangstudi'),
	    'id_prodi' => set_value('id_prodi'),
	    'id_status' => set_value('id_status'),
	    'password' => set_value('password'),
        'images' => set_value('images'),
        'id_user_level' => set_value('id_user_level'),
        'is_aktif'      => set_value('is_aktif'),
	);
        $this->template->load('template','mhs/tbl_mhs_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        $foto = $this->upload_foto();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $password       = $this->input->post('password',TRUE);
            $options        = array("cost"=>4);
            $hashPassword   = password_hash($password,PASSWORD_BCRYPT,$options);
            
            $data = array(
		'npm' => $this->input->post('npm',TRUE),
		'nama_mhs' => $this->input->post('nama_mhs',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'jeniskelamin' => $this->input->post('jeniskelamin',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'nohp_mhs' => $this->input->post('nohp_mhs',TRUE),
		'email_mhs' => $this->input->post('email_mhs',TRUE),
		'id_jenjangstudi' => $this->input->post('id_jenjangstudi',TRUE),
		'id_prodi' => $this->input->post('id_prodi',TRUE),
		'id_status' => $this->input->post('id_status',TRUE),
		'password' => $hashPassword,
        'images'        => $foto['file_name'],
        'id_user_level' => $this->input->post('id_user_level',TRUE),
        'is_aktif'      => $this->input->post('is_aktif',TRUE),
	    );

            $this->Mhs_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success ');
            redirect(site_url('mhs'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mhs_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mhs/update_action'),
		'id_mhs' => set_value('id_mhs', $row->id_mhs),
		'npm' => set_value('npm', $row->npm),
		'nama_mhs' => set_value('nama_mhs', $row->nama_mhs),
		'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
		'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
		'jeniskelamin' => set_value('jeniskelamin', $row->jeniskelamin),
		'agama' => set_value('agama', $row->agama),
		'nohp_mhs' => set_value('nohp_mhs', $row->nohp_mhs),
		'email_mhs' => set_value('email_mhs', $row->email_mhs),
		'id_jenjangstudi' => set_value('id_jenjangstudi', $row->id_jenjangstudi),
		'id_prodi' => set_value('id_prodi', $row->id_prodi),
		'id_status' => set_value('id_status', $row->id_status),
		'password' => set_value('password', $row->password),
        'images'        => set_value('images', $row->images),
        'id_user_level' => set_value('id_user_level', $row->id_user_level),
        'is_aktif'      => set_value('is_aktif', $row->is_aktif),
	    );
            $this->template->load('template','mhs/tbl_mhs_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mhs'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        $foto = $this->upload_foto();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_users', TRUE));
        } else {
            if($foto['file_name']==''){
            $data = array(
		'npm' => $this->input->post('npm',TRUE),
		'nama_mhs' => $this->input->post('nama_mhs',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'jeniskelamin' => $this->input->post('jeniskelamin',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'nohp_mhs' => $this->input->post('nohp_mhs',TRUE),
		'email_mhs' => $this->input->post('email_mhs',TRUE),
		'id_jenjangstudi' => $this->input->post('id_jenjangstudi',TRUE),
		'id_prodi' => $this->input->post('id_prodi',TRUE),
		'id_status' => $this->input->post('id_status',TRUE),
        'id_user_level' => $this->input->post('id_user_level',TRUE),
        'is_aktif'      => $this->input->post('is_aktif',TRUE));
        }else{
                $data = array(
	    'npm' => $this->input->post('npm',TRUE),
        'nama_mhs' => $this->input->post('nama_mhs',TRUE),
        'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
        'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
        'jeniskelamin' => $this->input->post('jeniskelamin',TRUE),
        'agama' => $this->input->post('agama',TRUE),
        'nohp_mhs' => $this->input->post('nohp_mhs',TRUE),
        'email_mhs' => $this->input->post('email_mhs',TRUE),
        'id_jenjangstudi' => $this->input->post('id_jenjangstudi',TRUE),
        'id_prodi' => $this->input->post('id_prodi',TRUE),
        'images'        =>$foto['file_name'],
        'id_status' => $this->input->post('id_status',TRUE),
        'id_user_level' => $this->input->post('id_user_level',TRUE),
        'is_aktif'      => $this->input->post('is_aktif',TRUE));
                // ubah foto profil yang aktif
                $this->session->set_userdata('images',$foto['file_name']);
            }

            $this->Mhs_model->update($this->input->post('id_mhs', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mhs'));
        }
    }

    function upload_foto(){
        $config['upload_path']          = './assets/foto_mhs';
        $config['allowed_types']        = 'gif|jpg|png';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('images');
        return $this->upload->data();
    }
    
    public function delete($id) 
    {
        $row = $this->Mhs_model->get_by_id($id);

        if ($row) {
            $this->Mhs_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mhs'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mhs'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('npm', 'npm', 'trim|required|min_length[14]|max_length[15]');
	$this->form_validation->set_rules('nama_mhs', 'nama mhs', 'trim|required');
	$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
	$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
	$this->form_validation->set_rules('jeniskelamin', 'jeniskelamin', 'trim|required');
	$this->form_validation->set_rules('agama', 'agama', 'trim|required');
	$this->form_validation->set_rules('nohp_mhs', 'nohp mhs', 'trim|required|numeric|min_length[10]|max_length[13]');
	$this->form_validation->set_rules('email_mhs', 'email mhs', 'trim|required');
	$this->form_validation->set_rules('id_jenjangstudi', 'id jenjangstudi', 'trim|required');
	$this->form_validation->set_rules('id_prodi', 'id prodi', 'trim|required');
	$this->form_validation->set_rules('id_status', 'id status', 'trim|required');
	// $this->form_validation->set_rules('password', 'password', 'trim|required');
    $this->form_validation->set_rules('id_user_level', 'id user level', 'trim|required');
    $this->form_validation->set_rules('is_aktif', 'is aktif', 'trim|required');

	$this->form_validation->set_rules('id_mhs', 'id_mhs', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_mhs.xls";
        $judul = "tbl_mhs";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Npm");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Mhs");
	xlsWriteLabel($tablehead, $kolomhead++, "Tempat Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Jeniskelamin");
	xlsWriteLabel($tablehead, $kolomhead++, "Agama");
	xlsWriteLabel($tablehead, $kolomhead++, "Nohp Mhs");
	xlsWriteLabel($tablehead, $kolomhead++, "Email Mhs");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Jenjangstudi");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Prodi");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Password");
    xlsWriteLabel($tablehead, $kolomhead++, "Images");
    xlsWriteLabel($tablehead, $kolomhead++, "Id User Level");
    xlsWriteLabel($tablehead, $kolomhead++, "Is Aktif");

	foreach ($this->Mhs_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->npm);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_mhs);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tempat_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jeniskelamin);
	    xlsWriteNumber($tablebody, $kolombody++, $data->agama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nohp_mhs);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email_mhs);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_jenjangstudi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_prodi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_status);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
        xlsWriteLabel($tablebody, $kolombody++, $data->images);
        xlsWriteNumber($tablebody, $kolombody++, $data->id_user_level);
        xlsWriteLabel($tablebody, $kolombody++, $data->is_aktif);


	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_mhs.doc");

        $data = array(
            'tbl_mhs_data' => $this->Mhs_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('mhs/tbl_mhs_doc',$data);
    }

}

/* End of file Mhs.php */
/* Location: ./application/controllers/Mhs.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-08-31 05:21:01 */
/* http://harviacode.com */