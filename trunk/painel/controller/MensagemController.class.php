<?
require_once ("../controller/Controller.class.php");

class MensagemController extends Controller {

	public function __construct() {
	}

	public function __destruct() {
	}
    
	public function salvar ($valores) {
		try {
			$object = $this->arrayToObject("Mensagem", $valores);
			
			parent::salvar($object);
		} catch (MyException $m) {
			throw $m;
		}
	}
	
	public function excluir ($valores) {
		try {
			$object = $this->arrayToObject("Mensagem", $valores);
			
			parent::excluir($object);
		} catch (MyException $m) {
			throw $m;
		}
	}
	
	public function consultar ($valores) {
		try {
			$object = $this->arrayToObject("Mensagem", $valores);
			
			parent::consultar($object);
		} catch (MyException $m) {
			throw $m;
		}
	}
	
	public function listar ($valores) {
		try {
			$object = $this->arrayToObject("Mensagem", $valores);

			return parent::listar($object);
	
			//$this->toNextPage($object->getNextPage("listar"));
		} catch (MyException $m) {
			throw $m;
		}
	}

	public function pesquisar ($valores) {
		try {
			$object = $this->arrayToObject("Mensagem", $valores);
			
			parent::pesquisar($object);
		} catch (MyException $m) {
			throw $m;
		}
	}
	
	public function contar ($valores) {
		try {
			$object = $this->arrayToObject("Mensagem", $valores);
			
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
		$_o = new MensagemController();
		$html = $_o->execute($_REQUEST["action"],$_REQUEST);
	} catch (MyException $m) {
		echo "<div class='system_error_message'>". $m->getMyMessage() ."</div>";
	}
}
?>