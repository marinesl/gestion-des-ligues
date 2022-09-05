<?php 
	session_start();
	
	// APPEL A LA CLASSE DE REQUETES SQL
	include '../include/sql.php';
	$sql = new ClassSQL();
	
	$ligue = $_SESSION['ligue'];

?>

<!DOCTYPE html>

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Gestion des ligues PHP | Admin nouveau membre</title>
	
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
		
		<h2>Ajouter un membre</h2>
		
		<?php
			if (isset($_GET['message']))
				echo "<p class='red'>".$_GET['message']."</p>";
		?>
		
		<div class="row">
		
			<form class="form-horizontal col-md-push-2 col-md-8" action='../include/ajout.php' method='POST' name='formAjouter'>
		
				<div class="row">	
					<div class="form-group">				
						<label class="col-md-2">Nom : </label>
						<div class="col-md-4">
							<input class="form-control" type='text' id='nom' name='nom'>
						</div>
								
						<label class="col-md-2">Prénom : </label>
						<div class="col-md-4">
							<input class="form-control" type='text' id='prenom' name='prenom'>
						</div>
						
						<label class="col-md-2">E-mail : </label>
						<div class="col-md-4">
							<input class="form-control" type='text' id='mail' name='mail'>
						</div>
						
						<input type="hidden" name="ligue" value="<?php echo $ligue; ?>">
					
						<div class="col-md-offsett-2 col-md-4">
							<button class="btn btn-primary" type='submit'>Ajouter</button>
						</div>
					
					<!-- CLASS FORM-GROUP -->	
					</div>
												
				<!-- CLASS ROW -->
				</div>
			</form>
		
		</div>		

	</div>

	<script scr="../bootstrap/js/jquery-3.6.1.js" type="text/javascript"></script>
	<script scr="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	
</body>

</html>

