<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

 class ServerController extends REST_Controller {

        function __construct() {
            parent::__construct();

            /* Standard Libraries of codeigniter are required */
            $this->load->database();
            $this->load->helper('url');

            /* ------------------ */

//            $this->load->library('grocery_crud');
//            $this->load->library('stringutils', FALSE);
//            $this->load->library('session');

            $this->load->model('my_model', 'my_model');
//            $this->load->model('spot_on_model', 'm');
        
            $this->load->model('server_model', 'rm');

        }
    }
