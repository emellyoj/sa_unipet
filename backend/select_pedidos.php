<?php
/*
SELECT * 
FROM COMPRA 
WHERE C.FK_COMPRA_USUARIO = 2 ;
*/
session_start();

include("conexao.php");
$comando = $pdo->prepare("SELECT * FROM COMPRA WHERE FK_COMPRA_USUARIO = ?;");
$comando->execute([$_SESSION['pk_usuario']]);

if ($comando->rowCount()>0){
    $pedidos = $comando->fetchAll(PDO::FETCH_ASSOC);
}
else {
    $pedidos = false;
}



unset($comando);
unset($pdo);

