<?php 
session_set_cookie_params(6600);
session_start();
    if((!isset ($_SESSION['id']) == true) and (!isset ($_SESSION['login']) == true))
    {
        header('location:../login/logar.html');
    }
    $id_user = $_SESSION['id'];
    $logado = $_SESSION['login'];
?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Cadastro<small> Usuario</small>
            </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="../admin.php">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Cadastro Usuario
                    </li>
                </ol>
                <ol>
                    <div id='div_retorno_usuario'></div>
                </ol>
                <div class="container">
                    <form role="form">
                          <div class="form-group">
                            <label for="nome">Nome Completo:</label>
                            <input type="text" class="form-control" id="user_nome" placeholder="ex: João da Silva"> 
                          </div>
                          <div class="form-group">
                            <label for="usuario">Usuario:</label>
                            <input type="text" class="form-control" id="user_usuario" placeholder="ex: joaosilva">
                          </div>
                          <div class="form-group">
                            <label for="senha">Senha:</label>
                            <input type="text" class="form-control" id="user_senha" placeholder="ex: 123456">
                          </div>
                          <div class="form-group">
                            <label for="repsenha">Repetir-Senha:</label>
                            <input type="text" class="form-control" id="user_repsenha" placeholder="ex:123456">
                          </div>
                          <div class="form-group">
                              <select id="user_nivel" class="selectpicker form-control show-tick">
                                    <option value="0">Selecione o Nivel de Usuario...</option>
                                    <option value="0">Tecnico...</option>
                                    <option value="1">Administrador...</option>
                                </select>
                          </div>
                          <button id="btnGravarUser" type="button" class="btn btn-success">Gravar</button>
                          <button type="reset" value="Limpar" class="btn btn-warning" >Limpar</button>
                    </form>
                </div>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-file"></i> Usuarios Cadastrados
                    </li>
                </ol>
                <div class="container">
                   <div class="table-responsive" id="div_carrega_usuarios">
                       <?php include '../conexao/carrega-usuarios.php';  ?>
                    </div>
                </div> 
        </div>
    </div>
    <script>        
		$("#btnGravarUser").click(function(){
			$.ajax({
				type:'POST',
				url:'./conexao/grava-usuario.php',
                async:false,
				data:{
					'user-nome':$('#user_nome').val(),
                    'user-usuario':$('#user_usuario').val(),
					'user-senha':$('#user_senha').val(),
                    'user-repsenha':$('#user_repsenha').val(), 
                    'user-nivel':$('#user_nivel').val()
                },
				timeout: '10000',
                success: function(){
                    alert("Mensagem: Usuario Cadastrado com Sucesso!" );
                    $('#div_carrega_usuarios').load('./conexao/carrega-usuarios.php');
                },
                error: function(jqXHR, textStatus, errorThrown){
                    alert("Error: " + errorThrown);
                    $('#div_carrega_usuarios').load('./conexao/carrega-usuarios.php');
                }
                });
            });
    </script>
    </script>
    <!-- function excluir dados da tabela-->
    <script>
    function aoClicarExcluirLogin(id){
        $.ajax({
            type:'post',
            url: './conexao/deleta-login.php',
            data: {'id':id},
            timeout: '10000',
            success: function(){
                alert("Mensagem: Usuario Deletado com Sucesso!" );
                $('#div_carrega_usuarios').load('./conexao/carrega-usuarios.php');
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert("Error: " + errorThrown);
                $('#div_carrega_usuarios').load('./conexao/carrega-usuarios.php');
            }
        });
    };
    </script>
<script>
    // O HTML da div precisa estar acima.
    // Esconde a div no início
    var div = document.getElementById('div_retorno_usuario');

    // Mostra a div após 1 minuto
    setTimeout(function() {
        div.style.display = 'none';
    }, 10000);
</script>
