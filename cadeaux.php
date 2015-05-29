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
				
				<p><a href="cadeau.php">Voir les cadeaux à gagner</a></p>
				
				<h2>Des partenaires</h2>
				
				<ul>
					<li><a href="javascript:visibilite('partenaire1')">Partenaire 1</a></li>
						<!--Seul l'admin peut modifier les infos partenaires-->
						<div id="partenaire1" style="display:none">
							<p>Prénom Nom - <a href="#">Modifier</a></p>
							<p>Adresse email - <a href="#">Modifier</a></p>
						</div>
						
					<li><a href="javascript:visibilite('partenaire2')">Partenaire 2</a></li>
						<div id="partenaire2" style="display:none">
							<p>Prénom Nom - <a href="#">Modifier</a></p>
							<p>Adresse email - <a href="#">Modifier</a></p>
						</div>
						
					<li><a href="javascript:visibilite('partenaire3')">Partenaire 3</a></li>
						<div id="partenaire2" style="display:none">
							<p>Prénom Nom - <a href="#">Modifier</a></p>
							<p>Adresse email - <a href="#">Modifier</a></p>
						</div>
				</ul>
				
			</div>
			
			
			<div id="cadeaux" class="span8">
			
				<h2>Les cadeaux à gagner</h2>
				
                <?php

                //Supprimer un cadeau
                $id = $_GET['id'];
                $query = "delete from Cadeaux where id_cadeaux = $id";
                $result = mysqli_query($conn, $query);

                $query = "select * from Cadeaux;";
                $arrayCadeaux = mysqli_query($conn, $query);
                $nb_art = mysqli_num_rows($arrayCadeaux);
                
                echo "<article class='cadeaux contenu'>";

                for($i=0; $i < $nb_art; $i++){
                    $data=mysqli_fetch_object($arrayCadeaux);
                    
                    $query = "select nom_partenaire from Partenaires where id_partenaires = $data->id_partenaire;";
                    $nomPartenaire = mysqli_query($conn, $query);
                    $data2=mysqli_fetch_object($nomPartenaire);
                    
                    echo "<div class='row-fluid'>";
                    
                    echo "<div class='row-fluid'> <div id='img_profile' class='span3'>";
                    echo "<img src='Media/$data->nom_image_cadeau' class='img_user' /> </div>";
					echo "	<div class='span5'><p class='petittitre'>$data->nom_cadeau - $data2->nom_partenaire</p> </div>";
                    echo " <div id='score' class='span3'><p class='petittitre'>$data->score_necessaire</p>";
                    echo " <p><input type='submit' value='Commander' class='button_search' /></p>";
					echo " <p style='margin-right: -20px;'><a href='cadeaux.php?id=$data->id_cadeaux'>Supprimer</a> - <a href='#'>Modifier</a></p> </div></div><hr/>";
                }
                ?>
                </article>
				
				<div id="ajout_cadeaux" class="contenu">
					<h2>Ajouter un cadeau</h2>
					
					<form action="cadeaux.php" method="post" enctype="multipart/form-data">
						<div class="row-fluid">
							<div class="span5">
								<label>Intitulé</label>
								<input type="text" name="nom_cadeau"/>
							</div>
							
							<div class="span5">
								<label>Partenaire</label>
								<select name="partenaire">
									<option>Nom partenaire</option>
									<option>Nom partenaire</option>
									<option>Nom partenaire</option>
								</select>
							</div>
							
							<div class="span2">
								<label>Prix</label>
								<input type="text" name="score"/>
							</div>
							
							<div class="span5">
								<label>Image</label>
								<input type="file" name="image"/>
							</div>
							
							<div class="span2">
								<input type="submit" value="Valider" class="button_search" />
							</div>
						</div>
					</form>
				</div>
				
			</div>
			
		</div>
		
	</div>
	
	<!--Footer copyright-->
	<footer>
		<p><img src="Media/upssitech.png" id="logo_upssitech"/>Copyright © 2015 Damien FLAHOU, Mai HOANG, Paul SFEIR</p>
	</footer>
	

</body>

</html>