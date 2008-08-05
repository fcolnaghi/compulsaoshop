<?
session_start();
require_once ("../controller/Controller.class.php");

class BannerController extends Controller {

	public function __construct() {
	}

	public function __destruct() {
	}
    
	public function salvar ($valores) {
		try {
			$object = $this->arrayToObject("Banner", $valores);
			
			parent::salvar($object);
		} catch (MyException $m) {
			throw $m;
		}
	}
	
	public function excluir ($valores) {
		try {
			$object = $this->arrayToObject("Banner", $valores);
			
			parent::excluir($object);
		} catch (MyException $m) {
			throw $m;
		}
	}
	
	public function consultar ($id) {
		try {
			$object = $this->arrayToObject("Banner");
			$object->setid($id);
			
			return parent::consultar($object);
		} catch (MyException $m) {
			throw $m;
		}
	}
	
	public function listar () {
		try {
			$object = $this->arrayToObject("Banner");

			return parent::listar($object);
		} catch (MyException $m) {
			throw $m;
		}
	}

	public function pesquisar ($valores) {
		try {
			$object = $this->arrayToObject("Banner", $valores);
			
			parent::pesquisar($object);
		} catch (MyException $m) {
			throw $m;
		}
	}
	
	public function contar () {
		try {
			$object = $this->arrayToObject("Banner");
			
			return parent::contar($object);
		} catch (MyException $m) {
			throw $m;
		}
	}
	
	public function executarSQL ($sql, $className) {
		try {
			if (isset($className)) {
				return parent::executarSQL($sql, $className);
			} else {
				return parent::executarSQL($sql);
			}
		} catch (MyException $m) {
			throw $m;
		}
	}
}

if (isset($_REQUEST["action"])) {
	try {
		$_o = new BannerController();
		$html = $_o->execute($_REQUEST["action"],$_REQUEST);
	} catch (MyException $m) {
		echo "<div class='system_error_message'>". $m->getMyMessage() ."</div>";
	}
}
?>