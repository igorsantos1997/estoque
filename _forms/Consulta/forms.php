        <script src="../../_js/jquery-3.4.1.min.js"></script>
        <script src="../../_js/forms.js"></script>
    <script>
        $(function(){
            
        });
    </script>
<?php
    require_once("../../config.php");
    function preencheLista($dados){
 
         $html="<tr>";
            
            foreach ($dados as $indice=>$valor){
                    
                    if (is_array($valor)){
                        
                        preencheLista($valor);
                        
                    } 
                    else{
                        
                        $html.="<td>$valor</td>";
                        
                    }
                }
            $html.="</tr>";
        
            ?>
            <script>$("table").append(`<?=$html?>`);</script>
        <?php  
    }
    function buscaClasse($classe){ //Os dois argumentos txt são para colocar os valores novamente no form
        $criterio=$_POST["txtCriterio"];
        $busca=$_POST["txtBusca"];
        $consulta=array($criterio=>$busca);
        $valores=$classe->buscar($consulta);
        if (is_array($valores)) preencheLista($valores);
        ?>
        <script>
            // Essa parte coloca os valores novamente nos txts de fato.
            $("#txtCriterio").val("<?=$criterio?>");
            alteraPropTxt($("select")); //Altera a porp do txt da busca
            $("#txtBusca").val("<?=$busca?>");
            
        </script>
<?php 
    }
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