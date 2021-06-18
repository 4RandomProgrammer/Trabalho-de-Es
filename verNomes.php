<?php

    function MyAutoload($className) {
        $extension =  spl_autoload_extensions();
        require_once (__DIR__ . '/' . $className . $extension);
    }

    spl_autoload_extensions('.class.php'); // quais extensões iremos considerar
    spl_autoload_register('MyAutoload');
    
    $c = new Controle();

    $query = 'SELECT numero, numacentos, status FROM sala ORDER BY numero';

    $selecao = $c->selectBD($query);
    $status = false;

    while($linha = mysqli_fetch_array($selecao)){
        
        if($linha['status'] == true){
            $status = 'Disponível';
            $cor = '#009933';
        } 
        else{
            $status = 'Não disponível';
            $cor = '#ff0000';
        }?>

        <div class="list-group" style="display:inline-block">
            <div class="list-group-item" style="display:inline-block">Sala <?=$linha['numero']?> (<?=$linha['numacentos']?> lugares) - <font color=<?php echo $cor ?>><?=$status?></font></div>
        </div>
        <br>
        

    <?php } ?>


<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Salas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php" class="btn btn-primary" role="button">Voltar</a>
</body>
</html>