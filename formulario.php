<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1, initial-scale=1.0">
    <link rel="stylesheet" href="../a_boostrap/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Formulario de alunos</title>
</head>
    <body >
        <header class="p-3" style="background-color: rgba(0, 0, 0, 0.8);">
            <h3 class="text-white">Estrada de Notas</h3>
        </header>
        <main class="p-4">
            <form  method="post" action="#">
                <input class="w-50 ml-1 form-control rounded" type="text" name="nome"  placeholder="Nome do aluno"><br>
                <input class="w-50 ml-1 form-control rounded" type="number" name="nota1"  placeholder="Nota 1"><br>
                <input class="w-50 ml-1 form-control rounded" type="number" name="nota2"  placeholder="Nota 2"><br>
                <input class="w-50 mb-4 btn btn-primary rounded" type="submit" name="enviar">
            </form>
            </div>
            <table class="table table-dark rounded w-50">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>1° SEMESTRE</th>
                        <th>2° SEMESTRE</th>
                        <th>NOTA FINAL</th>
                        <th>SITUAÇÃO</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                class Aluno {
                    public $nome;
                    public $nota1;
                    public $nota2;

                    public function __construct($nome, $nota1, $nota2) {
                        $this->nome = $nome;
                        $this->nota1 = $nota1;
                        $this->nota2 = $nota2;
                    }
                }

                session_start();


                if (!isset($_SESSION['alunosArray'])) {
                    $_SESSION['alunosArray'] = [];
                }


                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["enviar"])) {
                    $nome = $_POST["nome"];
                    $nota1 = $_POST["nota1"];
                    $nota2 = $_POST["nota2"];
                    
                    $novoAluno = new Aluno($nome, $nota1, $nota2);
                    
                    $_SESSION['alunosArray'][] = $novoAluno;

                    header("Location: ".$_SERVER['PHP_SELF']);
                    exit;
                }

                for ($i = 0; $i < count($_SESSION['alunosArray']); $i++) {

                    $situacao = '-';

                    $media = ($_SESSION['alunosArray'][$i]->nota1 + $_SESSION['alunosArray'][$i]->nota2) / 2;

                    if($media >= 7) {
                        $situacao="<b style='color:green'>Aprovado</b>";
                    } else if($media >= 5)  {
                        $situacao="<b style='color:orange'>Recuperação</b>";
                    } else {
                        $situacao="<b style='color:red'>Reprovado</b>";
                    }

                    print("<tr class=''>");
                    print("<td style='background-color:#f2f2f2; color:#666666; padding: 10px;'>".$_SESSION['alunosArray'][$i]->nome."</td>");
                    print("<td style='background-color:#e6e6e6; color:#666666; padding: 10px;'>".$_SESSION['alunosArray'][$i]->nota1."</td>");
                    print("<td style='background-color:#f2f2f2; color:#666666; padding: 10px;'>".$_SESSION['alunosArray'][$i]->nota2."</td>");
                    print("<td style='background-color:#e6e6e6; color:#666666; padding: 10px;'>".$media."</td>");
                    print("<td style='background-color:#f2f2f2; color:#666666; padding: 10px;'>".$situacao."</td>");
                    print("</tr>");

                }

                ?>    
                </tbody>
            </table>
        </main>
    </body>
</html>