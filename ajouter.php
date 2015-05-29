<?php
session_start();
if(!isset($_SESSION['login'])){
    $_SESSION['login'] = 'anonyme';
}

if($_SESSION['login'] == 'anonyme'){
   header('Location: inscription.php');
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
			<div id="form_recherche" class="contenu form_gen span8">
				
				<h2>Proposez un covoiturage</h2>
				
				<form method="post" action="ajouter.php">
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
							<label>Heure</label>
							<select name="heure">
								<option value = "4">4h</option>
								<option value = "4">4h30</option>
								<option value = "5">5h</option>
								<option value = "5">5h30</option>
								<option value = "6">6h</option>
								<option value = "6">6h30</option>
								<option value = "7">7h</option>
								<option value = "7">7h30</option>
								<option value = "8">8h</option>
								<option value = "8">8h30</option>
								<option value = "9">9h</option>
								<option value = "9">9h30</option>
								<option value = "10">10h</option>
								<option value = "10">10h30</option>
								<option value = "11">11h</option>
								<option value = "11">11h30</option>
								<option value = "12">12h</option>
								<option value = "13">12h30</option>
								<option value = "13">13h</option>
								<option value = "14">13h30</option>
								<option value = "14">14h</option>
								<option value = "15">14h30</option>
								<option value = "15">15h</option>
								<option value = "15">15h30</option>
								<option value = "16">16h</option>
								<option value = "16">16h30</option>
								<option value = "17">17h</option>
								<option value = "17">17h30</option>
								<option value = "18">18h</option>
								<option value = "18">18h30</option>
								<option value = "19">19h</option>
								<option value = "19">19h30</option>
								<option value = "20">20h</option>
								<option value = "20">20h30</option>
								<option value = "21">21h</option>
								<option value = "21">21h30</option>
								<option value = "22">22h</option>
								<option value = "22">22h30</option>
								<option value = "23">23h</option>
								<option value = "23">23h30</option>
								<option value = "0">00h</option>
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
							<select name="nombre_places">
								<option value = "0"> </option>
								<option value = "1">1</option>
								<option value = "2">2</option>
								<option value = "3">3</option>
								<option value = "4">4</option>
								<option value = "5">5</option>
								<option value = "6">6</option>
								<option value = "7">7</option>
								<option value = "8">8</option>
								<option value = "9">9</option>
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
						<input type="radio" id="bagage" name="bagage" value="1"><img src="Media/s_baggage.png" class="options"/>
						<span>Petits baggages</span> 
                        <input type="radio" id="bagage" name="bagage" value="2"><img src="Media/m_baggage.png" class="options" />
						<span>Moyens baggages</span>
                        <input type="radio" id="bagage" name="bagage" value="3"><img src="Media/l_baggage.png" class="options" />
						<span>Grands baggages</span>
					</div>
					
					<input type="submit" value="Valider" class="button_search" />
				</form>
				
			</div>
			
			
			<div id="proposition" class="span4 contenu">
			
				<h2>Consultez</h2>
				
				<p>également la liste des derniers covoiturages les plus récents mis en ligne par les internautes du site.</p>
				<p><a href="#resultats">Les derniers covoiturages</a></p>
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

<?php  
    if(isset($_POST['depart']) && $_POST['depart'] != "" && isset($_POST['arrivee']) && $_POST['arrivee'] != "" && isset($_POST['date']) && $_POST['date'] != "" && isset($_POST['voiture']) && $_POST['voiture'] != "" && $_POST['nombre_places'] != 0){
        
        $depart = $_POST['depart'];
        $arrivee = $_POST['arrivee'];
        $date = $_POST['date'];
        $heure = $_POST['heure'];
        $nombrePlaces = $_POST['nombre_places'];
        $modeleVoiture = $_POST['voiture'];
        
        $fumeur = (isset($_POST['fumeur'])) ? 1 : 0;
        $animaux = (isset($_POST['animaux'])) ? 1 : 0;
        $homme = (isset($_POST['hommes'])) ? 1 : 0;
        $femme = (isset($_POST['femmes'])) ? 1 : 0;
        $handicap = (isset($_POST['handicap'])) ? 1 : 0;
        $bagage = (isset($_POST['bagage'])) ? $_POST['bagage'] : 0;
        
        $date1 = date("Y/m/d");
        
        if(mktime($date1) > mktime($date)){
        
            //Crée le nouveau trajet
            $query = "INSERT INTO Trajets (`nombres_places`, `modele_voiture`, `date_depart`, `ville_depart`, `ville_arrivee`, `fumeur_auth`, `animal_auth`, `handicape_auth`, `femmes_uniquement`, `hommes_uniquement`, `taille_bagage`, `dates_publication`) VALUES ($nombrePlaces, '$modeleVoiture', $date, '$depart', '$arrivee', $fumeur, $animaux, $handicap, $femme, $homme, $bagage, $date1);";

            $result = mysqli_query($conn, $query);

            if($result){
                
                //Si le trajet a bien été crée, ajoute dans la table proposer le trajet
                $idTrajet = mysqli_insert_id($conn);
                $idUtilisateur = $_SESSION['id_utilisateurs'];
               
                $query = "INSERT INTO Proposer (`id_conducteur`, `id_trajet`) VALUES($idUtilisateur, $idTrajet);";
                
                $result = mysqli_query($conn, $query);
                //Envoie l'utilisateur sur le détail de son trajet
               
                die("<script>location.href = 'trajet.php?id=$idTrajet'</script>");
            }
        }
    }
?>