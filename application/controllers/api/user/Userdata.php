<?php

error_reporting(0);

class Userdata extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function data() {

        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Max-Age: 1000');
        header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

            $this->db->select('*');
            $this->db->from('student');
            $query = $this->db->get();
            $result = $query->result();

            echo json_encode($result);
        }

    public function sdata() {

        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Max-Age: 1000');
        header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

            $this->db->select('*');
            $this->db->from('tbl_admin');
            $query = $this->db->get();
            $result = $query->result();
            
            echo json_encode($result);
        }
    
    public function adata() {

        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Max-Age: 1000');
        header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

            $this->db->select('*');
            $this->db->from('tbl_employees');
            $query = $this->db->get();
            $result = $query->result();

            echo json_encode($result);
        }
}