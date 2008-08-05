<?
session_start();
require_once ("../utils/Object.class.php");

class Loja extends Object {

	private $id_loja;
	private $nome;
	private $razao_social;
	private $cnpj;
	private $email;
	private $telefone;
	private $fax;
	private $endereco;
	private $pais;
	private $estado;
	private $cidade;
	private $bairro;
	private $cep;
	private $id_status_loja;
	private $dia_cobranca;
	private $qtd_produtos_pagina;
	private $id_tema;
	private $css;

	public function __construct() {
	}

	public function getOrderBy() {
		return "id asc";
	}

	public function __destruct() {
	}

	public function setid_loja($id_loja) {
		$this->id_loja = $id_loja;
	}

	public function setnome($nome) {
		$this->nome = $nome;
	}
	public function setrazao_social($razao_social) {
		$this->razao_social = $razao_social;
	}
	public function setcnpj($cnpj) {
		$this->cnpj = $cnpj;
	}
	public function setemail($email) {
		$this->email = $email;
	}
	public function settelefone($telefone) {
		$this->telefone = $telefone;
	}
	public function setfax($fax) {
		$this->fax = $fax;
	}
	public function setendereco($endereco) {
		$this->endereco = $endereco;
	}
	public function setpais($pais) {
		$this->pais = $pais;
	}
	public function setestado($estado) {
		$this->estado = $estado;
	}
	public function setcidade($cidade) {
		$this->cidade = $cidade;
	}
	public function setbairro($bairro) {
		$this->bairro = $bairro;
	}
	public function setcep($cep) {
		$this->cep = $cep;
	}
	public function setid_status_loja($id_status_loja) {
		$this->id_status_loja = $id_status_loja;
	}
	public function setdia_cobranca($dia_cobranca) {
		$this->dia_cobranca = $dia_cobranca;
	}
	public function setqtd_produtos_pagina($qtd_produtos_pagina) {
		$this->qtd_produtos_pagina = $qtd_produtos_pagina;
	}
	public function setid_tema($id_tema) {
		$this->id_tema = $id_tema;
	}
	public function setcss($css) {
		$this->css = $css;
	}

	public function getid_loja() {
		return $this->id_loja;
	}

	public function getnome() {
		return $this->nome;
	}

	public function getrazao_social() {
		return $this->razao_social;
	}

	public function getcnpj() {
		return $this->cnpj;
	}

	public function getemail() {
		return $this->email;
	}

	public function gettelefone() {
		return $this->telefone;
	}

	public function getfax() {
		return $this->fax;
	}

	public function getendereco() {
		return $this->endereco;
	}

	public function getpais() {
		return $this->pais;
	}

	public function getestado() {
		return $this->estado;
	}

	public function getcidade() {
		return $this->cidade;
	}

	public function getbairro() {
		return $this->bairro;
	}

	public function getcep() {
		return $this->cep;
	}

	public function getid_status_loja() {
		return $this->id_status_loja;
	}

	public function getdia_cobranca() {
		return $this->dia_cobranca;
	}

	public function getqtd_produtos_pagina() {
		return $this->qtd_produtos_pagina;
	}

	public function getid_tema() {
		return $this->id_tema;
	}

	public function getcss() {
		return $this->css;
	}
	
	public function getOrderBy() {
		return $this->getIdName() . " asc";
	}
}
?>