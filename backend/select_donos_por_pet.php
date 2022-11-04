<?php
$comando = $pdo->prepare("SELECT * FROM usuario WHERE email_usuario = :entrada or username_usuario = :entrada");

$comando->bindValue(":entrada",$entrada);  

$comando->execute();