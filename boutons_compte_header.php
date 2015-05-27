<?php
// Menu général pour accéder au compte
if($_SESSION['login'] == 'anonyme'){
    echo "<a href='inscription.php' id='nav_compte2'>";
}
else{
	if(isset($_SESSION['login'])) {
		echo "<a href='compte.php?id=".$_SESSION['id_utilisateurs']."' id='nav_compte2'>";
	}
}
?>