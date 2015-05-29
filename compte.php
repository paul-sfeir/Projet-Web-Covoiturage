<?php
session_start();
if(!isset($_SESSION['login'])){
    $_SESSION['login'] = 'anonyme';
}
include "bdd.php";
?>

<head>
	<title>Mon compte - GoCars</title>
	<meta charset="UTF-8">
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet" type="text/css"><!--Style global-->
	<link href="css/custom.css" rel="stylesheet" type="text/css"><!--Style contenu-->
	<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script> <!--Bibliothèque jQuery--> 
	
	<script type="text/javascript">
		//Fonction qui dévoile une div
		function visibilite(thingId)
			{
				var targetElement;
				targetElement = document.getElementById(thingId) ;
				if (targetElement.style.display == "none")
					{
						targetElement.style.display = "" ;
				} else {
						targetElement.style.display = "none" ;
				}
			}
</script>
</head>

<body>
	
	<!--Menu principal-->
	<nav class="nav_princ">
		<div class="row-fluid">
			<ul class="inline">
				<li>
					<a href="index.php">
						<img src="Media/logo.png" id="nav_logo"/>
					</a>
				</li>
				
				<li>
					<a href="#resultats" id="nav_derniers2">
						<img src="Media/horloge.png" class="nav_icon" />
						Les derniers covoiturages
					</a>
				</li>
				
				<li>
					<a href="recherche.php" id="nav_recherche2">
						<img src="Media/recherche.png" class="nav_icon" />
						Trouver un covoiturage
					</a>
				</li>
				
				<li>
					<a href="ajouter.php" id="nav_proposer2">
						<img src="Media/proposer.png" class="nav_icon" />
						Proposer un covoiturage
					</a>
				</li>
				
				<li>
					<?php
						include "boutons_compte_header.php";
					?>
						<img src="Media/compte.png" class="nav_icon" />
						Mon compte
					</a>
				</li>
				
				<?php
                    include "boutons_connexion_header.php";
                ?>
                
			</ul>
			
		</div>
	</nav>
	
	
	<!--Contenu de la page-->
	<div id="container">
	
		<div class="row-fluid">
			<div id="partenaires" class="contenu span4">
				
				<h2>Des cadeaux à gagner</h2>
				
				<p>Envie de lier l’utile à l’agréable ? A chaque déplacement, que vous soyez passager ou conducteur, votre total de Go points augmente. Afin de récompenser nos membres les plus fidèles, nous vous proposons d’échanger vos Go points contre des cadeaux exclusifs fournis par nos partenaires. Rendre service n’a jamais été aussi plaisant !</p>
				
				<p><a href="cadeaux.php">Voir les cadeaux à gagner</a></p>
				
				<h2>Des partenaires</h2>
				
				<?php
					$id=$_GET['id'];
					
					$req="SELECT * FROM Utilisateurs WHERE id_utilisteurs=$id";
					$result=mysqli_query($conn,$req);
					
					$req2="SELECT * FROM Partenaires";
					$result2=mysqli_query($conn,$req2);
					
					$data=mysqli_fetch_object($result);
					
					$nb_part=mysqli_num_rows($result2);
					$i=0;

					echo "<ul>";
					
					while($i<$nb_part) {
						
						$data2=mysqli_fetch_object($result2);
						
						echo "
							<li><a href='javascript:visibilite(`partenaire".$data2->id_partenaires."`)'>".$data2->nom_partenaire."</a></li>
								<div id='partenaire".$data2->id_partenaires."' style='display:none'>
									<p>Contact : ".$data2->nom_contact."</p>
									<p>".$data2->adresse_mail."</p>
									<p><a href='ajouterpart.php?id=".$data2->id_partenaires."'>Modifier</a> - <a href='#'>Supprimer</a></p>
								</div>";
						$i++;
					}
				
			echo "</ul>"; 

			if($_SESSION['type_compte']==0) {
				echo "<h2>Ajouter un partenaire</h2>
				
				<form action='compte.php?id=".$id."' method='post' id='form_partenaire'>
					<label>Nom<label>
					<input type='text' name='nom_ajout_part' />
					
					<label>Nom du contact<label>
					<input type='text' name='contact_ajout_part' />
					
					<label>Adresse électronique<label>
					<input type='text' name='email_ajout_part' />
					
					<input type='submit' value='Valider' class='button_search' />
				</form>";
			}
			
				
			
			echo "</div>
			
			
			<div id='user_account' class='contenu span8'>
			
				<div id='mesinfos'>";
			
						
						if($_SESSION['id_utilisateurs']==$id) {
							echo "<h2>Mes informations <a href='inscription.php?id=".$id."' class='modif'>Modifier</a></h2>";
						} else {
							if($_SESSION['type_compte']==0) {
								echo "<h2>Mes informations <a href='#' class='modif'>Supprimer</a><a href='inscription.php?id=".$id."' class='modif'>Modifier</a></h2>";
							} else {
								echo "<h2>Mes informations</h2>";
							}
						}
						echo "<div id='img_profile' class='span3'>";
						
							
						if($data->photo==NULL) {
							echo "<img src='Media/utilisateur.png' class='img_user' />";
						} else {
							echo "<img src='Media/".$data->photo."' class='img_user' />";
						}
						
						$javascript="javascript:visibilite(`change_img`)";
						
						if($_SESSION['id_utilisateurs']==$id || $_SESSION['type_compte']==0) {
							echo "<p><a href='$javascript'>Modifier votre image</a></p>
									<div id='change_img' style='display:none'>
										<p>
											<form action='compte.php?id=".$id."' method='post' enctype='multipart/form-data'>
												<input type='file' name='image'/>
												<input type='submit' value='Envoyer' class='button_search' />
											</form>
										</p>
									</div>";
						}
						
						echo "</div>
					
							<div class='span5'>
								<p class='petittitre'>";
						
							echo $data->prenom;
							echo " ";
							echo $data->nom;
							echo "</p>
								<p>".$data->email."</p>
								<p>Mot de passe : ***********</p>
								<p>Description :".$data->description."</p>
								<p>Téléphone : ".$data->telephone."</p>
							</div>
					
							<div id='score' class='span3'>
								<p class='petittitre'>Score</p>
								<p class='petittitre'>".$data->score."Go</p>
							</div>
						</div>";
					?>
				
				<div id="historique">
					<h2>Mon historique de covoiturages</h2>
					<article><a href="#">
						<div class="row-fluid">
							<div class="span3">
								<p class="pseudo">Pseudo</p>
								<img src="Media/utilisateur.png" class="img_user" />
							</div>
							
							<div class="span3">
								<p class="titre">JJ/MM/AAAA</p>
								<h2 class="info">10H00</h2>
								<p><img src="Media/depart.png" width="30px"/>Départ</p>
								<p>Informations voiture</p>
							</div>
							
							<div class="span3">
								<p class="titre">JJ/MM/AAAA</p>
								<h2 class="info">2 places</h2>
								<p><img src="Media/arrivee.png" width="30px"/>Arrivée</p>
								<p>Informations voiture</p>
							</div>
							
							<div id="options" class="span3">
								<div class="span6">
									<img src="Media/m_baggage.png" class="options" alt="Moyens baggages" />
								</div>
								<div class="span6">
									<img src="Media/m_baggage.png" class="options" alt="Moyens baggages" />
								</div>
								<div class="span6">
									<img src="Media/m_baggage.png" class="options" alt="Moyens baggages" />
								</div>
								<div class="span6">
									<img src="Media/m_baggage.png" class="options" alt="Moyens baggages" />
								</div>
							</div>
						</div>
						</a>
					</article>
				</div>
				
				
				<div id="avis">
					<h2>Avis des utilisateurs</h2>
					
					<article>
						<hr/>
						
						<div>
							<p class="petittitre">Pseudo</p>
						</div>
						
						<div class="comment">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							
							<!--Seulement pour l'admin-->
							<p><a href="#">Supprimer</a></p>
							<!--Fin de l'admin-->
						</div>
						
						<hr/>
					</article>
					
					<h2>Ajouter un commentaire</h2>
					
					<form>
						<textarea name="commentaire" placeholder="Ville, code postal..."></textarea>
						<input type="submit" value="Poster" class="button_search" />
					</form>
					
				</div>
				
				<!--Seulement pour l'admin-->
				<div id="admin">

					<h2><a href="javascript:visibilite('userslist')">Accéder à la liste des utilisateurs</a></h2>
					<div id="userslist" style="display:none">
						<ul>
							<?php
								$req_users="SELECT * FROM Utilisateurs";
								$res_users=mysqli_query($conn,$req_users);
								
								$nb_users=mysqli_num_rows($res_users);
								$i=0;
								
								while($i<$nb_users) {
									$data_users=mysqli_fetch_object($res_users);
									
									echo
							"<li><a href='compte.php?id=".$data_users->id_utilisteurs."'>".$data_users->prenom." ".$data_users->nom."</a></li>";
								$i++;
								}
							?>
						</ul>
					</div>
					
				</div>
				<!--Fin seulement pour l'admin-->
			
			</div>
			
		</div>
		
	</div>
	
	<!--Footer copyright-->
	<footer>
		<p><img src="Media/upssitech.png" id="logo_upssitech"/>Copyright © 2015 Damien FLAHOU, Mai HOANG, Paul SFEIR</p>
	</footer>
	

</body>

</html>