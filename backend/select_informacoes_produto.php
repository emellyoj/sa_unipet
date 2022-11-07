<?php
/*
SELECT * FROM PRODUTO WHERE ID_PRODUTO=3;
*/
function runInformacoesProduto($produto){
    session_start();
    include("conexao.php");

    $comando = $pdo->prepare("SELECT * FROM PRODUTO WHERE ID_PRODUTO=?;");

    $comando->execute([$produto]);

    if ($comando->rowCount()==1)
    {
        $informacoes_produto = $comando->fetch();
    }
    else {
        $informacoes_produto = false;  
    }
    unset($comando);
    unset($pdo);
    return $informacoes_produto;
}