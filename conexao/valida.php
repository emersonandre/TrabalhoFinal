<?php session_start();
// session_start inicia a sess�o session_start(); 
// as variáveis login e senha recebem os dados digitados na p�gina anterior

$login = $_POST['user'];
$senha = md5($_POST['password']);

//variaveis de conexão;

include '../../Painel/bd/conecta.php';

//resolve conexão com o banco!
	$result = mysqli_query($conn,"SELECT id,usuario,flag FROM gtc_usuario WHERE usuario= '$login' AND senha= '$senha'");
	// Verifica se o usuario logado esta ativo.
	if(mysqli_num_rows($result) > 0 ) {
    while($row = $result->fetch_assoc()) {
	$_SESSION['id'] = $row['id'];   
    $_SESSION['login'] = $row['usuario'];
    $_SESSION['acesso'] = $row['flag'];    
    header('location:../../Painel/admin.php'); }}
    else{
        header('location:http://www.guancino.com.br');
    }

//retorna resultado da consulta TRUE ou FALSE

?>