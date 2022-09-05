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
	<title>Gestion des ligues PHP | Admin info</title>
	
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
		
		<p><a href='admin.php'>Liste des membres</a></p>
		
		<h2>Ajouter un membre</h2>
		
		<?php
			if (isset($_GET['message']))
				echo "<p class='red'>".$_GET['message']."</p>";
		?>
		
		<div class="row">
		
			<form class="form-horizontal col-md-push-3 col-md-8" action="../include/modifInfoAdmin.php" method="POST">
			
				<?php 
					$sql1 = new ClassSQL();
					$sql1 = $sql1->GetInfo($_SESSION['id']);
				?>
			
				<div class="form-group">
					<div class="row">
						<label class="col-md-4">Nom</label>
						<input class="form-control col-md-4" type="text" name="nom" value="<?php echo $sql1[0]['nom']; ?>">
					</div>
					
					<div class="row">
						<label class="col-md-4">Prénom</label>
						<input class="form-control col-md-4" type="text" name="prenom" value="<?php echo $sql1[0]['prenom']; ?>">
					</div>
					
					<div class="row">
						<label class="col-md-4">E-Mail</label>
						<input class="form-control col-md-4" type="text" name="email" value="<?php echo $sql1[0]['mail']; ?>">
					</div>
					
					<div class="row">
						<label class="col-md-4">Mot de passe</label>
						<input class="form-control col-md-4" type="password" name="pw1">
					</div>
					
					<div class="row">
						<label class="col-md-4">Confirmation</label>
						<input class="form-control col-md-4" type="password" name="pw2">
					</div>
					
					<br>
					
					<div class="row">
						<button type="submit" class="btn btn-primary">Modifier</button>
					</div>
				</div>
			</form>
		
		</div>		
	
	</div>

	<script scr="../bootstrap/js/jquery-3.6.1.js" type="text/javascript"></script>
	<script scr="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	
</body>

</html>

