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
<select id="id_bairro" class="selectpicker form-control show-tick">
    <option value="">Selecione o Bairro...</option>
    <?php
    $sql = "SELECT 
                br_id
                , br_nome
            FROM 
                br_bairro
            WHERE 1
               and cid_cidade_cid_id='$cid_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<option id="id_bairro" onChange="insereVariacao()" value="'.$row['br_id'].'">'.$row['br_nome'].'</option>';
        }
    }
    ?>
</select>
<script>
    $('#id_bairro').change(function(){
        var id_cidade = $('#cid_cidade').val();
        var id_bairro = $('#id_bairro').val();
        //console.log(id_cidade);
       // console.log(id_bairro);
        $.ajax({
            type:'post',
            url: './conexao/carrega-cliente.php',
            data: {'id_cidade':id_cidade,'id_bairro' :id_bairro},
            async:false,
            erro: function(){
                alert('erro');
            },
            success: function(data){
                $('#div_carrega_usuarios').html(data);
            }

        });
    });
</script>