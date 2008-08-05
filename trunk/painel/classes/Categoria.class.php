<?
require_once ("../utils/Object.class.php");

class Categoria extends Object {

	private $id_loja;
	private $id_categoria;
	private $id_categoria_pai;
	private $descricao;

	public function __construct() {
	}

	public function __destruct() {
	}

	public function setid_loja($id_loja) {
		$this->id_loja = $id_loja;
	}
	
	public function setid_categoria($id_categoria) {
		$this->id_categoria = $id_categoria;
	}
	
	public function setid_categoria_pai($id_categoria_pai) {
		$this->id_categoria_pai = $id_categoria_pai;
	}
	
	public function setdescricao($descricao) {
		$this->descricao = $descricao;
	}

	public function getid_loja() {
		return $this->id_loja;
	}
	
	public function getid_categoria() {
		return $this->id_categoria;
	}
	
	public function getid_categoria_pai() {
		return $this->id_categoria_pai;
	}
	
	public function getdescricao() {
		return $this->descricao;
	}
}
?>