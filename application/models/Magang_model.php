<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Magang_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get magang by id_magang
     */
    function get_magang($id_magang)
    {
        return $this->db->get_where('tbl_magang', array('id_magang' => $id_magang))->row_array();
    }

    /*
     * Get all tbl_magang
     */
    function get_all_tbl_magang()
    {
        // $this->db->order_by('id_magang', 'desc');
        // return $this->db->get('tbl_magang')->result_array();
        $this->db->select('*');
        $this->db->from('tbl_magang');
        $this->db->join('tbl_bagian', 'tbl_magang.id_bagian = tbl_bagian.id_bagian');
        $this->db->join('tbl_mhs_magang', 'tbl_magang.id_mhs = tbl_mhs_magang.id_mhs');
        $this->db->join('tbl_karyawan', 'tbl_magang.id_karyawan = tbl_karyawan.id_karyawan');
        return $this->db->get()->result_array();
    }
    function get_info_mhs($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_magang');
        $this->db->join('tbl_bagian', 'tbl_magang.id_bagian = tbl_bagian.id_bagian');
        $this->db->join('tbl_mhs_magang', 'tbl_magang.id_mhs = tbl_mhs_magang.id_mhs');
        $this->db->join('tbl_users', 'tbl_mhs_magang.id_user = tbl_users.id_user');
        $this->db->where('tbl_magang.id_magang', $id);
        return $this->db->get()->row_array();
    }
    function get_info_karyawan($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_magang');
        $this->db->join('tbl_karyawan', 'tbl_magang.id_karyawan = tbl_karyawan.id_karyawan');
        $this->db->join('tbl_users', 'tbl_karyawan.id_user = tbl_users.id_user');
        $this->db->where('tbl_magang.id_magang', $id);
        return $this->db->get()->row_array();
    }
    function get_tbl_magang_to_karyawan($id_karyawan)
    {
        $this->db->select('*');
        $this->db->from('tbl_magang');
        $this->db->join('tbl_bagian', 'tbl_magang.id_bagian = tbl_bagian.id_bagian');
        $this->db->join('tbl_mhs_magang', 'tbl_magang.id_mhs = tbl_mhs_magang.id_mhs');
        $this->db->join('tbl_karyawan', 'tbl_magang.id_karyawan = tbl_karyawan.id_karyawan');
        $this->db->where('tbl_magang.id_karyawan', $id_karyawan);
        return $this->db->get()->result_array();
    }
    function get_tbl_magang_to_mhs($id_mhs)
    {
        $this->db->select('*');
        $this->db->from('tbl_magang');
        $this->db->join('tbl_bagian', 'tbl_magang.id_bagian = tbl_bagian.id_bagian');
        $this->db->join('tbl_mhs_magang', 'tbl_magang.id_mhs = tbl_mhs_magang.id_mhs');
        $this->db->join('tbl_karyawan', 'tbl_magang.id_karyawan = tbl_karyawan.id_karyawan');
        $this->db->where('tbl_magang.id_mhs', $id_mhs);
        return $this->db->get()->result_array();
    }
    function get_kegiatan_mhs($id_magang)
    {
        $this->db->select('*');
        $this->db->from('tbl_kegiatan_magang');
        $this->db->join('tbl_magang', 'tbl_kegiatan_magang.id_magang = tbl_magang.id_magang');
        $this->db->join('tbl_mhs_magang', 'tbl_magang.id_mhs = tbl_mhs_magang.id_mhs');
        $this->db->where('tbl_magang.id_magang', $id_magang);
        return $this->db->get()->result_array();
    }

    /*
     * function to add new magang
     */
    function add_magang($params)
    {
        $this->db->insert('tbl_magang', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update magang
     */
    function update_magang($id_magang, $params)
    {
        $this->db->where('id_magang', $id_magang);
        return $this->db->update('tbl_magang', $params);
    }

    /*
     * function to delete magang
     */
    function delete_magang($id_magang)
    {
        return $this->db->delete('tbl_magang', array('id_magang' => $id_magang));
    }
}
