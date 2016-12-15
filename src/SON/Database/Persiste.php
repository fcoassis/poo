<?php

namespace SON\Database;

require_once "autoload.php";

use SON\Cliente\Cliente;

class Persiste{
	
	private $pdo;
	private $cliarr = array();
	
	public function __construct(\PDO $pdo){
		
		$this->pdo = $pdo;		
	}
	
	public function persistir(Cliente $cliente)
	{
		if(!in_array($cliente, $this->cliarr))
		{
				$this->cliarr[] = $cliente;				
		}
				
	}
		
	public function flush(){
		foreach ($this->cliarr as $cliente) {			
			try
			{
				$sql = 'INSERT INTO Cliente(nome,cpf,endereco,tipo,estrelas,endCob) VALUES (:nome,:cpf,:endereco,:tipo,:estrelas,:endCob)';
				$stmt = $this->pdo->prepare($sql);
				
				$nome     = $cliente->getNome();
				$cpf      = $cliente->getCpf();
				$endereco = $cliente->getEndereco();
				$tipo     = $cliente->getTipo();
				$estrelas = $cliente->getEstrelas();
				$endCob   = $cliente->getCobranca();
				
				$stmt->bindParam(":nome", $nome);
				$stmt->bindParam(":cpf", $cpf);
				$stmt->bindParam(":endereco", $endereco);
				$stmt->bindParam(":tipo", $tipo);
				$stmt->bindParam(":estrelas", $estrelas);
				$stmt->bindParam(":endCob", $endCob);
										
				if (!$stmt->execute()) {
                    print_r($stmt->errorInfo());
                }					
			}
			catch(\PDOException $ex){
				echo "Ocorreu um erro ao inserir dados: " . $ex->getMessage(); 
			}			
		}//foreach	
		echo "Dados gravados com sucesso";
	}//flush	
}//classe
?>