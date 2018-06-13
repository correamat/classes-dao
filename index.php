<?php 
	require_once("Config.php");

	$user = new Usuario();

	$user->loadById(1);

	echo $user;
	//$sql = new Sql();

	//$usuarios = $sql->select("SELECT * FROM tb_usuarios");

	//echo json_encode($usuarios);
 ?>