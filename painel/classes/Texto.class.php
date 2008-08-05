<?
session_start();
require_once ("../utils/Object.class.php");

class Texto extends Object {

	private $id_loja;
	private $id_texto;
	private $titulo_texto;
	private $texto;

	public function __construct() {
	}

	public function __destruct() {
	}

	public function setid_loja ($id_loja) {
		$this->id_loja = $id_loja;
	}

	public function setid_texto ($id_texto) {
		$this->id_texto = $id_texto;
	}

	public function settitulo_texto ($titulo_texto) {
		$this->titulo_texto = $titulo_texto;
	}

	public function settexto ($texto) {
		$this->texto = $texto;
	}

	public function getid_loja () {
		return $this->id_loja;
	}
	
	public function getid_texto () {
		return $this->id_texto;
	}
	
	public function gettitulo_texto () {
		return $this->titulo_texto;
	}
	
	public function gettexto() {
		return $this->texto;
	}
}
?>