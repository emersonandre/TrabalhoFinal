<?php 
session_set_cookie_params(3600);
session_start();
    if((!isset ($_SESSION['id']) == true) and (!isset ($_SESSION['login']) == true))
    {
        header('location:../login/logar.html');
    }
    $id_user = $_SESSION['id'];
    $logado = $_SESSION['login'];
    $acesso = $_SESSION['acesso'];

require '../conexao/bd/conecta.php';

$user_id = $_POST['user_id'];
$user_nome = $_POST['user_nome'];
$med_senha = strlen($_POST['user_senha']);
$user_nivel = $_POST['user_nivel'];
$user_status = $_POST['user_status'];


if( $med_senha < 10 ){
    $user_senha = md5($_POST['user_senha']);
}else{
    $user_senha = $_POST['user_senha'];
}

if($user_senha != "" and $user_nome !=""){ 
            //query para atualizar o cadastro do cliente
            $query = "UPDATE login SET log_nome = '$user_nome' ,log_senha = '$user_senha' ,log_permissao = '$user_nivel' ,log_estatus='$user_status' WHERE log_id='$user_id'";

            if (mysqli_query($conn, $query)) {
                echo "New record created successfully";
            }else{
              header("HTTP/1.0 500");
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
      //  }
   // }else{
        //header("HTTP/1.0 402 Campos Obrigatorios não preenchidos!");
   // }
//}else{
 //  header("HTTP/1.0 401 Senhas Digitadas não Conferem!");
}else{
    header("HTTP/1.0 402 Campos Obrigatorios não preenchidos!");
}

?>