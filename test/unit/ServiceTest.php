<?php 
class ServiceTest extends PHPUnit_Framework_TestCase
{
   
    public function testService()
    {

        $manager = new \Service\Manager(APP_PATH."/library/Service/sample.yml");
        $manager->invokeChain("search_video", array('name'=>'lol'));
        $result = $manager->getResult();

        $this->assertEquals("lol", $result->get("validate_name"));
        $this->assertEquals(1, $result->get("do_search"));
    }


    

}

