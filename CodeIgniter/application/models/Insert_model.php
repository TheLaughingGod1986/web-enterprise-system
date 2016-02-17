<?php
/**
 * Created by PhpStorm.
 * User: ruifurtado
 * Date: 16/02/2016
 * Time: 22:23
 */
    class Insert_model extends CI_Model{
        function __construct() {
            parent::__construct();
        }
        function form_insert($data){
            // Inserting in Table of Database
            $this->db->insert('UserACC', $data);
        }
    }
?>