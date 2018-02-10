<?php
	require "../searchProductView.php";
	session_start();
	if(!isset($_SESSION['id'])){
		header("location: ../../../index.php");
	}else if($_SESSION['type'] != "Admin"){
			header("location: ../../../index.php");
		}
	searchProductView();
?>