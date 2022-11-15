<?php
    include("conexao.php");

    $quantidade = $_POST["quantidade"];
    $subtotal = (float)$_POST["quantidade"] * (float)$_POST['pŕecoproduto'];
    $id_produto = $_GET["id_produto"];

    $comando = $pdo -> prepare("INSERT INTO CARRINHO(QUANTIDADE_PRODUTO,SUBTOTAL,FK_CARRINHO_PRODUTO) VALUES(:quantidade_produto,:subtotal,:id_produto);");

    $comando->bindValue(":quantidade_produto",$quantidade);                                     
    $comando->bindValue(":subtotal",$subtotal);                                     
    $comando->bindValue(":id_produto",$id_produto);                                     

    $comando->execute();                               
    header("Location:/sa_unipet/src/pages/pet_shop.php");
?>