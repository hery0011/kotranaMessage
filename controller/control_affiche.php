<?php 
	session_start();
		if(isset($_SESSION["id_user"])){
		$id = $_SESSION["id_user"];
	}

	require_once "../class/Connexion.php";
	require_once "../class/Message.php";

	$message = new Message();
	$recepteur = 0;
	if (isset($_POST['contenu_message'])) {
		$contenu = $_POST['contenu_message'];

		$data = [
			'user_Id_user'=>$id,
			'contenu_message'=>$contenu,
			'recepteur'=>$recepteur
		];

		$result = $message->insert($data);

		if($result) {
    		header('Location: ../view/user/affiche_message.php');
    	}
	}
?>