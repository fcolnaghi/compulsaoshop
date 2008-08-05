<?
require_once ("../utils/Object.class.php");

class Promocao extends Object {

	private $id_loja;
	private $id_promocao;
	private $nome;
	private $descricao;
	private $percentual_desconto;
	private $qtd_limite_produtos;
	private $dt_inicio;
	private $dt_fim;

	public function __construct() {
	}

	public function __destruct() {
	}

	public function setid_loja($id_loja) {
		$this->id_loja = $id_loja;
	}

	public function setid_promocao($id_promocao) {
		$this->id_promocao = $id_promocao;
	}

	public function setnome($nome) {
		$this->nome = $nome;
	}

	public function setdescricao($descricao) {
		$this->descricao = $descricao;
	}

	public function setpercentual_desconto($percentual_desconto) {
		$this->percentual_desconto = $percentual_desconto;
	}

	public function setqtd_limite_produtos($qtd_limite_produtos) {
		$this->qtd_limite_produtos = $qtd_limite_produtos;
	}

	public function setdt_inicio($dt_inicio) {
		$this->dt_inicio = $dt_inicio;
	}

	public function setdt_fim($dt_fim) {
		$this->dt_fim = $dt_fim;
	}

	public function getid_loja() {
		return $this->id_loja;
	}

	public function getid_promocao() {
		return $this->id_promocao;
	}

	public function getnome() {
		return $this->nome;
	}

	public function getdescricao() {
		return $this->descricao;
	}

	public function getpercentual_desconto() {
		return $this->percentual_desconto;
	}

	public function getqtd_limite_produtos() {
		return $this->qtd_limite_produtos;
	}

	public function getdt_inicio() {
		return $this->dt_inicio;
	}

	public function getdt_fim() {
		return $this->dt_fim;
	}
	
	public function getOrderBy() {
		return $this->getIdName() . " asc";
	}
}
?>