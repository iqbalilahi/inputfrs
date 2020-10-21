<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Judulskripsi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_loginmhs();
        $this->load->model('Judulskripsi_model');
        $this->load->model('Mhs_model');
        $this->load->model('Inputfrs_model');
        $this->load->model('Detail_dosen_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    // public function index()
    // {
    //     $this->template->load('template','judulskripsi/judulskripsi_list');
    // } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Judulskripsi_model->json();
    }

    public function read($id) 
    {
        $row = $this->Judulskripsi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_judulskripsi' => $row->id_judulskripsi,
		'id_mhs' => $row->id_mhs,
		'npm' => $row->npm,
		'nama_mhs' => $row->nama_mhs,
		'id_prodi' => $row->id_prodi,
		'perusahaan' => $row->perusahaan,
		'alamat_p' => $row->alamat_p,
		'email' => $row->email,
		'id_detail_dosen' => $row->id_detail_dosen,
		'pembimbing_a' => $row->pembimbing_a,
		'pembimbing_b' => $row->pembimbing_b,
		'id_frs' => $row->id_frs,
		'tahun_akademik' => $row->tahun_akademik,
	    );
            $this->template->load('template','judulskripsi/judulskripsi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('judulskripsi'));
        }
    }

    public function index() 
    {
        $id = $this->session->userdata('id_mhs');
        $row = $this->Mhs_model->trx_mhs($id);
        $pembimbing_a = $this->Detail_dosen_model->trx_pembimbing()->result_array();
        $pembimbing_b = $this->Detail_dosen_model->trx_pembimbing()->result_array();
        $frs = $this->Inputfrs_model->trx_judulskripsi($id);
        $data = array(
            'id_judulskripsi' => set_value('id_judulskripsi'),
            'id_mhs' => set_value('id_mhs', $row->id_mhs),
            'npm' => set_value('npm', $row->npm),
            'nama_mhs' => set_value('nama_mhs', $row->nama_mhs),
            'id_prodi' => set_value('id_prodi', $row->id_prodi),
            'judulskripsi' => set_value('judulskripsi'),
            'nama_prodi' => $row->nama_prodi,
            'perusahaan' => set_value('perusahaan'),
            'alamat_p' => set_value('alamat_p'),
            'email' => set_value('email'),
            'pembimbing_a' => $pembimbing_b,
            'pembimbing_b' => $pembimbing_b,
            'tahun_akademik' => set_value('tahun_akademik', $frs->tahun_akademik),
	);
        $this->template->load('template','judulskripsi/judulskripsi_form', $data);
    }
    
    public function buat() 
    {
        $this->load->library('Pdf');
        $id = $this->session->userdata('id_mhs');
        $id_mhs = $this->input->get_post('id_mhs');
        $npm = $this->input->get_post('npm');
        $prodi = $this->input->get_post('nama_prodi');
        
        //$nm = $this->input->post('id_mhs');
        $sql = $this->db->query("SELECT id_frs,id_mhs,id_matkul FROM frs WHERE id_mhs = ".$id." and id_matkul >= 7");
        $sql2 = $this->db->query("SELECT id_mhs FROM judulskripsi WHERE id_mhs = ".$id."");
        $cek_matkul = $sql->num_rows();
        $cek = $sql2->num_rows();
        // echo $this->db->last_query();exit;
        // print_r($cek_matkul);exit;
            if ($cek_matkul > 0 && $cek == 0 ) {
                $data = array(
                    'id_mhs' => $this->input->post('id_mhs',TRUE),
                    'npm' => $this->input->post('npm',TRUE),
                    'nama_mhs' => $this->input->post('nama_mhs',TRUE),
                    'id_prodi' => $this->input->post('id_prodi',TRUE),
                    'perusahaan' => $this->input->post('perusahaan',TRUE),
                    'judulskripsi' => $this->input->post('judulskripsi',TRUE),
                    'alamat_p' => $this->input->post('alamat_p',TRUE),
                    'email' => $this->input->post('email',TRUE),
                    'pembimbing_a' => $this->input->post('pembimbing_a',TRUE),
                    'pembimbing_b' => $this->input->post('pembimbing_b',TRUE),
                    'tahun_akademik' => $this->input->post('tahun_akademik',TRUE),
                );
                $this->Judulskripsi_model->insert($data);
                
                $row = $this->Judulskripsi_model->trx_inputjudul($id_mhs,$npm);
                $data_kuya = array(
                    'id_judulskripsi' => $row->id_judulskripsi,
                    'id_mhs' => $row->id_mhs,
                    'npm' => $row->npm,
                    'nama_mhs' => $row->nama_mhs,
                    'id_prodi' => $row->id_prodi,
                    'nama_prodi' => $row->nama_prodi,
                    'judulskripsi' => $row->judulskripsi,
                    'perusahaan' => $row->perusahaan,
                    'alamat_p' => $row->alamat_p,
                    'email' => $row->email,
                    'nama_dosen_a' => $row->nama_dosen_a,
                    'nama_dosen_b' => $row->nama_dosen_b,
                    'tahun_akademik' => $row->tahun_akademik,
                    'dosen_data' => $this->Detail_dosen_model->cari_dosenprodi($prodi)
                );
                $this->template->load('template','judulskripsi/judulskripsi_pdf',$data_kuya);
                $this->session->set_flashdata('message', 'Create Record Success 2');
            }elseif ($cek_matkul > 0 && $cek > 0) {
                $id_mhs = $this->session->userdata('id_mhs');

                $data = array(
                    'npm' => $this->input->post('npm',TRUE),
                    'nama_mhs' => $this->input->post('nama_mhs',TRUE),
                    'id_prodi' => $this->input->post('id_prodi',TRUE),
                    'perusahaan' => $this->input->post('perusahaan',TRUE),
                    'judulskripsi' => $this->input->post('judulskripsi',TRUE),
                    'alamat_p' => $this->input->post('alamat_p',TRUE),
                    'email' => $this->input->post('email',TRUE),
                    'pembimbing_a' => $this->input->post('pembimbing_a',TRUE),
                    'pembimbing_b' => $this->input->post('pembimbing_b',TRUE),
                    'tahun_akademik' => $this->input->post('tahun_akademik',TRUE),
                );
                $this->Judulskripsi_model->update($id_mhs,$data);
                
                $row = $this->Judulskripsi_model->trx_inputjudul($id_mhs,$npm);
                $data_ku = array(
                    'id_judulskripsi' => $row->id_judulskripsi,
                    //'id_mhs' => $row->id_mhs,
                    'npm' => $row->npm,
                    'nama_mhs' => $row->nama_mhs,
                    'id_prodi' => $row->id_prodi,
                    'nama_prodi' => $row->nama_prodi,
                    'judulskripsi' => $row->judulskripsi,
                    'perusahaan' => $row->perusahaan,
                    'alamat_p' => $row->alamat_p,
                    'email' => $row->email,
                    'nama_dosen_a' => $row->nama_dosen_a,
                    'nama_dosen_b' => $row->nama_dosen_b,
                    'tahun_akademik' => $row->tahun_akademik,
                    'dosen_data' => $this->Detail_dosen_model->cari_dosenprodi($prodi)
                );
                $this->template->load('template','judulskripsi/judulskripsi_pdf',$data_ku);
                $this->session->set_flashdata('message', 'Update Record Success');
            } else {
                $this->session->set_flashdata('message', 'Belum Input FRS Matakuliah Skripsi');
                $this->template->load('template','judulskripsi/judulskripsi_form');
            }
    }
    
    
    public function delete($id) 
    {
        $row = $this->Judulskripsi_model->get_by_id($id);

        if ($row) {
            $this->Judulskripsi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('judulskripsi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('judulskripsi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_mhs', 'id mhs', 'trim|required');
	$this->form_validation->set_rules('npm', 'npm', 'trim|required');
	$this->form_validation->set_rules('nama_mhs', 'nama mhs', 'trim|required');
	$this->form_validation->set_rules('id_prodi', 'id prodi', 'trim|required');
    $this->form_validation->set_rules('judulskripsi', 'judul skripsi', 'required|trim|is_unique[judulskripsi.judulskripsi]',[
        'is_unique' => 'Judul Skripsi ini sudah ada !']);
	$this->form_validation->set_rules('perusahaan', 'perusahaan', 'trim|required');
	$this->form_validation->set_rules('alamat_p', 'alamat p', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	//$this->form_validation->set_rules('id_detail_dosen', 'id detail dosen', 'trim|required');
	$this->form_validation->set_rules('pembimbing_a', 'pembimbing a', 'trim|required');
	$this->form_validation->set_rules('pembimbing_b', 'pembimbing b', 'trim|required');
	$this->form_validation->set_rules('id_frs', 'id frs', 'trim|required');
	$this->form_validation->set_rules('tahun_akademik', 'tahun akademik', 'trim|required');

	$this->form_validation->set_rules('id_judulskripsi', 'id_judulskripsi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "judulskripsi.xls";
        $judul = "judulskripsi";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Mhs");
	xlsWriteLabel($tablehead, $kolomhead++, "Npm");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Mhs");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Prodi");
	xlsWriteLabel($tablehead, $kolomhead++, "Perusahaan");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat P");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Detail Dosen");
	xlsWriteLabel($tablehead, $kolomhead++, "Pembimbing A");
	xlsWriteLabel($tablehead, $kolomhead++, "Pembimbing B");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Frs");
	xlsWriteLabel($tablehead, $kolomhead++, "Tahun Akademik");

	foreach ($this->Judulskripsi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_mhs);
	    xlsWriteLabel($tablebody, $kolombody++, $data->npm);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_mhs);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_prodi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->perusahaan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_p);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_detail_dosen);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pembimbing_a);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pembimbing_b);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_frs);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tahun_akademik);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=judulskripsi.doc");

        $data = array(
            'judulskripsi_data' => $this->Judulskripsi_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('judulskripsi/judulskripsi_doc',$data);
    }

}

/* End of file Judulskripsi.php */
/* Location: ./application/controllers/Judulskripsi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-10-06 04:35:26 */
/* http://harviacode.com */