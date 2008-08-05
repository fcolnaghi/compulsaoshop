<?
session_start();
require_once ("../utils/Object.class.php");

class Pedido extends Object {

	private $id_pedido;
	private $id_cliente;
	private $id_loja;
	private $status_pagamento;
	private $vl_total;
	private $vl_frete;
	private $quantidade_parcelas;
	private $dt_pedido;
	private $nome_cobranca;
	private $endereco_cobranca;
	private $pais_cobranca;
	private $estado_cobranca;
	private $cidade_cobranca;
	private $bairro_cobranca;
	private $cep_cobranca;
	private $nome_recebimento;
	private $endereco_recebimento;
	private $pais_recebimento;
	private $estado_recebimento;
	private $cidade_recebimento;
	private $bairro_recebimento;
	private $cep_recebimento;
	private $ip_cliente;
	private $id_status_pedido;
	private $dt_compra;

	public function __construct() {
	}

	public function __destruct() {
	}

	public function setid_pedido($id_pedido) {
		$this->id_pedido = $id_pedido;
	}

	public function setid_cliente($id_cliente) {
		$this->id_cliente = $id_cliente;
	}

	public function setid_loja($id_loja) {
		$this->id_loja = $id_loja;
	}

	public function setstatus_pagamento($status_pagamento) {
		$this->status_pagamento = $status_pagamento;
	}

	public function setvl_total($vl_total) {
		$this->vl_total = $vl_total;
	}

	public function setvl_frete($vl_frete) {
		$this->vl_frete = $vl_frete;
	}

	public function setquantidade_parcelas($quantidade_parcelas) {
		$this->quantidade_parcelas = $quantidade_parcelas;
	}

	public function setdt_pedido($dt_pedido) {
		$this->dt_pedido = $dt_pedido;
	}

	public function setnome_cobranca($nome_cobranca) {
		$this->nome_cobranca = $nome_cobranca;
	}

	public function setendereco_cobranca($endereco_cobranca) {
		$this->endereco_cobranca = $endereco_cobranca;
	}

	public function setpais_cobranca($pais_cobranca) {
		$this->pais_cobranca = $pais_cobranca;
	}

	public function setestado_cobranca($estado_cobranca) {
		$this->estado_cobranca = $estado_cobranca;
	}

	public function setcidade_cobranca($cidade_cobranca) {
		$this->cidade_cobranca = $cidade_cobranca;
	}

	public function setbairro_cobranca($bairro_cobranca) {
		$this->bairro_cobranca = $bairro_cobranca;
	}

	public function setcep_cobranca($cep_cobranca) {
		$this->cep_cobranca = $cep_cobranca;
	}

	public function setnome_recebimento($nome_recebimento) {
		$this->nome_recebimento = $nome_recebimento;
	}

	public function setendereco_recebimento($endereco_recebimento) {
		$this->endereco_recebimento = $endereco_recebimento;
	}

	public function setpais_recebimento($pais_recebimento) {
		$this->pais_recebimento = $pais_recebimento;
	}

	public function setestado_recebimento($estado_recebimento) {
		$this->estado_recebimento = $estado_recebimento;
	}

	public function setcidade_recebimento($cidade_recebimento) {
		$this->cidade_recebimento = $cidade_recebimento;
	}

	public function setbairro_recebimento($bairro_recebimento) {
		$this->bairro_recebimento = $bairro_recebimento;
	}

	public function setcep_recebimento($cep_recebimento) {
		$this->cep_recebimento = $cep_recebimento;
	}

	public function setip_cliente($ip_cliente) {
		$this->ip_cliente = $ip_cliente;
	}

	public function setid_status_pedido($id_status_pedido) {
		$this->id_status_pedido = $id_status_pedido;
	}

	public function setdt_compra($dt_compra) {
		$this->dt_compra = $dt_compra;
	}

	public function getid_pedido() {
		return $this->id_pedido;
	}

	public function getid_cliente() {
		return $this->id_cliente;
	}

	public function getid_loja() {
		return $this->id_loja;
	}

	public function getstatus_pagamento() {
		return $this->status_pagamento;
	}

	public function getvl_total() {
		return $this->vl_total;
	}

	public function getvl_frete() {
		return $this->vl_frete;
	}

	public function getquantidade_parcelas() {
		return $this->quantidade_parcelas;
	}

	public function getdt_pedido() {
		return $this->dt_pedido;
	}

	public function getnome_cobranca() {
		return $this->nome_cobranca;
	}

	public function getendereco_cobranca() {
		return $this->endereco_cobranca;
	}

	public function getpais_cobranca() {
		return $this->pais_cobranca;
	}

	public function getestado_cobranca() {
		return $this->estado_cobranca;
	}

	public function getcidade_cobranca() {
		return $this->cidade_cobranca;
	}

	public function getbairro_cobranca() {
		return $this->bairro_cobranca;
	}

	public function getcep_cobranca() {
		return $this->cep_cobranca;
	}

	public function getnome_recebimento() {
		return $this->nome_recebimento;
	}

	public function getendereco_recebimento() {
		return $this->endereco_recebimento;
	}

	public function getpais_recebimento() {
		return $this->pais_recebimento;
	}

	public function getestado_recebimento() {
		return $this->estado_recebimento;
	}

	public function getcidade_recebimento() {
		return $this->cidade_recebimento;
	}

	public function getbairro_recebimento() {
		return $this->bairro_recebimento;
	}

	public function getcep_recebimento() {
		return $this->cep_recebimento;
	}

	public function getip_cliente() {
		return $this->ip_cliente;
	}

	public function getid_status_pedido() {
		return $this->id_status_pedido;
	}

	public function getdt_compra() {
		return $this->dt_compra;
	}
}
?>