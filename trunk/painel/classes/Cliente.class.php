<?
require_once ("../utils/Object.class.php");

class Cliente extends Object {

	private $id_loja;
	private $id_cliente;
	private $nome;
	private $cpf;
	private $email;
	private $senha;
	private $telefone;
	private $celular;
	private $endereco;
	private $pais;
	private $estado;
	private $cidade;
	private $bairro;
	private $cep;
	
	public function __construct() {
	}

	public function __destruct() {
	}

	public function setid_loja($id_loja) {
		$this->id_loja = $id_loja;
	}

	public function setid_cliente($id_cliente) {
		$this->id_cliente = $id_cliente;
	}

	public function setnome($nome) {
		$this->nome = $nome;
	}

	public function setcpf($cpf) {
		$this->cpf = $cpf;
	}

	public function setemail($email) {
		$this->email = $email;
	}

	public function setsenha($senha) {
		$this->senha = $senha;
	}

	public function settelefone($telefone) {
		$this->telefone = $telefone;
	}

	public function setcelular($celular) {
		$this->celular = $celular;
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

	public function getid_loja() {
		return $this->id_loja;
	}

	public function getid_cliente() {
		return $this->id_cliente;
	}

	public function getnome() {
		return $this->nome;
	}

	public function getcpf() {
		return $this->cpf;
	}

	public function getemail() {
		return $this->email;
	}

	public function getsenha() {
		return $this->senha;
	}

	public function gettelefone() {
		return $this->telefone;
	}

	public function getcelular() {
		return $this->celular;
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
}
?>