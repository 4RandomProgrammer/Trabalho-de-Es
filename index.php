<?php

//salve

?>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device=width, initial-scale1.0">
    <title>Cinema - Cadastro de Problemas</title>
</head>
<body>
    <h1>Cinema top</h1>
    <h2>Cadastro de problemas</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
    <label for="cSala">Sala: </label>
    <select name="tSala" id="cSala">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
    </select> <br><br>
    <label for="tUrgencia">Gravidade: </label> 
    <input type="radio" name="tUrgencia" id="cBaixa" value="baixa" ><label for="cBaixa">Baixa</label>
    <input type="radio" name="tUrgencia" id="cMedia" value="media"> <label for="cMedia">Média</label>
    <input type="radio" name="tUrgencia" id="cUrgente" value="urgente"> <label for="cUrgente">Urgente</label>                
    <br><br>
    <label for="cData">Data de início: </label><input type="date" name="tData" id="cData">
    <br><br>
    <label for="cDescricao">Descrição: <br></label><textarea name="tDescricao" id="cDescricao" cols="50" rows="6"></textarea>
    </form>
</body>

</html>