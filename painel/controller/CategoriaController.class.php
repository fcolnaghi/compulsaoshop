<?
session_start();
header("Content-Type: text/html; charset=iso-8859-1",true);
require_once ("../controller/Controller.class.php");
require_once ("../controller/UsuarioController.class.php");
require_once ("../classes/Categoria.class.php");
require_once ("../utils/MyException.class.php");

class CategoriaController extends Controller {

	public function __construct() {
	}

	public function __destruct() {
	}
    
	public function salvar ($valores) {
		try {
			$object = $this->arrayToObject("Categoria", $valores);
			
			parent::salvar($object);
			
			$this->toNextPage($object->getNextPage("salvar"));
		} catch (MyException $m) {
			echo $m->getMyMessage();
		}
		
		/*
		$_o = $db->getInstance();

		if ($object->getid() == NULL) {
			$sql = $db->getSqlInsert($object);
		} else {
			if ($object->getdescricao()=="") {
				$sql = "select * from categoria where id_loja = ".$object->getid_loja()." and id_categoria = ". $object->getid_categoria();
				$arrayObjetos = $this->executeSQL($sql);
				$descricao = $arrayObjetos[0]->getdescricao();
	
				$object->setdescricao($descricao);
			}
			
			$sql = $db->getSqlUpdate($object);
		}

		$_o->query($sql);
		
		if ($_o->getstatus() == 1) {
			throw new MyException(4002);
		}
		 */
	}
	
	public function excluir ($valores) {
		try {
			$object = $this->arrayToObject("Categoria", $valores);
			
			return parent::excluir($object);
		} catch (MyException $m) {
			throw $m;
		}
	}
	
	public function consultar ($id) {
		try {
			$object = $this->arrayToObject("Categoria");
			$object->setid($id);
			
			return parent::consultar($object);
		} catch (MyException $m) {
			throw $m;
		}
	}
	
	public function listar () {
		try {
			$object = $this->arrayToObject("Categoria");

			return parent::listar($object);
		} catch (MyException $m) {
			throw $m;
		}
	}

	public function pesquisar ($valores) {
		try {
			$object = $this->arrayToObject("Categoria", $valores);
			
			return parent::pesquisar($object);
		} catch (MyException $m) {
			throw $m;
		}
	}
	
	public function contar () {
		try {
			$object = $this->arrayToObject("Categoria");
			
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
		
	public function geraMenu ($id_categoria_pai) {
		$sql = "select * from categoria where id_loja = 1 and id_categoria_pai = ". $id_categoria_pai;
		$response = $this->executarSQL($sql, "Categoria");
		
		echo "<ul>";
		try {
			foreach($response as $obj) {
				echo "<li id='".$obj->getid_categoria()."'>";
				echo "<span>".$obj->getdescricao()." (id ".$obj->getid_categoria().")</span>";
				
				$sql = "select * from categoria where id_loja = 1 and id_categoria_pai = ". $obj->getid_categoria();
				$filhos = $this->executarSQL($sql, "Categoria");
				
				if (count($filhos) > 0) {
					$this->geraMenu($obj->getid_categoria());
				}
				echo "</li>";
			}
		} catch (MyException $m) {
			// N�o faz nada
		}
		echo "</ul>";
	}
	
	/*
	public function excluir ($db, $object) {
	
		$_o = $db->getInstance();

		// Descobrindo o id_categoria_pai		
		$sql = "select * from categoria where id_loja = ".$object->getid_loja()." and id_categoria = ". $object->getid_categoria();
		$arrayObjetos = $this->executeSQL($sql);
		$id_pai = $arrayObjetos[0]->getid_categoria_pai();

		// Movendo filhos para categoria pai
		$sql = "update categoria set id_categoria_pai = ".$id_pai." where id_loja = ".$object->getid_loja()." and id_categoria_pai = ". $object->getid_categoria();
		$_o->query($sql);

		// Apagando o registro
		$sql = $db->getSqlDelete($object);
		$_o->query($sql);

		if ($_o->getstatus() == 1) {
			throw new MyException(4000);
		}
	}

	 */

}

if (isset($_REQUEST["action"])) {
	try {
		$_o = new CategoriaController();
		$html = $_o->execute($_REQUEST["action"],$_REQUEST);
	} catch (MyException $m) {
		echo "<div class='system_error_message'>". $m->getMyMessage() ."</div>";
	}
}
?>