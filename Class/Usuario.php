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

				$this->setIdusuario($row['idusuario']);
				$this->setLogin($row['deslogin']);
				$this->setSenha($row['dessenha']);
				$this->setDataCadastro(new DateTime($row['dtcadastro']));
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

				$this->setIdusuario($row['idusuario']);
				$this->setLogin($row['deslogin']);
				$this->setSenha($row['dessenha']);
				$this->setDataCadastro(new DateTime($row['dtcadastro']));
			}else{

				throw new Exception("Login e/ou senha inválidos");
				
			}

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