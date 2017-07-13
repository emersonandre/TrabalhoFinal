<?php 
session_set_cookie_params(3600);
session_start();
    if((!isset ($_SESSION['id']) == true) and (!isset ($_SESSION['login']) == true))
    {
        header('location:../admin.php');
    }
    $id_user = $_SESSION['id'];
    $logado = $_SESSION['login'];
    $acesso = $_SESSION['acesso'];

// inicia script de gravacao
require '../conexao/bd/conecta.php';

$user_nome = $_POST['user-nome'];
$user_usuario = $_POST['user-usuario'];
$user_senha = md5($_POST['user-senha']);
$user_repsenha = md5($_POST['user-repsenha']);
$user_nivel = $_POST['user-nivel'];

if($user_senha == $user_repsenha){
    if($user_nome !="" && $user_usuario !="" && $user_senha != ""){
        $consulta_query = "SELECT log_id, log_login FROM login WHERE log_login = '$user_usuario'";
        $result_query = mysqli_query($conn,$consulta_query);
        if(mysqli_num_rows ($result_query) > 0 ) {  // retorno da consulta de horario e linha;
             header("HTTP/1.0 409 Usuario ja esta cadastrado!");
        }else{ // inicia query para gravar no banco
            $query = "INSERT INTO login (log_nome, log_login, log_senha, log_permissao) VALUES ('$user_nome','$user_usuario','$user_senha','$user_nivel')";
            if (mysqli_query($conn, $query)) {
                echo "New record created successfully";

            }else{
              header("HTTP/1.0 500");
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);

            }
        }
    }else{
        header("HTTP/1.0 402 Campos Obrigatorios nao preenchidos!");
    }
}else{
   header("HTTP/1.0 401 Senhas Digitadas nao Conferem!");
}
mysqli_close($conn);