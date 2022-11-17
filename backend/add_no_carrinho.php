<?php
    include("conexao.php");
    include('select_informacoes_produto.php');
    session_start();
    
    $id_produto = $_GET["id_produto"];
    $informacoes_produto = runInformacoesProduto($id_produto);
    $quantidade = $_POST["quantidade"];
    $subtotal = (float)$_POST["quantidade"] * (float)$informacoes_produto['PRECO_PRODUTO'];
    
    $comando = $pdo -> prepare("INSERT INTO CARRINHO(QUANTIDADE_PRODUTO,SUBTOTAL,FK_CARRINHO_PRODUTO, FK_CARRINHO_USUARIO) VALUES(:quantidade_produto,:subtotal,:id_produto, :id_usuario);");

    $comando->bindValue(":quantidade_produto",$quantidade);                                     
    $comando->bindValue(":subtotal",$subtotal);                                     
    $comando->bindValue(":id_produto",$id_produto);                                     
    $comando->bindValue(":id_usuario",$_SESSION['pk_usuario']);                                     

    $comando->execute();                    
    
    unset($comando);
    unset($pdo);
    header("Location:/sa_unipet/src/pages/pet_shop.php");
?>