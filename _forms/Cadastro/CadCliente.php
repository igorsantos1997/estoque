
<html>
    <head>
        
        <link rel="stylesheet" href="../../_css/layout.css">
        <script src="../../_js/jquery-3.4.1.min.js"></script>
        <script src="../../_js/forms.js"></script>
        
        <script>

        </script>
        <meta charset="utf-8">
    </head>
    <body>
        <div id="resultadoPositivo"></div>
        <div id="resultadoNegativo"></div>
        <p class="form_titulo">Cadastro de Cliente PF</p>
        <div id="resultado"></div>
            <form method="post">
                <label for="txtCodigo">Código</label><input type="number" placeholder="Código" name="txtCodigo" id="txtCodigo" class="txtBox">(Código gerado automaticamente caso campo estaja vazio!)<br>
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
                <button id="btnCadastrar">Cadastrar</button>
            </form>
    </body>
</html>
<?php
    require_once("../../config.php");
    
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
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

        $cliente = new Cliente($codigo,$nome,$nascimento,$sexo,$telefone,$celular,$rg,$cpf,$endereco,$email,$obs);
        if($cliente->getByCodigo()){
            ?><script>resultadoNegativo("Código já existente! Favor alterar código.");</script><?php
            preencherCampos();
        }
        else {
            if (!$cliente->inserir()){
                ?><script>resultadoNegativo("Erro ao Cadastrar. Se erro persistir, favor contactar o administrador.");</script><?php
                 
                preencherCampos();
            } else {
                ?><script>resultadoPositivo("Cadastrado com Sucesso!");</script><?php
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
