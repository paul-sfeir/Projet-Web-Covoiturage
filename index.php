<?php
session_start();
if(!isset($_SESSION['login'])){
    $_SESSION['login'] = 'anonyme';
}
include "bdd.php";
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>GoCars - Site de covoiturage étudiant</title>
	<meta charset="UTF-8">
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet" type="text/css"><!--Style global-->
	
	<!--Bibliothèque nécessaire au Datepicker-->
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script>
		$(function() {
			$( "#datepicker" ).datepicker();
		});
	</script>
	<!--Fin de la bibliothèque nécessaire au Datepicker-->
	
</head>

<body>


	<!--Haut de la page-->
	<div id="accueil">
        
		<div class="logo"><a href="index.php"><img src="Media/logo.png" id="logoaccueil" /></a></div>
		
		<!--Menu de connexion-->
		<nav class="navaccueil">
			<ul class="inline">
				<?php
                    include "boutons_connexion_header.php";
                ?>
			</ul>
		</nav>
		
		
		
		<!--Recherche rapide-->
		<div id="accrecherche">
			<h2>Trouvez votre covoiturage en quelques clics</h2>
			
			<form>
				<div class="row">
					<div class="span3">
						<label>Départ</label>
						<input type="text" name="depart" placeholder="Ville, code postal..."/>
					</div>
					
					<div class="span3">
						<label>Arrivée</label>
						<input type="text" name="arrivee" placeholder="Ville, code postal..." />
					</div>
					
					<div class="span2">
						<label>Date</label>
						<input type="text" name="date" placeholder="JJ/MM/AAAA" id="datepicker" class="form_date"/>
					</div>
				</div>
				
				<div class="row">
					<div class="span3">
					</div>
				
					<div class="recherche_av span3">
						<a href="recherche.php">Recherche avancée</a>
					</div>
					
					<div class="span1">
						<input type="submit" value="Rechercher" class="button_search" />
					</div>
				</div>
			</form>
			
			<div id="background_cycler" style="display: block;">

			<script type="text/javascript">
			$('#background_cycler').hide();

			function cycleImages(){
				  var $active = $('#background_cycler .active');
				  var $next = ($('#background_cycler .active').next().length > 0) ? $('#background_cycler .active').next() : $('#background_cycler img:first');
				  $next.css('z-index',2);
				  $active.fadeOut(1500,function(){
				  $active.css('z-index',1).show().removeClass('active');
				  $next.css('z-index',3).addClass('active');
				  });
				}

				$(window).load(function(){
					$('#background_cycler').fadeIn(1500);
					  // intervalle de temps
					  setInterval('cycleImages()', 3000);
				})
			</script> 

			<img class="active" src="Media/background1.jpg"/>
			<img src="Media/background2.jpg" />
			<img src="Media/background3.jpg" />
			<img src="Media/background4.jpg" />
			</div>
			
		</div>
		
		
		
		<!--Menu de navigation principal de la page d'accueil-->
		<nav class="navaccueil2">
			<div class="row-fluid">
				<ul class="inline">
					<li class="span3">
						<a href="resultats.php?id=1" id="nav_derniers">
							<img src="Media/horloge.png" class="nav_icon" />
							<p>Les derniers covoiturages</p>
						</a>
					</li>
					
					<li class="span3">
						<a href="recherche.php" id="nav_recherche">
							<img src="Media/recherche.png" class="nav_icon" />
							<p>Trouver un covoiturage</p>
						</a>
					</li>
					
					<li class="span3">
						<a href="ajouter.php" id="nav_proposer">
							<img src="Media/proposer.png" class="nav_icon" />
							<p>Proposer un covoiturage</p>
						</a>
					</li>
					
					<li class="span3">
						<?php 
						if(isset($_SESSION['login'])) {
							echo "<a href='compte.php?id=".$_SESSION['id_utilisateurs']."' id='nav_compte'>";
						} else {
							echo "<a href='inscription.php' id='nav_compte'>";
						}
						?>
							<img src="Media/compte.png" class="nav_icon" />
							<p>Mon compte</p>
						</a>
					</li>
				</ul>
			</div>
		</nav>
	</div>

	
	<!--Contenu de la page-->
	<div id="container">
		<div class="img_ronde">
		</div>
		
		<div class="description">
			<h2>Comment ça marche ?</h2>
			<ul>
				<li>
					Toi, passager, tu en as marre des grèves de bus à répétition ? Tu ne supportes plus l’odeur de ton voisin dans les transports en commun ? Rejoins GoCarS, le nouveau réseau de covoiturage étudiant, et tes voyages seront plus agréables ! Pour cela, c’est très simple, inscris toi en quelques étapes triviales, et lance ta recherche de covoiturage. Des dizaines de conducteurs t’attendent déjà !
				</li>
				
				<li>
					Toi, conducteur, tu as envie de participer à la réduction des gaz à effet de serre ? Tu aimes les cadeaux ? Rejoins GoCarS, le nouveau réseau de covoiturage étudiant, et tente d’empocher de nombreux lots offerts par nos partenaires ! Pour cela, c’est très simple, inscris toi en quelques étapes triviales, et propose un covoiturage. Ils n’attendent plus que toi, vite !
				</li>
			</ul>
		</div>
		
	</div>
	
	
	<!--Footer copyright-->
	<footer>
		<p><img src="Media/upssitech.png" id="logo_upssitech"/>Copyright © 2015 Damien FLAHOU, Mai HOANG, Paul SFEIR</p>
	</footer>
	
	

</body>

</html>