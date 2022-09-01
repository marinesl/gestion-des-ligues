<?php

	session_start();

	$id = $_GET['id'];
	
	// APPEL A LA CLASSE DE REQUETES SQL
	include '../include/sql.php';
	$sql = new ClassSQL();
	
	$sql = $sql->SuppUser($id);
	
	header("location:admin.php");