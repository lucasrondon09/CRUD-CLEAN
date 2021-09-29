<?php 

include("header.php");
include("conexao.php");

$id = $_GET['id'];


$query = $mysqli->prepare("select id, nome, login, senha, tipo, deleted_at from usuarios where id = $id and deleted_at = 0");
$query->bind_result($id, $nome, $login, $senha, $tipo, $deleted_at);
$query->execute();
$query->store_result();
$result = $query->num_rows;
$query->fetch();

if($result > 0){
    $msg = 1;
    
}else{
    $msg = 0;
}

$query->close();
$mysqli->close();

?>

<div class="container bg-white">
    <h1 class="my-5">CRUD-CLEAN</h1>
    <h3>Excluir</h3>
    <a type="button" href="index.php">Voltar</a>
    <?php if($msg):?>
    <div class="my-5 danger">Tem certeza que deseja excluir esse registro?</div>
    <form action="excluir-action.php" method="post" class="my-5">
        <input type="text" name="id" class="mb-5" value="<?= $id?>" hidden="hidden">
        <label for="Lnome">Nome</label>
        <input type="text" name="nome" class="mb-5" value="<?= $nome?>" disabled><br>
        <label for="Llogin">Login</label>
        <input type="text" name="login" class="mb-5" value="<?= $login?>" disabled><br>
        <label for="Llogin">Ativo</label>
        <input type="text" name="login" class="mb-5" value="<?= $deleted_at == 0 ? "Sim":"Não";?>" disabled><br>
        <label for="Ltipo">Tipo</label>
        <select name="tipo" id="tipo" disabled>
            <option value="0" selected disabled>Selecione</option>
            <option value="1" <?= $tipo == 1 ? "selected" : ""?>>Administrador</option>
            <option value="2" <?= $tipo == 2 ? "selected" : ""?>>Usuário</option>
        </select><br>
        
        <input type="submit" value="Excluir" class="my-5">
    </form>
    <?php else:?>
    <div class="my-5 danger">Cadastro não localizado!</div>
    <?php endif;?>
</div>

<?php include("footer.php");?>