<?php
/*
SELECT * FROM HORARIO
WHERE ID_HORARIO NOT IN (
    SELECT HORA_CONSULTA FROM CONSULTA
    INNER JOIN USUARIO
    ON CONSULTA.FK_CONSULTA_MEDICO = USUARIO.ID_USUARIO
    AND USUARIO.ID_USUARIO = 1
    AND DATA_CONSULTA = '2022-11-03'
);
*/
function run($medico, $dataconsulta) {
    include("conexao.php");

    $comando = $pdo->prepare("SELECT ID_HORARIO FROM HORARIO WHERE ID_HORARIO NOT IN (SELECT HORA_CONSULTA FROM CONSULTA INNER JOIN USUARIO ON CONSULTA.FK_CONSULTA_MEDICO = USUARIO.ID_USUARIO AND USUARIO.ID_USUARIO = ? AND DATA_CONSULTA = CONVERT(?, TIME));");
  
    $comando->execute([(int)$medico, $dataconsulta]);

    if ($comando->rowCount()>0){
        $horarios_do_medico = $comando->fetchAll(PDO::FETCH_ASSOC);
    }
    else {
        $horarios_do_medico = false;
    }

    unset($comando);
    unset($pdo);
}