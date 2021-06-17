<?php

    $erroData = '';
    $erroUrgencia = '';
    $erroSala = '';
    $erroDescricao = '';

    if(isset($_POST['enviarFormulario'])){

        if(empty($_POST['tUrgencia'])){
            $erroUrgencia = 'Urgencia não preenchida';
        }
        
        if($_POST['tSala'] == 'erro'){ //Desculpa não soube um jeito de fazer melhor
            $erroSala = 'Sala não preenchida';
        }
        
        if(empty($_POST['tData'])){
            $erroData = 'Data não preenchida';
        }
        
        if(empty($_POST['tDescricao'])){
            $erroDescricao = 'Descricao não preenchida';
        }
    }

?><!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema - Cadastro de Problemas</title>
</head>
    <body>
        <h1>Cinema top</h1>
        <h2>Cadastro de problemas</h2>
        <p><font color="#AA0000">* Campos Obrigatórios</font></p>

        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">

        <label for="cSala">Sala: </label> 

        <span class="error">

        <select name="tSala" id="cSala">
            <option value="erro">--</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
        </select>
        <font color="#AA0000">* <?php echo $erroSala;?></font></span>
        <br><br>

        <label for="tUrgencia">Gravidade: </label> 

        <input type="radio" name="tUrgencia" id="cBaixa" value="baixa" ><label for="cBaixa">Baixa</label>
        <input type="radio" name="tUrgencia" id="cMedia" value="media"> <label for="cMedia">Média</label>
        <input type="radio" name="tUrgencia" id="cUrgente" value="urgente"> <label for="cUrgente">Urgente</label>
        <span class="error"><font color="#AA0000">* <?php echo $erroUrgencia;?></font></span>

        <br><br>

        <label for="cData"> Data de início </label><input type="date" name="tData" id="cData">
        <span class="error"><font color="#AA0000">* <?php echo $erroData;?></font></span>
        <br><br>

        <label for="cDescricao">Descrição: <br></label><textarea name="tDescricao" id="cDescricao" cols="50" rows="6"></textarea>
        <span class="error"><font color="#AA0000">*<?php echo $erroDescricao;?></font></span>
        <br>
        <br>
        <button type="submit" name="enviarFormulario">Enviar</button>
        </form>
        <br><br>
        
        <a href="index.php">Voltar para index</a>
</body>

</html>