<?php
if(!isset($_SESSION['login'])){
    $_SESSION['login'] = 'anonyme';
}
include "bdd.php";
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Proposer un covoiturage - GoCars</title>
	<meta charset="UTF-8">
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet" type="text/css"><!--Style global-->
	<link href="css/custom.css" rel="stylesheet" type="text/css"><!--Style contenu-->
	<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script> <!--Bibliothèque jQuery--> 
	
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
					<a href="#compte" id="nav_compte2">
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
			<div id="form_recherche" class="contenu span8">
				
				<h2>Proposez un covoiturage</h2>
				
				<form>
					<div class="span6">
						<label>Départ</label>
						<input type="text" class="input_recherche" name="depart" placeholder="Ville, code postal..."/>
					</div>
					
					<div class="span6">
						<label>Arrivée</label>
						<input type="text" class="input_recherche" name="arrivee" placeholder="Ville, code postal..." />
					</div>
					
					<div class="row-fluid">
						<div class="span6">
							<label>Date</label>
							<input type="text" name="date" placeholder="JJ/MM/AAAA" id="datepicker" />
						</div>
						
						<div class="span6">
							<label>A partir de</label>
							<select>
								<option>4h</option>
								<option>4h30</option>
								<option>5h</option>
								<option>5h30</option>
								<option>6h</option>
								<option>6h30</option>
								<option>7h</option>
								<option>7h30</option>
								<option>8h</option>
								<option>8h30</option>
								<option>9h</option>
								<option>9h30</option>
								<option>10h</option>
								<option>10h30</option>
								<option>11h</option>
								<option>11h30</option>
								<option>12h</option>
								<option>12h30</option>
								<option>13h</option>
								<option>13h30</option>
								<option>14h</option>
								<option>14h30</option>
								<option>15h</option>
								<option>15h30</option>
								<option>16h</option>
								<option>16h30</option>
								<option>17h</option>
								<option>17h30</option>
								<option>18h</option>
								<option>18h30</option>
								<option>19h</option>
								<option>19h30</option>
								<option>20h</option>
								<option>20h30</option>
								<option>21h</option>
								<option>21h30</option>
								<option>22h</option>
								<option>22h30</option>
								<option>23h</option>
								<option>23h30</option>
								<option>00h</option>
							</select>
						</div>
					</div>
					
					<hr/>
					
					<div class="row-fluid">
						<div class="span4">
							<label>Modèle de voiture</label>
							<input type="text" class="input_recherche" name="voiture" />
						</div>
					
						<div class="span4">
							<label>Nombre de places disponibles</label>
							<select>
								<option> </option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
								<option>6</option>
								<option>7</option>
								<option>8</option>
								<option>9</option>
							</select>
						</div>
						
						<div class="span4">
							<label>Type de trajet</label>
							<select>
								<option> </option>
								<option>Aller simple</option>
								<option>Aller-retour</option>
								<option>Trajet régulier</option>
							</select>
						</div>
					</div>
					
					<hr/>
					
					<label>Options</label>
					<div class="icones_options">
						<input type="checkbox" name="fumeur" value="1"><img src="Media/nosmoking.png" class="options" />
						<span>Non fumeur</span>
					</div>
						
					<div class="icones_options">
						<input type="checkbox" name="animaux" value="1"><img src="Media/animaux.png" class="options" />
						<span>Animaux autorisés</span>
					</div>
						
					<div class="icones_options">
						<input type="checkbox" name="hommes" value="1"><img src="Media/hommes.png" class="options" />
						<span>Hommes seulement</span>
					</div>
						
					<div class="icones_options">
						<input type="checkbox" name="femmes" value="1"><img src="Media/femmes.png" class="options" /><span>Femmes seulement</span>
					</div>
						
					<div class="icones_options">
						<input type="checkbox" name="handicap" value="1"><img src="Media/handicap.png" class="options"/>
						<span>Handicapés pris en charge</span>
					</div>
						
					<div class="icones_options">
						<input type="checkbox" name="bagage" value="0"><img src="Media/s_baggage.png" class="options"/>
						<span>Petits baggages</span> 
					</div>
						
					<div class="icones_options">
						<input type="checkbox" name="bagage" value="1"><img src="Media/m_baggage.png" class="options" />
						<span>Moyens baggages</span> 
					</div>
						
					<div class="icones_options">
						<input type="checkbox" name="bagage" value="2"><img src="Media/l_baggage.png" class="options" />
						<span>Grands baggages</span>
					</div>
					
					<input type="submit" value="Valider" class="button_search" />
				</form>
				
			</div>
			
			
			<div id="proposition" class="span4 contenu">
			
				<h2>Déjà membre ?</h2>
				
				<form method="post" name="connexion">
					<label>Identifiant</label>
					<input type="text" name="login"/>
					
					<label>Mot de passe</label>
					<input type="text" name="password"/>
					
					<input type="submit" value="Rechercher" class="button_search" />
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