<?php 
	require_once "../class/Connexion.php";
	require_once "../class/Message.php";

	$message = new Message();

	if (isset($_POST['user_id_user']) && isset($_POST['contenu_message']) && isset($_POST['recepteur'])) {
		$user_id_user = $_POST['user_id_user']; 
		$contenu_message = $_POST['contenu_message']; 
		$recepteur = $_POST['recepteur']; 
	}

	$data = [
			'user_Id_user'=>$user_id_user,
			'contenu_message'=>$contenu_message,
			'recepteur'=>$recepteur
		];

		$result = $message->insert($data);

		if($result) {
    		header('Location: ../view/user/mp.php');
    	}
?>