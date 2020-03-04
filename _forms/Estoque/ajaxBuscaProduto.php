<?php
    require_once("../../config.php");

    $codigo=$_POST["nome"];
    $campo= $_POST["campo"];
    $resultado=Produto::buscar(array($campo=>$codigo));
    if (count($resultado)>0){
        $resultado=$resultado[0];
    } 
    else{
        $resultado["descricao"]="N/A";
        $resultado["precoVenda"]="-1";
        
    }
            echo $resultado["descricao"].";".$resultado["precoVenda"].";";
    
            
?>