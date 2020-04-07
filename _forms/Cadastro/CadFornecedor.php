<html>
    <head>
        <link rel="stylesheet" href="../../_css/layout.css">
        <link rel="stylesheet" href="../../_lib/bootstrap/dist/css/bootstrap.css">
        <script src="../../_js/jquery-3.4.1.min.js"></script>
        <script src="../../_js/forms.js"></script>
        <meta charset="utf-8">
        <script>
            $(function(){
                $("#btnFormAuxFornecedor").on("click",function(){
                
                $(".form_busca_fornecedor").css({display: "block"});                     
                });
                $("#btnExcluir").hide();
                $("#btnExcluir").on("click",function(){
                    modalConfirm("Excluir","Confirmar Exclusão?","excluir");
                });
                $("#modalConfirmSim").on("click",function(){
                    var nome=$("#modalConfirmSim").prop("name");
                    if (nome=="excluir"){
                        
                       $.post("ajax/ajaxApagaFornecedor.php",{codigo: $("#txtCodigoCliPj").val()}).done(function(result){
                            resetCampos();
                            resetFormFornecedor();
                           if (result=="apagado"){
                               modalAviso("Sucesso","Apagado com sucesso!");
                           } else if (result=="erro"){
                               modalAviso("Erro","Erro ao apagar! Se erro persistir, favor contactar o adminstrador.");
                           }
                           else if (result=="codigo_nao_encontrado"){
                               modalAviso("Erro","Código não encontrado. Favor verificar campo código!");
                           }
                       });
                    }
                });
            });
            function resetCampos(){
                $("input").each(function(){
                    $(this).val("");
                });
                $("#btnExcluir").hide();
            }
            function buscarFornecedor(){
                var codigo=$("#txtCodigoCliPj").val();
                var campo="cod";
                $.post("ajax/ajaxBuscaFornecedor.php",{codigo: codigo, campo: campo},function(result){

                    var resultado=result.split(';');
                    var razaoSocial=resultado[0];
                    var nomeFantasia=resultado[1];
                    var telefome=resultado[2];
                    var celular=resultado[3];
                    var cnpj=resultado[4];
                    var endereco=resultado[5];
                    var email=resultado[6];
                    var ie=resultado[7];
                    var isentoIe=resultado[8];
                    var contIcms=resultado[9];
                    var obs=resultado[10];
                    
                    $("#txtRazaoSocial").val(razaoSocial);
                    $("#txtNomeFantasia").val(nomeFantasia);
                    $("#txtTelefone").val(telefome);
                    $("#txtCelular").val(celular);
                    $("#txtCnpj").val(cnpj);
                    $("#txtEndereco").val(endereco);
                    $("#txtEmail").val(email);
                    $("#txtIE").val(ie);
                    
                    if (isentoIe=="S") $("#chbxIsentoIe").prop("checked",true);
                    if (contIcms=="S") $("#chbxContIcms").prop("checked",true);
                    
                    
                    $("#txtObs").val(obs);
                    
                });
                $("#txtEditar").prop("value","s");
                $("#btnCadastrar").html("Editar");
                $("#btnExcluir").show();
            }
        </script>
    </head>
        <?php require_once ("..".DIRECTORY_SEPARATOR."forms_auxilio".DIRECTORY_SEPARATOR."formAuxilioFornecedor.php")?>
        <p class="form_titulo">Cadastro de Fornecedor</p>
    <form method="post">
      <div class="form-row">
            <div class="form-group col-md-2">
                <label for="txtCodigoCliPj">Código</label>
                <div class="form-inline">
                    <input type="number" placeholder="Código" name="txtCodigoCliPj" id="txtCodigoCliPj" class="form-control w-75"><button id="btnFormAuxFornecedor" class="btnLupa" type="button" data-toggle="modal" data-target="#modalBuscaFornecedor"></button>
                </div>
            </div>
            <div class="form-group col-md-5">
                <label for="txtRazaoSocial">Razão Social</label><input type="text" placeholder="Razão Social" name="txtRazaoSocial" id="txtRazaoSocial" class="form-control w-100">
            </div>
            <div class="form-group col-md-5">
             <label for="txtNomeFantasia">Nome Fantasia</label><input type="text" placeholder="Nome Fantasia" name="txtNomeFantasia" id="txtNomeFantasia" class="form-control w-100">
            </div>
        </div>
       
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="txtTelefone">Telefone</label><input type="tel" placeholder="Telefone" name="txtTelefone" id="txtTelefone" class="form-control">
            </div>
            <div class="form-group col-md-4">
                 <label for="txtCelular">Celular</label><input type="tel" placeholder="Celular" name="txtCelular" id="txtCelular" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label for="txtEmail">Email</label><input type="email" placeholder="Email" name="txtEmail" id="txtEmail" class="form-control">
            </div>
        </div>
       
       <div class="form-row">
            <div class="form-group col-md-6">
        <label for="txtCnpj">CNPJ</label><input type="text" placeholder="CNPJ" name="txtCnpj" id="txtCnpj" class="form-control w-100">
            </div>
           <div class="form-group col-md-6">
               <label for="txtIE">Inscrição Estadual</label><input type="text" placeholder="Incrição Estadual" name="txtIE" id="txtIE" class="form-control w-100">
           </div>
         </div>
         <div class="form-row">
            <div class="form-group col-md-12">
                <label for="chbxIsentoIe" class="form-check-label">Isento IE</label>
                <input type="checkbox" name="chbxIsentoIe" id="chbxIsentoIe" class="form-check-input">
            </div>
        </div>
         <div class="form-row">
            <div class="form-group col-md-12">
               <label for="chbxContIcms" class="form-check-label"> Contribuinte ICMS</label><input type="checkbox" name="chbxContIcms" id="chbxContIcms" class="form-check-input">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
         <label for="txtEndereco">Endereço</label><input type="text" placeholder="Endereço" name="txtEndereco" id="txtEndereco" class="form-control w-100">
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="txtObs">Observações</label><textarea placeholder="Observações" name="txtObs" id="txtObs" class="form-control"></textarea>
            </div>
            
        </div>
        
        <input type="hidden" name="txtEditar" id="txtEditar" value="n">
        
        <div class="form-row">
            <button id="btnCadastrar" class="btn btn-primary ml-2 w-25">Cadastrar</button>
            <button id="btnExcluir" type="button" class="btn btn-danger ml-auto mr-2 w-25">Excluir</button>
        </div>
    </form>
    <?php require_once("..".DIRECTORY_SEPARATOR."modalAviso.php"); ?>
                 <script src="../../_lib/jquery/dist/jquery.js"></script>
        <script src="../../_lib/popper.js/dist/umd/popper.js"></script>
        <script src="../../_lib/bootstrap/dist/js/bootstrap.js"></script>
</html>
<?php
    require_once("../../config.php");
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $codigo=$_POST["txtCodigoCliPj"];
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
        $editar=$_POST["txtEditar"];
        
        $fornecedor= new Fornecedor($codigo,$nomeFantasia,$razaoSocial,$cnpj,$ie,$isentoIe,$contIcms,$telefone,$celular,$endereco,$email,$obs);
        if($fornecedor->getByCodigo(true) and $editar=="n"){
            ?><script>modalAviso("Erro","Código já existente! Favor alterar código.");</script><?php
            preencherCampos();
        } elseif(empty($razaoSocial) and empty($nomeFantasia)) {
            ?><script>modalAviso("Erro","Insira razão social ou nome fantasia!");</script><?php
            preencherCampos();
        }
        else {
            if ($editar=="s"){
                        if (!$fornecedor->atualizar()){
                            ?><script>modalAviso("Erro","Erro ao Atualizar. Se erro persistir, favor contactar o administrador.");</script><?php
                            preencherCampos();
                        } else {
                            ?><script>modalAviso("Sucesso","Atualizado com Sucesso!");</script><?php
                        } 
            }
            else{
                        if (!$fornecedor->inserir()){
                            ?><script>modalAviso("Erro","Erro ao Cadastrar. Se erro persistir, favor contactar o administrador.");</script><?php
                            preencherCampos();
                        } else {
                            ?><script>modalAviso("Sucesso","Cadastrado com Sucesso!");</script><?php
                        } 
            }

        }
       
    }

    function preencherCampos(){
        $codigo=$_POST["txtCodigoCliPj"];
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