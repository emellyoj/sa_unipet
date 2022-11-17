<?php
include("conexao.php");

$comando = $pdo->prepare("UPDATE VACINACAO SET STATUS=:status WHERE ID_VACINACAO=:id_vacinacao");


$comando->bindValue(':status', $_GET['novo_status']);
$comando->bindValue(':id_vacinacao', $_GET['vacinacao']);

$comando->execute();

unset($comando);
unset($pdo);

header('location:/sa_unipet/src/pages/dashboard_vacinacao.php?vacinacao='.$_GET['vacinacao']);