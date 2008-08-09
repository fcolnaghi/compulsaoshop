<?
session_start();
header("Content-Type: text/html; charset=iso-8859-1",true);
require_once ("../controller/Controller.class.php");
require_once ("../controller/UsuarioController.class.php");
require_once ("../classes/Mensagem.class.php");
require_once ("../utils/MyException.class.php");

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
			echo $m->getMyMessage();
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
	
	public function consultar ($id) {
		try {
			$object = $this->arrayToObject("Mensagem");
			$object->setid($id);
			
			return parent::consultar($object);
		} catch (MyException $m) {
			throw $m;
		}
	}
	
	public function listar () {
		try {
			$object = $this->arrayToObject("Mensagem");

			return parent::listar($object);
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
	
	public function contar () {
		try {
			$object = $this->arrayToObject("Mensagem");
			
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