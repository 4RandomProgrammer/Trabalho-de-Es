<?php

    
    

    function MyAutoload($className) {
        $extension =  spl_autoload_extensions();
        require_once (__DIR__ . '/' . $className . $extension);
    }

    function padronizar($data) {
        $data = htmlspecialchars($data);
        return $data;
    }

    spl_autoload_extensions('.class.php'); // quais extensões iremos considerar
    spl_autoload_register('MyAutoload');

    global $conexao;
    $conexao = new Controle;
    

    $erroData = '';
    $erroUrgencia = '';
    $erroSala = '';
    $erroDescricao = '';
    $data = $ugencia = $sala = $descricao = '';



    if(isset($_POST['enviarFormulario'])){

        
        
        if(empty($_POST['tUrgencia'])){
            $erroUrgencia = 'Urgencia não preenchida';
        }
        else{
            $urgencia = $_POST['tUrgencia'];
        }
        
        if($_POST['tSala'] == 'erro'){ //Desculpa não soube um jeito de fazer melhor
            $erroSala = 'Sala não preenchida';
        }
        else{
            $sala = $_POST['tSala'];
        }

        if(empty($_POST['tData'])){
            $erroData = 'Data não preenchida';
        }
        else{
            $data = $_POST['tData'];
        }
        
        if(empty($_POST['tDescricao'])){
            $erroDescricao = 'Descricao não preenchida';
        }
        else{
            $descricao = $_POST['tDescricao'];
        }

        if(empty($erroData) & empty($erroUrgencia) & empty($erroSala) & empty($erroDescricao)){
            //Fazer conexão com o bd
             //Controlador de conexão
            $query = "INSERT INTO problema (descricao, data, urgencia, numero) VALUES ('".$descricao."','".$data."','".$urgencia."','".$sala."')";
            
            $conexao->insertBD($query);
        }

    }

?><!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema - Cadastro de Problemas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
    <body>

        <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-text">
            <h1>Cinema top 😎</h1>
            </span>
        </div>
        </nav>
        <div class="alinhar" style="text-align: center;">
            <h2>Cadastro de problemas</h2>
            <p><font color="#AA0000">* Campos Obrigatórios</font></p>

            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">

            <label for="cSala">Sala: </label> 

            <span class="error">

            <select name="tSala" id="cSala">
                <option value="erro">--</option>
                <?php

                    $query = 'SELECT numero, status FROM sala ORDER BY numero';

                    $selecao = $conexao->selectBD($query);

                    while($row = mysqli_fetch_array($selecao)){
                        
                        echo '<option value="'.$row['numero'].'">'.$row['numero'].'</option>';

                    }

                ?>
            </select>
            <font color="#AA0000">* <?php echo $erroSala;?></font></span>
            <br><br>

            <label for="tUrgencia">Gravidade: </label> 
            
            <input type="radio" name="tUrgencia" id="cBaixa" value="baixa" ><label for="cBaixa">Baixa</label>
            <input type="radio" name="tUrgencia" id="cMedia" value="media"> <label for="cMedia">Média</label>
            <input type="radio" name="tUrgencia" id="cUrgente" value="urgente"> <label for="cUrgente">Urgente</label>
            <span class="error"><font color="#AA0000">* <?php echo $erroUrgencia;?></font></span>

            <br><br>
            <label for="A sala esta indisponivel? ">A sala esta indisponivel?&ensp;</label><input type = "checkbox" id = "Indisponivel" name = "Indisponivel" valor = "true">
            <br><br>
            <label for="cData"> Data de início </label>
            <input type="date" name="tData" id="cData">
            <span class="error"><font color="#AA0000">* <?php echo $erroData;?></font></span>
            
            <br><br>

            <label for="cDescricao">Descrição:</label>
            <span class="error"><font color="#AA0000">*<?php echo $erroDescricao;?></font></span>
            <br>
            <textarea name="tDescricao" id="cDescricao" cols="50" rows="6"></textarea>
            
            <br>
            <br>
            <button type="submit" name="enviarFormulario" class="btn btn-outline-dark">Enviar</button>
            </form>
            <br>
            
            <a href="index.php" class="btn btn-primary" role="button">Voltar para index</a>
        </div>
</body>

</html>