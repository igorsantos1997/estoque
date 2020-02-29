<?php
    require_once("../../config.php");
    function preencheLista($dados){
         $html="<tr>";
            foreach ($dados as $indice=>$valor){
                    if (is_array($valor)) preencheLista($valor);
                    else $html.="<td>$valor</td>";
                }
            $html.="</tr>";
            ?>
            <script>$("table").append("<?=$html?>");</script>
        <?php  
    }
    function buscaClasse($classe,$criterio,$busca){
        if ($criterio=="Codigo"){   
            $classe->setCodigo($busca);
            $classe->getByCodigo();
            $valores=$classe->__toString();
        }
        elseif ($criterio=="CNPJ"){   
            $valores=$classe->buscar($busca,"cnpj");
        }
        elseif ($criterio=="CPF"){   
            $valores=$classe->buscar($busca,"cpf");
        }
        else{
            $valores=$classe->buscar($busca);
        }
        
        if (is_array($valores)) preencheLista($valores);
        ?><script>$("#txtBusca").val("<?=$busca?>");$("#txtCriterio").val("<?=$criterio?>");</script><?php
    }
?>