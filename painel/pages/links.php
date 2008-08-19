<?
session_start();
header("Content-Type: text/html; charset=iso-8859-1",true);

$html = "";

$html .= "var tinyMCELinkList = new Array(";
$html .= "	['HSBC', 'http://www.hsbc.com.br'],";
$html .= "	['Gmail', 'http://gmail.com'],";
$html .= "	['Sourceforge', 'http://www.sourceforge.com']";
$html .= "	['BRQ', 'http://www.brq.com']";
$html .= "	['Mundo do Dako', 'http://mundododako.net']";
$html .= ");";

echo $html;

?>