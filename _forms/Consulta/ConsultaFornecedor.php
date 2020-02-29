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
        <p class="form_titulo">Consulta Fornecedor</p>
        <form method="post">
            <label for="txtBusca"></label><input type="number" name="txtBusca" id="txtBusca" placeholder="Busca" class="txtBox">
            <label for="txtCriterio">Buscar por</label><select id="txtCriterio" name="txtCriterio" class="txtBox">
                <option value="Codigo" class="optNumero">Código</option>
                <option value="NomeFantasia" class="optTexto">Nome Fantasia</option>
                <option value="RazaoSocial" class="optTexto">Razão Social</option>
                <option value="CNPJ" class="optTexto">CNPJ</option>
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
    require_once("forms.php");
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $classe=new Fornecedor();
        $criterio=$_POST["txtCriterio"];
        $busca=$_POST["txtBusca"];
        buscaClasse($classe,$criterio,$busca);
    }
?>