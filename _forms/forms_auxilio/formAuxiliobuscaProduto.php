<?php
    require_once("../../config.php");

    $produto=$_POST["nome"];
    $resultado=Produto::buscar(array("descricao"=>$produto));
            echo "<table border=1>";
            echo "<tr>";
            echo "<th>Código</th>";
            echo "<th>Descrição</th>";
            echo "<th>Categoria</th>";
            echo "<th>SubCategoria</th>";
            echo "<th>Fornecedor</th>";
            echo "<th>Preço</th>";
            echo "</tr>";
            foreach ($resultado as $valor){
                    
                    echo "<tr>";
                    //if (is_array($valor)) preencheLista($valor);
                    echo "<td>".$valor["cod"]."</td>";
                    echo "<td>".$valor["descricao"]."</td>";
                    echo "<td>".$valor["categoria"]."</td>";
                    echo "<td>".$valor["subcategoria"]."</td>";
                    echo "<td>".$valor["fornecedor"]."</td>";
                    echo "<td>".$valor["precoVenda"]."</td>";
                    echo "</tr>";
                   
                }
             echo "</table>";
?>