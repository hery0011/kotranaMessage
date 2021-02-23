<?php 
	require_once "../class/Connexion.php";
	require_once "../class/User.php";

	$user = new User();

	if (isset($_POST['nom_user']) && isset($_POST['prenom_user']) && isset($_POST['mail_user']) && isset($_POST['password_user']) && isset($_POST['confirm_password'])) {
		
		$nom = $_POST['nom_user'];
		$prenom = $_POST['prenom_user'];
		$mail = $_POST['mail_user'];
		$password = $_POST['password_user'];
		$confirm_password = $_POST['confirm_password'];

		$data = [
			'nom_user'=>$nom,
			'prenom_user'=>$prenom,
			'mail_user'=>$mail,
			'password_user'=>$password
		];

		if ($password == $confirm_password) {
			$user->insertUser($data);
		}else{
			echo "error password";
		}

	}
?>