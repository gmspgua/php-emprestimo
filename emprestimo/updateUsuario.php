
<?php
 
 require './config.php';
 require './Emprestimo.php';

 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $artigo = new Emprestimo($mysql);
    $artigo->atualizarUsuario($_POST['name'], $_POST['celular'], $_POST['email'], $_POST['senha'],$_POST['nameOld']);
    header('Location: usuario.php');
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
         <h1>Atualizar</h1>
         <form action="updateUsuario.php" method="POST">
                 <input type="hidden" name="nameOld" placeholder="Item" value="<?php echo $_GET['name']?>"/> 
                 <input type="text" name="name" placeholder="Item" value="<?php echo $_GET['name']?>"/>
                 <input type="text" name="celular" placeholder="Data Emprestimo" value="<?php echo  $_GET['celular'] ?>"/>
                 <input type="text" name="email" placeholder="Previsao de Entrega" value="<?php echo  $_GET['email'] ?>"/>
                 <input type="password" name="senha" placeholder="Data Entrega" value="<?php echo  $_GET['senha'] ?>"/>
                 <div>
                     <input type="submit" name="Atualizar" value="Atualizar"/>
                 </div>
         </form>
     </div>
 </body>
 
 </html>