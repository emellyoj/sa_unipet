<?php
include("conexao.php");

$comando = $pdo->prepare("DELETE FROM CARRINHO WHERE ID_CARRINHO=:id_carrinho");

$comando->bindValue(':id_carrinho', $_GET['id_carrinho']);

$comando->execute();

unset($comando);
unset($pdo);

header('location:/sa_unipet/src/pages/carrinho.php');