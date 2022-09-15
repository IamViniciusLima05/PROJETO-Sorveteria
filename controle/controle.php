<?php
include '../modelo/sorvete.class.php';
include '../dao/sorveteriadao.class.php';
include '../util/padronizacao.class.php';

$sorvete = new sorvete();

$sorvete->cliente = Padronizacao::padronizarMaiusculasMinusculas($_POST['cliente']);
$sorvete->endereco = $_POST['endereco'];
$sorvete->numeroDeTelefone = $_POST['numeroDeTelefone'];
$sorvete->CPF = $_POST['CPF'];
$sorvete->tipo = $_POST['tipo'];
$sorvete->sabor = $_POST['sabor'];

$sorveteriaDAO = new sorveteriaDAO();
$sorveteriaDAO->cadastrar($sorvete);
echo "<br>Cliente cadastrado com sucesso!";
echo $sorvete;
