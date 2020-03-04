<html>
    <head>
        <link rel="stylesheet" href="../../_css/layout.css">
        <script src="../../_js/jquery-3.4.1.min.js"></script>
        <script src="../../_js/forms.js"></script>
        <meta charset="utf-8">
        <script>
            $(function(){
                $("#btnFormAuxCli").on("click",function(){
                
                $(".form_busca_cliente").css({display: "block"});                     
                });
            });
            function buscarCli(){
                var codigo=$("#txtCodigoCli").val();
                var campo="cod";
                $.post("ajax/ajaxBuscaCliente.php",{nome: codigo, campo: campo},function(result){
                   
                    var resultado=result.split(';');
                    var nome=resultado[0];
                    var nascimento=resultado[1];
                    var sexo=resultado[2];
                    var telefone=resultado[3];
                    var celular=resultado[4];
                    var rg=resultado[5];
                    var cpf=resultado[6];
                    var endereco=resultado[7];
                    var email=resultado[8];
                    var obs=resultado[9];
                    
                    $("#txtNome").val(nome);
                    $("#txtNascimento").val(nascimento);
                    $("#txtSexo").val(sexo);
                    $("#txtTelefone").val(telefone);
                    $("#txtCelular").val(celular);
                    $("#txtRg").val(rg);
                    $("#txtCpf").val(cpf);
                    $("#txtEndereco").val(endereco);
                    $("#txtEmail").val(email);
                    $("#txtObs").val(obs);
                    
                });
                $("#txtEditar").prop("value","s");
                $("#btnCadastrar").html("Editar");
                
            }
        </script>
    </head>
    <body>
        <?php require_once ("..".DIRECTORY_SEPARATOR."forms_auxilio".DIRECTORY_SEPARATOR."formAuxilioCliente.php")?>
        <div id="resultadoPositivo"></div>
        <div id="resultadoNegativo"></div>
        <p class="form_titulo">Cadastrar/editar Cliente Pessoa Física</p>
        <div id="resultado"></div>
            <form method="post">
                <label for="txtCodigoCli">Código</label><input type="number" placeholder="Código" name="txtCodigoCli" id="txtCodigoCli" class="txtBox"><button id="btnFormAuxCli" class="btnLupa" type="button"></button>(Código gerado automaticamente caso campo estaja vazio!)<br>
                <label for="txtNome">Nome</label><input type="text" placeholder="Nome" name="txtNome" id="txtNome" class="txtBox"><br>
                <label for="txtNascimento">Nascimento</label><input type="date" placeholder="Data de Nascimento" name="txtNascimento" id="txtNascimento" class="txtBox"><br>
                <label for="txtSexo">Sexo</label><select name="txtSexo" id="txtSexo" class="txtBox">
                    <option value="M">M</option>
                    <option value="F">F</option>
                </select><br>
                <label for="txtTelefone">Telefone</label><input type="tel" placeholder="Telefone" name="txtTelefone" id="txtTelefone" class="txtBox">
                <label for="txtCelular">Celular</label><input type="tel" placeholder="Celular" name="txtCelular" id="txtCelular" class="txtBox"><br>
                <label for="txtRg">RG</label><input type="text" placeholder="RG" name="txtRg" id="txtRg" class="txtBox"><br>
                <label for="txtCpf">CPF</label><input type="text" placeholder="CPF" name="txtCpf" id="txtCpf" class="txtBox"><br>
                <label for="txtEndereco">Endereço</label><input type="text" placeholder="Endereço" name="txtEndereco" id="txtEndereco" class="txtBox"><br>
                <label for="txtEmail">Email</label><input type="email" placeholder="Email" name="txtEmail" id="txtEmail" class="txtBox"><br>
                <label for="txtObs">Observações</label><input type="text" placeholder="Observações" name="txtObs" id="txtObs" class="txtBox"><br>
                <input type="hidden" name="txtEditar" id="txtEditar" value="n">
                <button id="btnCadastrar">Cadastrar</button>
            </form>
    </body>
</html>
<?php
    require_once("../../config.php");
    
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
       
        $codigo=$_POST["txtCodigoCli"];
        $nome=$_POST["txtNome"];
        $nascimento=$_POST["txtNascimento"];
        $sexo=$_POST["txtSexo"];
        $telefone=$_POST["txtTelefone"];
        $celular=$_POST["txtCelular"];
        $rg=$_POST["txtRg"];
        $cpf=$_POST["txtCpf"];
        $endereco=$_POST["txtEndereco"];
        $email=$_POST["txtEmail"];
        $obs=$_POST["txtObs"];
        $editar=$_POST["txtEditar"];
        $cliente = new Cliente($codigo,$nome,$nascimento,$sexo,$telefone,$celular,$rg,$cpf,$endereco,$email,$obs);

        if($cliente->getByCodigo(true) and $editar=="n"){
            ?><script>resultadoNegativo("Código já existente! Favor alterar código.");</script><?php
            preencherCampos();
        } elseif(empty($nome)) {
            ?><script>resultadoNegativo("Nome não pode ficar vazio.");</script><?php
            preencherCampos();
        }
        else {
            if ($editar=="s"){
                        if (!$cliente->atualizar()){
                            ?><script>resultadoNegativo("Erro ao Atualizar. Se erro persistir, favor contactar o administrador.");</script><?php
                            preencherCampos();
                        } else {
                            ?><script>resultadoPositivo("Atualizado com Sucesso!");</script><?php
                        } 
            }
            else{
                        if (!$cliente->inserir()){
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
        $nome=$_POST["txtNome"];
        $nascimento=$_POST["txtNascimento"];
        $sexo=$_POST["txtSexo"];
        $telefone=$_POST["txtTelefone"];
        $celular=$_POST["txtCelular"];
        $rg=$_POST["txtRg"];
        $cpf=$_POST["txtCpf"];
        $endereco=$_POST["txtEndereco"];
        $email=$_POST["txtEmail"];
        $obs=$_POST["txtObs"];
    // INICIO: PREENCHER CAMPOS, CASO HAJA ERRO
                ?>
                <script>
                    $("#txtCodigo").val("<?=$codigo?>");
                    $("#txtNome").val("<?=$nome?>");
                    $("#txtNascimento").val("<?=$nascimento?>");
                    $("#txtSexo").val("<?=$sexo?>");
                    $("#txtTelefone").val("<?=$telefone?>");
                    $("#txtCelular").val("<?=$celular?>");
                    $("#txtRg").val("<?=$rg?>");
                    $("#txtCpf").val("<?=$cpf?>");
                    $("#txtEndereco").val("<?=$endereco?>");
                    $("#txtEmail").val("<?=$email?>");
                    $("#txtObs").val("<?=$obs?>");

                </script>
                <?php
}
        ?>
