
<?php
 
require './config.php';
require './Emprestimo.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $artigo = new Emprestimo($mysql);
    $artigo->adicionar($_POST['nome'], $_POST['contato'], $_POST['email'], $_POST['senha']);
    header('Location: index.php');
    die();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Coisas Emprestadas</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="reset.css">
</head>

<body>
    
	<header>
        <h1>Coisas Emprestadas</h1>
	</header>
    <div id="menu">
        <form action="index.php">
            <input type="submit" name="Inicio" value="Inicio"/>
        </form>
        <form action="cadastro.php">    
            <input type="submit" name="Cadastrar" value="Cadastrar"/>
        </form>
    </div>
	<div id="container">
        <h1>Cadastrar</h1>
        <form action="cadastro.php" method="POST">
                <input type="text" name="nome" placeholder="Nome Completo"/>
                <input type="text" name="contato" placeholder="Celular"/>
                <input type="text" name="email" placeholder="Email"/>
                <input type="password" name="senha" placeholder="Senha"/>
                <div>
                    <input type="submit" name="Cadastrar" value="Cadastrar"/>
                </div>
        </form>
    </div>
</body>

</html>