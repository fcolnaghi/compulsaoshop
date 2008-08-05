<?
require_once ("../utils/Object.class.php");

class Banner extends Object {

	private $id_loja;
	private $id_banner;
	private $posicao;
	private $url;
	private $destino;
	private $target;
	private $click;

	public function __construct() {
	}

	public function __destruct() {
	}

	public function setid_loja($id_loja) {
		$this->id_loja = $id_loja;
	}

	public function setid_banner($id_banner) {
		$this->id_banner = $id_banner;
	}

	public function setposicao($posicao) {
		$this->posicao = $posicao;
	}

	public function seturl($url) {
		$this->url = $url;
	}

	public function setdestino($destino) {
		$this->destino = $destino;
	}

	public function settarget($target) {
		$this->target = $target;
	}

	public function setclick($click) {
		$this->click = $click;
	}

	public function getid_loja () {
		return $this->id_loja;
	}

	public function getid_banner () {
		return $this->id_banner;
	}

	public function getposicao () {
		return $this->posicao;
	}

	public function geturl () {
		return $this->url;
	}

	public function getdestino () {
		return $this->destino;
	}

	public function gettarget () {
		return $this->target;
	}

	public function getclick () {
		return $this->click;
	}
	
	public function getOrderBy() {
		return $this->getIdName() . " asc";
	}
}
?>