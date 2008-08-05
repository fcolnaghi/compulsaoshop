<?
session_start();
require_once ("../utils/Object.class.php");

class Pagina extends Object {

	private $id_loja;
	private $id_pagina;
	private $titulo_pagina;
	private $conteudo_pagina;

	public function __construct() {
	}

	public function __destruct() {
	}

	public function setid_loja ($id_loja) {
		$this->id_loja = $id_loja;
	}

	public function setid_pagina ($id_pagina) {
		$this->id_pagina = $id_pagina;
	}

	public function settitulo_pagina ($titulo_pagina) {
		$this->titulo_pagina = $titulo_pagina;
	}

	public function setconteudo_pagina ($conteudo_pagina) {
		$this->conteudo_pagina = $conteudo_pagina;
	}

	public function getid_loja () {
		return $this->id_loja;
	}
	
	public function getid_pagina () {
		return $this->id_pagina;
	}
	
	public function gettitulo_pagina () {
		return $this->titulo_pagina;
	}
	
	public function getconteudo_pagina() {
		return $this->conteudo_pagina;
	}
	
	public function getOrderBy() {
		return $this->getIdName() . " asc";
	}
}
?>