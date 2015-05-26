<?php
if(!isset($_SESSION['login'])){
    $_SESSION['login'] = 'anonyme';
}
include "bdd.php";
?>

<head>
	<title>Inscription - GoCars</title>
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
			<div id="form_co_ins" class="contenu span4">
				
				<h2>Déjà membre ?</h2>
				
				<form method="post">
					<label>Identifiant</label>
					<input type="text" name="login"/>
					
					<label>Mot de passe</label>
					<input type="password" name="password"/>
					
					<input type="submit" value="Connexion" class="button_search" style="width: 140px"/>
				</form>
				
			</div>
			
			
			<div id="form_ins" class="contenu span8">
			
				<h2>Créez un nouveau compte</h2>
				
				<form method="post">
					<label>Vous êtes</label>
					<select name="civilite">
						<option value="0">Un homme</option>
						<option value="1">Une femme</option>
					</select>
					
					<label>Nom</label>
					<input type="text" name="nom"/>
					
					<label>Prénom</label>
					<input type="text" name="prenom"/>
					
                    <label>Email</label>
					<input type="email" name="email"/>
					
					<label>Mot de passe</label>
					<input type="password" name="password2"/>
					
					<label>Confirmez votre mot de passe</label>
					<input id="pass" type="password" name="confirmation"/>
					
					<input type="submit" value="Inscription" class="button_search" style="width: 140px"/>
				</form>
			
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