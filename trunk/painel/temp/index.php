<?
	require_once ("../utils/XML.class.php");

/****   
	$xml = simplexml_load_file("../config/controller.xml");
 
	foreach ($xml->classe as $cls) {
	   	foreach ($cls->action as $act) {
	   		if ($act[type] == "salvar")
				echo "Salvar -> ". $act;
			if ($act[type] == "excluir")
				echo "Excluir -> ". $act;
				
			echo "<hr>";
		}
	}
****/
	
	$minhaPagina = "Categoria.class.php";
	$action = "salvar";
	$xml = simplexml_load_file("../config/navigation.xml");
	foreach ($xml->navigation_rule as $_navigation_rule) {
	   	if ($_navigation_rule->from_view_id == $minhaPagina) { 
			foreach ($_navigation_rule->navigation_case as $_navigation_case) {
				if ($_navigation_case->from_outcome == $action) {
					return $_navigation_case->to_view_id; 
				}
			}
	   	}
	}
	return null;
	
	
?>