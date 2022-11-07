<?php
include("conexao.php");

$comando = $pdo->prepare("UPDATE PRODUTO SET DATA_CONSULTA=:data_consulta, HORA_CONSULTA=:hora_consulta WHERE ID_CONSULTA=:id_consulta");

$comando->bindValue(':data_consulta', $_POST['dataconsulta']);
$comando->bindValue(':hora_consulta', $_POST['horarioconsulta']);
$comando->bindValue(':id_consulta', $_GET['id_consulta']);

$comando->execute();

unset($comando);
unset($pdo);

header('location:/sa_unipet/src/pages/agenda_pet.php');