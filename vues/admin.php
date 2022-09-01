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
	<meta charset='utf-8'>
	<title>Intranet M2L</title>
	
	<!-- BOOTSTRAP -->
	<link href="../bootstrap/css/bootstrap.css" rel="stylesheet" />
</head>

<body>

	<div class="container">
	
		<!-- TITRE -->
		<div class="row">
			<nav class="navbar navbar-default">
				<div class="navbar-header">
					<h1 class="navabr-brand">&nbsp;&nbsp;&nbsp;Personnel des ligues de la M2L</h1>
				</div>
				<div class='navbar-body'>
					<h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='../index.php'>Déconnexion</a></h5>
				</div>
			</nav>
		</div>
		
		<h3><a href='info_admin.php'>Informations personnelles</a></h3>
	
		<h1>Les membres de votre ligue : <?php echo $ligue; ?></h1>
		
		<?php
			if(isset($_GET['message']))
				echo "<p><font color='red'>".$_GET['message']."</font></p>";
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
	
</body>

<script scr="../bootstrap/js/jquery.js" type="text/javascript"></script>
<script scr="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

</html>
