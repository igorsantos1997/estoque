        <script src="../../_js/jquery-3.4.1.min.js"></script>
        <script src="../../_js/forms.js"></script>
<?php
require_once("../../config.php");
function preencheListaBusca($dados){
         $html="";
            foreach ($dados as $valor){
                    $html.="<tr>";
                    //if (is_array($valor)) preencheLista($valor);
                    $html.="<td>".$valor["cod"]."</td>";
                    $html.="<td>".$valor["descricao"]."</td>";
                    $html.="<td>".$valor["categoria"]."</td>";
                    $html.="<td>".$valor["subcategoria"]."</td>";
                    $html.="<td>".$valor["fornecedor"]."</td>";
                    $html.="<td>".$valor["precoVenda"]."</td>";
                    $html.="</tr>";
                }
            ?>
            <script>$("#tableBusca").append("<?=$html?>");</script>
        <?php  
    }
?>