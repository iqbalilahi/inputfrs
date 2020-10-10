<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mhs_model extends CI_Model
{

    public $table = 'tbl_mhs';
    public $id = 'id_mhs';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_mhs,npm,nama_mhs,tempat_lahir,tanggal_lahir,jeniskelamin,agama,nohp_mhs,email_mhs,tbl_jenjangstudi.nama_studi,tbl_prodi.nama_prodi,tbl_prodi.id_prodi,tbl_status.nama_status,password,tbl_user_level.nama_level','is_aktif');
        $this->datatables->from('tbl_mhs');
        //$this->datatables->add_column('is_aktif', '$1', 'rename_string_is_aktif(is_aktif)');
        //add this line for join
        $this->datatables->join('tbl_jenjangstudi', 'tbl_mhs.id_jenjangstudi = tbl_jenjangstudi.id_jenjangstudi');
        $this->datatables->join('tbl_prodi', 'tbl_mhs.id_prodi = tbl_prodi.id_prodi');
        $this->datatables->join('tbl_status', 'tbl_mhs.id_status = tbl_status.id_status');
        $this->datatables->join('tbl_user_level', 'tbl_mhs.id_user_level = tbl_user_level.id_user_level');
        $this->datatables->add_column('action', anchor(site_url('mhs/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
            ".anchor(site_url('mhs/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
                ".anchor(site_url('mhs/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_mhs');
        return $this->datatables->generate();
    }
    function trx_mhs($id)
    {
        $this->db->select('id_mhs,npm,nama_mhs,tempat_lahir,tanggal_lahir,jeniskelamin,agama,nohp_mhs,email_mhs,tbl_jenjangstudi.nama_studi,tbl_prodi.nama_prodi,tbl_prodi.id_prodi,tbl_status.nama_status,password,tbl_user_level.nama_level,tbl_user_level.id_user_level,is_aktif,images');
        $this->db->from('tbl_mhs');
        $this->db->join('tbl_jenjangstudi', 'tbl_mhs.id_jenjangstudi = tbl_jenjangstudi.id_jenjangstudi');
        $this->db->join('tbl_prodi', 'tbl_mhs.id_prodi = tbl_prodi.id_prodi');
        $this->db->join('tbl_status', 'tbl_mhs.id_status = tbl_status.id_status');
        $this->db->join('tbl_user_level', 'tbl_mhs.id_user_level = tbl_user_level.id_user_level');
        $this->db->where($this->id, $id);
        $query = $this->db->get()->row();
        return $query;
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_mhs', $q);
	$this->db->or_like('npm', $q);
	$this->db->or_like('nama_mhs', $q);
	$this->db->or_like('tempat_lahir', $q);
	$this->db->or_like('tanggal_lahir', $q);
	$this->db->or_like('jeniskelamin', $q);
	$this->db->or_like('agama', $q);
	$this->db->or_like('nohp_mhs', $q);
	$this->db->or_like('email_mhs', $q);
	$this->db->or_like('id_jenjangstudi', $q);
	$this->db->or_like('id_prodi', $q);
	$this->db->or_like('id_status', $q);
	$this->db->or_like('password', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_mhs', $q);
	$this->db->or_like('npm', $q);
	$this->db->or_like('nama_mhs', $q);
	$this->db->or_like('tempat_lahir', $q);
	$this->db->or_like('tanggal_lahir', $q);
	$this->db->or_like('jeniskelamin', $q);
	$this->db->or_like('agama', $q);
	$this->db->or_like('nohp_mhs', $q);
	$this->db->or_like('email_mhs', $q);
	$this->db->or_like('id_jenjangstudi', $q);
	$this->db->or_like('id_prodi', $q);
	$this->db->or_like('id_status', $q);
	$this->db->or_like('password', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Mhs_model.php */
/* Location: ./application/models/Mhs_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-08-31 05:21:01 */
/* http://harviacode.com */