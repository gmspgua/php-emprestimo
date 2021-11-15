<?php
 
require './config.php';
require './Emprestimo.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $artigo = new Emprestimo($mysql);
    try {
        $resultado = $artigo->recuperarLogin($_POST['email'], $_POST['senha']);
        header('Location: item.php');
    } catch (Exception $e) {
        header('Location: cadastro.php'); 
    }
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
        <h1>Login</h1>
        <form action="index.php" method="POST">
                <input type="text" name="email" placeholder="E-mail"/>
                <input type="password" name="senha" placeholder="Senha"/>
                <div>
                    <input type="submit" name="Entrar" value="Entrar"/>
                </div>
        </form>
    </div>
</body>

</html>