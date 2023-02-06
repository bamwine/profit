<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Form_validation extends CI_Form_validation
{

    public function __construct()
    {
        parent::__construct();
        //$this->ci =& get_instance();
    }

    //------------------------------------------------
    /**
     * is_unique_to_branch_only_edit method
     *
     * Generally this mehod is used when editting,
     *
     */
    public function is_unique_edit($str, $field)
    {
        list($table,$field,$other_field,$other_field_value) = explode('.', $field,5);

        $this->set_message('is_unique_edit','{field} already exists in the system');

        $query = $this->CI->db->select($field)->from($table)->where($field, $str)->where($other_field, $other_field_value)->limit(1)->get();

        return $query->num_rows() > 0 ? false : true;
    }

    //------------------------------------------------
    /**
     * is_unique_to_branch_only_edit method
     *
     * Generally this mehod is used when editting,
     *
     */
    public function is_unique_edit_edit($str, $field)
    {
        list($table,$field,$other_field,$other_field_value,$another_field,$another_field_value) = explode('.', $field,7);

        $this->set_message('is_unique_edit_edit','{field} already exists in the system');

        $query = $this->CI->db->select($field)->from($table)->where($field, $str)->where($other_field, $other_field_value)->where($another_field, $another_field_value)->limit(1)->get();

        return $query->num_rows() > 0 ? false : true;
    }

    //------------------------------------------DATE VALIDATION-----------------------------
    //------------------------------------------------
    /**
     * e_check_date_format method
     *
     * Generally this 
     *
     */
    public function e_check_date_format($date)
    {
        $this->set_message('e_check_date_format', '%s Invalid date.');

        //helper function in the h_dates_helper
        return h_check_correct_date($date);

    }
	

	

}  