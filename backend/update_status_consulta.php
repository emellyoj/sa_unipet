<?php
include("conexao.php");

$comando = $pdo->prepare("UPDATE CONSULTA SET STATUS=:status, RELATORIO_CONSULTA=:relatorio WHERE ID_CONSULTA=:id_consulta");
$comando->bindValue(':status', str_replace('_', ' ', $_GET['novo_status']));
$comando->bindValue(':relatorio', $_POST['relatorio']);
$comando->bindValue(':id_consulta', $_GET['consulta']);

$comando->execute();

unset($comando);
unset($pdo);

header('location:/sa_unipet/src/pages/dashboard_atendimento.php?consulta='.$_GET['consulta']);