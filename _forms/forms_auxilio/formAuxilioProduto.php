     <script src="../forms_auxilio/formAuxiliobuscaProduto.js"></script>
    <script src="../../_js/jquery-3.4.1.min.js"></script>
<script>
    $(function(){
        $("#tableBusca").on("click","tr",function(){
            var codigo=$("td",this).html();
            $("#txtCodigo").val(codigo);
            buscar();
            $(".form_busca_produto").css({display: "none"});
        });
        $.post("../forms_auxilio/formAuxiliobuscaProduto.php",{ nome: ""},function(msg){ $("#tableBusca").html(msg); }); //Preencher tabela.
    });

</script>
    <div class="form_busca_produto form_auxiliar">
            <span style="float:right;cursor:pointer;" onclick="javascript:$('.form_busca_produto').css({display : 'none'});">X</span>
            <input type="text" id="txtBuscaProduto" class="txtBox" placeholder="Buscar"><br>
            <button id="btnBuscarProduto">Buscar</button>
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
require_once("../forms_auxilio/funcoesFormAuxilioProduto.php");
//preencheListaBusca(Produto::buscar(array("descricao"=>"")));
?>