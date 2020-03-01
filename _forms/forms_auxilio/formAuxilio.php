    <script src="../forms_auxilio/formAuxiliobusca.js"></script>
    <script src="../../_js/jquery-3.4.1.min.js"></script>
    <div class="busca_produto">
            <span style="float:right;cursor:pointer;" onclick="javascript:$('.busca_produto').css({display : 'none'});">X</span>
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
require_once("../forms_auxilio/funcoesFormAuxilio.php");
preencheListaBusca(Produto::buscar(array("descricao"=>"")));
?>