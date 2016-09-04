<?php
	class clientes
	{		
		public $nome;
		public $cpf;
		public $endereco;
		
		public function __construct($nome, $cpf, $endereco)
		{
			$this->nome = $nome;
			$this->cpf = $cpf;
			$this->endereco = $endereco;
		}
		
		
	 function setNome($strNome) {
            $this->nome = $strNome;
        }
     function getNome() {
            return $this->nome;
        }
	 
	 function setCpf($strCPF) {
            $this->cpf = $intCPF;
        }
     function getCpf() {
            return $this->cpf;
        }
	 
	 function setEndereco($strEndereco) {
            $this->endereco = $strEndereco;
        }
     function getEndereco() {
            return $this->endereco;
        }
				
	}


?>

