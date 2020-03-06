<script src="../forms_auxilio/formAuxiliobusca.js"></script>
<script src="../../_js/jquery-3.4.1.min.js"></script>
<script>
    $(function(){
        $("#tableBuscaFornecedor").on("click","tr",function(){
            
            var codigo=$("td",this).html();
            if (typeof codigo!="undefined"){
                $("#txtCodigoCliPj").val(codigo);
                buscarFornecedor();
                resetFormFornecedor();
                $(".form_busca_fornecedor").css({display: "none"});
                
            }
        });
        resetFormFornecedor();
    });
    function resetFormFornecedor(){
        $("#txtFormAuxBuscaFornecedor").val("");
        $.post("../forms_auxilio/ajaxformAuxiliobusca.php",{ fornecedor: "", form: "fornecedor"},function(msg){                                     $("#tableBuscaFornecedor").html(msg); 
        }); 
    }
</script>
    <div class="form_busca_fornecedor form_auxiliar">
            <span style="float:right;cursor:pointer;" onclick="javascript:$('.form_busca_fornecedor').css({display : 'none'});">X</span>
            <input type="text" id="txtFormAuxBuscaFornecedor" class="txtBox" placeholder="Buscar">
            
            <select id="txtCampoPesquisaFornecedor" name="txtCampoPesquisaFornecedor" class="txtBox">
                <option value="cod">Código</option>
                <option value="razaoSocial">Razão Social</option>
                <option value="nomeFantasia">Nome Fantasia</option>
                
            </select>
            <br>
            <button id="btnFormAuxBuscarFornecedor" name="btnBuscarFornecedor">Buscar</button>
            <table border="1" id="tableBuscaFornecedor">
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