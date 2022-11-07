<?php
include("conexao.php");

$entrada = $_POST["entrada"];
$set_senha = $_POST["senha"];

$comando = $pdo->prepare("SELECT ID_USUARIO, SENHA_USUARIO, FK_TIPOUSUARIO FROM USUARIO WHERE EMAIL_USUARIO = :entrada or USERNAME_USUARIO = :entrada");

$comando->bindValue(":entrada",$entrada);  

$comando->execute();

session_start();
if ($comando->rowCount() == 1){
    $resultado = $comando->fetch();
    if($resultado['SENHA_USUARIO'] == MD5($set_senha)){
        header("location:/sa_unipet/src/pages/perfil_usuario.php");
        
        $_SESSION['pk_usuario'] = $resultado['ID_USUARIO'];
        $_SESSION['fk_tipousuario'] = $resultado['FK_TIPOUSUARIO'];
        $_SESSION['loggedin'] = true;
        
    }
    else{
        $_SESSION['erro_login'] = true;
        $_SESSION['info_login'] = array('email' => $entrada);
        header("location:/sa_unipet/src/pages/login.php");
    }
}
else {
    $_SESSION['erro_login'] = true;
    $_SESSION['info_login'] = array('e  mail' => $entrada);
    header("location:/sa_unipet/src/pages/login.php");
}

unset($comando);
unset($pdo);
