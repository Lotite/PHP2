<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
</head>

<body>
    <div class="mx-auto mt-3" style="width: 500px;">
        <?php


        if (!$_POST) {
            crearFormulario();
        } else {
            $correo = $_POST["correo"];
            if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                $usuario = explode("@", $correo)[0];
                echo "Tu usuario es $correo";
            } else {
                ?>
                <div
                    class="alert alert-danger"
                    role="alert"
                >
                    <strong>Error format email</strong> Ingresa un correo valido
                </div>
                
                <?php
                crearFormulario($correo);
            }
        }






        function crearFormulario($correo = "")
        {
        ?>
            <form method="post">
                <h1>Ingresa tu correo</h1>
                <input class="form-control" type="text" name="correo" value="<?php echo $correo ?>" placeholder="example@xmail.com">
                <button class="btn btn-light btn-outline-dark">Enviar</button>
            </form>
        <?php
        }





        ?>
    </div>

</body>
<script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>

</html>