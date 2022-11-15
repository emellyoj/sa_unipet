<?php
include("conexao.php");

$comando = $pdo->prepare("DELETE FROM PET WHERE ID_PET=:id_pet");

$comando->bindValue(':id_pet', $_GET['id_pet']);

$comando->execute();

unset($comando);
unset($pdo);

header('location:/sa_unipet/src/pages/perfil_usuario.php');