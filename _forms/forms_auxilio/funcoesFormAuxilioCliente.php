        <script src="../../_js/jquery-3.4.1.min.js"></script>
        <script src="../../_js/forms.js"></script>
<?php
require_once("../../config.php");
function preencheListaBuscaCli($dados){
         $html="";
            foreach ($dados as $valor){
                    $html.="<tr>";
                    //if (is_array($valor)) preencheLista($valor);
                    $html.= "<td>".$valor["cod"]."</td>";
                    $html.= "<td>".$valor["nome"]."</td>";
                    $html.= "<td>".$valor["cpf"]."</td>";
                    $html.="</tr>";
                }
            ?>
            <script>$("#tableBuscaCli").append("<?=$html?>");</script>
        <?php  
    }
?>