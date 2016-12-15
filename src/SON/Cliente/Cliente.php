<?php


namespace SON\Cliente;

//require_once "autoload.php";

use SON\Interfaces\importanciaInterface as imp;
use SON\Interfaces\cobrancaInterface as cob;
//require_once "../src/SON/Interfaces/importanciaInterface.php";
//require_once "../src/SON/Interfaces/cobrancaInterface.php";

class Cliente implements imp, cob {
	private $id;
	private $nome;
	private $cpf;
	private $endereco;
	private $tipo;
	private $estrelas;
	private $endCob;

	public function __construct($id,$nome, $cpf, $endereco, $tipo, $estrelas, $endCob) {
		$this -> id = $id;
		$this -> nome = $nome;
		$this -> cpf = $cpf;
		$this -> endereco = $endereco;
		$this -> tipo = $tipo;
		$this -> estrelas = $estrelas;
		$this -> endCob = $endCob;
	}

	public function getId() {

		return $this -> id;
	}

	public function setId($intId) {

		$this -> id = $intId;
	}

	public function getNome() {

		return $this -> nome;
	}

	public function setNome($strNome) {

		$this -> nome = $strNome;
	}

	public function getCpf() {

		return $this -> cpf;
	}

	public function setCpf($strCpf) {

		$this -> cpf = $strCpf;
	}

	public function getEndereco() {

		return $this -> endereco;
	}

	public function setEndereco($strEndereco) {

		$this -> endereco = $strEndereco;
	}

	public function getTipo() {
		return $this -> tipo;
	}

	public function setTipo() {
		$this -> tipo = $tipo;
	}

	public function getEstrelas() {
		return $this -> estrelas;
	}

	public function setEstrelas($estrelas) {
		$this -> estrelas = $estrelas;
	}

	public function getCobranca() {
		return $this -> endCob;
	}

	public function setCobranca($endCob) {
		$this -> endCob = $endCob;
	}

}
?>