    <script src="../forms_auxilio/formAuxiliobuscaCliente.js"></script>
    <script src="../../_js/jquery-3.4.1.min.js"></script>
<script>
    $(function(){
        $("#tableBuscaCli").on("click","tr",function(){
            var codigo=$("td",this).html();
            $("#txtCodigoCli").val(codigo);
            buscarCli();
            $(".form_busca_cliente").css({display: "none"});
        });
    });
</script>
    <div class="form_busca_cliente form_auxiliar">
            <span style="float:right;cursor:pointer;" onclick="javascript:$('.form_busca_cliente').css({display : 'none'});">X</span>
            <input type="text" id="txtBuscaCliente" class="txtBox" placeholder="Buscar"><br>
            <button id="btnBuscarCliente">Buscar</button>
            <table border="1" id="tableBuscaCli">
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>CPF</th>
            </tr>
            </table>
        </div>
<?php
require_once("../forms_auxilio/funcoesFormAuxilioCliente.php");
preencheListaBuscaCli(Cliente::buscar(array("nome"=>"")));
?>