<?php
	/* #####################################################################
	
				SCRIPT DE MODIFICATION DES DONNEES PERSONNELLES
	
	##################################################################### */

	session_start();
	

	// APPEL A LA CLASSE DE REQUETES SQL
	include 'sql.php';
	$sql = new ClassSQL();
	
	// RECUPERATION DES DONNEES
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$email = $_POST['email'];
	$pw1 = $_POST['pw1'];
	$pw2 = $_POST['pw2'];
	$id = $_SESSION['id'];
	
	$message = "";
	
	// SI LES CHAMPS NOM, PRENOM, LOGIN NE SONT PAS VIDES
	// ALORS ON VERIFIE SI LES CHAMPS MOT DE PASSE NE SONT PAS VIDES
	if (!empty($nom) && !empty($prenom) && !empty($email)) {
		if (!empty($pw1)) {
			if (!empty($pw2)) {
				// SI LES CHAMPS MOT DE PASSE NE SONT PAS IDENTIQUES
				// ALORS ON AFFICHE LE MESSAGE D'ERREUR
				if ($pw1 != $pw2)
					$message = "Les mots de passe ne sont pas identiques.";
			}
			// SINON ON AFFICHE LE MESSAGE D'ERREUR
			else 
				$message = "Veuillez confirmer votre mot de passe.";
		}
	} else $message = "Il faut remplir tous les champs.";
	
	// SI $message EST VIDE
	// ON EXECUTE LA REQUETE DE MODIFICATION
	if (empty($message)) {
		$sql->UpdateInfo($nom, $prenom, $email, $pw1, $id);
		$message = "Les modifications ont bien été enregistrées.";
	}
	
	header("location:../vues/info_admin.php?message=".$message);
		

