<script src="../forms_auxilio/formAuxiliobusca.js"></script>
<script src="../../_js/jquery-3.4.1.min.js"></script>
<script>
    $(function(){
        $("#tableBuscaCliPj").on("click","tr",function(){
            var codigo=$("td",this).html();
            if (typeof codigo!="undefined"){
                $("#txtCodigoCliPj").val(codigo);
                buscarCliPj();
                resetFormClientePj();
                $(".form_busca_cliente_pj").css({display: "none"});
                
            }
        });
        $("#txtCampoPesquisaClientePj").click(function(){
           
        });
        resetFormClientePj();
        //Preencher tabela.
   
    });
    function resetFormClientePj(){
        $("#txtFormAuxBuscaClientePj").val("");
        $.post("../forms_auxilio/ajaxformAuxiliobusca.php",{ nome: "", form: "clientePj"},function(msg){ $("#tableBuscaCliPj").html(msg); }); 
    }
</script>
    <div class="form_busca_cliente_pj form_auxiliar">
            <span style="float:right;cursor:pointer;" onclick="javascript:$('.form_busca_cliente_pj').css({display : 'none'});">X</span>
            <input type="text" id="txtFormAuxBuscaClientePj" class="txtBox" placeholder="Buscar">
            <select id="txtCampoPesquisaClientePj" name="txtCampoPesquisaClientePj" class="txtBox">
                <option value="razaoSocial">Razão Social</option>
                <option value="nomeFantasia">Nome Fantasia</option>
                <option value="cod">Código</option>
                <option value="cnpj">CNPJ</option>
            </select>
            <br>
            <button id="btnFormAuxBuscarClientePj" name="btnBuscarClientePj">Buscar</button>
            <table border="1" id="tableBuscaCliPj">
            <tr>
                <th>Código</th>
                <th>Razão Social</th>
                <th>Nome Fantasia</th>
                <th>CNPJ</th>
            </tr>
            </table>
        </div>
<?php
?>