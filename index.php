<?php 

include("header.php");
include("conexao.php");

$busca = addslashes($_POST['buscar']);

if(!empty($busca)){
    $sql = "WHERE nome LIKE('%$busca%') OR login LIKE ('%$busca%')";
}else{
    $sql = "";
}

$query = $mysqli->prepare("select id, nome, login, senha, tipo, deleted_at from usuarios $sql");
$query->bind_result($id, $nome, $login, $senha, $tipo, $deleted_at);
$query->execute();

while($query->fetch()){
    
    $data[] =   [
                'id'  => $id,
                'nome'  => $nome,
                'login'  => $login,
                'senha'  => $senha,
                'tipo'  => $tipo,
                'deleted_at'  => $deleted_at,
                ];
}
$query->close();
$mysqli->close();

?>
    <div class="container bg-white">
        <h1 class="my-5">CRUD - CLEAN</h1>
        <a href="cadastrar.php">Cadastrar</a>
        <form action="index.php" method="post" class="my-5">
            <input type="text" style="width: 100%" name="buscar" class="mb-4" placeholder="Digite sua pesquisa">
            <input type="submit" value="Procurar">
        </form>
        <table border="1" width="100%" class="my-5">
            <tr>
                <th>id</th>
                <th>Nome</th>
                <th>Login</th>
                <th>Tipo</th>
                <th>Ativo</th>
                <th></th>
            </tr>
            <?php foreach($data as $dataItem):?>
            <tr>
                <td><?= $dataItem['id']?></td>
                <td><?= $dataItem['nome']?></td>
                <td><?= $dataItem['login']?></td>
                <td><?= $dataItem['tipo'] == 1 ? 'Administrador': 'Usuário' ?></td>
                <td><?= $dataItem['deleted_at'] == 1 ? 'Não' : 'Sim'?></td>
                <td>
                    <a href="editar.php?id=<?= $dataItem['id']?>">Editar</a>
                    <a href="<?= $dataItem['deleted_at'] == 1 ? 'habilitar' : 'excluir'?>.php?id=<?= $dataItem['id']?>"><?= $dataItem['deleted_at'] == 1 ? 'Habilitar' : 'Excluir'?></a>
                </td>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
<?php include("footer.php");?>    
    
