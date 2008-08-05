<?
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
				default:
			}
		} catch (MyException $m) {
			throw $m;
		}
	}
	
	public function login ($valores) {
		try {
			// Cria um objeto usuário a partir dos campos email e senha
			$object = $this->arrayToObject("Usuario", $valores);

			// Recupera o usuário do banco de dados
			$_o = parent::pesquisar($object);
			$usuario = $_o[0];

			// Registrando usuário na sessão
			$_SESSION["usuario_id_loja"]	= $usuario->getid_loja();
			$_SESSION["usuario_id_usuario"]	= $usuario->getid_usuario();
			$_SESSION["usuario_nome"]		= $usuario->getnome();
			$_SESSION["usuario_email"]		= $usuario->getemail();
			$_SESSION["usuario_id_perfil"]	= $usuario->getid_perfil();
			
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
		unset($_SESSION["usuario_id_loja"]);
		unset($_SESSION["usuario_id_usuario"]);
		unset($_SESSION["usuario_nome"]);
		unset($_SESSION["usuario_email"]);
		unset($_SESSION["usuario_id_perfil"]);
	}
	
	public function verificaSessao () {
		if (!isset($_SESSION["usuario_id_usuario"])) {
			throw new MyException("140");
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