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

$cid_id = $_POST['cid_cidade'];

?>
<label for="Bairro">Bairro:</label>
<select id="id_bairro" class="selectpicker form-control show-tick">
    <option value="">Selecione o Bairro...</option>
    <?php
    $sql = "SELECT 
                br_id
                , br_nome
            FROM 
                br_bairro
            WHERE 
               cid_cidade_cid_id='$cid_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<option id="id_bairro" onChange="insereVariacao()" value="'.$row['br_id'].'">'.$row['br_nome'].'</option>';
        }
    }
    ?>
</select>
<!--
<script>
    $('#id_variacao').change(function(){
        var id_variacao = $('#id_variacao').val();
        var num_linha = $('#num_linha').val();
        console.log(num_linha);
        console.log(id_variacao);
        $.ajax({
            type:'post',
            url: '../Painel/carrega/carregahorarios.php',
            data: {
                'num_linha':num_linha,
                'id_variacao':id_variacao
            },
            erro: function(){
                alert('erro');
            },
            success: function(data){
                $("#tabela_horarios").html(data);
            }

        });
    });
</script>
-->