<?php
class Sorvete
{

  private $idCliente; //auto_increment
  private $cliente;
  private $endereco;
  private $numeroDeTelefone;
  private $CPF;
  private $tipo;
  private $sabor;

  public function __construct()
  {
  }

  public function __destruct()
  {
  }

  public function __get($atributo)
  {
    return $this->$atributo;
  }

  public function __set($atributo, $valor)
  {
    $this->$atributo = $valor;
  }

  public function __toString()
  {
    return nl2br("
                  IdCliente: $this->idCliente
                  Cliente: $this->cliente
                  Endereço: $this->endereco
                  Número de telefone: $this->numeroDeTelefone
                  CPF: $this->CPF
                  Tipo: $this->tipo
                  Sabor: $this->sabor");
  }
}
?>
