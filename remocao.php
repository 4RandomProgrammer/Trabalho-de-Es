<?php

       
    function MyAutoload($className) {
    
        $extension =  spl_autoload_extensions();
        require_once (__DIR__ . '/' . $className . $extension);
    }


    spl_autoload_extensions('.class.php'); // quais extensões iremos considerar
    spl_autoload_register('MyAutoload');

   function deletaproblema($ID){
    	     $sql="DELETE FROM problema WHERE id =".$ID."";   
	     $c = new Controle();
	     $c->deleteBD($sql);
	     ?> <p>Problema removido com sucesso!</p><?php
   
	     //<script>window.location="remocao.php"</script><?php
    }
    
   
    if($_GET['id']) //Undefined index aqui
   {
   	$id = intval($_GET['id']);
    	deletaproblema($id);
   }  
    
    $c = new Controle();
    $query = 'SELECT id, descricao, data, urgencia, numero FROM problema ORDER BY numero';
        
    $selecao = $c->selectBD($query);
        
    while($linha = mysqli_fetch_array($selecao)){

    ?>
    <div class="list-group" style="display:inline-block">
    	<div class="list-group-item" style="display:inline-block">
		Problema <?=$linha['id']?> [<?=$linha['urgencia']?>]
		<br>
		Sala: <?=$linha['numero']?> (Data de Início: <?=$linha['data']?>)
		<br>
		<?=$linha['descricao']?> 
		<br>
		<br>
		<input type="button" value="Remover" name-"remover" id="rem" 
		onclick="return deleteqry(<?php echo $linha['id'] ?>);"/>
    	</div>
    </div>
    <br>
    	
	
    <?php    
    } 

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Problemas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<script>
		function deleteqry(id)
		{ 
		  if(confirm("Tem certeza que deseja remover este problema?")==true)
			   window.location="remocao.php?id="+id;
		    return false;
		}
	</script>
</head>
<body>
    <a href="index.php" class="btn btn-primary" role="button">Voltar</a>
</body>

</html>
