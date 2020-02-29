<html>
    <head>
        <link rel="stylesheet" href="../../_css/layout.css">
        <script src="../../_js/jquery-3.4.1.min.js"></script>
        <script src="../../_js/forms.js"></script>
        <meta charset="utf-8">
    </head>
        <div id="resultadoPositivo"></div>
        <div id="resultadoNegativo"></div>
        <p class="form_titulo">Cadastro de Cliente PJ</p>
    <form method="post">
        <label for="txtCodigo">Código</label><input type="number" placeholder="Código" name="txtCodigo" id="txtCodigo" class="txtBox">(Código gerado automaticamente caso campo estaja vazio!)<br>
        <label for="txtRazaoSocial">Razão Social</label><input type="text" placeholder="Razão Social" name="txtRazaoSocial" id="txtRazaoSocial" class="txtBox"><br>
        <label for="txtNomeFantasia">Nome Fantasia</label><input type="text" placeholder="Nome Fantasia" name="txtNomeFantasia" id="txtNomeFantasia" class="txtBox"><br>
        <label for="txtTelefone">Telefone</label><input type="tel" placeholder="Telefone" name="txtTelefone" id="txtTelefone" class="txtBox">
        <label for="txtCelular">Celular</label><input type="tel" placeholder="Celular" name="txtCelular" id="txtCelular" class="txtBox"><br>
        <label for="txtCnpj">CNPJ</label><input type="text" placeholder="CNPJ" name="txtCnpj" id="txtCnpj" class="txtBox"><br>
        <label for="txtEndereco">Endereço</label><input type="text" placeholder="Endereço" name="txtEndereco" id="txtEndereco" class="txtBox"><br>
        <label for="txtEmail">Email</label><input type="email" placeholder="Email" name="txtEmail" id="txtEmail" class="txtBox"><br>
        <label for="txtIE">Inscrição Estadual</label><input type="text" placeholder="Incrição Estadual" name="txtIE" id="txtIE" class="txtBox"><br>
        <input type="checkbox" name="chbxIsentoIe" id="chbxIsentoIe"><label for="chbxIsentoIe">Isento IE</label>
        <input type="checkbox" name="chbxContIcms" id="chbxContIcms"><label for="chbxContIcms">Contribuinte ICMS</label><br>
        <label for="txtObs">Observações</label><input type="text" placeholder="Observações" name="txtObs" id="txtObs" class="txtBox"><br>
        <button id="btnCadastrar">Cadastrar</button>
    </form>
</html>
<?php
    require_once("../../config.php");
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $codigo=$_POST["txtCodigo"];
        $razaoSocial=$_POST["txtRazaoSocial"];
        $nomeFantasia=$_POST["txtNomeFantasia"];
        $telefone=$_POST["txtTelefone"];
        $celular=$_POST["txtCelular"];
        $cnpj=$_POST["txtCnpj"];
        $endereco=$_POST["txtEndereco"];
        $email=$_POST["txtEmail"];
        $ie=$_POST["txtIE"];
        if (isset($_POST["chbxIsentoIe"])){
            $isentoIe="S";
        } else{
            $isentoIe="N";
        }
        if (isset($_POST["chbxContIcms"])){
            $contIcms="S";
        } else{
            $contIcms="N";
        }
        $obs=$_POST["txtObs"];
        
        $cliente= new Empresa($codigo,$nomeFantasia,$razaoSocial,$cnpj,$ie,$isentoIe,$contIcms,$telefone,$celular,$endereco,$email,$obs);
        if ($cliente->getByCodigo()){
             ?><script>resultadoNegativo("Código já existente! Favor alterar código.");</script><?php
        } else{
            if (!$cliente->inserir()){
                ?><script>resultadoNegativo("Erro ao Cadastrar. Se erro persistir, favor contactar o administrador.");</script><?php
                 
                preencherCampos();
            } else {
                ?><script>resultadoPositivo("Cadastrado com Sucesso!");</script><?php
            }
        }
       preencherCampos();
    }

    function preencherCampos(){
        $codigo=$_POST["txtCodigo"];
        $razaoSocial=$_POST["txtRazaoSocial"];
        $nomeFantasia=$_POST["txtNomeFantasia"];
        $telefone=$_POST["txtTelefone"];
        $celular=$_POST["txtCelular"];
        $cnpj=$_POST["txtCnpj"];
        $endereco=$_POST["txtEndereco"];
        $email=$_POST["txtEmail"];
        $ie=$_POST["txtIE"];
        if (isset($_POST["chbxIsentoIe"])){
            $isentoIe="S";
        } else{
            $isentoIe="N";
        }
        if (isset($_POST["chbxContIcms"])){
            $contIcms="S";
        } else{
            $contIcms="N";
        }
        $obs=$_POST["txtObs"];
        
        ?>
        <script>
            $("#txtCodigo").val("<?=$codigo?>");
            $("#txtRazaoSocial").val("<?=$razaoSocial?>");
            $("#txtNomeFantasia").val("<?=$nomeFantasia?>");
            $("#txtTelefone").val("<?=$telefone?>");
            $("#txtCelular").val("<?=$celular?>");
            $("#txtCnpj").val("<?=$cnpj?>");
            $("#txtEndereco").val("<?=$endereco?>");
            $("#txtEmail").val("<?=$email?>");
            $("#txtIE").val("<?=$ie?>");
            $("#txtObs").val("<?=$obs?>");
        </script>
        <?php 
            if ($isentoIe=="S"){
        ?><script>$("#chbxIsentoIe").prop("checked",true);</script><?php
            } 
            if ($contIcms=="S"){
        ?><script>$("#chbxContIcms").prop("checked",true);</script><?php
            }
            
            ?>
        
        <?php
    }
?>