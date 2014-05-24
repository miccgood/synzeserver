<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


 class ClientController extends CI_Controller {

        function __construct($server = NULL) {
            parent::__construct();

            /* Standard Libraries of codeigniter are required */
            $this->load->database();
            $this->load->helper('url');
            $this->load->library('curl');
            /* ------------------ */
//
//            $this->load->library('grocery_crud');
//            $this->load->library('stringutils', FALSE);
//            $this->load->library('session');

            $this->load->model('client_model', 'rm');

            if($server != NULL){
                $this->load->library('rest', array(
                    'server' => $server,
                    'http_user' => 'admin',
                    'http_pass' => '1234',
                    'http_auth' => 'basic' // or 'digest'
                ));
            }
        }
    }

