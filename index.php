<?php
    error_reporting(E_ALL);
    error_reporting(-1);
    ini_set('error_reporting', E_ALL);
    include __DIR__.'/src/CRUD.php';
    $crud = new Crud();

    if(isset($_POST['criar']))
        $crud->create();

    if(isset($_GET['excluir']))
        $crud->delete($_GET['excluir']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <style>*{font-family: Arial, Helvetica, sans-serif;}</style>
</head>
<body>
    <h2>Lista de filmes</h2>

    <form action="" method="post">
        <input type="text" name="title">
        <input type="submit" name="criar" value="Cadastrar">
    </form>

    <ul>
        <?php
            foreach($crud->list() as $key => $value):
        ?>

        <li>
            <?= $value['title'] ?> 
            <a href="?excluir=<?= $value['id'] ?>">excluir</a>
            <a href="update.php?id=<?= $value['id'] ?>">editar</a>
        </li>

        <?php endforeach; ?>
    </ul>
</body>
</html>