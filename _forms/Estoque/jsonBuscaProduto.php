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
            echo '<label for="txtCodigo">Codigo</label><input type="number" value="'.$codigo.'" name="txtCodigo" id="txtCodigo" placeholder="Codigo" class="txtBox">
            
            <label for="txtProduto">Produto</label><input type="text" value='.$resultado["descricao"].' name="txtProduto" id="txtProduto" placeholder="Produto" class="txtBox" disabled>
            <label for="txtPreco">Preço</label><input type="number" value='.$resultado["precoVenda"].' name="txtPreco" id="txtPreco" placeholder="Preço" class="txtBox" disabled><label for="txtQntd">Quantidade</label><input type="number" value="1" name="txtQntd" id="txtQntd" placeholder="Quantidade" class="txtBox">';
    
            
?>