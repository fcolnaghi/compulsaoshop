<?
require_once ("../utils/Object.class.php");

class Mensagem extends Object {

	private $id_loja;
	private $id_mensagem;
	private $titulo;
	private $texto;
	private $dt_envio;
	private $dt_leitura;

	public function __construct() {
	}

	public function __destruct() {
	}

	public function setid_loja($id_loja) {
		$this->id_loja = $id_loja;
	}

	public function setid_mensagem($id_mensagem) {
		$this->id_mensagem = $id_mensagem;
	}

	public function settitulo($titulo) {
		$this->titulo = $titulo;
	}

	public function settexto($texto) {
		$this->texto = $texto;
	}

	public function setdt_envio($dt_envio) {
		$this->dt_envio = $dt_envio;
	}

	public function setdt_leitura($dt_leitura) {
		$this->dt_leitura = $dt_leitura;
	}

	public function getid_loja() {
		return $this->id_loja;
	}

	public function getid_mensagem() {
		return $this->id_mensagem;
	}

	public function gettitulo() {
		return $this->titulo;
	}

	public function gettexto() {
		return $this->texto;
	}

	public function getdt_envio() {
		return $this->dt_envio;
	}

	public function getdt_leitura() {
		return $this->dt_leitura;
	}
	
	public function getOrderBy() {
		return $this->getIdName() . " asc";
	}
}
?>