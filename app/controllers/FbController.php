<?php

class FbController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
{
		if($_SESSION['auth'] == 'auth')
    	{
			$this->viewPage();
		}
		else 
		{
				 header('location:/login');	
		}
 }

}

