<?php
?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Buscar sorvetes</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body>
        <h1 class="jumbotron bg-info">BUSCA DE CLIENTES PREMIUM</h1>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navbarNav">
           <ul class="navbar-nav">
             <li class="nav-item">
               <a class="nav-link" href="index.php">HOME PAGE</a>
             </li>

             <li class="nav-item">
               <a class="nav-link" href="tiposDeSorvetes.php">NOSSOS PRODUTOS<span class="sr-only"></span></a>
             </li>

             <li class="nav-item">
               <a class="nav-link" href="cadastro-sorvete.php">CADASTRO DE CLIENTES PREMIUM<span class="sr-only"></span></a>
             </li>

             <li class="nav-item">
               <a class="nav-link" href="alterar-cliente.php">ALTERAR CLIENTE(S) PREMIUM<span class="sr-only"></span></a>
             </li>

           </ul>
         </div>
        </nav>

        <?php
        include "dao/sorveteriadao.class.php";
        include "modelo/sorvete.class.php";

        $sorveteriaDAO = new sorveteriaDAO;
        $sorveteriaDAO = $sorveteriaDAO->buscarCliente();

        if(count($sorveteriaDAO) == 0) {
            echo "<h3>Não há sorvetes cadastrados!</h3>";
            echo "</body>";
            echo "</html>";
            die();
        }

        ?>
        <div class="table-responsive">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">SORVETES</th>
                        <th scope="col">PICOLÉS</th>
                        <th scope="col">AÇAÍ</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                      <th>chocolate</th>
                      <th>uva</th>
                      <th>-----</th>
                    </tr>
                </tfoot>
                <tfoot>
                    <tr>
                      <th>creme</th>
                      <th>abacaxi</th>
                      <th>-----</th>
                    </tr>
                </tfoot>
                <tfoot>
                    <tr>
                      <th>napolitano</th>
                      <th>brigadeiro</th>
                      <th>-----</th>
                    </tr>
                </tfoot>
                <tfoot>
                    <tr>
                      <th>menta com chocolate</th>
                      <th>morango</th>
                      <th>-----</th>
                    </tr>
                </tfoot>
                <tfoot>
                    <tr>
                      <th>flocos</th>
                      <th>limão</th>
                      <th>-----</th>
                    </tr>
                </tfoot>
                <tfoot>
                    <tr>
                      <th>coco</th>
                      <th>vodka</th>
                      <th>-----</th>
                    </tr>
                </tfoot>
                <tfoot>
                    <tr>
                      <th>passas ao rum</th>
                      <th>leite condensado</th>
                      <th>-----</th>
                    </tr>
                </tfoot>
              <tbody>
              <?php
                foreach($sorvete as $sorvete) {
                    echo "<tr>";
                    echo "<td>".$sorvete->idCliente."</td>";
                    echo "<td>".$sorvete->cliente."</td>";
                    echo "<td>".$sorvete->endereco."</td>";
                    echo "<td>".$sorvete->numeroDeTelefone."</td>";
                    echo "<td>".$sorvete->CPF."</td>";
                    echo "<td>".$sorvete->tipo."</td>";
                    echo "<td>".$sorvete->sabor."</td>";
                    echo "<td>".$sorvete->alterar."</td>";
                    echo "<td>".$sorvete->excluir."</td>";
                    echo "<td><a href='alterar-sorvete.php?id=$sorvete->idCliente' class='btn btn-warning'>Alterar</a></td>";
                    echo "<td><a href='buscar-sorvete.php?id=$sorvete->idCliente' class='btn btn-danger'>Excluir</a></td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </body>
    <?php
    if(isset($_GET['id'])) {
        $sorveteriaDAO = new sorveteriaDAO;
        $sorveteriaDAO->deletarSorvete($_GET['codigo']);

        header("location:buscar-sorvete.php");
    }
    ?>
</html>
