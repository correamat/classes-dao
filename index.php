<?php 
	require_once("Config.php");
	//CARREGA UM USUARIO DO ID PASSADO POR PARAMETRO
	//$user = new Usuario();
	//$user->loadById(1);
	//echo $user;
	//$sql = new Sql();
	//$usuarios = $sql->select("SELECT * FROM tb_usuarios");
	//echo json_encode($usuarios);

	//CARREGA UMA LISTA DE USUARIOS
	//$lista = Usuario::getList();
	//echo json_encode($lista);

	// CARREGA UMA LISTA DE USUARIOS BUSCANOD PELO LOGIN
	//$search = Usuario::search("us");
	//echo json_encode($search);

	//CARREGA UM USUARIO USANDO O LOGIN E UMA SENHA

	//$usuario = new Usuario();
	//$usuario->login("user","12345");
	//INSERINDO USUÁRIO NO BANCO
	//$aluno = new Usuario("teste","@teste1233");
	//$aluno->insert();
	//echo $aluno;
	//echo $usuario;

	//ATUALIZANDO UM USUARIO OU SENHA DO BANCO

	/*$usuario = new Usuario ();
	$usuario->loadById(10);
	$usuario->update("professor","prof123");
	echo $usuario;
	*/

	//DELETANDO UM USUÁRIO

	$usuario = new Usuario();
	$usuario->loadById(8);
	$usuario->delete();
	echo $usuario;
 ?>