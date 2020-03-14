<html>
    <head>
        <link rel="stylesheet" href="../../_css/layout.css">
    <link rel="stylesheet" href="../../_lib/bootstrap/dist/css/bootstrap.css">
        <script src="../../_js/jquery-3.4.1.min.js"></script>
        <script src="../../_js/forms.js"></script>
        <meta charset="utf-8">
               <script>
            $(function(){
                $("#btnFormAuxProduto").on("click",function(){
                
                $(".form_busca_produto").css({display: "block"});                     
                });
            });
            function buscar(){
                var codigo=$("#txtCodigo").val();
                var campo="cod";
                $.post("ajax/ajaxBuscaProduto.php",{codigo: codigo, campo: campo},function(result){
                   
                    var resultado=result.split(';');
                    var descricao=resultado[0];
                    var pesoLiquido=resultado[1];
                    var pesoBruto=resultado[2];
                    var categoria=resultado[3];
                    var subcategoria=resultado[4];
                    var marca=resultado[5];
                    var precoVenda=resultado[6];
                    var precoCusto=resultado[7];
                    var estoque=resultado[8];
                    var limiteEstoque=resultado[9];
                    var obs=resultado[10];
                    var fornecedor=resultado[11];
                    var ncm=resultado[12];
                    var cest=resultado[13];
                    var codBeneficio=resultado[14];
                    var tributacao=resultado[15];
                    
                    $("#txtDescricao").val(descricao);
                    $("#txtPesoLiquido").val(pesoLiquido);
                    $("#txtPesoBruto").val(pesoBruto);
                    $("#txtCategoria").val(categoria);
                    $("#txtSubCategoria").val(subcategoria);
                    $("#txtMarca").val(marca);
                    $("#txtPrecoVenda").val(precoVenda);
                    $("#txtPrecoCusto").val(precoCusto);
                    $("#txtEstoqueAtual").val(estoque);
                    $("#txtLimiteEstoque").val(limiteEstoque);
                    $("#txtObs").val(obs);
                    $("#txtFornecedor").val(fornecedor);
                    $("#txtNcm").val(ncm);
                    $("#txtCest").val(cest);
                    $("#txtCodBeneficio").val(codBeneficio);
                    $("#txtTributacao").val(tributacao);
                });
                $("#txtEditar").prop("value","s");
                $("#btnCadastrar").html("Editar");
                
            }
        </script>
    </head>
        <div id="resultadoPositivo"></div>
        <div id="resultadoNegativo"></div>
     <?php require_once ("..".DIRECTORY_SEPARATOR."forms_auxilio".DIRECTORY_SEPARATOR."formAuxilioProduto.php")?>
        <p class="form_titulo">Cadastro de Produto</p>
        <form method="post">
            <div class="form-row">
                <div class="form-group col-md-4">
                <label for="txtCodigo">Código</label>
                    <div class="form-inline">
                         <input type="number" placeholder="Código" name="txtCodigo" id="txtCodigo" class="form-control w-75"><button id="btnFormAuxProduto" class="btnLupa" type="button" data-toggle="modal" data-target="#modalBuscaProduto"></button>
                    </div>
                </div>
                <div class="form-group col-md-8">
                    <label for="txtDescricao">Descrição</label><input type="text" placeholder="Descrição" name="txtDescricao" id="txtDescricao" class="form-control w-100">
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-2">
            <label for="txtPesoLiquido">Peso Líquido</label><input type="number" placeholder="Peso Líquido" name="txtPesoLiquido" id="txtPesoLiquido" class="form-control w-100">
                </div>
                <div class="form-group col-md-2">
                    <label for="txtPesoBruto">Peso Bruto</label><input type="number" placeholder="Peso Bruto" name="txtPesoBruto" id="txtPesoBruto" class="form-control w-100"></div>
                <div class="form-group col-md-4">
            <label for="txtCategoria">Categoria</label><input type="text" placeholder="Categoria" name="txtCategoria" id="txtCategoria" class="form-control w-100">
                </div>
                <div class="form-group col-md-4">
            <label for="txtSubCategoria">Sub Categoria</label><input type="text" placeholder="Sub Categoria" name="txtSubCategoria" id="txtSubCategoria" class="form-control w-100">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                     <label for="txtMarca">Marca</label><input type="text" placeholder="Marca" name="txtMarca" id="txtMarca" class="form-control w-100">
                </div>                
                <div class="form-group col-md-2">
                     <label for="txtFornecedor">Fornecedor</label><input type="text" placeholder="Fornecedor" name="txtFornecedor" id="txtFornecedor" class="form-control w-100">
                </div>
                <div class="form-group col-md-2">
                    <label for="txtPrecoVenda">Preço de Venda</label><input type="number" placeholder="Preço de Venda" name="txtPrecoVenda" id="txtPrecoVenda" class="form-control">
                </div>
                <div class="form-group col-md-2">
                    <label for="txtPrecoCusto">Preço de Custo</label><input type="number" placeholder="Preço de Custo" name="txtPrecoCusto" id="txtPrecoCusto" class="form-control">
                </div>
                 <div class="form-group col-md-2">
                      <label for="txtEstoqueAtual">Estoque Atual</label><input type="number" placeholder="Estoque Atual" name="txtEstoqueAtual" id="txtEstoqueAtual" class="form-control">
                </div>
                <div class="form-group col-md-2">
                     <label for="txtLimiteEstoque">Limite de Estoque</label><input type="number" placeholder="Limite de Estoque" name="txtLimiteEstoque" id="txtLimiteEstoque" class="form-control">
                </div>
            </div>
            
           
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="txtObs">Observações</label><textarea placeholder="Observações" name="txtObs" id="txtObs" class="form-control"></textarea>
                </div>
            </div>
           
            
            
            <p class="separator">Tributação</p>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="txtNcm">NCM</label><input type="number" placeholder="NCM" name="txtNcm" id="txtNcm" class="form-control w-100">
                </div>
                <div class="form-group col-md-3">
                <label for="txtCest">CEST</label><input type="number" placeholder="CEST" name="txtCest" id="txtCest" class="form-control w-100">
                </div>
                <div class="form-group col-md-3">
                <label for="txtCodBeneficio">Código Benefício</label><input type="number" placeholder="Código Benefício" name="txtCodBeneficio" id="txtCodBeneficio" class="form-control w-100">
                </div>
                <div class="form-group col-md-3">
                <label for="txtTributacao">Tributação</label><input type="text" placeholder="Tributação" name="txtTributacao" id="txtTributacao" class="form-control w-100">
                </div>
                
            </div>         
            <input type="hidden" name="txtEditar" id="txtEditar" value="n">
            <button id="btnCadastrar" class="btn btn-primary">Cadastrar</button>
        </form>
                 <script src="../../_lib/jquery/dist/jquery.js"></script>
        <script src="../../_lib/popper.js/dist/umd/popper.js"></script>
        <script src="../../_lib/bootstrap/dist/js/bootstrap.js"></script>
</html>
<?php
    require_once("../../config.php");

    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $codigo=$_POST["txtCodigo"];
        $descricao=$_POST["txtDescricao"];
        $pesoLiquido=$_POST["txtPesoLiquido"];
        $pesoBruto=$_POST["txtPesoBruto"];
        $categoria=$_POST["txtCategoria"];
        $subCategoria=$_POST["txtSubCategoria"];
        $marca=$_POST["txtMarca"];
        $precoVenda=$_POST["txtPrecoVenda"];
        $precoCusto=$_POST["txtPrecoCusto"];
        $estoqueAtual=$_POST["txtEstoqueAtual"];
        $limiteEstoque=$_POST["txtLimiteEstoque"];
        $obs=$_POST["txtObs"];
        $fornecedor=$_POST["txtFornecedor"];
        $ncm=$_POST["txtNcm"];
        $cest=$_POST["txtCest"];
        $codBeneficio=$_POST["txtCodBeneficio"];
        $tributacao=$_POST["txtTributacao"];
        $editar=$_POST["txtEditar"];
        $produto = new Produto($codigo,$descricao,$pesoLiquido,$pesoBruto,$categoria,$subCategoria,$marca,$precoVenda,$precoCusto,$estoqueAtual,$limiteEstoque,$obs,$fornecedor, $ncm,$cest,$codBeneficio,$tributacao);
        if($produto->getByCodigo(true) and $editar=="n"){
            ?><script>resultadoNegativo("Código já existente! Favor alterar código.");</script><?php
            preencherCampos();
        } elseif(empty($descricao)) {
            ?><script>resultadoNegativo("Campo Produto não pode ficar vazio.");</script><?php
            preencherCampos();
        }
        else {
            if ($editar=="s"){
                        if (!$produto->atualizar()){
                            ?><script>resultadoNegativo("Erro ao Atualizar. Se erro persistir, favor contactar o administrador.");</script><?php
                            preencherCampos();
                        } else {
                            ?><script>resultadoPositivo("Atualizado com Sucesso!");</script><?php
                        } 
            }
            else{
                        if (!$produto->inserir()){
                            ?><script>resultadoNegativo("Erro ao Cadastrar. Se erro persistir, favor contactar o administrador.");</script><?php
                            preencherCampos();
                        } else {
                            ?><script>resultadoPositivo("Cadastrado com Sucesso!");</script><?php
                        } 
            }

        }
    }

    function preencherCampos(){
        $codigo=$_POST["txtCodigo"];
        $descricao=$_POST["txtDescricao"];
        $pesoLiquido=$_POST["txtPesoLiquido"];
        $pesoBruto=$_POST["txtPesoBruto"];
        $categoria=$_POST["txtCategoria"];
        $subCategoria=$_POST["txtSubCategoria"];
        $marca=$_POST["txtMarca"];
        $precoVenda=$_POST["txtPrecoVenda"];
        $precoCusto=$_POST["txtPrecoCusto"];
        $estoqueAtual=$_POST["txtEstoqueAtual"];
        $limiteEstoque=$_POST["txtLimiteEstoque"];
        $obs=$_POST["txtObs"];
        $fornecedor=$_POST["txtFornecedor"];
        $ncm=$_POST["txtNcm"];
        $cest=$_POST["txtCest"];
        $codBeneficio=$_POST["txtCodBeneficio"];
        $tributacao=$_POST["txtTributacao"];
        
        ?>
        <script>
            $("#txtCodigo").val("<?=$codigo?>");
            $("#txtDescricao").val("<?=$descricao?>");
            $("#txtPesoLiquido").val("<?=$pesoLiquido?>");
            $("#txtPesoBruto").val("<?=$pesoBruto?>");
            $("#txtCategoria").val("<?=$categoria?>");
            $("#txtSubCategoria").val("<?=$subCategoria?>");
            $("#txtMarca").val("<?=$marca?>");
            $("#txtPrecoVenda").val("<?=$precoVenda?>");
            $("#txtPrecoCusto").val("<?=$precoCusto?>");
            $("#txtEstoqueAtual").val("<?=$estoqueAtual?>");
            $("#txtLimiteEstoque").val("<?=$limiteEstoque?>");
            $("#txtObs").val("<?=$obs?>");
            $("#txtFornecedor").val("<?=$fornecedor?>");
            $("#txtNcm").val("<?=$ncm?>");
            $("#txtCest").val("<?=$cest?>");
            $("#txtCodBeneficio").val("<?=$codBeneficio?>");
            $("#txtTributacao").val("<?=$tributacao?>");
        </script>
        <?php
    }
?>