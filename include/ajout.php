<?php

	session_start();

	// APPEL A LA CLASSE DE REQUETES SQL
	include '../include/sql.php';
	$sql = new ClassSQL();
	
	// RECUPERATION DES DONNEES DU FORMULAIRE
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$mail = $_POST['mail'];
	$ligue = $_POST['ligue'];	
	
	$erreur = "";
	$localisation = "";
	
	// SI LES CHAMPS SONT REMPLIS
	// ALORS ON AJOUTE A LA BASE DE DONNEES
	if ($nom != "" && $prenom != "" && $mail != "") {
		$sql = $sql->AjouterMembre($nom,$prenom,$mail,$ligue);
		
		$erreur = "Le membre a bien été ajouté.";
		$localisation = "../vues/admin.php";
	}
	// SINON MESSAGE D'ERREUR
	else {
		$erreur = "Veuillez remplir les champs.";
		//$localisation = "../vues/ajouterMembre.php";
	}
	
	header("location:".$localisation."?message=".$erreur);