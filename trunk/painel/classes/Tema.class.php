<?
require_once ("../utils/Object.class.php");

class Tema extends Object {

	private $id_tema;
	private $descricao;
	private $css;

	public function __construct() {
	}

	public function __destruct() {
	}

	public function setid_tema($id_tema) {
		$this->id_tema = $id_tema;
	}

	public function setdescricao($descricao) {
		$this->descricao = $descricao;
	}

	public function setcss($css) {
		$this->css = $css;
	}

	public function getid_tema() {
		return $this->id_tema;
	}

	public function getdescricao() {
		return $this->descricao;
	}

	public function getcss() {
		return $this->css;
	}
	
	public function getOrderBy() {
		return $this->getIdName() . " asc";
	}
}
?>