<?php
include_once 'C:\xampp\htdocs\trabalho\BLL\Produto.php';
use BLL\Equipamento;

$bllprod = new \BLL\Produto();
$lstprod = $bllprod->Select();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Mostrar Produtos</title>
</head>

<body>
    <?php include_once '../menu.php'; ?>
    <h1>Mostrar Produtos</h1>

   <table class="highlight">
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Operações
                <a class="btn-floating btn-small waves-effect waves-light green"><i class="material-icons"
                        onclick="JavaScript:location.href='formProduto.php'">add</i></a>

                <a class="btn-floating btn-small waves-effect waves-light deep-purple accent-2"><i
                        class="material-icons" onclick="JavaScript:location.href='../menu.php'">arrow_back</i></a>
            </th>
        </tr>

        <?php foreach ($lstprod as $prod) { ?>
            <tr>
                <td><?php echo $prod->getId(); ?></td>
                <td><?php echo $prod->getDescricao(); ?></td>
                <td>
                    <a class="btn-floating btn-small waves-effect waves-light orange"
                        onclick="JavaScript:location.href='formEdtProd.php?id=' + '<?php echo $prod->getID(); ?>'">
                        <i class="material-icons">edit</i></a>

                    <a class="btn-floating btn-small waves-effect waves-light blue"
                        onclick="JavaScript:location.href='formDetProd.php?id=' + '<?php echo $prod->getID(); ?>'"><i
                            class="material-icons">details</i></a>

                    <a class="btn-floating btn-small waves-effect waves-light red"
                        onclick="JavaScript: remover( <?php echo $prod->getId(); ?> )">
                        <i class="material-icons">delete</i></a>

                </td>
            </tr>
        <?php } ?>

    </table>
</body>

</html>


<script>
    function remover(id) {
        if (confirm('Excluir o Produto ' + id + '?')) {
            location.href = 'remProd.php?id=' + id;
        }
    }
</script>