<?php 
	session_start();
		if(isset($_SESSION["id_user"])){
		$id = $_SESSION["id_user"];
	}
		$recepteur = $_GET['recepteur'];


	require_once "../../class/Connexion.php";
	require_once "../../class/Message.php";
	require_once "../../class/User.php";

	$message = new Message();
	$user = new User();

	$rows = $message->getMp($recepteur, $id);

	$post = $user->getUser($id);


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../../bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../bootstrap/affiche_message.css">
	<style type="text/css">
		#marge{
			margin-left: 10px;
		}
	</style>
</head>
<body style="background-color: #e0ebeb">
	<div class="row mt-3">
		<div class="col-md-3"></div>
		<div class="col-md-6 cadre">
			<a href="affiche_message.php">retour</a>
			<h2 class="message mb-4">MESSAGE PRIVE</h2>

			<?php 
				foreach($rows as $row) {

				$idUser = $row['user_id_user'];
				$nomUser = $user->getNom($idUser);

				if ($id == $idUser) {
			?>
				<div class="row">
	    			<div class="col-md-8">
	    					<div class="cadre pair">
	    						<span><strong><?php echo $nomUser['0']['nom_user']; ?></strong></span>
				    			<span class="nomPrenom"><strong></strong></span>
				    			<p id="marge"><?php  echo $row['contenu_message']; ?></p>
					    	</div>
	    			</div>
	    			<div class="col-md-4"></div>
	    		</div>	
	    	<?php 	
				}else{
			?>
					<div class="row">
					<div class="col-md-4"></div>
	    			<div class="col-md-8">
	    					<div class="cadre impaire">
	    						<span><strong><?php echo $nomUser['0']['nom_user']; ?></strong></span>
				    			<span class="nomPrenom"><strong></strong></span>
				    			<p id="marge"><?php  echo $row['contenu_message']; ?></p>
					    	</div>
	    			</div>
	    		</div>
	    	<?php 
				}
			?>
				
			<?php 
				}
			?>
			<form method="POST" action="../../controller/control_mp.php" class="mb-4">
				<input type="text" name="user_id_user" value="<?php echo $id ?>" hidden>
				<input type="text" name="recepteur" value="<?php echo $recepteur ?>" hidden>
				<div>
					<label>entrer votre message:</label>
					<textarea name="contenu_message" rows="3" cols="30" class="form-control"></textarea>
				</div>
				<div>
					<input type="submit" name="submit" value="envoyer" class="btn btn-success">
				</div>
			</form>
		</div>
		<div class="col-md-3"></div>
	</div>

</body>
</html>