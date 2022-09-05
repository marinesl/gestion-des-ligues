<?php

	/* #####################################################################
	
						CLASSE DE REQUETES SQL
	
	##################################################################### */

	require __DIR__.'/../.env.php';
	
	
	class ClassSQL
	{
		/**
		 * CONNEXION A LA BASE DE DONNEES
		 */
		function Connect()
		{
			$user = BDD_USER;
			$pass = BDD_PASSWORD;
			$hote = BDD_HOST;
			$port = BDD_PORT;
			$bdd = BDD_NAME;
			$dsn = "mysql:$hote;port=$port;dbname=$bdd";
	
			try {
				$dbh = new PDO($dsn, $user, $pass);
				$dbh->exec("set character set utf8");
					
			} catch (PDOException $e) {
				die("Erreur! :" . $e->getMessage());
			}
	
			return $dbh;
		}


		/******************
		 * UTILISATEUR
		 ******************/
	

		/**
		 * REQUETE DE CONNEXION
		 * @param login l'identifiant de l'utilisateur
		 * @param password le mot de passe de l'utilisateur
		 */
		function GetConnexion($login, $password) {
			// CONNEXION A LA BASE DE DONNEES
			$dbh = $this->Connect();
				
			$sql = "SELECT *
					FROM gdl_php_user
					WHERE mail = '".$login."' AND password = '".$password."'";
				
			$query = $dbh->query($sql);
				
			return ($query) ? $query->fetchAll(PDO::FETCH_ASSOC) : false;
		}


		/**
		 * RETOURNE LES INFORMATIONS DE L'UTILISATEUR
		 * @param id identifiant de l'utilisateur
		 */
		function GetInfo($id) {
			// CONNEXION A LA BASE DE DONNEES
			$dbh = $this->Connect();
				
			$sql = "SELECT *
					FROM gdl_php_user
					WHERE idUtilisateur = ".$id;
				
			$query = $dbh->query($sql);
				
			return ($query) ? $query->fetchAll(PDO::FETCH_ASSOC) : false;
		}


		/**
		 * MODIFICATION INFORMATIONS DE L'UTILISATEUR
		 * @param nom le nom de l'utilisateur
		 * @param prenom le prénom de l'utilisateur
		 * @param email l'email de l'utilisateur
		 * @param password le mot de l'utilisateur
		 * @param id l'identifiant de l'utilisateur
		 */
		function UpdateInfo($nom, $prenom, $email, $password, $id) {
			// CONNEXION A LA BASE DE DONNEES
			$dbh = $this->Connect();
			
			$sql = "UPDATE gdl_php_user
					SET nom = '".$nom."', prenom = '".$prenom."', email = '".$email."', password = md5(".$password.")
					WHERE idUtilisateur = ".$id;
			
			$query = $dbh->query($sql);
			
			return ($query) ? $query->fetchAll(PDO::FETCH_ASSOC) : false;
		}


		/**
		 * AJOUT D'UN UTILISATEUR
		 * @param nom le nom de l'utilisateur
		 * @param prenom le prénom de l'utilisateur
		 * @param email l'email de l'utilisateur
		 * @param ligue l'identifiant de la ligue
		 */
		function AjouterMembre($nom, $prenom, $email, $ligue) {
			// CONNEXION A LA BASE DE DONNEES
			$dbh = $this->Connect();
				
			$sql = "INSERT INTO `gdl_php_user`(`idUtilisateur`, `nom`, `prenom`, `mail`, `password`, `admin`, `idLigue`) 
					VALUES (NULL,'".$nom."','".$prenom."','".$email."',md5('azerty'),0,'".$ligue."')";
				
			$query = $dbh->query($sql);
				
			return ($query) ? $query->fetchAll(PDO::FETCH_ASSOC) : false;
		}


		/******************
		 * LIGUE
		 ******************/

		
		/**
		 * RETOURNE LA LIGUE D'UN ADMIN
		 * @param id l'identifiant de bdd de l'utilisateur
		 */
		function GetLigue($id) {
			// CONNEXION A LA BASE DE DONNEES
			$dbh = $this->Connect();
			
			$sql = "SELECT ligue, gdl_php_ligue.idLigue
					FROM gdl_php_ligue, gdl_php_user
					WHERE gdl_php_user.idUtilisateur = '".$id."' AND gdl_php_user.idLigue = gdl_php_ligue.idLigue";
			
			$query = $dbh->query($sql);
			
			return ($query) ? $query->fetchAll(PDO::FETCH_ASSOC) : false;
		}
		

		/**
		 * RETOURNE LES MEMEBRES DE LA LIGUE
		 * @param ligne identifiant de la ligue
		 */
		function GetMembres($ligue) {
			// CONNEXION A LA BASE DE DONNEES
			$dbh = $this->Connect();
				
			$sql = "SELECT nom, prenom, mail, idUtilisateur
					FROM gdl_php_user
					WHERE idLigue = ".$ligue." AND admin = 0";
				
			$query = $dbh->query($sql);
				
			return ($query) ? $query->fetchAll(PDO::FETCH_ASSOC) : false;
		}
		
		/**
		 * SUPPRIME LA LIGUE D'UN UTILISATEUR
		 * @param id identifiant de l'utilisateur
		 */
		function SuppUser($id) {
			// CONNEXION A LA BASE DE DONNEES
			$dbh = $this->Connect();
			
			$sql = "UPDATE gdl_php_user 
					SET idLigue = NULL
					WHERE idUtilisateur = ".$id;
			
			$query = $dbh->query($sql);
			
			return ($query) ? $query->fetchAll(PDO::FETCH_ASSOC) : false;
		}
	}
?>