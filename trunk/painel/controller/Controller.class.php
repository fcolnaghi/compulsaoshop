<?
session_start();
header("Content-Type: text/html; charset=ISO-8859-1",true);
require_once ("../controller/UsuarioController.class.php");
require_once ("../utils/XML.class.php");
require_once ("../utils/DB.class.php");
require_once ("../utils/MyException.class.php");

class Controller {

	private $table;

	public function __construct() {
	}

	public function __destruct() {
	}
	
	public function execute ($action, $valores) {

		try {
			switch ($action) {
				case 'salvar':
					return $this->salvar($valores);
				case 'excluir':
					return $this->excluir($valores);
				case 'consultar':
					return $this->consultar($valores);
				case 'listar':
					return $this->listar($valores);
				case 'pesquisar':
					return $this->pesquisar($valores);
				case 'contar':
					return $this->contar($valores);
				default:
			}
		} catch (MyException $m) {
			throw $m;
		}
	}

	public function salvar ($object) {
		
		try {
			UsuarioController::verificaSessao();

			$db = new DB();
	
			$_o = $db->getInstance();
		
			if ($object->getid() == NULL) {
				$sql = $db->getSqlInsert($object);
			} else {
				$sql = $db->getSqlUpdate($object);
			}
			
			$_o->query($sql);
		} catch (MyException $m) {
			throw $m;
		}
		
		if ($_o->getstatus() == 1) {
			throw new MyException(1004);
		}

		throw new MyException (1000); // Sucesso
	}
	
	public function excluir ($object) {
		try {
			UsuarioController::verificaSessao();
			
			$db = new DB();
	
			$_o = $db->getInstance();
	
			$sql = $db->getSqlDelete($object);
	
			$_o->query($sql);
		} catch (MyException $m) {
			throw $m;
		}
		
		if ($_o->getstatus() == 1) {
			throw new MyException(1002);
		}
	}
	
	public function consultar ($object) {
		try {
			UsuarioController::verificaSessao();
			
			$db = new DB();
	
			$_o = $db->getInstance();
	
	       	$sql = $db->getSqlQueryById($object);

	       	$_o->query($sql);
			
			return $this->arrayToObject($object->getClassName(), $_o->getresult());
			
		} catch (MyException $m) {
			throw $m;
		}
	}
	
	public function listar ($object) {
	
		$arrayObjetos = null;
	
		try {
			UsuarioController::verificaSessao();
			
			$db = new DB();
	
			$_o = $db->getInstance();
	
	       	$sql = $db->getSqlQueryAll($object);

			$_o->query($sql);

			for ($i=0; $i<$_o->getcount(); $i++) {
	 			$arrayObjetos[] = $this->arrayToObject($object->getClassName(), $_o->getresult());
				
				$_o->next();
			}
			
			return $arrayObjetos;
		} catch (MyException $m) {
			throw $m;
		}
			
		if (count($arrayObjetos)==0) {
			throw new MyException(1001);
		}
	}
	
	public function pesquisar ($object) {
	
		$arrayObjetos = null;
	
		try {
			UsuarioController::verificaSessao();
			
			$db = new DB();
	
			$_o = $db->getInstance();
	
			$sql = $db->getSqlQuery($object);

			$_o->query($sql);
			
			$arrayObjetos = array();
			for ($i=0; $i<$_o->getcount(); $i++) {
	 			$arrayObjetos[] = $this->arrayToObject($object->getClassName(), $_o->getresult());
				
				$_o->next();
			}
		} catch (MyException $m) {
			throw $m;
		}
			
		if (count($arrayObjetos)==0) {
			throw new MyException(1001);
		}

		return $arrayObjetos;
	}
	
	public function login ($object) {
	
		$arrayObjetos = null;
	
		try {
			$db = new DB();
	
			$_o = $db->getInstance();
	
			$sql = $db->getSqlQuery($object, false);

			$_o->query($sql);
			
			return $this->arrayToObject($object->getClassName(), $_o->getresult());
			
		} catch (MyException $m) {
			throw $m;
		}
			
		if (count($arrayObjetos)==0) {
			throw new MyException(1001);
		}

		return $arrayObjetos;
	}
	
	public function contar ($object) {
		try {
			UsuarioController::verificaSessao();
			
			$db = new DB();
	
			$_o = $db->getInstance();
	
			$sql = $db->getSqlCountQuery($object);

			$_o->query($sql);
			
			return $_o->getresult();
		} catch (MyException $m) {
			throw $m;
		}
	}
	
	public function executarSQL ($sql, $className) {
		$arrayObjetos = null;
	
		try {
			UsuarioController::verificaSessao();
			
			$db = new DB();
	
			$_o = $db->getInstance();
			
			$_o->query($sql);
			
			if (substr($sql,0,6)=="select") {
			
				$arrayObjetos = array();
				for ($i=0; $i<$_o->getcount(); $i++) {
					if (isset($className)) {
		 				$arrayObjetos[] = $this->arrayToObject($className, $_o->getresult());
					} else {
						$arrayObjetos[] = $this->arrayToObject($object->getClassName(), $_o->getresult());
					}
					
					$_o->next();
				}
				
				return $arrayObjetos;
			}
		} catch (MyException $m) {
			throw $m;
		}
			
		if ((substr($sql,0,6)=="select") && count($arrayObjetos)==0) {
			throw new MyException(1001);
		}
	}
	
	public function toNextPage ($page) {
		header("Location: ". $page);
		//echo "Depois disso, ir para a página ". $page;
	}
	
	//--------------------- Funções do framework ---------------------//
    public function arrayToObject ($className, $arrayValues = null) {
		$object = new $className;

		if ($arrayValues != null) {
		    foreach($arrayValues as $index => $value) {
				$object->__call("set".$index,$value);
		    }
		}
		return $object;
    }
}
?>