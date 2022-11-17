<?php
/*
SELECT * 
FROM CARRINHO C
INNER JOIN PRODUTO P
ON P.ID_PRODUTO = C.FK_CARRINHO_PRODUTO
WHERE C.FK_CARRINHO_USUARIO = 2 
AND C.FK_CARRINHO_COMPRA IS NULL;
*/
session_start();

include("conexao.php");
$comando = $pdo->prepare("SELECT * FROM CARRINHO C INNER JOIN PRODUTO P ON P.ID_PRODUTO = C.FK_CARRINHO_PRODUTO WHERE C.FK_CARRINHO_USUARIO = ? AND C.FK_CARRINHO_COMPRA IS NULL;");
$comando->execute([$_SESSION['pk_usuario']]);

if ($comando->rowCount()>0){
    $itens_carrinho = $comando->fetchAll(PDO::FETCH_ASSOC);
    unset($comando);

    $comando = $pdo->prepare("SELECT SUM(SUBTOTAL) FROM CARRINHO C INNER JOIN PRODUTO P ON P.ID_PRODUTO = C.FK_CARRINHO_PRODUTO WHERE C.FK_CARRINHO_USUARIO = ? AND C.FK_CARRINHO_COMPRA IS NULL;");
    $comando->execute([$_SESSION['pk_usuario']]);
    $total_compra = $comando->fetch();

}
else {
    $itens_carrinho = false;
}



unset($comando);
unset($pdo);

