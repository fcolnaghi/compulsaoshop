<?

/**
 * @package Util
 * @license logicti@logicti.com.br
 */
class Xml
{
    /**
    *   Atributo que cont�m o objeto Xml a ser manipulado
    *
    *   @var    Object
    *   @access private
    *   @see    loadString(),loadFile()
    */
	private $xmlObject = NULL;

    /**
    *   Construtor padr�o da classe Xml
    *
    *   @return void
    *   @param  String  Par�metro com o path e o nome do arquivo
    *   @access public
    */
    function __construct($filename) {
		$this->setXmlObject($filename);
	}

    /**
    *   M�todo que retorna o objeto xml a ser manipulado
    *
    *   @return void
    *   @param  void
    *   @access private
    */
	private function getXmlObject() {
        return $this->xmlObject;
    }

    /**
    *   M�todo respons�vel pelo carregamento de um arquivo xml em um Objeto
    *
    *   @return void
    *   @param  String  Path do arquivo XML a ser carregado
    *   @access private
    */
	private function setXmlObject($filename) {
    	if (is_file($filename)) {
			$this->xmlObject = simplexml_load_file($filename);
            if ( !$this -> xmlObject) {
				throw new MyException(90);
			}
		} else {
			throw new MyException(100);
		}
	}

    /**
    *   M�todo que verifica se determinando nodo existe
    *
    *   @return String  O valor do nodo solicitado
    *   @param  String  Caminho do nodo solicitado
    *   @access public
    */
    private function validatePath($path) {
	    $auxiliar = NULL;
        $node = array();
        $auxiliar = ($this->getXmlObject());
        $node = $auxiliar->xpath($path);
        if (count($node) <= 0) {
			throw new MyException(110);
        }
        //return utf8_decode((String)$node[0]);
        return utf8_decode($node[0]);
        //return $node[0];
    }

    /**
    *   M�todo que retorna o valor do nodo filtrando pelo caminho em que o mesmo
    *   localiza-se na �rvore de nodos do arquivo xml
    *
    *   @return String  O valor do nodo solicitado
    *   @param  String  Caminho do nodo solicitado
    *   @access public
    */
	public function getValueByPath($path) {
       	return $this -> validatePath($path);
    }

    /**
    *   M�todo que retorna o valor do nodo filtrando pelo caminho em que o mesmo
    *   localiza-se na �rvore de nodos e pelo valor de seu atributo.
    *
    *   @return String  Valor do atributo solicitado
    *   @param  String  Caminho do nodo solicitado
    *   @param  String  Atributo que se quer comparar
    *   @param  String  Valor do atributo que se quer comparar
    *   @access public
    */
	public function getValueByAttribute($path,$attributeName,$attributeValue) {
        $node = array();
        $this -> validatePath($path);
        $node = $this->getXmlObject()->xpath($path."[@".$attributeName."=\"".$attributeValue."\"]");
        if (count($node) <= 0) {
			//throw new MyException(120);
			echo "erro";
        }
        
       	//return utf8_decode((String)$node[0]);
       	return utf8_decode($node[0]);
       	//return $node[0];
    }

    /**
    *   M�todo que retorna o valor do atributo filtrando pelo caminho em que o mesmo
    *   localiza-se na �rvore de nodos.
    *
    *   @return String  Valor do atributo solicitado
    *   @param  String  Caminho do nodo solicitado
    *   @param  String  Atributo que se quer comparar
    *	@param	String	Posi��o do nodo dentro da �rvore
    *   @access public
    */
	public function getAttributeValue($path,$attributeName,$pos) {
        $node = array();
        $this->validatePath($path);
        $node = $this->getXmlObject()->xpath($path);
        if (count($node) <= 0) {
			throw new MyException(120);
        }
       	//return utf8_decode((String)$node[$pos][$attributeName]);
       	return utf8_decode($node[$pos][$attributeName]);
       	//return $node[$pos][$attributeName];
    }

    /**
    *   M�todo que retorna um array de valores contido em um ramo da �rvore
    *   de nodos do arquivo xml
    *
    *   @return Array   O valor do nodo
    *   @param  String  Caminho do elemento pai
    *   @access public
    */
	public function getAllByPath($path) {
        $node = array( );
        $this->validatePath($path);
        $node = $this->getXmlObject()->xpath($path);
		return $this->objectToArray($node);
    }

    /**
    *   M�todo que transforma um objeto em array
    *
    *   @return Array
    *   @param  SimpleXMLElement
    *   @param  Array
    *   @access private
    */
    private function objectToArray($obj,&$myArray=array())
    {
        $key = NULL;
        $value = NULL;
        foreach ((array)$obj as $key => $value) {
            if (is_object($value)) {
                if (count((array)$value) > 0) {
                   $this->objectToArray($value,$myArray[$key]);
				} else {
                   $myArray[$key] = 'NULL';
				}
			} else {
               $myArray[$key] = $value;
			}
       }
       return $myArray;
	}

	/**
    *   Destrutor da classe Xml
    *
    *   @return void
	*   @param void
	*   @access public
	*/
	public function __destruct( ) {

    }
}

?>
