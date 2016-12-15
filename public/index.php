<!doctype html>
<html>
	<head>
		<title>Listagem de clientes</title>
        <meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">	
    	
    	<!-- Bootstrap -->
	    <link href="../public/assets/bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
	    

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    	<!-- Include all compiled plugins (below), or include individual files as needed -->
   
	    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
		<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
		<script src="../public/assets/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
		
	    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
	</head>

<body>
<?php

require_once "../autoload.php";

use SON\Database\cnn;

$db = new cnn("mysql:host=localhost;charset=utf8","pooprojeto","root","");
$pdo = $db->getConnection();

$cli = $pdo->query("SELECT * FROM Cliente")->fetchAll(\PDO::FETCH_ASSOC);

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
			<th>
				Classificação
			</th>
		</tr>
	</thead>
	<tbody>
				
		<?php foreach($cli as $k) : ?> 
			<tr>
				<td><?php echo $k['id'];?></td>
				<td><a data-toggle="modal" onclick="javascript: dados.innerHTML = '<p><?php echo "Nome: ".$k['nome']."<br/>"."CPF: ".$k['cpf']."<br/>"."Endereço: ".$k['endereco']."<br/>"."Tipo: ".$k['tipo']."<br/>"."Estrelas: ".$k['estrelas']."<br/>"."Cobrança :".$k['endCob'];?> </p>'" data-target="#modalCliente"><?=$k['nome']?></a></td>
				<td><?php echo $k['tipo'];?></td>
		
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
</div> <!-- fecha modal -->


<script>
$(document).ready(function(){
    $('#tabelaclientes').dataTable();
});
</script>
</body>
</html>