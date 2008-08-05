<?
require_once ("../utils/Object.class.php");

class Leilao extends Object {

	private $id_loja;
	private $id_leilao;
	private $descricao;
	private $id_produto;
	private $dt_inicio;
	private $dt_fim;
	private $id_status_leilao;

	public function __construct() {
	}

	public function __destruct() {
	}

	public function setid_loja($id_loja) {
		$this->id_loja = $id_loja;
	}

	public function setid_leilao($id_leilao) {
		$this->id_leilao = $id_leilao;
	}
	
	public function setdescricao($descricao) {
		$this->descricao = $descricao;
	}

	public function setid_produto($id_produto) {
		$this->id_produto = $id_produto;
	}

	public function setdt_inicio($dt_inicio) {
		$this->dt_inicio = $dt_inicio;
	}

	public function setdt_fim($dt_fim) {
		$this->dt_fim = $dt_fim;
	}

	public function setid_status_leilao($id_status_leilao) {
		$this->id_status_leilao = $id_status_leilao;
	}

	public function getid_loja() {
		return $this->id_loja;
	}

	public function getid_leilao() {
		return $this->id_leilao;
	}
	
	public function getdescricao() {
		return $this->descricao;
	}

	public function getid_produto() {
		return $this->id_produto;
	}

	public function getdt_inicio() {
		return $this->dt_inicio;
	}

	public function getdt_fim() {
		return $this->dt_fim;
	}

	public function getid_status_leilao() {
		return $this->id_status_leilao;
	}
	
	public function getOrderBy() {
		return $this->getIdName() . " asc";
	}
}
?>