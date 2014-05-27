<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GetLayout extends ServerController {

//    protected function execute()
//    {
//        $uuid = $this->input->get('uuid');
////        $uuid = "6ae86830dc3cc15c";
//        if ($uuid)
//	{
//            $this->getLayoutToXml($uuid);
//	}
//    }
//    
//    private function getLayoutToXml($uuid)
//    {
//        $storylist = $this->m->selectStoryByUUID($uuid);
//        foreach ($storylist as $story) {
//            // Start branch 'cars'
//            $this->xml_writer->startBranch('story', $story);
//            $storyId = $story->story_ID;
//            $dsplist = $this->m->selectDisplayByStoryId($storyId);
//            foreach ($dsplist as $dsp){
//                $dspId = $dsp->dsp_ID;
//                $this->xml_writer->startBranch('display', $dsp);
//                $medialist = $this->m->selectMediaByStoryIdAndDspId($storyId, $dspId);
//                foreach ($medialist as $media){
//                    $this->xml_writer->startBranch('media', $media);
//                    $this->xml_writer->endBranch();
//                }
//                $this->xml_writer->endBranch();
//            }
//            $this->xml_writer->endBranch();
//        }
//        
////        $this->output();
//    }
    
    
//    function layout_get()
//    {
//        $uuid = $this->get('uuid');
//        if(!$uuid)
//        {
//        	$this->response(NULL, 400);
//        }
//        
//        $response = array();
//        $signageResponse = array();
//        $signage["_attributes"] = array("width" => "1920", "height" => "1080");
//        $storylist = $this->rm->selectStoryByUUID($uuid);
//        
//        $storyResponse = array();
//        foreach ($storylist as $storyDao) {
//            $story = array("_attributes" => $storyDao);
//            $storyId = $storyDao->story_ID;
//            $dsplist = $this->rm->selectDisplayByStoryId($storyId);
//            $displayResponse = array();
//            foreach ($dsplist as $dspDao){
//                $display = array("_attributes" => $dspDao);
////                $story["display"] = $display;
//                $dspId = $dspDao->dsp_ID;
//                $medialist = $this->rm->selectMediaByStoryIdAndDspId($storyId, $dspId);
//                $mediaResponse = array();
//                foreach ($medialist as $mediaDao){
//                    $media = array("_attributes" => $mediaDao);
//                    array_push($mediaResponse, $media);
//                }
//                
//                $display["media"] = $mediaResponse;
//                array_push($displayResponse, $display);
//            }
//            $story["display"] = $displayResponse;
////            $storyResponse["story"] = array($story, $story);
//            array_push($storyResponse, $story);
////            $storyResponse["display"] = $displayResponse;
//        }
//        
//        $signage["story"] = $storyResponse;
//        array_push($signageResponse, $signage);
//        $response["signage"] = $signageResponse;
//        
//        if($response)
//        {
//            $this->response($response, 200); // 200 being the HTTP response code
//        }
//    }
    
    function layout_get(){
        $uuid = $this->get('uuid');
        if(!$uuid)
        {
            $this->response(NULL, 400);
        }
        
        $storylist = $this->rm->selectStoryByUUID($uuid);
        foreach ($storylist as $story) {
            // Start branch 'cars'
            $this->xml_writer->startBranch('story', $story);
            $storyId = $story->story_ID;
            $dsplist = $this->rm->selectDisplayByStoryId($storyId);
            foreach ($dsplist as $dsp){
                $dspId = $dsp->dsp_ID;
                $this->xml_writer->startBranch('display', $dsp);
                $medialist = $this->rm->selectMediaByStoryIdAndDspId($storyId, $dspId);
                foreach ($medialist as $media){
                    $this->xml_writer->startBranch('media', $media);
                    $this->xml_writer->endBranch();
                }
                $this->xml_writer->endBranch();
            }
            $this->xml_writer->endBranch();
        }
        $xml = $this->xml_writer->getXml(FALSE);
        
        $response = $this->convertXmlToArray($xml);
        if($response)
        {
            $this->response($response, 200); // 200 being the HTTP response code
        }
    }
//    function layout_get()
//    {
//        $uuid = $this->get('uuid');
//        if(!$uuid)
//        {
//        	$this->response(NULL, 400);
//        }
//        
//        $this->startTag("signage", array("width" => "1920", "height" => "1080"));
//        
//        $storylist = $this->rm->selectStoryByUUID($uuid);
//        
//        foreach ($storylist as $storyDao) {
//            
//            $this->startTag("story", $storyDao);
//        
//            $storyId = $storyDao->story_ID;
//            $dsplist = $this->rm->selectDisplayByStoryId($storyId);
//            foreach ($dsplist as $dspDao){
//                $this->startTag("display", $dspDao);
//        
//                $dspId = $dspDao->dsp_ID;
//                $medialist = $this->rm->selectMediaByStoryIdAndDspId($storyId, $dspId);
//                foreach ($medialist as $mediaDao){
//                    
//                    $this->startTag("media", $mediaDao);
////                        $this->addChild("test", "addChild");
////                        $this->addChild("test", "addChild");
//                    $this->endTag();
//                }
//                foreach ($medialist as $mediaDao){
//                    
//                    $this->startTag("media", $mediaDao);
////                        $this->addChild("test", "addChild");
//                    $this->endTag();
//                }
//                
////                foreach ($medialist as $mediaDao){
////                    
////                    $this->startTag("media", $mediaDao);
//////                        $this->addChild("test", "addChild");
////                    $this->endTag();
////                }
//                
//                $this->endTag();
//            }
//            $this->endTag();
//        }
//        
//        
//        foreach ($storylist as $storyDao) {
//            
//            $this->startTag("story", $storyDao);
//        
//            $storyId = $storyDao->story_ID;
//            $dsplist = $this->rm->selectDisplayByStoryId($storyId);
//            foreach ($dsplist as $dspDao){
//                $this->startTag("display", $dspDao);
//        
//                $dspId = $dspDao->dsp_ID;
//                $medialist = $this->rm->selectMediaByStoryIdAndDspId($storyId, $dspId);
//                foreach ($medialist as $mediaDao){
//                    
//                    $this->startTag("media", $mediaDao);
////                        $this->addChild("test", "addChild");
//                    $this->endTag();
//                }
//                foreach ($medialist as $mediaDao){
//                    
//                    $this->startTag("media", $mediaDao);
////                        $this->addChild("test", "addChild");
//                    $this->endTag();
//                }
//                
//                foreach ($medialist as $mediaDao){
//                    
//                    $this->startTag("media", $mediaDao);
////                        $this->addChild("test", "addChild");
//                    $this->endTag();
//                }
//                
//                $this->endTag();
//            }
//            $this->endTag();
//        }
//        
//        $this->endTag();
////        $response["signage"] = $signageResponse;
//        $response = $this->getData();
//        if($response)
//        {
//            $this->response($response, 200); // 200 being the HTTP response code
//        }
//    }
//    
//    private $responseTemp = array();
////    private $responseArray = array();
//    
//    protected function addChild($name, $attr) {
////        $tag = array("_attributes" => $attr);
//        $temp = array($name => $attr);
//        
//        array_push($this->responseTemp, $temp);
////        $this->endTag();
//    }
//    
//    protected function startTag($name, $attr) {
//        $tag = array("_attributes" => $attr);
//        $temp = array($name => $tag);
//        
//        array_push($this->responseTemp, $temp);
//    }
//    
//    protected function endTag() {
//        array_push($this->responseTemp, array("_endTag" => "_endTag"));
//    }
//    
//    protected function getData($type = "array") {
//       
//        $array = $this->getArray($this->responseTemp);
//        return $array;
//    }
//    
//    protected function getArray($response, $basenode = NULL) {
//        array_shift($this->responseTemp);
//        $shift = array_shift($response);
//        $data = array();
//        $dataResponse = array();
//        if($shift == NULL){
//            return NULL;
//        }
//        foreach ($shift as $name => $attr) {
//            
//            if($name == self::$END_TAG && $attr == self::$END_TAG){
//                    $break = 0;
//                    foreach ($this->responseTemp as $key => $value) {
//                        if(array_key_exists($basenode, $value)){
//                            array_shift($this->responseTemp);
//                            $break++;
//                            array_push($dataResponse, $value[$basenode]);
//                        } else if(array_key_exists(self::$END_TAG, $value) && $break == 1){
//                            array_shift($this->responseTemp);
//                            $break--;
//                            continue;
//                        } else {
//                            break;
//                        }
//                        
//                    }
//                    return $dataResponse; 
////                }
//                return NULL;
//            } else if(is_string($attr)){
//                array_push($dataResponse, array($name => $attr));
//                foreach ($this->responseTemp as $key => $value) {
//                    if(!array_key_exists(self::$END_TAG, $value) && is_array($value)){
//                        $dataResponse[count($dataResponse)] = $value;
////                        $dataResponse[count($dataResponse) - 1][$key] = $value;
////                        array_push($dataResponse, array($key => $value));
//                        continue;
//                    } else {
//                        break;
//                    }
//                }
//                return $dataResponse;
//            } else {
//                
//                
//                
//                $result = $this->getArray($response, $name);
//                
//                if($result != NULL){
//                    $data = $result;
//                }
//                
//                if(isset($result[0])){
//                    array_shift($this->responseTemp);
//                    $attr = array($attr);
//                    $data = array_merge($data, $attr);
//                    return  array($name => $data); 
//                } 
//                    
//                $data = array_merge($data, $attr);
//                array_push($dataResponse, $data);
//                
//                if(isset($this->responseTemp[0])){
//                    foreach ($this->responseTemp[0] as $key => $value) {
//                        if($key == $name){
//                            array_push($dataResponse, $this->getArray($this->responseTemp, $name));
//                        } else if($name == $basenode){
//                            return $data;
//                        } else if($key == self::$END_TAG && $value == self::$END_TAG){
//                            array_shift($this->responseTemp);
//                        }
//                    }
//                }
//                
//                return array($name => $dataResponse);
//            }
//            return null; 
//        }
//        
//    }
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */