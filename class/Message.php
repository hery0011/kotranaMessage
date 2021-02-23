<?php 
	class Message extends Connexion{

		public function insert($data){
			$sql = "INSERT INTO gestion_message (contenu_message, user_Id_user, recepteur) VALUES (:contenu_message, :user_Id_user, :recepteur)";

			$post = $this->connect()->prepare($sql);

			foreach ($data as $key => $value) {
				$post->bindValue(':'.$key, $value);
			}

			return $result = $post->execute();
			
	    	
		}

		public function select(){

	 		$sql = "SELECT * FROM gestion_message WHERE recepteur = 0";

	 		$stmt = $this->connect()->query($sql);
	 	
	 		if ($stmt->rowCount() > 0 ) {

	 			while ($row = $stmt->fetch()) {
	 				$data[] = $row;
	 			}

	 			return $data;
	 		}
	 	}

	 	public function selectOne($idUser){
	 		$sql = "SELECT * FROM user WHERE id_user = $idUser";
	 		$stmt = $this->connect()->prepare($sql);
	 		$stmt->execute();
	 		$result = $stmt->fetch(PDO::FETCH_ASSOC);

	 		return $result;
	 	}

	 	public function getMp($recepteur, $id){
	 		$sql = "SELECT * FROM gestion_message WHERE ( recepteur = $recepteur AND user_id_user = $id ) OR (user_id_user = $recepteur AND recepteur = $id)";

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