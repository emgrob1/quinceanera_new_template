<?php
session_start();
use Phalcon\Mvc\Url;
class RsvpController extends \Phalcon\Mvc\Controller {
	
	public function indexAction() {
		//$this->var = $this->getCreds();
		// if ($this -> session -> has("auth")) {
// 
			// $this -> checkRsvpAction();
		// } else {
			// header('location:/georginaquinceanera/login');
		// }
	}

	private function checkRsvpAction() {
		if (!$this -> request -> isPost()) {
			// get data from user
			$email = $_SESSION['email'];
			// find user in database
			$user = Rsvp::findFirst(array("email = :email:", "bind" => array("email" => $email, )));

			if ($user != FALSE) {
				header('location:/georginaquinceanera/editrsvp');
			} else {
				$this->viewPage();
			}
		}
	}

	public function submitAction() {
		$rsvp = new Rsvp();
		$success = $rsvp -> save($this -> request -> getPost(), array('attending', 'number_of_guest', 'first_name', 'last_name', 'address_line_1', 'address_line_2', 'city', 'state', 'zip', 'phone_number', 'email'));
		if ($success) {
			header('location:/georginaquinceanera/thankyou');
			$this->sendEmail();
		} else {
			echo "Sorry, the following problems were generated: ";

			$messages = $user -> getMessages();

			foreach ($messages as $message) {
				echo $message -> getMessage(), "<br/>";
			}
		}

		$this -> view -> disable();
	}


	private function viewPage()
	{
		$email_temp =  'emgrob113@yahoo.com';
		$user = Users::findFirst( "password = '$email_temp'");
		$this->view->post = $user;
	}
	
	
	private function sendEmail()
	{
			
		$attending = $this->request->getPost('attending');
		
		if ($attending == 1)
		{$attending = "Yes";}
		else
		{$attending = "No";}
		$number_of_guest = $this->request->getPost('number_of_guest');
		$first_name = $this->request->getPost('first_name');
		$last_name = $this->request->getPost('last_name');
		$address_line_1 = $this->request->getPost('address_line_1');
		$address_line_2 = $this->request->getPost('address_line_2');
		$city = $this->request->getPost('city');
		$state = $this->request->getPost('state');
		$zip = $this->request->getPost('zip');
		$phone_number = $this->request->getPost('phone_number');
		$email = $this->request->getPost('email');
	
		 if ($address_line_2 != '')
		{
		$line_2 = '<p>Street Address Line 2: '.$address_line_2.' </p>';	
		} 
		
		$the_message = '<p>Thank you for sending in your RSVP below is a summary of your RSVP: </p>'.
		'<p>Attending: '.$attending.' </p>' .
		'<p>Number of Gues: '.$number_of_guest.' </p>' . 
		'<p>First Name: '.$first_name.' </p>' . 
		'<p>Last Name: '.$last_name.' </p>' . 
		'<p>Street Address: '.$address_line_1.' </p>' .
		$line_2	.	
		'<p>City: '.$city.' </p>' . 
		'<p>State: '.$state.' </p>' . 
		'<p>Zip: '.$zip.' </p>' . 
		'<p>Contact Number: '.$phone_number.' </p>' . 
		'<p>Email: '.$email.' </p>' 
		;
			$to = 'emgrob1@gmail.com';
			
			$subject = 'Quinceanera RSVP';
			
			$message = $the_message;
			
			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			
				// More headers
			$headers .= 'From: Evan Grob<emgrob1@yahoo.com>' . "\r\n";
			
		mail($to,$subject,$message,$headers);
			
	}
	
}
