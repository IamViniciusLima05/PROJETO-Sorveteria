<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>

    <body>
      <h1 class="jumbotron bg-info">ALTERAR CLIENTE(S) PREMIUM</h1>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>

       <div class="collapse navbar-collapse" id="navbarNav">
         <ul class="navbar-nav">
           <li class="nav-item active">
             <a class="nav-link" href="index.php">HOME PAGE</a>
           </li>

           <li class="nav-item">
             <a class="nav-link" href="cadastro-sorvete.php">CADASTRO DE CLIENTES PREMIUM<span class="sr-only"></span></a>
           </li>

           <li class="nav-item">
             <a class="nav-link" href="buscar-sorvete.php">BUSCA DE CLIENTES PREMIUM<span class="sr-only">(current)</span></a>
           </li>
         </ul>
       </div>
      <?php
      </nav>
      if(isset($_GET['id'])) {
          include "modelo/sorvete.class.php";
          include "dao/sorveteriadao.class.php";

          $sorveteriaDAO = new sorveteriaDAO;
          $livros = $livroDAO->filtrarLivros("Código", $_GET['id']);

          // var_dump($livros);
          $livro = $livros[0];
          // echo $livro;
      }
      ?>
      <form name="alterar" method="post" action="alterar-livro.php">

        <div>
         <input type="text" name="codigo" value="<?php echo $livro->idLivro ?? ""; ?>" readonly hidden>
        </div>
        <div>
          <input type="text" name="titulo"
                 placeholder="Digite o titulo"
                 autofocus value="<?php echo $livro->titulo ?? ""; ?>">
        </div>

        <div>
          <input type="text" name="editora"
                 placeholder="Digite a editora" value="<?php echo $livro->editora ?? ""; ?>">
        </div>

        <div>
          <input type="text" name="autor"
                 placeholder="Digite o autor" value="<?php echo $livro->autor ?? ""; ?>">
        </div>
        <div>
          <input type="number" name="anoLancamento"
                 placeholder="Digite o ano de lançamento"
                 value="<?php echo $livro->anoLancamento ?? ""; ?>">
        </div>

        <div>
          <label>Gênero</label>

          <select name="genero">
            <option value="Ação" <?php if(isset($livro)) if($livro->genero=='Ação') echo "selected"; ?>>Ação</option>
            <option value="Terror" <?php if(isset($livro))  if($livro->genero=='Terror') echo "selected"; ?>>Terror</option>
            <option value="Romance" <?php if(isset($livro))  if($livro->genero=='Romance') echo "selected"; ?>>Romance</option>
            <option value="Suspense" <?php if(isset($livro))  if($livro->genero=='Suspense') echo "selected"; ?>>Suspense</option>
            <option value="Aventura" <?php if(isset($livro))  if($livro->genero=='Aventura') echo "selected"; ?>>Aventura</option>
          </select>
        </div>

        <div>
          <input type="submit" name="alterar" value="Alterar">
        </div>
      </form>

      <?php
      if(isset($_POST['alterar'])) {
          // teste....
          // var_dump($_POST);
          include_once "modelo/livro.class.php";
          include_once "dao/livrodao.class.php";
          include 'util/padronizacao.class.php';

          $livroAlterar = new Livro();

          $livroAlterar->idLivro = $_POST['codigo']; //TEM QUE TER O IDLIVRO!!!
          $livroAlterar->titulo = Padronizacao::padronizarMaiusculasMinusculas($_POST['titulo']);
          $livroAlterar->editora = $_POST['editora'];
          $livroAlterar->autor = $_POST['autor'];
          $livroAlterar->anoLancamento = $_POST['anoLancamento'];
          $livroAlterar->genero = $_POST['genero'];

          $livroDAO = new livroDAO;
          $livroDAO->alterarLivro($livroAlterar); //enviando objeto para alterar no banco de dados

          header("location:buscar-livro.php");
      }
      ?>
    </body>
</html>
