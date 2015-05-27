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
			<div id="proposition" class="contenu span4">
				
				<h2>Des cadeaux à gagner</h2>
				
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
				
				<p><a href="cadeau.php">Voir les cadeaux à gagner</a></p>
				
				<h2>Des partenaires</h2>
				
				<ul>
					<li>Partenaire 1</li>
					<li>Partenaire 2</li>
					<li>Partenaire 3</li>
				</ul>
				
			</div>
			
			
			<div id="form_ins" class="contenu span8">
			
				<div id="mesinfos">
					<h2>Mes informations</h2>
					
					<div id="img_profile" class="span3">
						<img src="Media/utilisateur.png" class="img_user" />
						<p><a href="#">Modifier votre image</a></p>
					</div>
					
					<div class="span5">
						<p class="petittitre">Prénom Nom</p>
						<p>Adresse email - <a href="#">Modifier</a></p>
						<p>Mot de passe : *********** - <a href="#">Modifier</a></p>
						<p>Adresse : XX voie nomvoie, XXXXX VILLE - <a href="#">Modifier</a></p>
						<p>Téléphone : 01 23 45 67 89 - <a href="#">Modifier</a></p>
					</div>
					
					<div id="score" class="span3">
						<p class="petittitre">Score</p>
						<p class="petittitre">XXpts</p>
					</div>
				</div>
				
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
						</div>
						
						<hr/>
					</article>
					
					<h2>Ajouter un commentaire</h2>
					
					<form>
						<textarea name="commentaire" placeholder="Ville, code postal..."></textarea>
						<input type="submit" value="Poster" class="button_search" />
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

<?php
/*
                                echo '<script>
                                function checkPasswordMatch() {
                                    var password = $("#passord2").val();
                                    var confirmPassword = $("#confirmation").val();

                                    if (password != confirmPassword)
                                        document.getElementById("pass").style.color = "blue";
                                }
                                $(document).ready(function () {
                                    $("#txtConfirmPassword").keyup(checkPasswordMatch);
                                });
                                </script>';*/

//Partie connexion
    if(isset($_POST['login']) && isset($_POST['password'])){
        $login = $_POST['login'];
        $pass = $_POST['password'];
        
        $query = "SELECT email, photo, prenom, nom FROM Utilisateurs WHERE email = '".$login."' AND password = '".$pass."';";

        $result = mysqli_query($conn, $query);
        
        $tabInfoUtilisateur = mysqli_fetch_assoc($result);
         
        if($tabInfoUtilisateur != NULL){
            $_SESSION['login'] = $tabInfoUtilisateur['email'];
            $_SESSION['photo'] = $tabInfoUtilisateur['photo'];
            $_SESSION['prenom'] = $tabInfoUtilisateur['prenom'];
            $_SESSION['nom'] = $tabInfoUtilisateur['nom'];
            header("Location: index.php");
        }
    }
    
//Partie inscription
    if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password2']) && isset($_POST['confirmation'])){
        $civilite = $_POST['civilite'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mail = $_POST['email'];
        $password2 = $_POST['password2'];
        $confirmation = $_POST['confirmation'];
        
        //test si les passwords sont identiques
        if($password2 == $confirmation){
            $verifAdresseMail = "SELECT COUNT(*) FROM Utilisateurs WHERE email = '".$mail."';";
            $result = mysqli_query($conn, $query);
            if(result == 0){
            
                $query = "INSERT INTO Utilisateurs (`email`, `password`, `prenom`, `nom`, `civilite`, `type_compte`, `score`) VALUES ('".$mail."', '".$password2."', '".$prenom."', '".$nom."', '".$civilites."', 1, 0);";

                $result = mysqli_query($conn, $query);

                header("Location: connexion.php");
            }
        }
    }
?>