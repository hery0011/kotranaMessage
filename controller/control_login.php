<?php 
	session_start();

	require_once "../class/Connexion.php";
	require_once "../class/User.php";

	$user = new User();

	if (isset($_POST['mail_user']) && isset($_POST['password_user'])) {
		$mail  = $_POST['mail_user'];
		$password  = $_POST['password_user'];

		$data = [
			'mail_user'=>$mail,
			'password_user'=>$password
		];

		$result = $user->verificationLogin($data);
		$id = $result['id_user'];
		/*var_dump($id);die();*/

		if($result) {
			$_SESSION["id_user"] = $id;
	    	header('Location: ../view/user/affiche_message.php');
	    }else{
	    		header('Location: ../view/user/insert.html');
	    	}
	}
?>