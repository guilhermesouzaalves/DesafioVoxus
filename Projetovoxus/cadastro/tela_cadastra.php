<?php
$erro_email = isset($_GET['erro_email']) ? $_GET['erro_email'] : 0;
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/cadastra.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <script>
        </script>
        <title>Cadastre-se</title>
    </head>
    <body>
        <div id="cadastra_principal">
            <h1 id="titulo">Cadastre-se</h1>
            <div id="div_form">
                <form action="cadastra.php" method="post">
                    <input type="text" name="nome" id="nome" placeholder="Nome"><br><br>
                    <input type="email" name="email" id="email"placeholder="Email"><br>
<?php
if ($erro_email) {
    echo'E-mail já cadastrado por favor tente com outro e-mail.';
}
?>
                    <br>
                    <input type="password" name="senha" id="senha" placeholder="Senha"><br><br>
                    <button type="submit" id="btn-cadastra" class="btn btn-primary">Cadastrar</button>
                    <a href="../index/index.php"><button type="button" class="btn">Voltar</button></a>
                </form>
            </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="js/cadastra.js"></script>   
    </body>
</html>
