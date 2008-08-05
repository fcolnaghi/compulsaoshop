<?
require_once( "../utils/Object.class.php" );

class Usuario extends Object {

	private $id_usuario;
	private $id_loja;
	private $nome;
	private $cpf;
	private $email;
	private $senha;
	private $id_perfil;
	private $id_status_usuario;
 
    public function __construct() {
    }
 
    public function __destruct() {
	}
	
	public function setid_loja ($id_loja) {
		$this->id_loja = $id_loja;
	}

	public function setid_usuario ($id_usuario) {
		$this->id_usuario = $id_usuario;
	}

	public function setnome ($nome) {
		$this->nome = $nome;
	}

	public function setcpf ($cpf) {
		$this->cpf = $cpf;
	}

	public function setemail ($email) {
		$this->email = $email;
	}

	public function setsenha ($senha) {
		$this->senha = $senha;
	}

	public function setid_perfil ($id_perfil) {
		$this->id_perfil = $id_perfil;
	}

	public function setid_status_usuario ($id_status_usuario) {
		$this->id_status_usuario = $id_status_usuario;
	}

	public function getid_loja () {
		return $this->id_loja;
	}
	
	public function getid_usuario () {
		return $this->id_usuario;
	}
	   
	public function getnome () {
		return $this->nome;
	}
	
	public function getcpf () {
		return $this->cpf;
	}
	
	public function getemail () {
		return $this->email;
	}
	
	public function getsenha () {
		return $this->senha;
	}
	
	public function getid_perfil () {
		return $this->id_perfil;
	}
	
	public function getid_status_usuario () {
		return $this->id_status_usuario;
	}
}
?>