<?php 

include("header.php");

?>

<div class="container bg-white">
    <h1 class="my-5">CRUD-CLEAN</h1>
    <h3>Cadastrar</h3>
    <a type="button" href="index.php">Voltar</a>
    <form action="cadastrar-action" method="post" class="my-5">
        <label for="Lnome">Nome</label>
        <input type="text" name="nome" class="mb-5"><br>
        <label for="Llogin">Nome</label>
        <input type="text" name="login" class="mb-5"><br>
        <label for="Lsenha">Senha</label>
        <input type="password" name="senha" class="mb-5"><br>
        <label for="Ltipo">Tipo</label>
        <select name="tipo" id="tipo">
            <option value="0" selected disabled>Selecione</option>
            <option value="1">Administrador</option>
            <option value="2">Usuário</option>
        </select><br>
        <input type="submit" value="Salvar" class="my-5">
    </form>
</div>

<?php include("footer.php");?>