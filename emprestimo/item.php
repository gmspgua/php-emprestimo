
<?php
 
 require './config.php';
 require './Emprestimo.php';

 $artigo = new Emprestimo($mysql);
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $resultados = $artigo->deletarItem($_POST['item']);
 }

 $resultados = $artigo->recuperarItems();
   
 
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
        <form action="usuario.php">
            <input type="submit" name="Usuario" value="Usuario"/>
        </form>
    </div>

        <div id="container">  
               
                <div>
                    <h1>Itens ja Cadastrados</h1>
                    <form action="cadastroItem.php">    
                    <input type="submit" name="Cadastrar Item" value="Cadastrar Item"/>
                    </form>
                </div>
       
            <table>
                    <tr>
                        <th>Item</th>
                        <th>Data Emprestimo</th>
                        <th>Previsao Entrega</th>
                        <th>Data Entrega</th>
                        <th>Status</th>
                        <th></th>
                        <th></th>
                     </tr>
                        <?php foreach ($resultados as $resultado) { ?>
                        <tr>
                            <td><?php echo $resultado['item'];?></td>
                            <td><?php echo $resultado['dtEmprestimo'];?></td>
                            <td><?php echo $resultado['prevEntrega'];?></td>
                            <td><?php echo $resultado['dtEntrega'];?></td>
                            <td><?php echo $resultado['status'];?></td>
                            <td class="contact-update">
                                <form action='updateItem.php?"'
                                 method="get">
                                    <input type="hidden" name="item" value="<?php echo $resultado['item']; ?>">
                                    <input type="hidden" name="dtEmprestimo" value="<?php echo $resultado['dtEmprestimo']; ?>">
                                    <input type="hidden" name="prevEntrega" value="<?php echo $resultado['prevEntrega']; ?>">
                                    <input type="hidden" name="dtEntrega" value="<?php echo $resultado['dtEntrega']; ?>">
                                    <input type="hidden" name="status" value="<?php echo $resultado['status']; ?>">
                                    <input type="submit" name="submit" value="Update">
                                </form>
                            </td>
                            <td class="contact-delete">
                                <form action='item.php?' method="post">
                                    <input type="hidden" name="item" value="<?php echo $resultado['item']; ?>">
                                    <input type="submit" name="submit" value="Delete">
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                 
            </table>
        </div>

</body>

</html>