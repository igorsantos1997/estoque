<html>
    <link rel="stylesheet" href="../../_css/layout.css">
            <script src="../../_js/jquery-3.4.1.min.js"></script>
        <script src="../../_js/forms.js"></script>
        <style>
            th:nth-child(2){
                padding: 0 100px;
            }
            th:nth-child(9){
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
        <p class="form_titulo">Consulta Cliente PF</p>
        <form method="post">
            <label for="txtBusca"></label><input type="text" name="txtBusca" id="txtBusca" placeholder="Busca" class="txtBox">
            <label for="txtCriterio">Buscar por</label><select id="txtCriterio" name="txtCriterio" class="txtBox">
                <option value="Codigo">Código</option>
                <option value="Nome">Nome</option>
                <option value="CPF">CPF</option>
            </select>
            <button id="btnBuscar">Buscar</button>
        </form>
        <br>
        <table border="1">
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Nascimento</th>
                <th>Sexo</th>
                <th>Telefone</th>
                <th>Celular</th>
                <th>RG</th>
                <th>CPF</th>
                <th>Endereço</th>
                <th>Email</th>
                <th>Observação</th>
                <th>Limite de Crédito</th>
            </tr>
            
        </table>
    </body>
</html>
<?php
    require_once("forms.php");
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $classe=new Cliente();
        $criterio=$_POST["txtCriterio"];
        $busca=$_POST["txtBusca"];
        buscaClasse($classe,$criterio,$busca);
    }
?>