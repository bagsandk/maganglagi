<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Mhs_magang_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get mhs_magang by id_mhs
     */
    function get_mhs_magang($id_mhs)
    {
        return $this->db->get_where('tbl_mhs_magang', array('id_mhs' => $id_mhs))->row_array();
    }
    function get_mhs_user($email)
    {
        $this->db->select('*');
        $this->db->from('tbl_mhs_magang');
        $this->db->join('tbl_users', 'tbl_mhs_magang.id_user= tbl_users.id_user');
        $this->db->where('tbl_users.email', $email);
        return $this->db->get()->row_array();
    }
    function get_mhs_user_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_mhs_magang');
        $this->db->join('tbl_users', 'tbl_mhs_magang.id_user= tbl_users.id_user');
        $this->db->where('tbl_mhs_magang.id_mhs', $id);
        return $this->db->get()->row_array();
    }

    /*
     * Get all tbl_mhs_magang
     */
    function get_all_tbl_mhs_magang()
    {
        $this->db->order_by('id_mhs', 'desc');
        return $this->db->get('tbl_mhs_magang')->result_array();
    }
    function get_all_mhs_magang()
    {
        $this->db->order_by('id_mhs', 'desc');
        return $this->db->get_where('tbl_mhs_magang', ['status' => 't'])->result_array();
    }
    function get_all_mhs_magang_pending()
    {
        $this->db->order_by('id_mhs', 'desc');
        return $this->db->get_where('tbl_mhs_magang', ['status' => 'p'])->result_array();
    }
    function get_all_free_mhs_magang()
    {
        $query = "SELECT * FROM tbl_mhs_magang WHERE tbl_mhs_magang.id_mhs NOT in (SELECT id_mhs FROM tbl_magang) and tbl_mhs_magang.status = 't'";
        return $this->db->query($query)->result_array();
    }
    function get_all_free_edit_mhs_magang($id_mhs)
    {
        $query = "SELECT * FROM tbl_mhs_magang WHERE tbl_mhs_magang.id_mhs NOT in (SELECT id_mhs FROM tbl_magang where id_mhs !=" . $id_mhs . ")";
        return $this->db->query($query)->result_array();
    }

    /*
     * function to add new mhs_magang
     */
    function add_mhs_magang($params)
    {
        $this->db->insert('tbl_mhs_magang', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update mhs_magang
     */
    function update_mhs_magang($id_mhs, $params)
    {
        $this->db->where('id_mhs', $id_mhs);
        return $this->db->update('tbl_mhs_magang', $params);
    }

    /*
     * function to delete mhs_magang
     */
    function delete_mhs_magang($id_mhs)
    {
        return $this->db->delete('tbl_mhs_magang', array('id_mhs' => $id_mhs));
    }
}
