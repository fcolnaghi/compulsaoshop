<?
require_once ("XML.class.php");
require_once ("DB.class.php");
require_once ("MyException.class.php");

class Object {

	private $table;

    public function __construct() {
    }
 
    public function __destruct() {
	}

    public function __call($metodo, $atributo) {
		if (method_exists($this,$metodo)) {
            return $this->$metodo($atributo);
        }
        return NULL;
    }
 	
    public function getClassName() {
	    return get_class($this);
    }
 	
    public function getClassVars() {
	    $reflection = new ReflectionClass($this->getClassName());
		return $reflection->getdefaultProperties();
    }
    
    public function getid() {
	   	return $this->__call("get".$this->getIdName(),"");
    }

    public function setid($newid) {
    	return $this->__call("set".$this->getIdName(),$newid);
    }
    
    public function getIdName() {
	   	return "id_".$this->getTableName();
    }
    
	public function getTableName () {
		if ($this->table==null) {
	    	$arquivo = "../config/tables.xml";
	    	if (file_exists($arquivo)) {
	            $xml = new Xml($arquivo);
	            $this->table = $xml->getValueByAttribute("object","name",$this->getClassName());
	            $xml = NULL;
	        } else {
	        	$this->table = null;
	            echo "Arquivo de configuração $arquivo não foi encontrado!";
	        }
		}
		
		return $this->table;
	}
    
    public function getNextPage ($action) {

		$page = $this->getNomeArquivo();

    	//try {
			$xml = simplexml_load_file("../config/navigation.xml");
			foreach ($xml->navigation_rule as $_navigation_rule) {
			   	
			   	if ($_navigation_rule->from_view_id == $page) { 
					foreach ($_navigation_rule->navigation_case as $_navigation_case) {
						if ($_navigation_case->from_outcome == $action) {
							return $_navigation_case->to_view_id; 
						}
					}
			   	}
			}
    	/*} catch (MyException $m) {
    		throw $m;
    	}
    	
    	// Registro não existe no xml de configuração!
		throw new MyException(1005);*/
    }
 	
    public function getNomeArquivo () {
    	$arquivo = explode("/",$_SERVER['SCRIPT_NAME']);
		
		return $arquivo[count($arquivo)-1];
    }
 	
 	//------------------------ Remover o código abaixo ------------------------// 
 	
// 	public function executeSQL ($sql) {
//		$db = new DB();
//		$_o = $db->getInstance();
//       	
//		$_o->query($sql);
//
//		$arrayObjetos = array();
//
//		for ($i=0; $i<$_o->getcount(); $i++) {
// 			$arrayObjetos[] = $this->create($this->getClassName(), $_o->getresult());
//			
//			$_o->next();
//		}
//
//		session_write_close();
//	
//		return $arrayObjetos;
// 	}
// 	
//	public function execute ($action, $valores) {
//		try {
//			unset($valores['action']);
//			unset($valores['PHPSESSID']);
//			
//			$db = new DB();
//	
//			$object = $this->create($this->getClassName(),$valores);
//			$ret = null;
//
//			switch ($action) {
//				case 'salvar':
//					$ret = $this->salvar($db, $object);
//					break;
//				case 'excluir':
//					$ret = $this->excluir($db, $object);
//					break;
//				case 'consultarTodos':
//					$ret = $this->consultarTodos($db);
//					break;
//				case 'consultarPorId':
//					$ret = $this->consultarPorId($db, $object);
//					
//					print_r($ret);
//					
//					break;
//				case 'consultarPorAtributos':
//					$ret = $this->consultarPorAtributos($db, $object);
//					break;
//				case 'consultarDistinct':
//					$ret = $this->consultarDistinct($db, $object);
//					break;
//				default:
//			}
//		} catch (MyException $m) {
//			throw $m;
//        }
//
//		session_write_close();
//
//		return $ret;
//	}
//	
//	public function consultarDistinct ($db, $object) {
//		$sql = $db->getSqlDistinct($object);
//		
//		echo $sql;
//	}
//	
//	public function salvar ($db, $object) {
//
//		$_o = $db->getInstance();
//
//		if ($object->getid() == NULL) {
//			$sql = $db->getSqlInsert($object);
//		} else {
//			$sql = $db->getSqlUpdate($object);
//		}
//		
//		$_o->query($sql);
//		
//		if ($_o->getstatus() == 1) {
//			throw new MyException(1004);
//		}
//	}
//
//	public function excluir ($db, $object) {
//		$_o = $db->getInstance();
//
//		$sql = $db->getSqlDelete($object);
//
//		$_o->query($sql);
//
//		if ($_o->getstatus() == 1) {
//			throw new MyException(1002);
//		}
//	}
//	
//	public function consultarTodos ($db) {
//	
//       	$_o = $db->getInstance();
//
//        $object = $this->create($this->getClassName(),NULL);
//       	$sql = $db->getSqlQueryAll($object);
//       	
//		$_o->query($sql);
//
//		$arrayObjetos = array();
//		for ($i=0; $i<$_o->getcount(); $i++) {
// 			$arrayObjetos[] = $this->create($this->getClassName(), $_o->getresult());
//			
//			$_o->next();
//		}
//
//		if (count($arrayObjetos)==0) {
//			throw new MyException(1001);
//		}
//
//		return $arrayObjetos;
//	}
//	
//	public function consultarPorId ($db, $object) {
//      	$_o = $db->getInstance();
//
//       	$sql = $db->getSqlQueryById($object);
//		echo "<br>".$sql."<br>";
//
//		$_o->query($sql);
//		
//		return $_o->getresult();
//	}
//	
//	public function consultarPorAtributos ($db, $object) {
//       	$_o = $db->getInstance();
//
//		$sql = $db->getSqlQuery($object);
//       	echo $sql ."<br>";
//		$_o->query($sql);
//		
//		$arrayObjetos = array();
//		for ($i=0; $i<$_o->getcount(); $i++) {
// 			$arrayObjetos[] = $this->create($this->getClassName(), $_o->getresult());
//			
//			$_o->next();
//		}
//		
//		if (count($arrayObjetos)==0) {
//			throw new MyException(1001);
//		}
//
//		return $arrayObjetos;
//	}
//	


//


//	
//	
//   /*   Método para criar o objeto requerido
//    *
//    *   @return Object O objeto requerido
//    *   @param String O nome da classe a ser criada
//    *   @param Array Os parâmetros para criação do objeto
//    *   @access private
//    */
//    public function create($className,$arrayValues) {
//	    $arrayCampos = array();
//        $count = 0;
//		$object = new $className;
//		if ($arrayValues != NULL) {
//			if (!isset($arrayValues[0])) {
//				$arrayValues = $this->switchIndex($arrayValues);
//			}
//	        $object = new $className;
//	        $arrayFields = $object->getClassVars();
//	        foreach($arrayFields as $index => $value) {
//	        
//	        	echo "create [".$index."] [".$arrayValues[$count]."]<br>";
//	        
//	        	$object->__call("set".$index,$arrayValues[$count]);
//				$count++;
//	        }
//	        echo "<br>";
//	        print_r($object);
//	        echo "<hr>";
//		}
//		return $object;
//    }
//
//    function switchIndex($array) {
//	 	foreach ($array as $value) {
//			$result[] = $value;
//	 	}
//	 	return $result;
//    }
//

//	
//    
//    

}
?>