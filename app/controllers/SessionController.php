<?php
session_start();
class SessionController extends \Phalcon\Mvc\Controller
{

  
   /**
     * This action authenticate and logs a user into the application
     */
    public function registerAction()
    {
      // find user in database
		if($this->request->isPost())
		{
			// get data from user
			$username    = $this->request->getPost('username');
			$password    = $this->request->getPost('password');
			// find user in database
			$user = Users::findFirst(array(
			 "username = :username: AND password = :password: AND active = 'Y'",
			"bind" => array(
			"username" => $username,
			"password" => $password,
			)
			
			));
			
			 if($user != FALSE)
			 {
			 	
				 $this->session->set("auth", "auth");
				  $this->session->set("username", $username);
				   $this->session->set("password", $password);			
			   $this->session->set("email", $password);	
			// forward to home if user is valid
				header('location:/georginaquinceanera/home');
				
			}
			else
			{
	  			header('location:/georginaquinceanera/login');
			}
		}
    }  
	 public	function submitAction()
	 {
	 	
		echo 'sumbit';
	 	$user = new Users();
		
		$success = $user->save(
		$this->request->getPost(), array(
		'username',
		'password',
		'active',
		'email',
		));
		  if ($success) {
            echo "Thanks for registering!";
		} else {
            echo "Sorry, the following problems were generated: ";

            $messages = $user->getMessages();

            foreach ($messages as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }

	  
	 }
	 
	   private function _registerSession($user)
    {
        $this->session->set(
            "auth",
          array(
                "id"   => $user->id,
                "name" => $user->name,
                "email" => $user->email,
            )
        );
    }
	 
}

