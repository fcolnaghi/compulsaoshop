<?
session_start();
require_once ("../controller/Controller.class.php");
require_once ("../classes/Usuario.class.php");

class UsuarioController extends Controller {

	public function __construct() {
	}

	public function __destruct() {
	}
	
	public function execute ($action, $valores) {
		try {
			switch ($action) {
				case 'login':
					$this->login($valores);
					break;
				case 'logoff':
					$this->logoff();
					break;
				default:
			}
		} catch (MyException $m) {
			throw $m;
		}
	}
	
	public function login ($valores) {
		
		//echo "dentro de login <br>";
		
		try {
			// Cria um objeto usuário a partir dos campos email e senha
			$object = $this->arrayToObject("Usuario", $valores);

			// Recupera o usuário do banco de dados
			$usuario = parent::login($object);

			// Inicializando a sessão
			session_start();

			// Registrando usuário na sessão
			$_SESSION["id_loja"]	= $usuario->getid_loja();
			$_SESSION["id_usuario"]	= $usuario->getid_usuario();
			$_SESSION["nome"]		= $usuario->getnome();
			$_SESSION["email"]		= $usuario->getemail();
			$_SESSION["id_perfil"]	= $usuario->getid_perfil();
			
			// Redirecionando para a página principal
			header("Location: ../pages/consultar_estatisticas.php");
			
		} catch (MyException $m) {
			if ($m->getcode() == 1001) { // Nenhum resultado encontrado
				throw new MyException(230);
			}
			throw $m;
		}
	}

	public function logoff () {
		
		session_start();
		
		unset($_SESSION["id_loja"]);
		unset($_SESSION["id_usuario"]);
		unset($_SESSION["nome"]);
		unset($_SESSION["email"]);
		unset($_SESSION["id_perfil"]);
		
		header("Location: ../pages/index.php");
	}
	
	public static function verificaSessao () {
		
		session_start();
		
		if (!isset($_SESSION["id_usuario"])) {
			throw new MyException("200");
		}
	}
}

if (isset($_REQUEST["action"])) {
	try {
		$_o = new UsuarioController();
		$html = $_o->execute($_REQUEST["action"],$_REQUEST);
	} catch (MyException $m) {
		echo "<div class='system_error_message'>". $m->getMyMessage() ."</div>";
	}
}
?>