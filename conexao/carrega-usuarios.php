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

require_once '../conexao/bd/conecta.php';

$sql="SELECT 
            Log_id as id
            ,Log_nome as nome
            ,Log_Login as login
            ,'*******' as senha
            ,case Log_permissao
                WHEN 0 THEN 'Tecnico'
                WHEN 1 THEN 'Administrador'
             end as perm
            ,case Log_estatus 
                WHEN 0 THEN 'Ativo'
                WHEN 1 THEN 'Inativo'
             end as status
        FROM	
            login
        WHERE 1";

$tabela = "<table class='table table-hover'>
                <thead BGCOLOR=black>
                  <tr>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Código</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Nome</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Usuario</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Senha</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Nivel</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Status</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Ação</th>
                  </tr>
                </thead>
              <tbody>";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $tabela .="<tr>";
            $tabela .="<td class='alin-table'>".$row["id"]."</td>";
            $tabela .="<td class='alin-table'>".$row["nome"]."</td>";
            $tabela .="<td class='alin-table'><span><span class='badge'>".$row["login"]."</span></span></td>";
            $tabela .="<td class='alin-table'>".$row["senha"]."</td>";
            $tabela .="<td class='alin-table'>".$row["perm"]."</td>";
            $tabela .="<td class='alin-table'>".$row["status"]."</td>";
            $tabela .="<td class='alin-table'><button class='btn btn-danger' value='".$row["id"]."'  onClick = 'aoClicarExcluirLogin($(this).val())' ><span class='badge'><i class='fa fa-trash-o fa-lg'></i></span> Deletar</a></button></td>";
            "<br>";
        }
    }
        $tabela .= "</tbody></table>";

        echo  $tabela;
?>