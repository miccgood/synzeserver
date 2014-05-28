<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UpdateStatus extends ServerController {

    public function index()
    {
        $uuid = $this->input->get('uuid');
        $statusId = $this->input->get('status');
        $message = $this->input->get('message');
//        $uuid = "6ae86830dc3cc15c";
//        $statusId = "1";
//        $message = "testMessage";
        if ($uuid && $statusId && $message)
	{
            return $this->updateStatusByUUID($uuid, $statusId, $message);
	} else {
            return false;
        }
    }
    
    public function status_put()
    {
        
        $uuid = $this->input->get('uuid');
        $statusId = $this->input->get('status');
        $message = $this->input->get('message');
//        $uuid = "6ae86830dc3cc15c";
//        $statusId = "1";
//        $message = "testMessage";
        $response = array("success" => false) ;
        
        if ($uuid && $statusId && $message) {
            
            $where = array("tmn_uuid" => $uuid);

            $player = array("tmn_status_id" => $statusId,
                            "tmn_status_message" => $message,
                            "tmn_status_update" => date("YmdHis", time()));

            $this->m->updatePlayerByPlayerId($player, $where);

            $response = array("success" => true) ;
        }
        
        $this->response($response, 200);
    }
}