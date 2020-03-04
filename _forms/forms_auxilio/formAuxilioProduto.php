<script src="../forms_auxilio/formAuxiliobusca.js"></script>
<script src="../../_js/jquery-3.4.1.min.js"></script>
<script>
    $(function(){
        $("#tableBusca").on("click","tr",function(){
            var codigo=$("td",this).html();
            if (typeof codigo!="undefined"){
                $("#txtCodigo").val(codigo);
                buscar();
                resetFormProduto();
                $(".form_busca_produto").css({display: "none"});
                
            }
        });
        resetFormProduto();
    });
    
function resetFormProduto(){
    
    $("#txtFormAuxBuscaProduto").val("");
    $.post("../forms_auxilio/ajaxformAuxiliobusca.php",{ nome: "",form: "produto"},function(msg){ $("#tableBusca").html(msg); }); //Preencher 
}
</script>
    <div class="form_busca_produto form_auxiliar">
            <span style="float:right;cursor:pointer;" onclick="javascript:$('.form_busca_produto').css({display : 'none'});">X</span>
            <input type="text" id="txtFormAuxBuscaProduto" class="txtBox" placeholder="Buscar"><br>
            <button id="btnFormAuxBuscarProduto" name="btnBuscarProduto">Buscar</button>
            <table border="1" id="tableBusca">
            <tr>
                <th>Código</th>
                <th>Descrição</th>
                <th>Categoria</th>
                <th>SubCategoria</th>
                <th>Fornecedor</th>
                <th>Preço</th>
            </tr>
            </table>
        </div>
<?php

?>