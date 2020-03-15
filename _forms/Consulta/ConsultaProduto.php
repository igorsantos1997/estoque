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
    </style>
    <body>
        <p class="form_titulo">Consulta Produto</p>
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
                <option value="descricao" class="optTexto">Nome do Produto</option>
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
                <th>Descrição</th>
                <th>Peso Líquido</th>
                <th>Peso Bruto</th>
                 <th>Categoria</th>
                <th>Sub Categoria</th>
                <th>Marca</th>
                 <th>Preço de Venda</th>
                <th>Preço de Custo</th>
                <th>Estoque Atual</th>
               <th>Limite Estoque</th>
                 <th>Observações</th>
                <th>Fornecedor</th>
                <th>NCM</th>
                <th>CEST</th>
                <th>Cód Benefício</th>
                <th>Tributação</th>
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
        $classe=new Produto();
        buscaClasse($classe);
    }
?>