<?php
    include("conexao.php");

    $nome = $_POST["nome"];
    $descricao_vacina = $_POST["descricao_vacina"];
    
    $comando = $pdo -> prepare("INSERT INTO VACINA(NOME_VACINA,DESCRICAO_VACINA) VALUES(:nome_vacina,:descricao_vacina)");

    $comando->bindValue(":nome_vacina",$nome);                                     
    $comando->bindValue(":descricao_vacina",$descricao_vacina); 

    $comando->execute();                               

    header("Location:/sa_unipet/src/pages/cadastro_vacina.php");

?>