<?php
	
	require_once "autoload.php";
	
	//require_once "./src/SON/Database/cnn.php";
	//require_once "./src/SON/Database/Persiste.php";
	//require_once "./src/SON/Cliente/Cliente.php";
	
	use SON\Database\cnn;
	use SON\Database\Persiste;
	use SON\Cliente\Cliente;
	
	echo "Criando banco de dados...<br/>";	
	$db = new cnn("mysql:host=localhost;charset=utf8","pooprojeto","root","");
	$pdo = $db->getConnection();
	echo "Banco de dados criado com sucesso <br/>";
	
	echo "Criando tabela Cliente...<br/>";
	$tableCliente = $pdo->prepare(
    "CREATE TABLE IF NOT EXISTS `Cliente` (
    `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `nome` VARCHAR(255) NOT NULL,
    `cpf` VARCHAR(14) NOT NULL,
    `endereco` TEXT NOT NULL,    
    `tipo` VARCHAR(2) NOT NULL,
    `estrelas` INT(1) NOT NULL,
    `endCob` TEXT NOT NULL);"
);

if (!$tableCliente->execute()) {
    die(print_r($tableCliente->errorInfo())); 
}else{
	echo "Tabela criada com sucesso <br/>";
}

$ps = new Persiste($pdo);

$cliente0 = new Cliente(1,"Joao A. da Silva","100.000.000-00","Rua 0","pf",1,"Rua Cob 0");
$cliente1 = new Cliente(2,"Livia O. Marla","111.111.111-11","Rua 1","pj","1","Rua Cob 1");
$cliente2 = new Cliente(3,"Maria Antônia","222.222.222-22","Rua 2","pj","4","Rua Cob 2");
$cliente3 =	new Cliente(4,"Aline de Jesus","333.333.333-33","Rua 3","pf","3","Rua Cob 3");
$cliente4 = new Cliente(5,"Wesley Gonçalves","444.444.444-44","Rua 4","pf","5","Rua Cob 4");
$cliente5 = new Cliente(6,"Carlos Eduardo","555.555.555-55","Rua 5","pf","2","Rua Cob 5");
$cliente6 = new Cliente(7,"Jose Carlos","666.666.666-66","Rua 6","pj","5","Rua Cob 6");
$cliente7 = new Cliente(8,"Marcos Ferreira","777.777.777-77","Rua 7","pf","3","Rua Cob 7");
$cliente8 = new Cliente(9,"Chico de Assis","888.888.888-88","Rua 8","pj","5","Rua Cob 8");
$cliente9 = new Cliente(10,"Junior Oliveira","999.999.999-99","Rua 9","pj","4","Rua Cob 9");


$ps->persistir($cliente0);
$ps->persistir($cliente1);
$ps->persistir($cliente2);
$ps->persistir($cliente3);
$ps->persistir($cliente4);
$ps->persistir($cliente5);
$ps->persistir($cliente6);
$ps->persistir($cliente7);
$ps->persistir($cliente8);
$ps->persistir($cliente9);

$ps->flush();



?>