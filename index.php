<!doctype html>
<html>
	<head>
		<title>Listagem de clientes</title>
        <meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">	
    	
    	<!-- Bootstrap -->
	    <link href="bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
	    </script>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    	<!-- Include all compiled plugins (below), or include individual files as needed -->
   
	    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
		<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
		<script src="bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
		
	    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
	</head>

<body>
<?php
require_once "clientes.php";

$cliente0 = new clientes("Joao A. da Silva","100.000.000-00","Rua 0");
$cliente1 = new clientes("Livia O. Marla","111.111.111-11","Rua 1");
$cliente2 = new clientes("Maria Antônia","222.222.222-22","Rua 2");
$cliente3 =	new clientes("Aline de Jesus","333.333.333-33","Rua 3");
$cliente4 = new clientes("Wesley Gonçalves","444.444.444-44","Rua 4");
$cliente5 = new clientes("Carlos Eduardo","555.555.555-55","Rua 5");
$cliente6 = new clientes("Jose Carlos","666.666.666-66","Rua 6");
$cliente7 = new clientes("Marcos Ferreira","777.777.777-77","Rua 7");
$cliente8 = new clientes("Chico de Assis","888.888.888-88","Rua 8");
$cliente9 = new clientes("Junior Oliveira","999.999.999-99","Rua 9");

$cli = array($cliente0,$cliente1,$cliente2,$cliente3,$cliente4,$cliente5,$cliente6,$cliente7,$cliente8,$cliente9);

?>
<center> <h1>Listagem de clientes</h1> </center>
<div class="table-responsive" >
<table id="tabelaclientes" border="1" class="table table-hover">
	<thead>
		<tr>
			<th>
				Índice
			</th>
			<th>
				Nomes dos clientes
			</th>
		</tr>
	</thead>
	<tbody>

		<?php foreach($cli as $k => $v) : ?>
			<tr>
				<td><?php echo "$k"; ?></td>
				<td><a data-toggle="modal" onclick="javascript: dados.innerHTML = '<p><?php echo "Nome: ".$cli[$k]->getNome()."<br/>"."CPF: ".$cli[$k]->getCpf()."<br/>"."Endereço: ".$cli[$k]->getEndereco();?> </p>'" data-target="#modalCliente"><?=$cli[$k]->getNome()?></a></td>
				
			</tr>
	
		<?php endforeach;?>

	</tbody>
</table>
</div>

<!-- Modal -->
<div id="modalCliente" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Dados do cliente</h4>
      </div>
      <div class="modal-body">
         <div id="dados"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>

  </div>
</div>


<script>
$(document).ready(function(){
    $('#tabelaclientes').dataTable();
});
</script>
</body>
</html>