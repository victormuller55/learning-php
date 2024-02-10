<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boletim Escolar</title>
    <link rel="stylesheet" href="../boostrap/bootstrap.css">
</head>
<body>
    <header class="p-3" style="background-color: rgba(0, 0, 0, 0.8);">
        <h3 class="text-white">High School</h3>
    </header>
    <main class="p-3">
        <h3 >Bem-vindo a sua página do boletim escolar!</h3>
        <hr>
        <h3>Digite as notas dos alunos</h3>
        <form class="pt-4 font-weight-bold" method="post">
            <input class="w-50 ml-1 form-control rounded" type="text" name="aluno" placeholder="Digite o nome do aluno"><br>
            <input class="w-50 ml-1 form-control rounded" type="num" name="nota1"  placeholder="Digite a nota do 1° bim"><br>
            <input class="w-50 ml-1 form-control rounded" type="num" name="nota2"  placeholder="Digite a nota do 2° bim"><br>
            <input class="w-50 ml-1 form-control rounded" type="num" name="nota3"  placeholder="Digite a nota do 3° bim"><br>
            <input class="w-50 ml-1 form-control rounded" type="num" name="nota4"  placeholder="Digite a nota do 4° bim"><br>
            <input class="w-50 mb-4 btn btn-primary rounded" type="submit" name="enviar">
        </form>
        <?php

            if(!empty($_POST)) {
            
                $nome = $_POST["aluno"];
                $numero1 = $_POST["nota1"];
                $numero2 = $_POST["nota2"];
                $numero3 = $_POST["nota3"];
                $numero4 = $_POST["nota4"];

                function divAluno($nome, $media, $color, $aprovacao) {
                    print("<div class='pl-2 pt-3 pb-3 text-white w-50' style='background-color:".$color."; border-radius: 10px'><p>A média do aluno <b>".$nome."</b> é: <b>".number_format($media, 1)."</b></p>Status do aluno: <b>".$aprovacao."</b></div>");
                }

                $media = ($numero1 + $numero2 + $numero3 + $numero4) / 4;

                if($media >= 7) {
                    divAluno($nome,$media,"green","APROVADO");
                } else if($media >= 5)  {
                    divAluno($nome, $media,"orange", "RECUPERAÇÃO");
                } else {
                    divAluno($nome, $media,"red", "REPROVADO");
                }
                
            }
        ?>
    </main>
</body>
</html>