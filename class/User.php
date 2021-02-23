<?php 
	class User extends Connexion{

		public function insertUser($data){

			$sql = "INSERT INTO user (nom_user, prenom_user, mail_user, password_user) VALUES (:nom_user, :prenom_user, :mail_user, :password_user)";

			$post = $this->connect()->prepare($sql);

			foreach($data as $key => $value) {
				$post->bindValue(':'.$key, $value);
			}

			$result = $post->execute();
			
	    	if($result) {
	    		header('Location: ../view/user/affiche_message.php');
	    	}
		}

		public function verificationLogin($data){
			$mail_user = $data['mail_user'];
			$password_user = $data['password_user'];

			$sql = "SELECT * FROM user WHERE mail_user = :mail_user AND password_user = :password_user";

			$query = $this->connect()->prepare($sql);
			$query->bindValue(':mail_user', $mail_user);
			$query->bindValue(':password_user', $password_user);

			$query->execute();
 			return $result = $query->fetch(PDO::FETCH_ASSOC);

		}

		public function selectAllUser($id){
	 		$sql = "SELECT * FROM user WHERE id_user != $id";

	 		$stmt = $this->connect()->query($sql);
	 	
	 		if ($stmt->rowCount() > 0 ) {

	 			while ($row = $stmt->fetch()) {
	 				$data[] = $row;
	 			}

	 			return $data;
	 		}
	 	}

	 	public function userConnecte($id){
	 		$sql = "SELECT * FROM user WHERE id_user = $id";

	 		$stmt = $this->connect()->query($sql);
	 	
	 		if ($stmt->rowCount() > 0 ) {

	 			while ($row = $stmt->fetch()) {
	 				$data[] = $row;
	 			}

	 			return $data;
	 		}
	 	}

	 	public function getUser($id){
	 		$sql = "SELECT * FROM user WHERE id_user = $id";

	 		$stmt = $this->connect()->query($sql);
	 	
	 		if ($stmt->rowCount() > 0 ) {

	 			while ($row = $stmt->fetch()) {
	 				$data[] = $row;
	 			}

	 			return $data;
	 		}
	 	}

	 	public function getNom($idUser){
	 		$sql = "SELECT * FROM user WHERE id_user = $idUser";

	 		$stmt = $this->connect()->query($sql);
	 	
	 		if ($stmt->rowCount() > 0 ) {

	 			while ($row = $stmt->fetch()) {
	 				$data[] = $row;
	 			}

	 			return $data;
	 		}
	 	}

	}
?>