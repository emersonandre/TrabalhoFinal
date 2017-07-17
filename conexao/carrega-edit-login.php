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
?>
<?php

include '../conexao/bd/conecta.php';

$id_usuario = $_POST['id_usuario'];
                            
            $sql = "SELECT 
                        log_id
                        , log_nome
                        , log_login
                        , log_senha
                        , log_permissao
                        , CASE log_permissao
                            when 0 then 'Tecnico'
                            when 1 then 'Administrador'
                        end as perm
                        , log_estatus
                        ,case log_estatus
                           when 0 then 'Ativo'
                           when 1 then 'Inativo'
                        end as stat
                    FROM 
                        login
                    WHERE 
                        log_id = '$id_usuario'";
    
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                echo '<div class="form-group">
                        <label>Código:</label>
                        <input type="text" class="form-control" id="user_id" disabled value="'.$row['log_id'].'">
                    </div>';
                echo '<div class="form-group">
                        <label>Nome Completo:</label>
                        <input type="text" class="form-control" id="user_nome" value="'.$row['log_nome'].'">
                    </div>';
                echo '<div class="form-group">
                        <label>Usuario:</label>
                        <input type="text" class="form-control" id="user_usuario" disabled value="'.$row['log_login'].'">
                    </div>';
                echo '<div class="form-group">
                        <label>Senha:</label>
                        <input type="text" class="form-control" id="user_senha" value="'.$row['log_senha'].'">
                    </div>';
                ?>
                    <div class="form-group">
                        <label for="nome">Nivel:</label>
                        <select id="user_nivel" class="selectpicker form-control show-tick">
                            <option value="<?php echo $row['log_permissao']?>"><?php echo $row['perm']?></option>
                            <option value="0">Tecnico...</option>
                            <option value="1">Administrador...</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nome">Status:</label>
                            <select id="user_status" class="selectpicker form-control show-tick">
                                    <option value="<?php echo $row['log_estatus']?>"><?php echo $row['stat']?></option>
                                    <option value="0">Ativo...</option>
                                    <option value="1">Inativo...</option>
                            </select>
                    </div>
                <div class="form-group">
                    <button id="btnUpdateUser" type="button" class="btn btn-primary">Atualizar Usuario</button>
                </div>
                <?php
                } 
            }
        ?> 
<script>
    $("#btnUpdateUser").click(function(){
            var user_nome = $('#user_nome').val();
            var user_senha = $('#user_senha').val();
            console.log('user nome' + user_nome);
            console.log('user senha'+ user_senha);
			$.ajax({
				type:'post',
				url:'./conexao/at_login.php',
				data:{
                    'user_id':$('#id_usuario').val(),
					'user_nome':$('#user_nome').val(),
                    'user_usuario':$('#user_usuario').val(),
					'user_senha':$('#user_senha').val(),
                    'user_nivel':$('#user_nivel').val(),
                    'user_status':$('#user_status').val()
                },
				timeout: '10000',
                success: function(){
                    alert("Mensagem: Usuario Editado com Sucesso!" );
                    $('#div_carrega_usuarios').load('../conexao/carrega-edit-login.php');
                },
                error: function(jqXHR, textStatus, errorThrown){
                    alert("Error: " + errorThrown);
                    $('#div_carrega_usuarios').load('../conexao/carrega-edit-login.php');
                }
            });
        });
</script> 