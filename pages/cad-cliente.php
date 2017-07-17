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
                <i class="fa fa-file"></i> Cadastro Cliente
            </li>
        </ol>
        <ol>
            <div id='div_retorno_usuario'></div>
        </ol>
        <div class="container">
            <form role="form">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" id="user_nome" placeholder="ex: João da Silva">
                </div>
                <div class="form-group">
                    <label for="usuario">Sobrenome:</label>
                    <input type="text" class="form-control" id="user_sob" placeholder="ex: joaosilva">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="user_email" placeholder="ex: 123456">
                </div>
                <div class="form-group">
                    <label for="endereco">Endereço:</label>
                    <input type="text" class="form-control" id="user_ender" placeholder="ex:123456">
                </div>
                <div class="form-group">
                    <label for="complemento">Complemento:</label>
                    <input type="text" class="form-control" id="user_compl" placeholder="ex:123456">
                </div>
                <div class="form-group">
                    <label for="fone">Telefone:</label>
                    <input type="decimal" class="form-control" id="user_fone" placeholder="ex:123456">
                </div>
                <div class="form-group">
                    <label for="Cidade">Cidade:</label>
                    <?php require '../conexao/bd/conecta.php'; ?>
                    <select id="cid_cidade" class="selectpicker form-control show-tick">
                        <option value="">Selecione a Cidade...</option>
                        <?php
                        $sql = "SELECT cid_id, cid_nome FROM cid_cidade WHERE 1";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo '<option id="cid_cidade" onChange="insereVariacao()" value="'.$row['cid_id'].'">'.$row['cid_nome'].'</option>';
                            }
                        }
                        ?>
                    </select>
                    <br>
                    <div class="form-group">
                        <div id='carrega_bairro'></div>
                     </div>
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
                <?php include '../conexao/carrega-cliente.php';  ?>
            </div>
        </div>
    </div>
</div>
<script>
    $("#btnGravarUser").click(function(){
        $.ajax({
            type:'POST',
            url:'./conexao/grava-cliente.php',
            async:false,
            data:{
                'user-nome':$('#user_nome').val(),
                'user-sob':$('#user_sob').val(),
                'user-email':$('#user_email').val(),
                'user-ender':$('#user_ender').val(),
                'user-compl':$('#user_compl').val(),
                'user-fone':$('#user_fone').val(),
                'cid-cidade':$('#cid_cidade').val(),
                'id-bairro':$('#id_bairro').val(),
            },
            timeout: '10000',
            success: function(){
                alert("Mensagem: Cliente Cadastrado com Sucesso!" );
                $('#div_carrega_usuarios').load('./conexao/carrega-cliente.php');
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert("Error: " + errorThrown);
                $('#div_carrega_usuarios').load('./conexao/carrega-cliente.php');
            }
        });
    });
</script>
<!-- carrega bairro apos selecionar cidade -->
<script>
    $('#cid_cidade').change(function(){
        var cid_cidade = $('#cid_cidade').val();
        console.log(cid_cidade);
        $.ajax({
            type:'post',
            url: './conexao/busca-bairro.php',
            data: {'cid_cidade':cid_cidade},
            erro: function(){
                alert('erro');
            },
            success: function(data){
                $("#carrega_bairro").html(data);
            }

        });
    });
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
