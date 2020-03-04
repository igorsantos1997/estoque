<?php
    require_once("../../../config.php");

    $codigo=$_POST["nome"];
    $campo= $_POST["campo"];
    $resultado=Cliente::buscar(array($campo=>$codigo));
    if (count($resultado)>0){
        $resultado=$resultado[0];
    } 
    else{
        $resultado["nome"]="N/A";
        
    }
            echo $resultado['nome'].";";
            echo $resultado['dtNascimento'].";";
            echo $resultado['sexo'].";";
            echo $resultado['telefone'].";";
            echo $resultado['celular'].";";
            echo $resultado['rg'].";";
            echo $resultado['cpf'].";";
            echo $resultado['endereco'].";";
            echo $resultado['email'].";";
            echo $resultado['obs'].";";

           
    
            
?>