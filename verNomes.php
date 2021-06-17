<?php

    function MyAutoload($className) {
        $extension =  spl_autoload_extensions();
        require_once (__DIR__ . '/' . $className . $extension);
    }

    spl_autoload_extensions('.class.php'); // quais extensões iremos considerar
    spl_autoload_register('MyAutoload');
    
    $c = new Controle();

    $query = 'SELECT numero, status FROM sala ORDER BY numero';

    $selecao = $c->selectBD($query);

    while($linha = mysqli_fetch_array($selecao)){?>

        <ul>
            <li>Sala <?=$linha['numero']?> - <?=$linha['status'] ?></li>
        </ul>

    <?php } ?>


<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
</head>
<body>
    <a href="index.php">Voltar para index</a>
</body>
</html>