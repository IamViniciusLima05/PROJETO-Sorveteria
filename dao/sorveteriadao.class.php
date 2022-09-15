<?php
require "conexaobanco.class.php";
class sorveteriaDAO
{ //DAO - Data access object - acesso aos dados do objeto

    private $conexao = null;

    public function __construct()
    {
        $this->conexao = ConexaoBanco::getInstance();
    }

    public function __destruct()
    {
    }

    public function cadastrar($sorvete)
    {
        try {
            $statement = $this->conexao->prepare("insert into sorvete(idCliente,cliente,endereco,numeroDeTelefone,CPF,tipo,sabor)values(null,?,?,?,?,?,?)");
            $statement->bindValue(1, $sorvete->cliente);
            $statement->bindValue(2, $sorvete->endereco);
            $statement->bindValue(3, $sorvete->numeroDeTelefone);
            $statement->bindValue(4, $sorvete->CPF);
            $statement->bindValue(5, $sorvete->tipo);
            $statement->bindValue(6, $sorvete->sabor);
            $statement->execute();
        } catch(PDOException $error) {
            echo "Erro ao cadastrar!".$error;
        }
    }//fecha cadastrar

    public function buscarCliente()
    {
        try {
            $statement = $this->conexao->query("select * from sorvete");
            $array = $statement->fetchAll(PDO::FETCH_CLASS,"Sorvete");
            return $array;
        } catch(PDOException $error) {
            echo "Erro ao buscar! ".$error;
        }
    }

    public function deletarCLiente($idLivro)
    {
        try {
            $statement = $this->conexao->prepare("delete from sorvete where idCliente = ?");
            $statement->bindValue(1, $idCliente);

            $statement->execute(); //<--ELE QUE EXECUTA NO BANCO!

        } catch(PDOException $error) {
            echo "Erro ao excluir! ".$error;
        }
    }

    public function filtrarClientes($filtro, $pesquisa)
    {
        try {

            $query = "";
            if($filtro == "idCliente") {
                $query = "where idCliente = ".$pesquisa;
            } else {
                $query = "";
            }

            $statement = $this->conexao->query("select * from idCliente {$query}");
            $array = $statement->fetchAll(PDO::FETCH_CLASS,"IdCliente");
            return $array;
        } catch(PDOException $error) {
            echo "Erro ao filtrar! ".$error;
        }
    }

    public function alterarCiente($sorvete)
    {
        try {

            $statement = $this->conexao->prepare("update Cliente set cliente=?, endereco=?, numeroDeTelefone=?, cpf=?, tipo=?, sabor=?, where codigo=?");

            $statement->bindValue(2, $sorvete->idCliente);
            $statement->bindValue(1, $sorvete->cliente);
            $statement->bindValue(3, $sorvete->endereco);
            $statement->bindValue(4, $sorvete->numeroDeTelefone);
            $statement->bindValue(5, $sorvete->CPF);
            $statement->bindValue(6, $sorvete->tipo);
            $statement->bindValue(7, $sorvete->sabor);

            $statement->execute();

        } catch(PDOException $error) {
            echo "Erro ao alterar cliente! ".$error;
        }
    }
}
