<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GetVersion extends ServerController {

    protected function execute()
    {
//        $uuid = $this->input->get('uuid');
////        $uuid = "6ae86830dc3cc15c";
//        if ($uuid)
//	{
//            $this->getVersionToXml($uuid);
//	}
    } 
    
    private function version_get($uuid)
    {
        $uuid = $this->get('uuid');
        $storylist = $this->m->selectStoryByUUID($uuid);
        foreach ($storylist as $story) {
            // Start branch 'cars'
            $storyId = $story->story_ID;
            $checkSum = $this->m->selectDisplayAndMediaByStoryIdForCheckSum($storyId);
            $this->xml_writer->startBranch('story', $checkSum[0]);
            $this->xml_writer->endBranch();
        }
        $this->response(null, 200); // 200 being the HTTP response code
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */