<?php
    include("select_carrinho.php");
    include("conexao.php");
    session_start();

    $comando = $pdo->prepare("INSERT INTO COMPRA(TOTAL_COMPRA, FK_COMPRA_USUARIO) VALUES(:total_compra,:fk_compra_usuario)");

    $comando->bindValue(":total_compra",(float)$total_compra['SUM(SUBTOTAL)']);                                     
    $comando->bindValue(":fk_compra_usuario",$_SESSION['pk_usuario']);   
    $comando->execute();     
    $id_compra = $pdo->lastInsertId();
    unset($comando);

    $comando = $pdo -> prepare("UPDATE CARRINHO SET FK_CARRINHO_COMPRA = ? WHERE FK_CARRINHO_USUARIO = ? AND FK_CARRINHO_COMPRA IS NULL");
    $comando->execute([$id_compra,$_SESSION['pk_usuario']]);     

    header("Location:/sa_unipet/src/pages/pedidos.php");

?>