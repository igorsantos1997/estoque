<?php
    require_once("../../../config.php");

    $codigo=$_POST["codigo"];
    $campo= $_POST["campo"];
    $resultado=Fornecedor::buscar(array($campo=>$codigo));
    if (count($resultado)>0){
        $resultado=$resultado[0];
    } 
    else{
        $resultado["nome"]="N/A";
        
    }
            echo $resultado['razaoSocial'].";";
            echo $resultado['nomeFantasia'].";";
            echo $resultado['telefone'].";";
            echo $resultado['celular'].";";
            echo $resultado['cnpj'].";";
            echo $resultado['endereco'].";";
            echo $resultado['email'].";";
            echo $resultado['ie'].";";
            echo $resultado['isentoie'].";";
            echo $resultado['conticms'].";";
            echo $resultado['obs'].";"; 
?>