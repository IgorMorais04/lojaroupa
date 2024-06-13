<?php
namespace DAL;
include_once 'C:\xampp\htdocs\trabalho\DAL\conexao.php';
include_once 'C:\xampp\htdocs\trabalho\MODEL\Produto.php';

class Clientes
{
    public function Select()
    {

        $sql = "Select * from clientes;";
        $con = Conexao::conectar();
        $registros = $con->query($sql);
        $con = Conexao::desconectar();

        foreach ($registros as $linha) {
            $cli = new \MODEL\Clientes();
            $cli->setId($linha['id']);
            $cli->setNome($linha['nome']);
            $cli->setEndereco($linha['endereco']);
            $cli->setEmail($linha['email']);
            $cli->setTelefone($linha['telefone']);
            $lstCli[] = $cli;
        }
        return $lstCli;

    }


    public function SelectByID(int $id)
    {
        //recuperar do banco de dados
        $sql = "Select * from clientes where id=?;";
        $con = Conexao::conectar(); 
        $query = $con->prepare($sql);
        $query->execute (array($id));
        $linha = $query->fetch(\PDO::FETCH_ASSOC);
        Conexao::desconectar(); 

        $cli = new \MODEL\Clientes();
        $cli->setId($linha['id']);
        $cli->setNome($linha['nome']);
        $cli->setEndereco($linha['endereco']);
        $cli->setEmail($linha['email']);
        $cli->setTelefone($linha['telefone']);
   
        return $cli;

    }

    public function Insert(\MODEL\Produto $produto){
        $sql = "INSERT INTO produto (descricao) VALUES ('{$produto->getDescricao()}',');";
        
        $con = Conexao::conectar();
        $result = $con->query($sql);
        $con = Conexao::desconectar();
        return $result;
    }

    public function Update(\MODEL\Produto $produto){
        $sql = "UPDATE equipamento SET descricao = ?, responsavel = ?, departamento = ?, compra = ? WHERE id = ?;";
        
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute(array($produto->getDescricao(),));
        $con = Conexao::desconectar();
      
        return $result; 
    }

    public function Delete($id){
        $sql = "delete from equipamento WHERE id = ?;";
        
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute(array( $id ));
        $con = Conexao::desconectar();
      
        return $result; 
    }



}

?>