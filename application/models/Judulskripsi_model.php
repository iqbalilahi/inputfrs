<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Judulskripsi_model extends CI_Model
{

    public $table = 'judulskripsi';
    public $id = 'id_judulskripsi';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_judulskripsi,id_mhs,npm,nama_mhs,id_prodi,perusahaan,alamat_p,email,id_detail_dosen,pembimbing_a,pembimbing_b,id_frs,tahun_akademik');
        $this->datatables->from('judulskripsi');
        //add this line for join
        //$this->datatables->join('table2', 'judulskripsi.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('judulskripsi/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
            ".anchor(site_url('judulskripsi/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
                ".anchor(site_url('judulskripsi/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_judulskripsi');
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
    function trx_inputjudul($id_mhs,$npm)
    {
        $this->db->select('j.id_judulskripsi,j.id_mhs,j.npm,j.nama_mhs,p.id_prodi,p.nama_prodi,j.judulskripsi,j.perusahaan,j.alamat_p,j.email,d.nama_dosen as "nama_dosen_a", dd.nama_dosen as "nama_dosen_b",j.tahun_akademik');
        $this->db->from('judulskripsi j');
        $this->db->join('tbl_prodi p', 'j.id_prodi = p.id_prodi');
        $this->db->join('tbl_dosen d', 'j.pembimbing_a = d.id_dosen');
        $this->db->join('tbl_dosen dd', 'j.pembimbing_b = dd.id_dosen');
        $this->db->where('id_mhs', $id_mhs);
        $this->db->where('npm', $npm);
        return $this->db->get()->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_judulskripsi', $q);
	$this->db->or_like('id_mhs', $q);
	$this->db->or_like('npm', $q);
	$this->db->or_like('nama_mhs', $q);
	$this->db->or_like('id_prodi', $q);
	$this->db->or_like('perusahaan', $q);
	$this->db->or_like('alamat_p', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('id_detail_dosen', $q);
	$this->db->or_like('pembimbing_a', $q);
	$this->db->or_like('pembimbing_b', $q);
	$this->db->or_like('id_frs', $q);
	$this->db->or_like('tahun_akademik', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_judulskripsi', $q);
	$this->db->or_like('id_mhs', $q);
	$this->db->or_like('npm', $q);
	$this->db->or_like('nama_mhs', $q);
	$this->db->or_like('id_prodi', $q);
	$this->db->or_like('perusahaan', $q);
	$this->db->or_like('alamat_p', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('id_detail_dosen', $q);
	$this->db->or_like('pembimbing_a', $q);
	$this->db->or_like('pembimbing_b', $q);
	$this->db->or_like('id_frs', $q);
	$this->db->or_like('tahun_akademik', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id_mhs,$data)
    {
        $this->db->where('id_mhs', $id_mhs);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Judulskripsi_model.php */
/* Location: ./application/models/Judulskripsi_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-10-06 04:35:26 */
/* http://harviacode.com */