<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../boostrap/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <title>Calculadora</title>
</head>
<body class="m-3">
    <header></header>
    <form class="pt-4 font-weight-bold" method="post">
        <input class="w-50 ml-1 form-control rounded" type="number" name="numero1" placeholder="Digite o Número 1"><br>
        <input class="w-50 ml-1 form-control rounded" type="text" name="operacao" placeholder="Digite a operação ( + , - , / , * )"><br>
        <input class="w-50 ml-1 form-control rounded" type="number" name="numero2" placeholder="Digite o Número 2"><br>
        <input class="w-50 mb-4 btn btn-primary rounded" type="submit" name="enviar">
    </form>   
    <?php

    if (!empty($_POST)) {

        $num1 = $_POST["numero1"];
        $num2 = $_POST["numero2"];
        $operacao = $_POST["operacao"];

        $resultado;

        switch ($operacao) {
            case "*":
                $resultado = $num1 * $num2;
                break;
            case "/":
                $resultado = $num1 / $num2;
                break;
            case "+":
                $resultado = $num1 + $num2;
                break;
            case "-":
                $resultado = $num1 - $num2;
                break;
        }

        if(@$resultado !== null) {
            print("<div class='alert alert-success w-50' role='alert'>O Resultado é: $resultado</div>");
        } else {
            print("<div class='alert alert-warning w-50' role='alert'>Adicione um valor</div>");    
        }
    }
    ?>
    <footer></footer>
</body>

</html>
