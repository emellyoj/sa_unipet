<?php

    include("conexao.php");

    $nomecompleto = $_POST["nomecompleto"];
    $nomeusuario = $_POST["nomeusuario"];
    $email = $_POST["email"];
    $senha = MD5($_POST["senha"]);
    $confirmarsenha = MD5($_POST["confirmarsenha"]);
    
    session_start();

    $verificacao = $pdo -> prepare("SELECT EMAIL_USUARIO, USERNAME_USUARIO FROM USUARIO WHERE EMAIL_USUARIO = :email or USERNAME_USUARIO = :nomeusuario ");
    $verificacao -> bindValue(':email', $email);
    $verificacao -> bindValue(':nomeusuario', $nomeusuario);
    $verificacao -> execute();
    
    $resultados = $verificacao -> fetchAll();
        
    $erros_cadastro = array();
    $count_erro_nome_usado = 0;
    $count_erro_email_usado = 0;
    foreach ($resultados as $resultado) {
        if ($resultado['USERNAME_USUARIO'] == $nomeusuario and $count_erro_nome_usado == 0) {
            array_push($erros_cadastro, 'Este nome de usuario já foi escolhido!');
            $count_erro_nome_usado ++;
        }
        if ($resultado['EMAIL_USUARIO'] == $email and $count_erro_email_usado == 0) {
            array_push($erros_cadastro, 'Este e-mail já está cadastrado!');
            $count_erro_email_usado ++;
        }
    }
    if ($senha!=$confirmarsenha) {
        array_push($erros_cadastro, 'As senhas não conferem!');
        
    }
    if (count($erros_cadastro) > 0){
        $_SESSION['erros_cadastro'] = $erros_cadastro;
        $_SESSION['info_cadastro'] = array(
                                        'nomecompleto' => $nomecompleto, 
                                        'nomeusuario' => $nomeusuario, 
                                        'email' => $email);

        unset($verificacao);
        unset($pdo);
        header("Location:/sa_unipet/src/pages/cadastro.php");
    }
    else {
        $comando = $pdo -> prepare("INSERT INTO USUARIO (NOMECOMPLETO_USUARIO, USERNAME_USUARIO, EMAIL_USUARIO, SENHA_USUARIO) VALUES(:nomecompleto,:nomeusuario,:email,:senha)");
        $comando->bindValue(":nomecompleto",$nomecompleto);                                     
        $comando->bindValue(":nomeusuario",$nomeusuario); 
        $comando->bindValue(":email",$email);                                     
        $comando->bindValue(":senha",$senha);    
        $comando->execute();                               
        
        $id_usuario = $pdo -> lastInsertId();
    
        $_SESSION['pk_usuario'] = $id_usuario;
        $_SESSION['fk_tipousuario'] = 1;
        $_SESSION['loggedin'] = true;
    

        unset($comando);
        unset($verificacao);
        unset($pdo);


        header("Location:/sa_unipet/src/pages/perfil_usuario.php");    

    }
?>
