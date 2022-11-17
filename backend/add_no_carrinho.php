<?php
    include("conexao.php");
    include('select_informacoes_produto.php');
    
    $id_produto = $_GET["id_produto"];
    $informacoes_produto = runInformacoesProduto($id_produto);
    $quantidade = $_POST["quantidade"];
    $subtotal = (float)$_POST["quantidade"] * (float)$informacoes_produto['PRECO_PRODUTO'];
    
    $comando = $pdo -> prepare("INSERT INTO CARRINHO(QUANTIDADE_PRODUTO,SUBTOTAL,FK_CARRINHO_PRODUTO) VALUES(:quantidade_produto,:subtotal,:id_produto);");

    $comando->bindValue(":quantidade_produto",$quantidade);                                     
    $comando->bindValue(":subtotal",$subtotal);                                     
    $comando->bindValue(":id_produto",$id_produto);                                     

    $comando->execute();                    
    unset($comando);

    $comando = $pdo -> prepare("UPDATE PRODUTO SET QUANT_ESTOQUE=:nova_quantidade WHERE ID_PRODUTO = :id_produto;");
    $comando->bindValue(":nova_quantidade",$informacoes_produto['QUANT_ESTOQUE'] - $_POST["quantidade"]);                                     
    $comando->bindValue(":id_produto",$id_produto);                                     

    $comando->execute(); 

    unset($pdo);
    header("Location:/sa_unipet/src/pages/pet_shop.php");
?>