<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library('ssh_library');
    }

    public function index() {
        debug($this->ssh_library->connect_ssh('192.168.1.39'));
    }

    public function prueba() {
        $this->load->view('welcome/index', array('js' => array('index')));
    }

}
