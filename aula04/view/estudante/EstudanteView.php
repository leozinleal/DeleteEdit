<?php $listaEstudantes = $_REQUEST["estudantes"]; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudantes</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/' . FOLDER . '/view/navbar.php'; ?> 
    <header class="bg-dark text-white py-4">
        <div class="container">
            <h1 class="text-center">Semana da Acessibilidade</h1>
        </div>
    </header>
    <div class="container d-flex justify-content-center align-items-center w-25 p-1">
        <img src="https://diariodainclusaosocialdotcom.files.wordpress.com/2017/11/acessibilidade.jpg" 
        alt="Simbolo de várias pessoas mostrando a acessibilidade de diversas formas">
    </div>
    <div class="container d-flex justify-content-center">
    <a href="/<?php echo FOLDER; ?>/?controller=Estudante&acao=salvar" class="btn btn-success text-white">Cadastrar Estudante</a>
    </div>
    <table class="container table table-striped mb-5">
        <thead>
            <tr>
                <th>nome</th>
                <th>idade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <?php foreach ($listaEstudantes as $estudante) { ?>
            <tbody>
                <tr>
                    <td><?php echo $estudante["nome"]; ?></td>
                    <td><?php echo $estudante["idade"]; ?></td>
                    <td>
                        <a href="/<?php echo FOLDER; ?>?controller=Estudante&acao=editar&id=<?php echo $estudante['id']; ?>" class="btn btn-primary">Editar</a>
                        <a href="/<?php echo FOLDER; ?>?controller=Estudante&acao=excluir&id=<?php echo $estudante['id']; ?>" class="btn btn-primary">Excluir</a>
                    </td>
                </tr>
            </tbody>
        <?php } ?>
        </table>
</body>
</html>
