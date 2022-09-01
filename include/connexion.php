<?php

	session_start();
	$_SESSION['id'] = 0;

	// SCRIPT DE CONNEXION
	
	// APPEL A LA CLASSE DE REQUETES SQL
	include 'sql.php';
	$sql = new ClassSQL();

	// RECUPARATION DES DONNEES DU FORMULAIRE
	$login = $_POST['login'];
	$password = $_POST['pw'];
	
	// VARIABLE DE SUCCES
	$success = -1;
	
	// SI LES CHAMPS SONT REMPLIS
	// ALORS ON CHERCHE DANS LA BDD
	if ($login != "" && $password != "") {
		// REQUETS SQL
		$sql = $sql->GetConnexion($login, md5($password));
		if (count($sql) == 1) {
			$success = 1;
		}
		else {
			$success = 2;
		}
	}
	else {
		$success = 0;
	}
	
	if ($success == 0) {
		$erreur = "Veuillez remplir les champs pour vous connecter.";
		$location = "../index.php";
	}
	if ($success == 1) {
		if ($sql[0]['admin'] == 1) {
			$location = "../vues/admin.php";
			$_SESSION['id'] = $sql[0]['idUtilisateur'];
		}
		else {
			$location = "../vues/membre.php";
			$_SESSION['id'] = $sql[0]['idUtilisateur'];
		}
		
	}
	if ($success == 2) {
		$erreur = "Votre login et votre mot de passe sont incorrects.";
		$location = "../index.php";
	}
	
	// REDIRECTION
	header("location:".$location."?message=".$erreur);
