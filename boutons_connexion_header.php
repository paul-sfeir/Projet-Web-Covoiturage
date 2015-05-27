<?php
// Met les boutons connexion et inscription si l'utilsateur n'est pas connecté, sinon il affiche un bouton avec son Prénom+Nom et un bouton déconnexion
if($_SESSION['login'] == 'anonyme'){
    echo " <li id='connexion' class='menu_co'><a href='connexion.php'>Connexion</a></li>";
    echo " <li class='menu_co'><a href='inscription.php'>Inscription</a></li> ";
}
else{
	if(isset($_SESSION['login'])) {
		echo " <li id='connexion' class='menu_co'><a href='compte.php?id=".$_SESSION['id_utilisateurs']."'>".$_SESSION['prenom']." ".$_SESSION['nom']." </a></li>";
		echo " <li class='menu_co'><a href='deconnexion.php'>Déconnexion</a></li>";
	}
}
?>