<h2>Página de Cadastro</h2>

<form method="POST">
    Nome:<br>
    <input type="text" name="nome"><br><br>
    
    E-mail:<br>
    <input type="email" name="email"><br><br>
    
    Senha:<br>
    <input type="password" name="senha"><br><br>
    
    <input type="submit" name="Cadastrar">
    <a href="<?=BASE_URL."/login"?>">Voltar</a>
</form>