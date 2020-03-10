<!DOCTYPE html>
<?php
    require_once("config.php");
?>
<html>
    <head>
        <title>Controle de Estoque</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="_lib/bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" href="_css/layout.css">
        <script src="_js/jquery-3.4.1.min.js"></script>
        <script src="_js/menu.js"></script>
        <style>
            body{
                 background-color: #333;
            }
            iframe{
                background-color: white;
            }
        </style>
    </head>
    <body>

        <div class="menu_box"></div>
        
        <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.php">Estoque</a>
                <button class="navbar-toggler" type="button" data-target="#navbarSite" data-toggle="collapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse" id="navbarSite">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navDrop">Cadastrar/Editar</a>
                            <div class="dropdown-menu">
                                <a href="#" id="Cadastro_CadCliente" class="dropdown-item">Cliente Pessoa Física</a>
                                <a href="#" id="Cadastro_CadClientePj" class="dropdown-item">Cliente Pessoa Jurídica</a>
                                <a href="#" id="Cadastro_CadFornecedor" class="dropdown-item">Fornecedor</a>
                                <a href="#" id="Cadastro_CadProduto" class="dropdown-item">Produto</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navDrop">Consultar</a>
                            <div class="dropdown-menu">
                                <a href="#" id="Consulta_ConsultaCliente" class="dropdown-item">Cliente Pessoa Física</a>
                                <a href="#" id="Consulta_ConsultaClientePj" class="dropdown-item">Cliente Pessoa Jurídica</a>
                                <a href="#" id="Consulta_ConsultaFornecedor" class="dropdown-item">Fornecedor</a>
                                <a href="#" id="Consulta_ConsultaProduto" class="dropdown-item">Produto</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navDrop">Estoque</a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item" id="Estoque_EstoqueCompra">Compra</a>
                                <a href="#" class="dropdown-item" id="Estoque_EstoqueVenda">Venda</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        
            <iframe id="frame_conteudo" src=""  width="100%" height="95%" style="margin: 10px auto;"></iframe>
        
    <script src="_lib/jquery/dist/jquery.js"></script>
    <script src="_lib/popper.js/dist/umd/popper.js"></script>
    <script src="_lib/bootstrap/dist/js/bootstrap.js"></script>
    </body>
</html>
<?php




?>