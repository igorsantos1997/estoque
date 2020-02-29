<html>
    <link rel="stylesheet" href="../../_css/layout.css">
    <script src="../../_js/jquery-3.4.1.min.js"></script>
    <script src="../../_js/forms.js"></script>
    <style>
            th:nth-child(2){
                padding: 0 100px;
            }
            th:nth-child(3){
                padding: 0 100px;
            }
            th:nth-child(10){
                padding: 0 100px;
            }
        
            td{
                padding: 10px 5px;
            }
            tr:hover{
                background-color: #d3d3d3;
            }
        </style>
    <body>
        <p class="form_titulo">Consulta Cliente PJ</p>
        <form method="post">
            <label for="txtBusca"></label><input type="text" name="txtBusca" id="txtBusca" placeholder="Busca" class="txtBox">
            <label for="txtCriterio">Buscar por</label><select id="txtCriterio" name="txtCriterio" class="txtBox">
            <button id="btnBuscar">Buscar</button>
                <option value="Codigo">Código</option>
                <option value="NomeFantasia">Nome Fantasia</option>
                <option value="RazaoSocial">Razão Social</option>
                <option value="CNPJ">CNPJ</option>
            </select>
        </form>
        <br>
        <table border="1">
            <tr>
                <th>Código</th>
                <th>Nome Fantasia</th>
                <th>Razão Social</th>
                <th>CNPJ</th>
                <th>Inscrição Estadual</th>
                <th>Isento IE</th>
                <th>Contribuente ICMS</th>
                <th>Telefone</th>
                <th>Celular</th>
                <th>Endereço</th>
                <th>Email</th>
                <th>Observações</th>
                <th>Limite de Débito</th>
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
         
            $cliente=new Empresa();
        if ($criterio=="NomeFantasia" or $criterio=="RazaoSocial"){
            $valores=$cliente->buscar($busca);
            
            }
        elseif ($criterio=="Codigo"){   
            $cliente->setCodigo($busca);
            $cliente->getByCodigo();
            $valores=$cliente->__toString();
            }
        elseif ($criterio=="CNPJ"){   
            $valores=$cliente->buscar($busca,"cnpj");
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