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

    echo $medico;
    echo $dataconsulta;

    $comando = $pdo->prepare("SELECT ID_HORARIO FROM HORARIO WHERE ID_HORARIO NOT IN (SELECT HORA_CONSULTA FROM CONSULTA INNER JOIN USUARIO ON CONSULTA.FK_CONSULTA_MEDICO = USUARIO.ID_USUARIO AND USUARIO.ID_USUARIO = :id_medico AND DATA_CONSULTA = :data_consulta );");
    $comando->bindValue(':id_medico', $medico);
    $comando->bindValue(':data_consulta', $dataconsulta);
    
    $comando->execute();
    $horarios_do_medico = [];
    $resultados = $comando->fetchAll();
    
        foreach ($resultados as $horario) {
            $horarios_do_medico.push($horario)
        }
    
    unset($comando);
    unset($pdo);

    var_dump($horarios_do_medico)

}