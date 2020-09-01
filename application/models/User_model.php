<?php
class User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get user by id_user
     */
    function get_user($id_user)
    {
        return $this->db->get_where('tbl_users', array('id_user' => $id_user))->row_array();
    }
    function get_user_auth($email)
    {
        return $this->db->get_where('tbl_users', array('email' => $email))->row_array();
    }

    /*
     * Get all users
     */
    function get_all_users()
    {
        $this->db->order_by('id_user', 'desc');
        return $this->db->get('tbl_users')->result_array();
    }

    /*
     * function to add new user
     */
    function add_user($params)
    {
        $this->db->insert('tbl_users', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update user
     */
    function update_user($id_user, $params)
    {
        $this->db->where('id_user', $id_user);
        return $this->db->update('tbl_users', $params);
    }

    /*
     * function to delete user
     */
    function delete_user($id_user)
    {
        return $this->db->delete('tbl_users', array('id_user' => $id_user));
    }

    function get_free_users()
    {
        $query = "SELECT * FROM tbl_users WHERE tbl_users.id_user NOT in (SELECT id_user FROM tbl_karyawan UNION SELECT id_user FROM tbl_mhs_magang) and tbl_users.role != 1";
        return $this->db->query($query)->result_array();
    }
}
