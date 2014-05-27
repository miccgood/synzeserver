<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

 class ServerController extends REST_Controller {

    protected static $END_TAG = "_endTag";
    protected $responseXmlString = NULL; 
    function __construct() {
        parent::__construct();

        /* Standard Libraries of codeigniter are required */
        $this->load->database();
        $this->load->helper('url');

        $this->load->library('xml_writer');
        /* ------------------ */

        
        $this->xml_writer->setRootName('signage');
        $this->xml_writer->initiate(array("width" => "1920", "height" => "1080"));
//            $this->load->library('grocery_crud');
//            $this->load->library('stringutils', FALSE);
//            $this->load->library('session');

        $this->load->model('my_model', 'my_model');
//            $this->load->model('spot_on_model', 'm');

        $this->load->model('server_model', 'rm');

    }
    
    protected function convertXmlToJson($sXML){
        $array = array();
        $oXML = new SimpleXMLElement($sXML);
        $tagName = $oXML->getName();
        $array[$tagName] = (array) $oXML;
        return json_encode((array) $array);
    }
    
    protected function convertXmlToArray($sXML){
        $array = array();
        $oXML = new SimpleXMLElement($sXML);
        $tagName = $oXML->getName();
        $array[$tagName] = (array) $oXML;
        return (array) $array;
    }
    
    
    public function setResponse($sXml) {
        $this->responseXmlString = $sXml;
    }
    
    public function getResponse() {
        return $this->responseXmlString;
    }
}
