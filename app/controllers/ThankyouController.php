<?php
session_start();
class ThankyouController extends \Phalcon\Mvc\Controller {

	public function indexAction() {
		if ($_SESSION['auth'] == 'auth') 
		{
			$this -> viewPage();	
		}
		 else 
		{
			header('location:/georginaquinceanera/login');
		}
	}
	
	public function submitAction()
	{
		header('location:/georginaquinceanera/editrsvp');
	}
	
		private function viewPage()
	{
 $email_temp = $_SESSION['email'];
	
		$rsvp = Rsvp::findFirst( "email = '$email_temp'");
		$this->view->post = $rsvp;
	}
	

}
