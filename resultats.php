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
    <?php
        $cas = $_GET['id'];
        switch($cas){
            case 1:
                echo "<title>Les derniers covoiturages - GoCars</title>";
            break;

            case 2:
            case 3:
                echo "<title>Recherche covoiturage - GoCars</title>";
            break;
        }
    ?>
	
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
					<a href="resultats.php?id=1" id="nav_derniers2">
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
			<div id="form_recherche" class="contenu span4">
				
				<h2>Votre recherche</h2>
				
				<form>
					<label>Départ</label>
					<input type="text" class="input_recherche" name="depart" placeholder="Ville, code postal..."/>
					
					<label>Arrivée</label>
					<input type="text" class="input_recherche" name="arrivee" placeholder="Ville, code postal..." />
					
					<div class="row-fluid">
						<div class="span6">
							<label>Date</label>
							<input type="text" name="date" placeholder="JJ/MM/AAAA" id="datepicker" class="form_date"/>
						</div>
						
						<div class="span6">
							<label>A partir de</label>
							<select>
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
					
					<label>Nombre de places disponibles</label>
					<select>
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
					
					<input type="submit" value="Rechercher" class="button_search" />
				</form>
				
			</div>
			
			
			<div id="resultat" class="span8">
			     <?php
                    $cas = $_GET['id'];
                    
                    switch($cas){
                        case 1:
                            echo "<h2>Les derniers covoiturages</h2>";
                            
                            $query = "Select * from Trajets order by dates_publication;";

                            $arrayTrajets = mysqli_query($conn, $query);
                            $numRow = mysqli_num_rows($arrayTrajets);
                        
                            for($i = 0; $i < $numRow; $i++){
                                $data=mysqli_fetch_object($arrayTrajets);
                                
                                $query = "select * from Utilisateurs where id_utilisteurs = (select id_conducteur from Proposer where id_trajet = $data->id_trajets);";

                                $arrayUtilisateur = mysqli_query($conn, $query);
                                $utilisateur=mysqli_fetch_object($arrayUtilisateur);

                                echo"<article class='contenu'><a href='trajet.php?id=".$utilisateur->id_utilisteurs."'>";
                                echo" <div class='row-fluid'>
                                        <div class='span3'>
							             <p class='pseudo'>$utilisateur->prenom  $utilisateur->nom</p>
							             <img src='Media/";
                                if($utilisateur->photo == NULL){
                                    echo "utilisateur.png";
                                }
                                else{
                                    echo $utilisateur->photo;
                                }
                                
                                echo "' class='img_user' />
						                  </div>";
						        
                                echo "<div class='span3'>
                                <p class='titre'>$data->date_depart</p>
                                <h2 class='info'>".$data->heure_depart."H</h2>
                                <p><img src='Media/depart.png' width='30px'/>$data->ville_depart</p>
                                <p>$data->modele_voiture</p>
						          </div>";
						
						          echo "<div class='span3'>
                                    <p> </p>
                                    <h2 class='info'>$data->nombres_places</h2>
                                    <p><img src='Media/arrivee.png' width='30px'/>$data->ville_arrivee</p>
                                    </div>";
						
						          echo "<div id='options'class='span3'>
							<div class='span6'>";
                                switch($data->taille_bagage){
                                    case 1:
                                        echo "<img src='Media/s_baggage.png' class='options' alt='Petit baggages' />";
                                    break;
                                    
                                    case 2:
                                        echo "<img src='Media/m_baggage.png' class='options' alt='Moyens baggages' />";
                                    break;
                                    
                                    case 3:
                                        echo "<img src='Media/l_baggage.png' class='options' alt='Grands baggages' />";
                                    break;
                                }
							echo "</div>
						</div>
					</div></a></article>";
                    
                            }
                        break;

                        case 2:
                         echo "<h2>Les derniers covoiturages</h2>";
                            
                            $date = $_POST['date'];
                            $depart = $_POST['depart'];
                            $arrivee = $_POST['arrivee'];
                            
                            $query = "select * from Trajets where date_depart > $date and ville_depart = '$depart' and ville_arrivee = '$arrivee';";

                            $arrayTrajets = mysqli_query($conn, $query);
                            $numRow = mysqli_num_rows($arrayTrajets);
                        
                            for($i = 0; $i < $numRow; $i++){
                                $data=mysqli_fetch_object($arrayTrajets);
                                
                                $query = "select * from Utilisateurs where id_utilisteurs = (select id_conducteur from Proposer where id_trajet = $data->id_trajets);";

                                $arrayUtilisateur = mysqli_query($conn, $query);
                                $utilisateur=mysqli_fetch_object($arrayUtilisateur);

                                echo"<article class='contenu'>";
                                echo" <div class='row-fluid'>
                                        <div class='span3'>
							             <p class='pseudo'>$utilisateur->prenom  $utilisateur->nom</p>
							             <img src='Media/";
                                if($utilisateur->photo == NULL){
                                    echo "utilisateur.png";
                                }
                                else{
                                    echo $utilisateur->photo;
                                }
                                
                                echo "' class='img_user' />
						                  </div>";
						        
                                echo "<div class='span3'>
                                <p class='titre'>$data->date_depart</p>
                                <h2 class='info'>$data->heure_depart</h2>
                                <p><img src='Media/depart.png' width='30px'/>$data->ville_depart</p>
                                <p>$data->modele_voiture</p>
						          </div>";
						
						          echo "<div class='span3'>
                                    <p> </p>
                                    <h2 class='info'>$data->nombres_places places</h2>
                                    <p><img src='Media/arrivee.png' width='30px'/>$data->ville_arrivee</p>
                                    </div>";
						
						          echo "<div id='options'class='span3'>
							<div class='span6'>";
                                switch($data->taille_bagage){
                                    case 1:
                                        echo "<img src='Media/s_baggage.png' class='options' alt='Petit baggages' />";
                                    break;
                                    
                                    case 2:
                                        echo "<img src='Media/m_baggage.png' class='options' alt='Moyens baggages' />";
                                    break;
                                    
                                    case 3:
                                        echo "<img src='Media/l_baggage.png' class='options' alt='Grands baggages' />";
                                    break;
                                }
							echo "</div>
						</div>
					</div></article>";
                    
                            }
                        break;
                        case 3:
                            echo "<h2>Recherche covoiturage</h2>";
                        break;
                    }
                ?>
			
			</div>
			
		</div>
		
	</div>
	
	
	<!--Footer copyright-->
	<footer>
		<p><img src="Media/upssitech.png" id="logo_upssitech"/>Copyright © 2015 Damien FLAHOU, Mai HOANG, Paul SFEIR</p>
	</footer>

</body>

</html>