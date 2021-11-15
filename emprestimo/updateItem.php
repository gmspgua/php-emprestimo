
<?php
 
 require './config.php';
 require './Emprestimo.php';

 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $artigo = new Emprestimo($mysql);
    $artigo->atualizarItem($_POST['item'], $_POST['dtEmprestimo'], $_POST['prevEntrega'], $_POST['dtEntrega'], $_POST['status'], $_POST['itemOld']);
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
         <h1>Atualizar</h1>
         <form action="updateItem.php" method="POST">
                 <input type="hidden" name="itemOld" placeholder="Item" value="<?php echo $_GET['item']?>"/> 
                 <input type="text" name="item" placeholder="Item" value="<?php echo $_GET['item']?>"/>
                 <input type="text" name="dtEmprestimo" placeholder="Data Emprestimo" value="<?php echo  $_GET['dtEmprestimo'] ?>"/>
                 <input type="text" name="prevEntrega" placeholder="Previsao de Entrega" value="<?php echo  $_GET['prevEntrega'] ?>"/>
                 <input type="text" name="dtEntrega" placeholder="Data Entrega" value="<?php echo  $_GET['dtEntrega'] ?>"/>
                 <input type="text" name="status" placeholder="Status" value="<?php echo  $_GET['status'] ?>"/>
                 <div>
                     <input type="submit" name="Atualizar" value="Atualizar"/>
                 </div>
         </form>
     </div>
 </body>
 
 </html>