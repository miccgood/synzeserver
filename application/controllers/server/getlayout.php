<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GetLayout extends ServerController {
    
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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */