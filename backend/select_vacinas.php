<?php
include("conexao.php");

$comando = $pdo->prepare("SELECT * FROM VACINA;");
$comando->execute();

if ($comando->rowCount()>0)
{
    $todas_vacinas = $comando->fetchAll();
    
}
unset($comando);
unset($pdo);