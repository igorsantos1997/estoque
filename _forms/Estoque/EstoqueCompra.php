<?php
    require_once("../../config.php"); 
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        date_default_timezone_set('America/Sao_Paulo');
       
        $data=date("Y/m/d H:i:s");
        $codigo=$_POST["txtCodigo"];
        $preco=$_POST["txtPreco"];
        $qntd=$_POST["txtQntd"];
        $entrada= new Transacao("",-1,"$codigo:$qntd",$data,"ENTRADA>COMPRA DE PRODUTO",0,0,$preco,-1);
        if ($entrada->inserir()){ 
            $produto=new Produto($codigo);
            $produto->getByCodigo();
            $produtoQntd=$produto->getEstoque();
            $produtoQntd+=$qntd;
            $produto->setEstoque($produtoQntd);
            if ($produto->atualizar()){
                echo "Inserido!";
            }
            else{
                $entrada->apagar();
                echo "Erro ao Atualizar Estoque!";
            }
         
        }
        else echo "Erro ao dar entrada!";
    }
?>
<html>
    <link rel="stylesheet" href="../../_css/layout.css">
    <script src="../../_js/jquery-3.4.1.min.js"></script>
    <script src="../../_js/forms.js"></script>
        <script src="EstoqueScriptBuscas.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../_lib/bootstrap/dist/css/bootstrap.css">
    <script>
        $(function(){
           $("#btnFormAux").on("click",function(){
               $(".form_busca_produto").css({display: "block"});
           });
            
            $("#btnBuscar").on("click",buscar); 
           
        });

    </script>
    <body>
        <?php
            require_once ("../forms_auxilio/formAuxilioProduto.php");
        ?>
        <p class="form_titulo">Entrada de Estoque - Compra</p>
        <form method="post">
            <div id="controls">
                <label for="txtCodigo">Codigo</label><input type="number" name="txtCodigo" id="txtCodigo" placeholder="Codigo" class="txtBox">
                <button id="btnFormAux" class="btnLupa" type="button" data-toggle="modal" data-target="#modalBuscaProduto"></button>
                <label for="txtProduto">Produto</label><input type="text" name="txtProduto" id="txtProduto" placeholder="Produto" class="txtBox" disabled><br>
                <label for="txtPreco">Preço Total</label><input type="number" name="txtPreco" id="txtPreco" placeholder="Preço" class="txtBox">
                <label for="txtQntd">Quantidade</label><input type="number" name="txtQntd" id="txtQntd" placeholder="Quantidade" class="txtBox">
                <br><button id="btnBuscar" type="button">Buscar</button>
            </div>
            <button id="btnCadastrar">Cadastrar</button>
        </form>
    </body>
        <script src="../../_lib/jquery/dist/jquery.js"></script>
    <script src="../../_lib/popper.js/dist/umd/popper.js"></script>
    <script src="../../_lib/bootstrap/dist/js/bootstrap.js"></script>
</html>