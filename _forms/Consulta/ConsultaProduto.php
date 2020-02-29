<html>
    <link rel="stylesheet" href="../../_css/layout.css">
     <script src="../../_js/jquery-3.4.1.min.js"></script>
    <script src="../../_js/forms.js"></script>
    <body>
        <p class="form_titulo">Consulta Produto</p>
        <form method="post">
            <label for="txtBusca"></label><input type="text" name="txtBusca" id="txtBusca" placeholder="Busca" class="txtBox">
            <label for="txtCriterio">Buscar por</label><select id="txtCriterio" name="txtCriterio" class="txtBox">
                <option value="Codigo">Código</option>
                <option value="NomeProduto">Nome do Produto</option>
            </select>
        </form>
        <br>
        <table border="1">
            <tr>
                <th>Código</th>
                <th>Descrição</th>
                <th>Peso Líquido</th>
                <th>Peso Bruto</th>
                 <th>Categoria</th>
                 <th>Preço de Venda</th>
                <th>Preço de Custo</th>
                <th>Estoque Atual</th>
               <th>Limite Estoque</th>
                 <th>Observações</th>
                <th>NCM</th>
                <th>CEST</th>
                <th>Cód Benefício</th>
                <th>Tributação</th>
            </tr>
        </table>
    </body>
</html>
<?php
    require_once("../../config.php");
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $busca=$_POST["txtBusca"];
        $criterio=$_POST["txtCriterio"];
        $valores="";
         
            $cliente=new Produto();
        if ($criterio=="NomeProduto"){
            $valores=$cliente->buscar($busca);
            
            }
        elseif ($criterio=="Codigo"){   
            $cliente->setCodigo($busca);
            $cliente->getByCodigo();
            $valores=$cliente->__toString();
            }
        
         if (is_array($valores)) preencheLista($valores);
        ?><script>$("#txtBusca").val("<?=$busca?>");$("#txtCriterio").val("<?=$criterio?>");</script><?php
    }
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
?>