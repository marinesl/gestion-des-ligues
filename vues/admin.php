<?php 
	session_start();
	
	// APPEL A LA CLASSE DE REQUETES SQL
	include '../include/sql.php';
	$sql = new ClassSQL();

	$sql = $sql->GetLigue($_SESSION['id']); 
	$ligue = $sql[0]['ligue'];
	$_SESSION['ligue'] = $sql[0]['idLigue'];
	$idLigue = $sql[0]['idLigue'];
?>

<!DOCTYPE html>

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Gestion des ligues PHP | Admin</title>
	
	<!-- BOOTSTRAP -->
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" />

	<style>
		.red {
			color: red;
		}
	</style>
</head>

<body>

	<div class="container">
	
		<!-- TITRE -->
		<div class="row">
			<nav class="navbar navbar-default">
				<div class="navbar-header">
					<h1 class="navabr-brand">Gestion des ligues</h1>
				</div>
				<div class='navbar-body'>
					<p><a href='../index.php'>Déconnexion</a></p>
				</div>
			</nav>
		</div>
		
		<p><a href='info_admin.php'>Informations personnelles</a></p>
	
		<h2>Les membres de votre ligue : <?php echo $ligue; ?></h2>
		
		<?php
			if (isset($_GET['message']))
				echo "<p class='red'>".$_GET['message']."</p>";
		?>
	
		<div class="row">
		
			<table class="table table-striped" >
				<thead>
					<tr>
						<th>Nom</th>
						<th>Prénom</th>
						<th>E-Mail</th>
						<th>Supprimer</th>
					</tr>
				</thead>	
				<tbody>
					<?php 
						$sql1 = new ClassSQL();
						$sql1 = $sql1->GetMembres($idLigue);
						for($i = 0 ; $i < count($sql1) ; $i++) {
							echo "<tr>
								<td>".$sql1[$i]['nom']."</td>
								<td>".$sql1[$i]['prenom']."</td>
								<td>".$sql1[$i]['mail']."</td>
								<td><a href='supprimerUser.php?id=".$sql1[$i]['idUtilisateur']."'>X</a></td>
							</tr>";
						}
					?>
				</tbody>		
			</table>
		
		</div>
		
		<div class="row">
			<a href="ajouterMembre.php">Ajouter un membre</a>
		</div>
	
	</div>

	<script scr="../bootstrap/js/jquery-3.6.1.min.js" type="text/javascript"></script>
	<script scr="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	
</body>

</html>
