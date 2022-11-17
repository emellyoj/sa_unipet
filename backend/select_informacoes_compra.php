<?php
ini_set("display_errors",0);
/*
SELECT * 
FROM CARRINHO CA 
INNER JOIN COMPRA CO 
ON CA.FK_CARRINHO_COMPRA = CO.ID_COMPRA 
INNER JOIN PRODUTO P 
ON P.ID_PRODUTO = CA.FK_CARRINHO_PRODUTO
WHERE CO.ID_COMPRA = 4;
*/
function runInformacoesPedido($pedido){
    session_start();
    include("conexao.php");

    $comando = $pdo->prepare("SELECT DATE_FORMAT(CO.DATA_COMPRA, '%d/%m/%Y') AS DATA_COMPRA, TRIM(LEADING '0' FROM DATE_FORMAT(CO.HORA_COMPRA, '%H:%i')) AS HORA_COMPRA, TOTAL_COMPRA, QUANTIDADE_PRODUTO, NOME_PRODUTO FROM CARRINHO CA INNER JOIN COMPRA CO ON CA.FK_CARRINHO_COMPRA = CO.ID_COMPRA  INNER JOIN PRODUTO P ON P.ID_PRODUTO = CA.FK_CARRINHO_PRODUTO WHERE CO.ID_COMPRA = ?;");

    $comando->execute([$pedido]);

    if ($comando->rowCount()>0)
    {
        $informacoes_pedido = $comando->fetchAll(PDO::FETCH_ASSOC);
    }
    else {
        $informacoes_pedido = false;  
    }
    unset($comando);
    unset($pdo);
    return $informacoes_pedido;
}