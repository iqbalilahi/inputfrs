<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Matkul_model extends CI_Model
{

    public $table = 'tbl_matkul';
    public $id = 'id_matkul';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('tbl_dosen.id_dosen,tbl_dosen.nama_dosen,id_matkul,kode_matkul,nama_matkul,tbl_sks.sks,status_nilai,tbl_jenjangstudi.nama_studi,tbl_prodi.nama_prodi,tbl_semester.semester,tbl_tahunperiode.tahun_akademik');
        $this->datatables->from('tbl_matkul');
        //add this line for join
        $this->datatables->join('tbl_sks', 'tbl_matkul.id_sks = tbl_sks.id_sks','left');
        $this->datatables->join('tbl_dosen', 'tbl_matkul.id_dosen = tbl_dosen.id_dosen','left');
        $this->datatables->join('tbl_jenjangstudi', 'tbl_matkul.id_jenjangstudi = tbl_jenjangstudi.id_jenjangstudi','left');
        $this->datatables->join('tbl_prodi', 'tbl_matkul.id_prodi = tbl_prodi.id_prodi','left');
        $this->datatables->join('tbl_semester', 'tbl_matkul.id_semester = tbl_semester.id_semester','left');
        $this->db->join('tbl_tahunperiode', 'tbl_matkul.id_thperiode = tbl_tahunperiode.id_thperiode','left');
        //$this->datatables->where('id_dosen >=', '0');
        $this->datatables->add_column('action', anchor(site_url('matkul/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
            ".anchor(site_url('matkul/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
                ".anchor(site_url('matkul/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_matkul');
        return $this->datatables->generate();
    }
 function trx_matkul($id)
    {
        $this->db->select('id_matkul,tbl_sks.id_sks,kode_matkul,nama_matkul,tbl_sks.sks,status_nilai,tbl_jenjangstudi.id_jenjangstudi,tbl_prodi.id_prodi,tbl_semester.id_semester,tbl_dosen.id_dosen,tbl_dosen.nama_dosen,tbl_jenjangstudi.nama_studi,tbl_prodi.nama_prodi,tbl_semester.semester , tbl_tahunperiode.id_thperiode,tbl_tahunperiode.tahun_akademik');
        $this->db->from('tbl_matkul');
        $this->db->join('tbl_sks', 'tbl_matkul.id_sks = tbl_sks.id_sks','left');
        $this->db->join('tbl_dosen', 'tbl_matkul.id_dosen = tbl_dosen.id_dosen','left');
        $this->db->join('tbl_jenjangstudi', 'tbl_matkul.id_jenjangstudi = tbl_jenjangstudi.id_jenjangstudi','left');
        $this->db->join('tbl_prodi', 'tbl_matkul.id_prodi = tbl_prodi.id_prodi','left');
        $this->db->join('tbl_semester', 'tbl_matkul.id_semester = tbl_semester.id_semester','left');
        $this->db->join('tbl_tahunperiode', 'tbl_matkul.id_thperiode = tbl_tahunperiode.id_thperiode','left');
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
        $this->db->like('id_matkul', $q);
	$this->db->or_like('kode_matkul', $q);
	$this->db->or_like('nama_matkul', $q);
	$this->db->or_like('id_sks', $q);
	$this->db->or_like('status_nilai', $q);
	$this->db->or_like('id_dosen', $q);
	$this->db->or_like('id_jenjangstudi', $q);
	$this->db->or_like('id_prodi', $q);
	$this->db->or_like('id_semester', $q);
    $this->db->or_like('id_thperiode', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_matkul', $q);
	$this->db->or_like('kode_matkul', $q);
	$this->db->or_like('nama_matkul', $q);
	$this->db->or_like('id_sks', $q);
	$this->db->or_like('status_nilai', $q);
	$this->db->or_like('id_dosen', $q);
	$this->db->or_like('id_jenjangstudi', $q);
	$this->db->or_like('id_prodi', $q);
	$this->db->or_like('id_semester', $q);
    $this->db->or_like('id_thperiode', $q);
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

/* End of file Matkul_model.php */
/* Location: ./application/models/Matkul_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-08-31 05:20:44 */
/* http://harviacode.com */