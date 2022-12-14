<?php
session_start();
/*
SELECT C.ID_CONSULTA, P.NOME_PET, C.DATA_CONSULTA, C.HORA_CONSULTA FROM CONSULTA C
INNER JOIN PET P 
ON C.FK_CONSULTA_PET = P.ID_PET
WHERE FK_CONSULTA_PET IN 
( 
    SELECT ID_PET
    FROM USUARIO_PET UP 
    INNER JOIN PET P 
    ON UP.FK_PET = P.ID_PET 
    WHERE UP.FK_USUARIO = 1 
);
*/

/*
SELECT V.ID_VACINACAO, P.NOME_PET, V.DATA_VACINACAO, V.HORA_VACINACAO
FROM VACINACAO V
INNER JOIN PET P 
	ON V.FK_VACINACAO_PET = P.ID_PET
INNER JOIN USUARIO_PET UP
	ON UP.FK_PET = V.FK_VACINACAO_PET
INNER JOIN USUARIO U
	ON U.ID_USUARIO = UP.FK_USUARIO
WHERE U.ID_USUARIO = 11;
*/

include("conexao.php");

$comando = $pdo->prepare("SELECT C.ID_CONSULTA, P.NOME_PET, C.DATA_CONSULTA, C.HORA_CONSULTA FROM CONSULTA C INNER JOIN PET P ON C.FK_CONSULTA_PET = P.ID_PET WHERE FK_CONSULTA_PET IN ( SELECT ID_PET FROM USUARIO_PET UP INNER JOIN PET P ON UP.FK_PET = P.ID_PET WHERE UP.FK_USUARIO = ?);");
$comando->execute([(int)$_SESSION['pk_usuario']]);

if ($comando->rowCount()>0){
    $consultas = $comando->fetchAll(PDO::FETCH_ASSOC);
}
else {
    $consultas = [];
}

unset($comando);

$comando = $pdo->prepare("SELECT V.ID_VACINACAO, P.NOME_PET, V.DATA_VACINACAO, V.HORA_VACINACAO FROM VACINACAO V INNER JOIN PET P ON V.FK_VACINACAO_PET = P.ID_PET INNER JOIN USUARIO_PET UP ON UP.FK_PET = V.FK_VACINACAO_PET INNER JOIN USUARIO U ON U.ID_USUARIO = UP.FK_USUARIO WHERE U.ID_USUARIO = ?;");
    $comando->execute([(int)$_SESSION['pk_usuario']]);
    
    if ($comando->rowCount()>0){
        $vacinacoes = $comando->fetchAll(PDO::FETCH_ASSOC);
    }
    else {
        $vacinacoes = [];
    }

unset($pdo);
