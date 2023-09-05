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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
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
                        <button type="button" class="btn btn-primary select-user-to-delete" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-id="<?php echo $estudante['id']; ?>">
                         Excluir
                        </button>
                    </td>
                </tr>
            </tbody>
        <?php } ?>
        </table>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Atenção</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Você deseja realmente excluir este registro?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close-modal">Fechar</button>
                    <a href="/<?php echo FOLDER; ?>?controller=Estudante&acao=excluir&id=<?php echo $estudante['id']; ?>" class="btn btn-primary">Excluir</a>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="userDeleted" tabindex="-1" aria-labelledby="userDeletedLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="userDeletedLabel">Parabéns</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Usuário deletado com sucesso!!!
                </div>
            </div>
        </div>
    </div>

<script>
        $("#delete-button").on("click", function() {
            let idUsuario = $(this).attr('data-id');

            let url = "/<?php echo FOLDER; ?>/?controller=Estudante&acao=excluir&id=" + idUsuario;
            $.get(url, function(data) {
                $("#close-modal").click();
                var myModal = new bootstrap.Modal(document.getElementById('userDeleted'))
                myModal.show();

            });
            console.log("O usuario para ser deletado é: " + idUsuario);
        });

        $("#userDeleted").on("hidden.bs.modal", function() {
            location.reload();
        });

        $(".select-user-to-delete").on("click", function() {

            $("#delete-button").attr("data-id", $(this).attr('data-id'));
            console.log("O usuário escolheu o estudante que talvez possa ser deletado");
        });
    </script>
</body>
</html>
