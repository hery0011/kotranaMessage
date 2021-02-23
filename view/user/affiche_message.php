<?php 
	session_start();
		if(isset($_SESSION["id_user"])){
		$id = $_SESSION["id_user"];
	}
	
	require_once "../../class/Connexion.php";
	require_once "../../class/Message.php";
	require_once "../../class/User.php";

	$message = new Message();
	$user = new User();

	$listesUser = $user->selectAllUser($id);
	$userConn = $user->userConnecte($id);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../../bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../bootstrap/affiche_message.css">
	<style type="text/css">
		#marge{
			margin-left: 10px;
		}
		.cadre0{
			box-shadow: 0px 0px 5px black;
		}
		#nomConnecter{
			text-align: center;
		}
	</style>
</head>
<body style="background-color: #e0ebeb">
	<div class="row mt-4">
		<dir class="col-md-1"></dir>
		<div class="col-md-3 cadre0">
			<h3 id="nomConnecter">Bienvenue <?php echo $userConn['0']['nom_user'] ?></h3>
			<h6 id="nomConnecter"><a href="index.html">se deconnecter</a></h6>
			<h2 class="message">Amis</h2>
			<?php 
				
				foreach($listesUser as $liste) {
			?>
			<div style="margin-left: 20px">
				<div><span><strong><a href="mp.php?recepteur=<?php echo $liste['id_user']?>"><?php echo $liste['nom_user']." ".$liste['prenom_user']; ?></a></strong></span></div>
				<span class="mail"><?php echo $liste['mail_user']?></span>
			</div>
			<?php } ?>
		</div>

	<dir class="col-md-1"></dir>

		<div class="col-md-6 cadre" style="background-color: #e6e6e6">
			<h2 class="message mt-3 mb-4">MESSAGE DU GROUPES</h2>
			<?php 
	    		

				$rows = $message->select();
				$id_user = $rows["0"]['user_id_user'];

	    		foreach($rows as $row) {
		    
    			$idUser = $row['user_id_user'];
    			$post = $message->selectOne($idUser);
    			$id_user = $post['id_user'];

    			if ($id == $id_user) {
    		?>	
				<div class="row">
	    			<div class="col-md-8">
	    					<div class="cadre pair">
				    			<span class="nomPrenom"><strong><?php echo $post['nom_user']." ".$post['prenom_user']; ?></strong></span>
				    			<p id="marge"><?php  echo $row['contenu_message']; ?></p>
					    	</div>
	    			</div>
	    			<div class="col-md-4"></div>
	    		</div>		   
    		<?php	
    			}else{
			    		?>
			    			<div class="row">
				    			<div class="col-md-4">
				    					
				    			</div>
				    			<div class="col-md-8">
				    				<div class="cadre impaire">
							    			<span class="nomPrenom"><strong><?php echo $post['nom_user']." ".$post['prenom_user']; ?></strong></span>
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

			<form method="POST" action="../../controller/control_affiche.php" class="mb-4">
				<div>
					<label>entrer votre message:</label>
					<textarea name="contenu_message" rows="3" cols="30" class="form-control"></textarea>
				</div>
				<div>
					<input type="submit" name="submit" value="envoyer" class="btn btn-success">
				</div>
			</form>

		</div>
		<div class="col-md-1"></div>
	</div>

</body>
</html>