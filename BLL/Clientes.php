<?php
namespace BLL;

include_once 'C:\xampp\htdocs\trabalho\DAL\Produto.php';
use DAL;

class Clientes
{
    public function Select()
    {
        $dalCli = new \DAL\Clientes();
    
        return $dalCli->Select();
    }
}

?>