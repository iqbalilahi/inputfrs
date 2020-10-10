<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dosen_model extends CI_Model
{

    public $table = 'tbl_dosen';
    public $id = 'id_dosen';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_dosen,nid,nama_dosen,telp_dosen,alamat_dosen,jeniskelamin,pendidikan_akhir,agama,email_dosen,tempat_lahir,tanggal_lahir');
        $this->datatables->from('tbl_dosen');
        //add this line for join
        //$this->datatables->join('table2', 'tbl_dosen.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('dosen/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
            ".anchor(site_url('dosen/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
                ".anchor(site_url('dosen/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_dosen');
        return $this->datatables->generate();
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
        $this->db->like('id_dosen', $q);
	$this->db->or_like('nid', $q);
	$this->db->or_like('nama_dosen', $q);
	$this->db->or_like('telp_dosen', $q);
	$this->db->or_like('alamat_dosen', $q);
	$this->db->or_like('jeniskelamin', $q);
	$this->db->or_like('pendidikan_akhir', $q);
	$this->db->or_like('agama', $q);
	$this->db->or_like('email_dosen', $q);
	$this->db->or_like('tempat_lahir', $q);
	$this->db->or_like('tanggal_lahir', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_dosen', $q);
	$this->db->or_like('nid', $q);
	$this->db->or_like('nama_dosen', $q);
	$this->db->or_like('telp_dosen', $q);
	$this->db->or_like('alamat_dosen', $q);
	$this->db->or_like('jeniskelamin', $q);
	$this->db->or_like('pendidikan_akhir', $q);
	$this->db->or_like('agama', $q);
	$this->db->or_like('email_dosen', $q);
	$this->db->or_like('tempat_lahir', $q);
	$this->db->or_like('tanggal_lahir', $q);
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

/* End of file Dosen_model.php */
/* Location: ./application/models/Dosen_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-08-31 05:19:20 */
/* http://harviacode.com */