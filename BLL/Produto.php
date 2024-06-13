<?php
namespace BLL;

include_once 'C:\xampp\htdocs\trabalho\DAL\Produto.php';
use DAL;

class Produto
{
    public function Select()
    {
        $dalProd = new \DAL\Produto();
    
        return $dalProd->Select();
    }
}

?>