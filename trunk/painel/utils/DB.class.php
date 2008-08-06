<?
session_start();
require_once ("../utils/DBO.class.php");
require_once ("../utils/XML.class.php");
require_once ("../utils/MyException.class.php");

class DB extends DBO {

	private static $me;

    public function __construct() {
    	$this->connect();
    }
 
    public function __destruct() {
	}

    /**
    *   Retorna a instвncia corrente da prуpria classe DB
    *
    *   @return DB A instвncia corrente da prуpria classe
	*   @param void
	*   @access public
	*/
	public function getInstance() {
		try {
			if ($this->me == NULL) {
				$this->connect();
			}
	
	        return $this->me;
		} catch (MyException $m) {
			throw $m;
		}
	}

	public function connect () {
		try {
			$xml = new Xml("../config/db.xml");
	
	        $server = $xml->getValueByPath("/dataBaseConfiguration/server");
	        $dataBaseName = $xml->getValueByPath("/dataBaseConfiguration/dataBaseName");
			$user = $xml->getValueByPath("/dataBaseConfiguration/user");
	        $password = $xml->getValueByPath("/dataBaseConfiguration/password");
	        
	        $this->me = new DBO($server, $dataBaseName, $user, $password);
		} catch (MyException $m) {
			throw $m;
		}
	}
	
    /**
    * Mйtodo que transforma um array chave-valor em string
    *
    * @param  Object	Objeto a ser processado
    * @return String    Os atributos separados por vнrgula
    * @access public
    */
    public function getFields($object) {
	    $array = $object->getClassVars();
        $result = NULL;
        $first = true;
        foreach ($array as $index => $value) {
			if ($first) {
				$result = $object->getTableName().".".$index;
				$first = false;
			} else {
				$result .= ",".$object->getTableName().".".$index;
			}
		}
        return $result;
    }
    
    /**
    * Mйtodo que retorna os valores de cada atributo do objeto
    *
    * @param  Object	Objeto
    * @return String    O resultado da execuзгo do mйtodo
    * @access public
    */
    public function getFieldValues($object) {
	    $array = $object->getClassVars();
        $result = NULL;
        $first = true;
		foreach ($array as $index => $value) {
	        $value = $object->__call("get".$index, "");

	        if ($value == NULL) {
	        	$value = $index." = null";
        	} else {
	        	$value = $index." = '".$value."'";
        	}

			if ($first) {
				$result = $value;
				$first = false;
			} else {
				$result .= ",".$value;
			}
		}

        return $result;
    }
    
    /**
    * Mйtodo que retorna os valores do objeto para sql de inserзгo
    *
    * @param  Object	Objeto a ser desmontado
    * @return String    O resultado da execuзгo do mйtodo
    * @access public
    */
    public function getValues($object) {
    	$array = $object->getClassVars();
       	$result = NULL;
       	$first = true;
       	foreach ($array as $index => $value) {
	        $value = $object->__call("get".$index, "");
	        if ($value == NULL) {
	        	$value = "null";
       		} else {
	        	$value = "'".$value."'";
       		}
			if ($first) {
				$result = $value;
				$first = false;
			} else {
				$result .= ",".$value;
			}
		}
        return $result;
    }
	
	/**********************************************************************************
	 * Clбusulas SQL
	 **********************************************************************************/
	 
   /**
    * Mйtodo que retorna o sql de inserзгo
    *
    * @param  Object	Objeto a ser inserido.
    * @return String    O resultado da execuзгo do mйtodo
    * @access public
    */
	public function getSqlInsert($object) {
		return "insert into ".$object->getTableName()." (".$this->getFields($object).") values (".$this->getValues($object).")";
    }
    
	/**
    * Mйtodo que retorna o sql de remoзгo
    *
    * @param  Object	Objeto a ser removido.
    * @return String    O resultado da execuзгo do mйtodo
    * @access public
    */
	public function getSqlDelete($object, $loja = true) {
		
		//return $sql = "delete from ".$object->getTableName()." where id_loja = ".$object->getid_loja()." and ".$object->getIdName()." = ".$object->getid();
		if ($loja) {
			return $sql = "delete from ".$object->getTableName()." where id_loja = ".$_SESSION["id_loja"]." and ".$object->getIdName()." = ".$object->getid();
		}
		return $sql = "delete from ".$object->getTableName()." where ".$object->getIdName()." = ".$object->getid();
    }
    
    /**
    * Mйtodo que retorna o sql de atualizaзгo
    *
    * @param  Object	Objeto a ser atualizado.
    * @return String    O resultado da execuзгo do mйtodo
    * @access public
    */
    public function getSqlUpdate($object) {
		return "update ".$object->getTableName()." set ".$this->getFieldValues($object)." where ".$object->getIdName()." = ".$object->getid();
    }
    
   /**
    * Mйtodo que retorna o sql de consulta
    *
    * @param  Object	Objeto a ser pesquisado.
    * @return String    O resultado da execuзгo do mйtodo
    * @access public
    */
    public function getSqlQueryAll($object, $loja = true) {
		
		//return "select ".$this->getFields($object)." from ".$object->getTableName() ." where id_loja = ".$object->getid_loja();
		if ($loja) {
			return "select ".$this->getFields($object)." from ".$object->getTableName() ." where id_loja = ".$_SESSION["id_loja"];
		}
		return "select ".$this->getFields($object)." from ".$object->getTableName();
    }
    
   /**
    * Mйtodo que retorna o sql de consulta por id
    *
    * @param  Object	Objeto a ser pesquisado.
    * @return String    O resultado da execuзгo do mйtodo
    * @access public
    */
    public function getSqlQueryById($object, $loja = true) {

		//return "select ".$this->getFields($object)." from ".$object->getTableName()." where id_loja = ".$object->getid_loja()." and ".$object->getIdName()." = ".$object->getid();
		if ($loja) {
			return "select ".$this->getFields($object)." from ".$object->getTableName()." where id_loja = ".$_SESSION["id_loja"]." and ".$object->getIdName()." = ".$object->getid();
		}
		return "select ".$this->getFields($object)." from ".$object->getTableName()." where ".$object->getIdName()." = ".$object->getid();
    }
    
    /**
    * Mйtodo que retorna o sql de consulta de acordo com os atributos do objeto
    *
    * @param  Object	Objeto a ser pesquisado.
    * @return String    O resultado da execuзгo do mйtodo
    * @access public
    */
    public function getSqlQuery($object) {
       	$sql = "select ".$this->getFields($object)." from ".$object->getTableName();
       	$sql .= $this->getSqlQueryWhere($object);

       	return $sql;
    }
    
    /**
    * Mйtodo que retorna o sql de consulta de acordo com os atributos do objeto
    *
    * @param  Object	Objeto a ser pesquisado.
    * @return String    O resultado da execuзгo do mйtodo
    * @access public
    */
    public function getSqlCountQuery($object) {
       	$sql = "select count(*) from ".$object->getTableName();
       	$sql .= $this->getSqlQueryWhere($object);

       	return $sql;
    }
    
    /**
    * Mйtodo que retorna o sql de consulta
    *
    * @param  Object	Objeto a ser pesquisado.
    * @return String    O resultado da execuзгo do mйtodo
    * @access public
    */
	public function getSqlQueryWhere($object) {
		$sql = "";
		$array = $object->getClassVars();
       	$first = true;
       	foreach ($array as $index => $value) {
	        $value = $object->__call("get".$index, "");
        	if (trim($value) != "") {
			    if (!(substr($index,0,2) == "id")) {
					$openValue = " like '%";
					$closeValue = "%'";
			    } else {
					$openValue = " = '";
					$closeValue = "'";
			    } if ($first) {
	        		$sql .= " where ".$object->getTableName().".".$index.$openValue.$value.$closeValue;
	        		$first = false;
        		} else {
	        		$sql .= " and ".$object->getTableName().".".$index.$openValue.$value.$closeValue;
        		}
        	}
       	}
       	if ($object->getOrderBy() != "") {
			$sql .= " order by ".$object->getOrderBy();
       	}
		return $sql;
	}
	
   /**
    * Mйtodo que retorna o sql de consulta
    *
    * @param  Object	Objeto a ser pesquisado.
    * @return String    O resultado da execuзгo do mйtodo
    * @access public
    */
    public function getSqlDistinct($object) {
       	return "select ".$this->getFieldsDistinct($object)." from ".$object->getTableName();
    }
	
   /**
    * Mйtodo que monta o sql para busca como DISTINCT.
    *
    * @param  Object	Objeto no qual serб realizado uma busca de acordo com os atributos
    * @return String    O resultado da execuзгo do mйtodo
    * @access public
    */
    public function getFieldsDistinct($object) {
	    $array = $object->getClassVars();
        $result = NULL;
        $first = true;
        foreach ($array as $index => $value) {
			if ($first) {
				$result = "distinct(".$object->getTableName().".".$index.")";
				$first = false;
			} else {
				$result .= ",".$object->getTableName().".".$index;
			}
		}
        return $result;
    }
}
?>