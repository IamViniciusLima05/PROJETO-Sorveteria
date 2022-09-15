<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>CADASTRO DE CLIENTES PREMIUM</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></>
    </head>

    <body>
      <h1 class="jumbotron bg-info">CADASTRO DE CLIENTES PREMIUM</h1>

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
             <a class="nav-link" href="buscar-sorvete.php">BUSCA DE CLIENTES PREMIUM<span class="sr-only"></span></a>
           </li>

           <li class="nav-item">
             <a class="nav-link" href="alterar-cliente.php">ALTERAR CLIENTE(S) PREMIUM<span class="sr-only"></span></a>
           </li>
           
         </ul>
       </div>
      </nav>

      <form name="cadastro" method="post" action="controle/controle.php">
        <div>
          <input type="text" name="cliente"
                 placeholder="Digite o nome do cliente"
                 autofocus>
        </div>

        <div>
          <input type="text" name="endereco"
                 placeholder="Digite o endereco">
        </div>

        <div>
          <input type="text" name="numeroDeTelefone"
                 placeholder="Digite o número de telefone">
        </div>
        <div>
          <input type="text" name="CPF"
                 placeholder="Digite o cpf">
        </div>


        <div>
          <label>ESCOLHA O TIPO:</label>
          <select name="tipo">
            <option value="picolé">Picolé</option>
            <option value="sorvete">Sorvete</option>
            <option value="Açaí">Açaí</option>
          </select>
        </div>

        <div>
          <label>ESCOLHA O SABOR DE SORVETE:</label>
          <select name="sabor">
            <option value="chocolate">chocolate</option>
            <option value="creme">creme</option>
            <option value="passasAoRum">passas ao rum</option>
            <option value="napolitano">napolitano</option>
            <option value="mentaComChocolate">menta com chocolate</option>
            <option value="flocos">flocos</option>
            <option value="coco">coco</option>
          </select>
        </div>

        <div>
          <label>ESCOLHA O SABOR DE PICOLÉ:</label>
          <select name="sabor">
            <option value="abacaxi">abacaxi</option>
            <option value="brigadeiro">brigadeiro</option>
            <option value="morango">morango</option>
            <option value="limão">limão</option>
            <option value="vodka">vodka</option>
            <option value="leiteCondesado">leite condensado</option>
            <option value="uva">uva</option>
          </select>
        </div>

        <div class="form-group">
          <input type="submit" value="CADASTRAR"
          class="btn btn-info">
        </div>

	      <div class="form-group">
          <input type="reset" value="LIMPAR"
          class="btn btn-success">
        </div>

      </form>
    </body>
</html>
