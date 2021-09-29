<?php 

include("header.php");
include("conexao.php");

$nome   = addslashes($_POST['nome']);
$login  = addslashes($_POST['login']);
$senha  = addslashes(sha1($_POST['senha']));
$tipo   = addslashes($_POST['tipo']);


$query = $mysqli->prepare("insert into usuarios (nome, login, senha, tipo, deleted_at) values ('$nome', '$login', '$senha', $tipo, 0)");
$query->execute();
$query->store_result();
$result = $query->affected_rows;

if($result){
    
    $msg = 1;
    
}else{
    
    $msg = 2;
}

$query->close();
$mysqli->close();

?>

<div class="container">
    <h1 class="my-5">CRUD CLEAN</h1>
    <h3>Cadastrar</h3>
    <a href="index.php" class="my-5">Voltar</a><br>
    
    <?php
        switch($msg){
                
            case 1:
                echo "<div class='success my-5'>Cadastro realizado com sucesso!</div>";
                break;
            case 2:
                echo "<div class='danger my-5'>Houve um problema durante o cadastro, tente novamente!</div>";
                break;
            default:
                echo "<div class='danger my-5'>Dados não informados ou erro durante o cadastro, procure o desenvolvedor ou tente novamente!</div>";
                break;
        }
    ?>
</div>

<?php include("footer.php");?>