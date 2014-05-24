<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Example extends ClientController {

    public function __construct() {
        parent::__construct("http://localhost/synzecore/index.php/server/example/");
    }
    
    function index($id)
    {
        $user = $this->rest->get('user', array('id' => $id), 'json');

        echo var_dump($user);
    }
}