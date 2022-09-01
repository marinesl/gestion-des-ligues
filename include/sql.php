<?php

	/* #####################################################################
	
						CLASSE DE REQUETES SQL
	
	##################################################################### */
	
	
	class ClassSQL
	{
	
		// CONNEXION A LA BASE DE DONNEES
		function Connect()
		{
			$user = 'root';
			$pass = '';
			$hote = 'localhost';
			$port = '8080';
			$bdd = 'm2l_personnel';
			$dsn = "mysql:$hote;port=$port;dbname=$bdd";
	
			try
			{
				$dbh = new PDO($dsn, $user, $pass);
				$dbh->exec("set character set utf8");
					
			}
			catch (PDOException $e)
			{
				die("Erreur! :" . $e->getMessage());
			}
	
			return $dbh;
		}
	
		// REQUETE DE CONNEXION
		function GetConnexion($login,$password) {
			// CONNEXION A LA BASE DE DONNEES
			$dbh = $this->Connect();
				
			$sql = "SELECT *
						FROM user
						WHERE mail='".$login."'
						AND password='".$password."'";
				
			$query = $dbh->query($sql);
				
			if ($query)
				return $query->fetchAll(PDO::FETCH_ASSOC);
			else
				return false;
		}
		
		// RETOURNE LA LIGUE D'UN ADMIN
		function GetLigue($id) {
			// CONNEXION A LA BASE DE DONNEES
			$dbh = $this->Connect();
			
			$sql = "SELECT ligue,ligue.idLigue
						FROM ligue,user
						WHERE idUtilisateur='".$id."'
						AND user.idLigue=ligue.idLigue";
			
			$query = $dbh->query($sql);
			
			if ($query)
				return $query->fetchAll(PDO::FETCH_ASSOC);
			else
				return false;
		}
		
		// RETOURNE LES MEMEBRES DE LA LIGUE
		function GetMembres($ligue) {
			// CONNEXION A LA BASE DE DONNEES
			$dbh = $this->Connect();
				
			$sql = "SELECT nom,prenom,mail,idUtilisateur
						FROM user
						WHERE idLigue=".$ligue."
						AND admin=0";
				
			$query = $dbh->query($sql);
				
			if ($query)
				return $query->fetchAll(PDO::FETCH_ASSOC);
			else
				return false;
		}
		
		// SUPPRIME USER
		function SuppUser($id) {
			// CONNEXION A LA BASE DE DONNEES
			$dbh = $this->Connect();
			
			$sql = "UPDATE user 
						SET idLigue=NULL
						WHERE idUtilisateur=".$id;
			echo $sql;
			
			$query = $dbh->query($sql);
			
			if ($query)
				return $query->fetchAll(PDO::FETCH_ASSOC);
			else
				return false;
		}
		
		// RETOURNE LES INFORMATIONS USER
		function GetInfo($id) {
			// CONNEXION A LA BASE DE DONNEES
			$dbh = $this->Connect();
				
			$sql = "SELECT *
						FROM user
						WHERE idUtilisateur=".$id;
				
			$query = $dbh->query($sql);
				
			if ($query)
				return $query->fetchAll(PDO::FETCH_ASSOC);
			else
				return false;
		}
		
		// MODIFICATION INFORMATIONS USER
		function UpdateInfo($nom,$prenom,$email,$password,$id) {
			// CONNEXION A LA BASE DE DONNEES
			$dbh = $this->Connect();
			
			$sql = "UPDATE user
						SET nom='".$nom."',
						prenom='".$prenom."',
						email='".$email."',
						password=md5(".$password.")
						WHERE idUtilisateur=".$id;
			
			$query = $dbh->query($sql);
			
			if ($query)
				return $query->fetchAll(PDO::FETCH_ASSOC);
			else
				return false;
		}
		
		// AJOUT D'UN UTILISATEUR
		function AjouterMembre($nom,$prenom,$email,$ligue) {
			// CONNEXION A LA BASE DE DONNEES
			$dbh = $this->Connect();
				
			$sql = "INSERT INTO user
						VALUES('',
								'".$nom."',
								'".$prenom."',
								'".$email."',
								md5('azerty'),
								0,
								'".$ligue."')";
				
			$query = $dbh->query($sql);
				
			if ($query)
				return $query->fetchAll(PDO::FETCH_ASSOC);
			else
				return false;
		}
		
	}
	
?>