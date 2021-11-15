
<?php
 
 require './config.php';
 require './Emprestimo.php';

 $artigo = new Emprestimo($mysql);
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $resultados = $artigo->deletarUsuario($_POST['name']);
 }

 $resultados = $artigo->recuperarUsuarios();
   
 
 ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Coisas Emprestadas</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="items.css">
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
        <form action="item.php">
            <input type="submit" name="Item" value="Item"/>
        </form>
    </div>

        <div id="container">  
               
                <div>
                    <h1>Usuarios</h1>
                    <form action="cadastro.php">    
                    <input type="submit" name="Cadastrar Usuario" value="Novo"/>
                    </form>
                </div>
       
            <table>
                    <tr>
                        <th>Nome</th>
                        <th>Celular</th>
                        <th>E-mail</th>
                        <th>Senha</th>
                        <th></th>
                        <th></th>
                     </tr>
                        <?php foreach ($resultados as $resultado) { ?>
                        <tr>
                            <td><?php echo $resultado['name'];?></td>
                            <td><?php echo $resultado['celular'];?></td>
                            <td><?php echo $resultado['email'];?></td>
                            <td  class="hidetext"><?php echo $resultado['senha'];?></td>
                            <td class="contact-update">
                                <form action='updateUsuario.php?"'
                                 method="get">
                                    <input type="hidden" name="name" value="<?php echo $resultado['name']; ?>">
                                    <input type="hidden" name="celular" value="<?php echo $resultado['celular']; ?>">
                                    <input type="hidden" name="email" value="<?php echo $resultado['email']; ?>">
                                    <input type="hidden" name="senha" value="<?php echo $resultado['senha']; ?>">
                                    <input type="submit" name="submit" value="Update">
                                </form>
                            </td>
                            <td class="contact-delete">
                                <form action='usuario.php?' method="post">
                                    <input type="hidden" name="name" value="<?php echo $resultado['name']; ?>">
                                    <input type="submit" name="submit" value="Delete">
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                 
            </table>
        </div>

</body>

</html>