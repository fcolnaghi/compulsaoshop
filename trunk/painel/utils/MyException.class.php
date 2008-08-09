<?
session_start();
header("Content-Type: text/html; charset=iso-8859-1",true);

require_once("../utils/Xml.class.php");

/**
 * @package Util
 */
class MyException extends Exception
{
	private $msg = NULL;

    /**
    *   Construtor padrao da classe MyException
    *
    *   @return MyException A nova inst�ncia da classe MyException
    *   @param  Integer  C�digo de mensagem do erro a ser capturado no XML
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
    *   Retorna o texto referente ao c�digo da mensagem, proveniente do arquivo
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
	            $tmpMessage = $xml->getValueByAttribute("exception","code",$this->getCode());
	            $tmpCode = substr($this->getCode(),0,1);
	            
	            switch ($tmpCode) {
	            	case 1: // Success
	            		$this->msg = "<div id='exception' class='system_confirm_message'>".$tmpMessage."</div>";
	            		break;
	            	case 2: // Information
	            		$this->msg = "<div id='exception' class='system_alert_message'>".$tmpMessage."</div>";
	            		break;
	            	case 3: // Warning
	            		$this->msg = "<div id='exception' class='system_warning_message'>".$tmpMessage."</div>";
	            		break;
	            	case 4: // Error
						$this->msg = "<div id='exception' class='system_error_message'>".$tmpMessage."</div>";
	            		break;
	            	default:
	            }
	            
	            $xml = NULL;
	        } else {
	            $this->msg = "<div class='system_error_message'>Arquivo de configura��o ".$arquivo." n�o foi encontrado</div>";
	        }
        }
        return $this->msg;
	}

	public function setMyMessage($message) {
		$this->msg = $message;
	}
}
?>