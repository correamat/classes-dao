<?php 

	class Usuario{

		private $idusuario;
		private $deslongin;
		private $dessenha;
		private $dtcadastro;

		public function getIdusuario(){
			return $this->idusuario;
		}

		public function setIdusuario($idusuario){
			$this->idusuario = $idusuario;
		}

		public function getLogin(){
			return $this->deslongin;
		}

		public function setLogin($deslongin){
			$this->deslongin = $deslongin;
		}

		public function getSenha(){
			return $this->dessenha;
		}

		public function setSenha($dessenha){
			$this->dessenha = $dessenha;
		}

		public function getDataCadastro(){
			return $this->dtcadastro;
		}

		public function setDataCadastro($dtcadastro){
			$this->dtcadastro = $dtcadastro;
		}

		public function loadById($id){

			$sql = new Sql();

			$result = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :id",array(

				":id"=>$id));

			if(count($result)>0){

				$row = $result[0];
				self::setData($result[0]);
			}

		}

		public static function getList(){

			$sql = new Sql();

			return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");

		}

		public static function search($login){

			$sql = new Sql();

			return  $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :search ORDER BY deslogin",array(
				':search'=>"%".$login."%"	
			));
		}

		//OBTENDO OS DADOS DE UM USUARIO AUTENTICADO
		public function login($login,$password){

			$sql = new Sql();

			$result = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :login AND dessenha = :senha",array(

				":login"=>$login,
				":senha"=>$password));

			if(count($result)>0){

				$row = $result[0];
				self::setData($results[0]);
			}else{

				throw new Exception("Login e/ou senha inválidos");
				
			}

		}

		public function insert(){

			$sql = new Sql();
			$results = $sql->select("CALL sp_usuarios_insert(:login,:password)",array(
				":login"=>self::getLogin(),
				":password"=>self::getSenha()));

			if(count($results)>0){

				self::setData($results[0]);
			}


		}

		public function setData($data){

			$this->setIdusuario($data['idusuario']);
			$this->setLogin($data['deslogin']);
			$this->setSenha($data['dessenha']);
			$this->setDataCadastro(new DateTime($data['dtcadastro']));
		}


		public function update($login,$password){
			self::setLogin($login);
			self::setSenha($password);
			$sql = new Sql();
			$sql->query("UPDATE tb_usuarios SET deslogin = :login, dessenha = :senha WHERE idusuario = :id ",array(
				":id"=>self::getIdusuario(),
				":login"=>self::getLogin(),
				":senha"=>self::getSenha()
				));
		}

		public function __construct ($login="",$password=""){

			self::setLogin($login);
			self::setSenha($password);
		}
		public function __toString(){

			return json_encode(array("idusuario"=>self::getIdusuario(),
				"deslongin"=>self::getLogin(),
				"dessenha"=>self::getSenha(),
				"dtcadastro"=>self::getDataCadastro()->format("d/m/Y H:i:s")

			));
		}



	}

 ?>