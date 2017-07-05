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
            $_SESSION['id'] = $row['Log_id'];
            $_SESSION['login'] = $row['Log_login'];
            $_SESSION['acesso'] = $row['Log_permissao'];
            header('location:../index.html');
        }
	}
    else{
        header('location:');
    }

//retorna resultado da consulta TRUE ou FALSE

?>