<?php
    include("conexao.php");

    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $quant_estoque = $_POST["quant_estoque"];
    if (isset($_POST["disponivel"])) {
        $disponivel = $_POST["disponivel"];
    } else {
        $disponivel=0;
    }
    

    $comando = $pdo -> prepare("INSERT INTO produto(nome_produto,preco_produto,quant_estoque, disponivel_venda) VALUES(:nome_produto,:preco_produto,:quant_estoque,:disponivel)");

    $comando->bindValue(":nome_produto",$nome);                                     
    $comando->bindValue(":preco_produto",(float)$preco);  
    $comando->bindValue(":quant_estoque",(int)$quant_estoque);   
    $comando->bindValue(":disponivel",(int)$disponivel);                                    
 
    $comando->execute();                               

    header("Location:/sa_unipet/src/pages/cadastro_produto.html");

?>