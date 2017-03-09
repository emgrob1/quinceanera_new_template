<?php
session_start();
class EditrsvpController extends \Phalcon\Mvc\Controller
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

	public function editAction()
	{
 $email_temp = $_SESSION['email'];
 $rsvp = Rsvp::findFirst( "email = '$email_temp'");
// 	
		 // $success = $rsvp -> save($this -> request -> getPost());
		 // $success = $rsvp -> update($this->request->getPost(), array('first_name', 'last_name'));
		 $success = $rsvp -> update($this -> request -> getPost(), array('attending', 'number_of_guest', 'first_name', 'last_name', 'address_line_1','address_line_2', 'city', 'state', 'zip', 'phone_number','email'));
		 if ($success) {
		//$this->sendEmail();
			header('location:/georginaquinceanera/thankyou');
			
		} else {
			echo "Sorry, the following problems were generated: ";


			foreach ($messages as $message) {
				echo $message -> getMessage(), "<br/>";
			}
		}

	}
	
	private function viewPage()
	{
	 $email_temp = $_SESSION['email'];
		$rsvp = Rsvp::findFirst( "email = '$email_temp'");
		
		$this->view->post = $rsvp;
	}

	private function sendEmail()
	{
		
		$the_message = '<p>Thank you for sending in your revised RSVP below is a summary of your RSVP: </p>';
		echo 'message' . $the_message;
			// $to =  'emgrob1@yahoo.com';
			// $subject = 'Quinceanera RSVP-Edited';
// 			
			// $message =  'Test';
// 			
			// // Always set content-type when sending HTML email
			// $headers = "MIME-Version: 1.0" . "\r\n";
			// $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// 			
			// // More headers
			// $headers .= 'From: Evan Grob <emgrob1@yahoo.com>';
		// mail($to,$subject,$message,$headers);
	}
		
			
	
}
