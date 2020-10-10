<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inputfrs_model extends CI_Model
{

    public $table = 'frs';
    public $id = 'id_frs';
    public $id_matkul = 'id_matkul';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_matkul,kode_matkul,nama_matkul,tbl_sks.sks,status_nilai,tbl_dosen.nama_dosen,tbl_jenjangstudi.nama_studi,tbl_prodi.nama_prodi,tbl_semester.semester,tbl_tahunperiode.tahun_akademik');
        $this->datatables->from('tbl_matkul');
        //add this line for join
        $this->datatables->join('tbl_sks', 'tbl_matkul.id_sks = tbl_sks.id_sks');
        $this->datatables->join('tbl_dosen', 'tbl_matkul.id_dosen = tbl_dosen.id_dosen');
        $this->datatables->join('tbl_jenjangstudi', 'tbl_matkul.id_jenjangstudi = tbl_jenjangstudi.id_jenjangstudi');
        $this->datatables->join('tbl_prodi', 'tbl_matkul.id_prodi = tbl_prodi.id_prodi');
        $this->datatables->join('tbl_semester', 'tbl_matkul.id_semester = tbl_semester.id_semester');
        $this->db->join('tbl_tahunperiode', 'tbl_matkul.id_thperiode = tbl_tahunperiode.id_thperiode');
        $this->datatables->add_column('action', anchor(site_url('matkul/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
            ".anchor(site_url('matkul/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
                ".anchor(site_url('matkul/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_matkul');
        return $this->datatables->generate();
    }
 function trx_matkul($id)
    {
        $this->db->select('id_matkul,kode_matkul,nama_matkul,tbl_sks.sks,status_nilai,tbl_dosen.nama_dosen,tbl_dosen.id_dosen,tbl_jenjangstudi.kode_studi,tbl_prodi.nama_prodi,tbl_prodi.id_prodi,tbl_semester.semester , tbl_tahunperiode.tahun_akademik');
        $this->db->from('tbl_matkul');
        $this->db->join('tbl_sks', 'tbl_matkul.id_sks = tbl_sks.id_sks','left');
        $this->db->join('tbl_dosen', 'tbl_matkul.id_dosen = tbl_dosen.id_dosen','left');
        $this->db->join('tbl_jenjangstudi', 'tbl_matkul.id_jenjangstudi = tbl_jenjangstudi.id_jenjangstudi','left');
        $this->db->join('tbl_prodi', 'tbl_matkul.id_prodi = tbl_prodi.id_prodi','left');
        $this->db->join('tbl_semester', 'tbl_matkul.id_semester = tbl_semester.id_semester');
        $this->db->join('tbl_tahunperiode', 'tbl_matkul.id_thperiode = tbl_tahunperiode.id_thperiode','left');
        $this->db->where($this->id_matkul, $id);
        $query = $this->db->get()->row();
        return $query;
    }
    function trx_judulskripsi($id)
    {
        $this->db->select('frs.id_frs,frs.id_mhs,frs.id_matkul,frs.kode_matkul,tbl_matkul.id_matkul,tbl_matkul.nama_matkul,frs.id_dosen,frs.nama_prodi,frs.kode_studi,frs.semester,frs.tahun_akademik');
        $this->db->from('frs');
        $this->db->join('tbl_matkul', 'frs.id_matkul = tbl_matkul.id_matkul');
        //$this->db->where($this->id, $id_s);
        $this->db->where('frs.id_mhs', $id);
        //$this->db->where('tbl_matkul.nama_matkul','Skripsi')->or_where('tbl_matkul.nama_matkul','Tugas Akhir');
        $this->db->where('semester','8');
        $query = $this->db->get()->row();
        return $query;
    }
    function cari_matkul($smt,$periode,$prodi){
        $this->db->select('id_matkul,kode_matkul,nama_matkul,tbl_sks.sks,status_nilai,tbl_dosen.id_dosen,tbl_dosen.nama_dosen,tbl_jenjangstudi.kode_studi,tbl_prodi.nama_prodi,tbl_prodi.id_prodi,tbl_semester.semester , tbl_tahunperiode.tahun_akademik');
        //$this->db->from('tbl_matkul');
        $this->db->join('tbl_dosen', 'tbl_matkul.id_dosen = tbl_dosen.id_dosen','left');
        $this->db->join('tbl_sks', 'tbl_matkul.id_sks = tbl_sks.id_sks','left');
        $this->db->join('tbl_jenjangstudi', 'tbl_matkul.id_jenjangstudi = tbl_jenjangstudi.id_jenjangstudi','left');
        $this->db->join('tbl_prodi', 'tbl_matkul.id_prodi = tbl_prodi.id_prodi','left');
        $this->db->join('tbl_semester', 'tbl_matkul.id_semester = tbl_semester.id_semester','left');
        $this->db->join('tbl_tahunperiode', 'tbl_matkul.id_thperiode = tbl_tahunperiode.id_thperiode','left');
    $this->db->where("tbl_semester.id_semester",$smt);
    $this->db->where("tbl_tahunperiode.id_thperiode",$periode);
    $this->db->where("tbl_prodi.id_prodi",$prodi);
    return $this->db->get('tbl_matkul')->result();
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
        //$this->db->where($this->id_matkul, $id_matkul);
        $this->db->insert_batch($this->table, $data);
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
    function trx_inputfrs()
    {
        $this->db->select('p.id , p.tgl_daftar, p.tgl_bayar, c.id_customer, pk.id_paket, c.nama_lengkap_c, pk.nama_paket, pk.harga_paket, p.status_pesanan, p.status_bayar, p.status_verifikasi_berkas');
        $this->db->from('pendaftaran p');
        $this->db->join('customer c', 'p.id_customer = c.id_customer');
        $this->db->join('paket pk', 'p.id_paket = pk.id_paket');
        $this->db->where('tgl_bayar !=', '0000-00-00');
        $this->db->where('status_bayar !=', '0');
        $this->db->where('status_pesanan !=', '0');
        $this->db->where('status_verifikasi_berkas !=', '0');
        $this->db->order_by("tgl_bayar ASC");
        $query = $this->db->get();
        return $query->result();
    }

}

/* End of file Matkul_model.php */
/* Location: ./application/models/Matkul_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-08-31 05:20:44 */
/* http://harviacode.com */