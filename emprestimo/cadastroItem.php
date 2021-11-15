
<?php
 
require './config.php';
require './Emprestimo.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $artigo = new Emprestimo($mysql);
    $artigo->adicionarItem($_POST['item'], $_POST['dtEmprestimo'], $_POST['prevEntrega'], $_POST['dtEntrega'], $_POST['status']);
    header('Location: item.php');
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
        <form action="cadastroItem.php" method="POST">
                <input type="text" name="item" placeholder="Item"/>
                <input type="text" name="dtEmprestimo" placeholder="Data Emprestimo"/>
                <input type="text" name="prevEntrega" placeholder="Previsao de Entrega"/>
                <input type="text" name="dtEntrega" placeholder="Data Entrega"/>
                <input type="text" name="status" placeholder="Status"/>
                <div>
                    <input type="submit" name="Cadastrar" value="Cadastrar"/>
                </div>
        </form>
    </div>
</body>

</html>