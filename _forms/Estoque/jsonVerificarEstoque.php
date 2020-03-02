<?php
    require_once("../../config.php"); 
    $codigo=$_POST["codigo"];
    $produto=new Produto($codigo);
    $produto->getByCodigo();
    $estoque=$produto->getEstoque();
    echo $estoque;
?>