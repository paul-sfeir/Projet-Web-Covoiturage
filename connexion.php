<?php
session_start();
if(!isset($_SESSION['login'])){
    $_SESSION['login'] = 'anonyme';
}
include "bdd.php";
?>

<head>
	<title>Connexion - GoCars</title>
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
		<div id="form_connexion" class="contenu">
			
			<h2>Déjà membre ?</h2>
			
			<form method="post" action="connexion.php" name="connexion">
				<label>Identifiant</label>
				<input type="text" name="login"/>
				
				<label>Mot de passe</label>
				<input type="password" name="password"/>
				
				<input type="submit" value="Connexion" class="button_search" />
			</form>
		</div>
	</div>
	
	
	<!--Footer copyright-->
	<footer>
		<p><img src="Media/upssitech.png" id="logo_upssitech"/>Copyright © 2015 Damien FLAHOU, Mai HOANG, Paul SFEIR</p>
	</footer>

</body>

</html>


<?php 

    if(isset($_POST['login']) && isset($_POST['password'])){
        $login = $_POST['login'];
        $pass = $_POST['password'];
        
        $query = "SELECT * FROM Utilisateurs WHERE email = '$login' AND password = '$pass';";
		

        $result = mysqli_query($conn, $query);
        
        $tabInfoUtilisateur = mysqli_fetch_assoc($result);
         
        if($tabInfoUtilisateur != NULL){
			$_SESSION['id_utilisateurs'] = $tabInfoUtilisateur['id_utilisteurs'];
            $_SESSION['login'] = $tabInfoUtilisateur['email'];
            $_SESSION['photo'] = $tabInfoUtilisateur['photo'];
            $_SESSION['prenom'] = $tabInfoUtilisateur['prenom'];
            $_SESSION['nom'] = $tabInfoUtilisateur['nom'];
			$_SESSION['type_compte'] = $tabInfoUtilisateur['type_compte'];
			header('Location: index.php');
			
        }
     
    }

?>
