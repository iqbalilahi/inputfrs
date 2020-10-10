<?php
Class Log extends CI_Controller{
    
    
    
    function index(){
        $this->load->view('auth/login_mhs');
    }
    
    function login_mhs(){
        $npm      = $this->input->post('npm');
        //$password   = $this->input->post('password');
        $password = $this->input->post('password',TRUE);
        $hashPass = password_hash($password,PASSWORD_DEFAULT);
        $test     = password_verify($password, $hashPass);
        // query chek mhs
        $this->db->where('npm',$npm);
        //$this->db->where('password',  $test);
        $mhs       = $this->db->get('tbl_mhs');
        if($mhs->num_rows()>0){
            $mhs = $mhs->row_array();
            if(password_verify($password,$mhs['password'])){
                // retrive user data to session
                $this->session->set_userdata($mhs);
                $this->session->set_userdata('tingkat', 'mahasiswa');
                redirect('inputfrs');
            }else{
                redirect('log');
            }
        }else{
            $this->session->set_flashdata('status_login','email atau password yang anda input salah');
            redirect('log');
        }
    }
    
    function logout(){
        $this->session->sess_destroy();
        $this->session->set_flashdata('status_login','Anda sudah berhasil keluar dari aplikasi');
        redirect('log');
    }
}
