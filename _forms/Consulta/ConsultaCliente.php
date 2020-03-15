<html>
        <link rel="stylesheet" href="../../_css/layout.css">
        <script src="../../_js/jquery-3.4.1.min.js"></script>
        <script src="../../_js/forms.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../_lib/bootstrap/dist/css/bootstrap.css">
        <style>
            .table th,.table td{
                vertical-align: inherit;
            }
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
            <div class="form-row">
                <div class="form-group col-md-6">
                    <div class="form-inline">
                         <label for="txtBusca">Busca</label><input type="number" name="txtBusca" id="txtBusca" placeholder="Busca" class="form-control w-50">
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <div class="form-inline">
                <label for="txtCriterio">Buscar por</label>
                    <select id="txtCriterio" name="txtCriterio" class="form-control w-50">
                        <option value="cod" class="optNumero">Código</option>
                        <option value="Nome" class="optTexto">Nome</option>
                        <option value="CPF" class="optTexto">CPF</option>
                    </select>
                    </div>
                </div>
                <div class="form-group col-md-2">
                     <button id="btnBuscar" class="btn btn-primary w-100">Buscar</button>
                </div>
            </div>
            
            
           
        </form>
        <br>
        <table class="table table-responsive-md table-hover table-bordered table-striped text-center">
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
    <script src="../../_lib/jquery/dist/jquery.js"></script>
    <script src="../../_lib/popper.js/dist/umd/popper.js"></script>
    <script src="../../_lib/bootstrap/dist/js/bootstrap.js"></script>
</html>
<?php
    require_once("forms.php");
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $classe=new Cliente();
        buscaClasse($classe);
    }
?>