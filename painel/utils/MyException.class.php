<?
session_start();
require_once("Xml.class.php");

/**
 * @package Util
 */
class MyException extends Exception
{
	private $msg = NULL;

    /**
    *   Construtor padrao da classe MyException
    *
    *   @return MyException A nova instância da classe MyException
    *   @param  Integer  Código de mensagem do erro a ser capturado no XML
    *   @access private
    */
	public function __construct($codigo) {
        parent::__construct("", $codigo);
	}

	/**
    *   Destrutor da classe MyException
    *
    *   @return void
    *   @param void
    *   @access public
    */
	public function __destruct() {

	}

    /**
    *   Retorna o texto referente ao código da mensagem, proveniente do arquivo
    *   MyExeption.xml
    *
    *   @return void
    *   @param  void
    *   @access public
    */
	public function getMyMessage() {
		if ($this->msg == NULL) {
	        $arquivo = "../config/exceptions.xml";
	    	if (file_exists($arquivo)) {
	            $xml = new Xml($arquivo);
	            return $xml->getValueByAttribute("exception","code",$this->getCode());
	            $xml = NULL;
	        } else {
	            return "Arquivo de configuração $arquivo não foi encontrado!";
	        }
        } else {
	        return $this->msg;
        }
	}

	public function setMyMessage($message) {
		$this->msg = $message;
	}
}
?>