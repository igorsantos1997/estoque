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
        <link rel="stylesheet" href="_lib/@fortawesome/fontawesome-free/css/fontawesome.css">
        <link rel="stylesheet" href="_lib/@fortawesome/fontawesome-free/css/brands.css">
        <link rel="stylesheet" href="_lib/@fortawesome/fontawesome-free/css/solid.css">
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
            .bg-red{
              background-color: #B22222	;
          }
        </style>
    </head>
    <body>

        <div class="menu_box"></div>
        
        <nav class="navbar navbar-dark bg-dark navbar-expand-lg mb-1">
            <div class="container">
                <a class="navbar-brand" href="index.php">Estoque</a>
                <button class="navbar-toggler" type="button" data-target="#navbarSite" data-toggle="collapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse" id="navbarSite">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navDrop"><i class="fas fa-user-tag"></i> Cadastrar/Editar</a>
                            <div class="dropdown-menu">
                                <a href="#" id="Cadastro_CadCliente" class="dropdown-item"><i class="fas fa-user"></i> Cliente Pessoa Física</a>
                                <a href="#" id="Cadastro_CadClientePj" class="dropdown-item"><i class="fas fa-user-tie"></i> Cliente Pessoa Jurídica</a>
                                <a href="#" id="Cadastro_CadFornecedor" class="dropdown-item"><i class="fas fa-truck-loading"></i> Fornecedor</a>
                                <a href="#" id="Cadastro_CadProduto" class="dropdown-item"><i class="fas fa-box-open"></i> Produto</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navDrop"><i class="fas fa-list-ul"></i>
                                Consultar</a>
                            <div class="dropdown-menu">
                                <a href="#" id="Consulta_ConsultaCliente" class="dropdown-item"><i class="fas fa-user"></i> Cliente Pessoa Física</a>
                                <a href="#" id="Consulta_ConsultaClientePj" class="dropdown-item"><i class="fas fa-user-tie"></i> Cliente Pessoa Jurídica</a>
                                <a href="#" id="Consulta_ConsultaFornecedor" class="dropdown-item"><i class="fas fa-truck-loading"></i> Fornecedor</a>
                                <a href="#" id="Consulta_ConsultaProduto" class="dropdown-item"><i class="fas fa-box-open"></i> Produto</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navDrop"><i class="fas fa-boxes"></i>
                                Estoque</a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item" id="Estoque_EstoqueCompra"><i class="fas fa-cart-plus"></i> Compra</a>
                                <a href="#" class="dropdown-item" id="Estoque_EstoqueVenda"><i class="fas fa-cash-register"></i> Venda</a>
                            </div>
                        </li>
                    </ul>
                    <a href="#" data-toggle="modal" data-target="#modalLogin" class="nav-link ml-auto">Login</a>
                </div>
            </div>
        </nav>

        
            <iframe id="frame_conteudo" src="home.php" width="100%" height="95%" style="margin: 0 auto;"></iframe>
        
    <script src="_lib/jquery/dist/jquery.js"></script>
    <script src="_lib/popper.js/dist/umd/popper.js"></script>
    <script src="_lib/bootstrap/dist/js/bootstrap.js"></script>
    </body>
    <div class="modal fade" role="dialog" tabindex="-1" id="modalLogin">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Efetuar Login</h5>
                    <button class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-12">
                        <div class="form-group">
                        
                            <div class="form-inline">
                                <label for="txtLoginUser">Usuário</label>
                                <input type="text" class="form-control w-75 ml-auto" id="txtLoginUser" name="txtLoginUser" placeholder="Usuário">
                            </div>
                        </div>
                        </div>
                        <div class="col-12">
                         <div class="form-group">
                            
                             <div class="form-inline">
                                <label for="txtLoginSenha">Senha</label>
                                <input type="password" class="form-control w-75 ml-auto" id="txtLoginSenha" name="txtLoginSenha" placeholder="Senha">
                            </div>
                            </div>
                        </div>
                        <div class="col-12">
                         <div class="form-group">
                            
                            <button class="btn btn-primary btn-block">Login</button>
                            </div>
                        </div>
                        
                    </div>
                    
                    
                </div>
               
            </div>
        </div>
    </div>
</html>
<?php




?>