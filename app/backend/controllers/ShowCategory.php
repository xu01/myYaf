<?php

class ShowCategoryController extends Yaf\Controller_Abstract 
{
  public function listAction() 
  {
   		
    
  }

  public function editAction() 
  {
  	$em = Yaf\Registry::get("entityManager");

  	$id = $this->getRequest()->get("id","");
  	if($id)
  	{
  		$showcategory = $em->find('Entity\ShowCategory', $id);
  	}else{
  		$this->getView()->assign("die_error", "该分类不存在");
  	}

    if($this->getRequest()->isPost())
    {
      $name = trim($this->getRequest()->getPost("name",""));

      if($name)
      {
      	if(!$showcategory)
      	{
      		$showcategory = new Entity\ShowCategory();
      	}
      	$showcategory->setName($name);
      	$showcategory->setTotalShows(0);
      	$em->persist($showcategory);
      	$em->flush();
      }else{
      	$this->getView()->assign("form_error_name", "名称不能为空");
      }
        
    }

    if($showcategory)
    {
    	$this->getView()->assign("name", $showcategory->getName());
    }

  }

}
?>
