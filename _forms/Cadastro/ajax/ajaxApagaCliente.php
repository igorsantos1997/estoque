<?php
    require_once("../../../config.php");
    $cliente=new Cliente($_POST["codigo"]);
    if ($cliente->getByCodigo(true)){
        if ($cliente->apagar()){
            echo "apagado";
            } else {
            echo "erro";
            }
        
        } else {
        echo "codigo_nao_encontrado";   
        }
                        
?>