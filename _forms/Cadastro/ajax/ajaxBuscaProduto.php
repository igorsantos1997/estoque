<?php
    require_once("../../../config.php");

    $codigo=$_POST["codigo"];
    $campo= $_POST["campo"];
    $resultado=Produto::buscar(array($campo=>$codigo));
    if (count($resultado)>0){
        $resultado=$resultado[0];
    } 
    else{
        $resultado["descricao"]="N/A";
        
    }
            echo $resultado['descricao'].";";
            echo $resultado['pesoLiquido'].";";
            echo $resultado['pesoBruto'].";";
            echo $resultado['categoria'].";";
            echo $resultado['subcategoria'].";";
            echo $resultado['marca'].";";
            echo $resultado['precoVenda'].";";
            echo $resultado['precoCusto'].";";
            echo $resultado['estoque'].";";
            echo $resultado['limiteEstoque'].";";
            echo $resultado['obs'].";"; 
            echo $resultado['fornecedor'].";";
            echo $resultado['ncm'].";";
            echo $resultado['cest'].";";
            echo $resultado['codBeneficio'].";";
            echo $resultado['tributacao'].";";

            
?>