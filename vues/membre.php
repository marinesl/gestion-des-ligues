<?php 
	session_start();
	
	// APPEL A LA CLASSE DE REQUETES SQL
	include '../include/sql.php';
	$sql = new ClassSQL();
	
	$sql = $sql->GetLigue($_SESSION['id']); 
	$ligue = $sql[0]['ligue'];
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
	
		<h1>Votre ligue : <?php echo $ligue; ?></h1>
		
		<?php
			if(isset($_GET['erreur']))
				echo "<p><font color='red'>".$_GET['erreur']."</font></p>";
		?>
	
		<div class="row">
		
			<form class="form-horizontal col-md-push-3 col-md-8" action="../include/modifInfoMembre.php" method="POST">
			
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
	
</body>

<script scr="../bootstrap/js/jquery.js" type="text/javascript"></script>
<script scr="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

</html>

