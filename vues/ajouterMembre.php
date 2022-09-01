<?php 
	session_start();
	
	// APPEL A LA CLASSE DE REQUETES SQL
	include '../include/sql.php';
	$sql = new ClassSQL();
	
	$ligue = $_SESSION['ligue'];

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
			</nav>
		</div>
		
		<h1>Ajouter un membre</h1>
		
		<?php
			if(isset($_GET['message']))
				echo "<p><font color='red'>".$_GET['message']."</font></p>";
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
	
</body>

<script scr="../bootstrap/js/jquery.js" type="text/javascript"></script>
<script scr="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

</html>

