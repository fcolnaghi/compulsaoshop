<?
session_start();
require_once ("../utils/Object.class.php");

class Produto extends Object {

	private $id_loja;
	private $id_produto;
	private $id_categoria;
	private $nome;
	private $descricao;
	private $valor;
	private $peso;
	private $qtd_estoque;
	private $referencia;
	private $in_vitrine_loja;
	private $in_vitrine_categoria;
	private $in_portal;
	private $id_categoria_portal;

	public function __construct() {
	}

	public function __destruct() {
	}

	public function setid_loja($id_loja) {
		$this->id_loja = $id_loja;
	}

	public function setid_produto($id_produto) {
		$this->id_produto = $id_produto;
	}

	public function setid_categoria($id_categoria) {
		$this->id_categoria = $id_categoria;
	}

	public function setnome($nome) {
		$this->nome = $nome;
	}

	public function setdescricao($descricao) {
		$this->descricao = $descricao;
	}

	public function setvalor($valor) {
		$this->valor = $valor;
	}

	public function setpeso($peso) {
		$this->peso = $peso;
	}

	public function setqtd_estoque($qtd_estoque) {
		$this->qtd_estoque = $qtd_estoque;
	}

	public function setreferencia($referencia) {
		$this->referencia = $referencia;
	}

	public function setin_vitrine_loja($in_vitrine_loja) {
		$this->in_vitrine_loja = $in_vitrine_loja;
	}

	public function setin_vitrine_categoria($in_vitrine_categoria) {
		$this->in_vitrine_categoria = $in_vitrine_categoria;
	}

	public function setin_portal($in_portal) {
		$this->in_portal = $in_portal;
	}

	public function setid_categoria_portal($id_categoria_portal) {
		$this->id_categoria_portal = $id_categoria_portal;
	}

	public function getid_loja() {
		return $this->id_loja;
	}
	
	public function getid_produto() {
		return $this->id_produto;
	}

	public function getid_categoria() {
		return $this->id_categoria;
	}

	public function getnome() {
		return $this->nome;
	}

	public function getdescricao() {
		return $this->descricao;
	}

	public function getvalor() {
		return $this->valor;
	}

	public function getpeso() {
		return $this->peso;
	}

	public function getqtd_estoque() {
		return $this->qtd_estoque;
	}

	public function getreferencia() {
		return $this->referencia;
	}

	public function getin_vitrine_loja() {
		return $this->in_vitrine_loja;
	}

	public function getin_vitrine_categoria() {
		return $this->in_vitrine_categoria;
	}

	public function getin_portal() {
		return $this->in_portal;
	}

	public function getid_categoria_portal() {
		return $this->id_categoria_portal;
	}
}
?>