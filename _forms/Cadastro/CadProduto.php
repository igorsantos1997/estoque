<html>
    <head>
        <link rel="stylesheet" href="../../_css/layout.css">
        <script src="../../_js/jquery-3.4.1.min.js"></script>
        <script src="../../_js/forms.js"></script>
        <meta charset="utf-8">
    </head>
        <div id="resultadoPositivo"></div>
        <div id="resultadoNegativo"></div>
        <p class="form_titulo">Cadastro de Produto</p>
        <form method="post">
            <label for="txtCodigo">Código</label><input type="number" placeholder="Código" name="txtCodigo" id="txtCodigo" class="txtBox">(Código gerado automaticamente caso campo estaja vazio!)<br>
            <label for="txtDescricao">Descrição</label><input type="text" placeholder="Descrição" name="txtDescricao" id="txtDescricao" class="txtBox"><br>
            <label for="txtPesoLiquido">Peso Líquido</label><input type="number" placeholder="Peso Líquido" name="txtPesoLiquido" id="txtPesoLiquido" class="txtBox"><br>
            <label for="txtPesoBruto">Peso Bruto</label><input type="number" placeholder="Peso Bruto" name="txtPesoBruto" id="txtPesoBruto" class="txtBox"><br>
            <label for="txtCategoria">Categoria</label><input type="text" placeholder="Categoria" name="txtCategoria" id="txtCategoria" class="txtBox">
            <label for="txtSubCategoria">Sub Categoria</label><input type="text" placeholder="Sub Categoria" name="txtSubCategoria" id="txtSubCategoria" class="txtBox">
            
            <label for="txtMarca">Marca</label><input type="text" placeholder="Marca" name="txtMarca" id="txtMarca" class="txtBox"><br>
            <label for="txtPrecoVenda">Preço de Venda</label><input type="number" placeholder="Preço de Venda" name="txtPrecoVenda" id="txtPrecoVenda" class="txtBox"><br>
            <label for="txtPrecoCusto">Preço de Custo</label><input type="number" placeholder="Preço de Custo" name="txtPrecoCusto" id="txtPrecoCusto" class="txtBox"><br>
            <label for="txtEstoqueAtual">Estoque Atual</label><input type="number" placeholder="Estoque Atual" name="txtEstoqueAtual" id="txtEstoqueAtual" class="txtBox"><br>
            <label for="txtLimiteEstoque">Limite de Estoque</label><input type="number" placeholder="Limite de Estoque" name="txtLimiteEstoque" id="txtLimiteEstoque" class="txtBox"><br>
            <label for="txtObs">Observações</label><input type="text" placeholder="Observações" name="txtObs" id="txtObs" class="txtBox"><br>
            <label for="txtFornecedor">Fornecedor</label><input type="text" placeholder="Fornecedor" name="txtFornecedor" id="txtFornecedor" class="txtBox"><br>
            
            <p class="separator">Tributação</p>
            
            <label for="txtNcm">NCM</label><input type="number" placeholder="NCM" name="txtNcm" id="txtNcm" class="txtBox"><br>
            <label for="txtCest">CEST</label><input type="number" placeholder="CEST" name="txtCest" id="txtCest" class="txtBox"><br>
            <label for="txtCodBeneficio">Código Benefício</label><input type="number" placeholder="Código Benefício" name="txtCodBeneficio" id="txtCodBeneficio" class="txtBox"><br>
            <label for="txtTributacao">Tributação</label><input type="text" placeholder="Tributação" name="txtTributacao" id="txtTributacao" class="txtBox"><br>
            <button id="btnCadastrar">Cadastrar</button>
        </form>
    
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
        
        $produto = new Produto($codigo,$descricao,$pesoLiquido,$pesoBruto,$categoria,$subCategoria,$marca,$precoVenda,$precoCusto,$estoqueAtual,$limiteEstoque,$obs,$fornecedor, $ncm,$cest,$codBeneficio,$tributacao);
        if ($produto->getByCodigo()){
            ?><script>resultadoNegativo("Código já existente! Favor alterar código.");</script><?php
            preencherCampos();
        }
        else {
            if (!$produto->inserir()){
                ?><script>resultadoNegativo("Erro ao Cadastrar. Se erro persistir, favor contactar o administrador.");</script><?php
                 
                preencherCampos();
            } else {
                ?><script>resultadoPositivo("Cadastrado com Sucesso!");</script><?php
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
            $("#txtPrecoCusta").val("<?=$precoCusto?>");
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