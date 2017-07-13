<?php session_start();
// session_start inicia a sess�o session_start(); 
// as variáveis login e senha recebem os dados digitados na p�gina anterior

$login = $_POST['user'];
$senha = md5($_POST['password']);

//variaveis de conexão;
require '../conexao/bd/conecta.php';

//resolve conexão com o banco!
	$result = mysqli_query($conn,"SELECT log_id, log_login, log_permissao FROM login WHERE log_login = '$login' AND log_senha= '$senha'");
	// Verifica se o usuario logado esta ativo.
	if(mysqli_num_rows($result) > 0 ) {
        while($row = $result->fetch_assoc()) {
            $_SESSION['id'] = $row['log_id'];
            $_SESSION['login'] = $row['log_login'];
            $_SESSION['acesso'] = $row['log_permissao'];
            header('location:../admin.php');
        }
	}
    else{
        header('location:../login/logar.html');
    }

//retorna resultado da consulta TRUE ou FALSE
?>