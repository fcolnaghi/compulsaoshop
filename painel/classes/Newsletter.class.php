<?
require_once ("../utils/Object.class.php");

class Newsletter extends Object {

	private $id_loja;
	private $id_newsletter;
	private $nome;
	private $descricao;
	private $emails;
	private $texto;
	private $id_status_newsletter;

	public function __construct() {
	}

	public function __destruct() {
	}

	public function setid_loja($id_loja) {
		$this->id_loja = $id_loja;
	}
	
	public function setid_newsletter($id_newsletter) {
		$this->id_newsletter = $id_newsletter;
	}
	
	public function setnome($nome) {
		$this->nome = $nome;
	}
	
	public function setdescricao($descricao) {
		$this->descricao = $descricao;
	}
	
	public function setemails($emails) {
		$this->emails = $emails;
	}
	
	public function settexto($texto) {
		$this->texto = $texto;
	}
	
	public function setid_status_newsletter($id_status_newsletter) {
		$this->id_status_newsletter = $id_status_newsletter;
	}

	public function getid_loja() {
		return $this->id_loja;
	}
	
	public function getid_newsletter() {
		return $this->id_newsletter;
	}
	
	public function getnome() {
		return $this->nome;
	}
	
	public function getdescricao() {
		return $this->descricao;
	}
	
	public function getemails() {
		return $this->emails;
	}
	
	public function gettexto() {
		return $this->texto;
	}
	
	public function getid_status_newsletter() {
		return $this->id_status_newsletter;
	}
}
?>