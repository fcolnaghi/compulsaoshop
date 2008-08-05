<?
session_start();
require_once ("../utils/MyException.class.php");

class DBO {

	private $host;     // servidor
	private $db;       // base
	private $user;     // username
	private $pass;     // senha
	private $socket;   // socket da conexao com o banco
	private $error;    // mensagem de erro da query
	private $intquery; // int representando o resultado da query
	private $result;   // fetch_array de $intquery
	private $count;    // quantidade de linhas encontradas
	private $indice;   // indice do vetor $result
	private $status;   // retorno 0 - true ou 1 - false da query

	function DBO($host, $base, $user, $pass) {
		try {
			$this->host	= $host;
			$this->db	= $base;
			$this->user	= $user;
			$this->pass	= $pass;
			
			$this->connect();
		} catch (MyException $m) {
			throw $m;
		}
	}

	public function setcount ($count) {
		$this->count = $count;
	}

	public function setresult ($result) {
		$this->result = $result;
	}

	public function setstatus ($status) {
		$this->status = $status;
	}
	
	public function seterror ($error) {
		$this->error = $error;
	}

	public function getcount () {
		return $this->count;
	}

	public function getresult () {
		return $this->result;
	}
	
	public function getstatus () {
		return $this->status;
	}
	
	public function geterror () {
		return $this->error;
	}

	public function connect() {
		try {
			$this->socket = mysql_connect($this->host,$this->user,$this->pass);
			
			if (!$this->socket) {
				$this->error = mysql_error();
				$this->status = 1;
				
				throw new MyException(10);
				
				//return false;
			} else {
				if (!mysql_select_db($this->db,$this->socket)) {
					$this->error = mysql_error();
					$this->status = 1;
					
					throw new MyException(10);
					//return false;
				} else {
					$this->error = "";
					$this->status = 0;
					return true;
				}
			}
		} catch (MyException $m) {
			throw $m;
		}
	} 
   
	public function query ($query_str) {
		try {
			$this->first();
			$this->intquery = mysql_query($query_str,$this->socket);
		
			if (!$this->intquery) {
				$this->status = 1;
				$this->error = mysql_error();
	
				return false;
			} else {
				if (substr($query_str,0,6)=="select") {
					$this->result = mysql_fetch_array($this->intquery);
					$this->count = mysql_num_rows($this->intquery);
				}
		
				$this->error = "";
				$this->status = 0;
				return true;
			}
		} catch (MyException $m) {
			throw $m;
		}
	} 

	public function seek ($id) {
		try {
			if (!mysql_data_seek($this->intquery, $id)) {
				$this->error = mysql_error();
				$this->status = false;
				return false;
			} else {
				$this->result = mysql_fetch_array($this->intquery);
				$this->error = "";
				$this->indice = $id;
				return true;
			}
				} catch (MyException $m) {
			throw $m;
		}
	}
  
	public function first() {
		if ($this->indice!=0) {
			$this->seek(0);
			$this->indice=0;
		}
	}
	
	public function previous() {
		if ($this->indice-1>0)
		{
			$this->seek($this->indice-1);
		}
	}
	
	public function next() {
		if ($this->indice+1<$this->count) {
			$this->seek($this->indice+1);
		}
	}
	
	public function last() {
		if ($this->indice!=$this->count) {
			$this->seek($this->count);
			$this->indice=$this->count;
		}
	}
	
	public function last_id() {
		return mysql_insert_id($this->socket);
	}
}
?>