<?
session_start();
header("Content-Type: text/html; charset=iso-8859-1",true);

require_once ("../utils/Object.class.php");

class Adt extends Object {

	private $id;
	private $descricao;

	public function __construct() {
	}

	public function __destruct() {
	}

	public function setid($id) {
		$this->id = $id;
	}

	public function setdescricao($descricao) {
		$this->descricao = $descricao;
	}

	public function getid () {
		return $this->id;
	}

	public function getdescricao () {
		return $this->descricao;
	}
	
	public function getSelect ($arquivo) {
    	//try {
			$xml = simplexml_load_file("../pages/adts/".$arquivo.".xml");
			foreach ($xml->item as $_item) {
				echo "<option value=".$_item[code].">".utf8_decode($_item[0])."</option>";
			}
    	/*} catch (MyException $m) {
    		throw $m;
    	}
    	echo "<hr>";
    	// Registro não existe no xml de configuração!
		throw new MyException(1005);*/
	}

	public function getDescricaoById ($arquivo, $id) {
		$xml = simplexml_load_file("../pages/adts/".$arquivo.".xml");
		foreach ($xml->item as $_item) {
			if ($_item[code]==$id) {
				return utf8_decode($_item[0]);
			}
		}
	}

}
?>