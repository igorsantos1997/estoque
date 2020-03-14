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
               $("#modalBuscaProduto .close").click();
                $("#modalBuscaProduto .close").trigger("click"); 
                
            }
        });
        resetFormProduto();
    });
    
function resetFormProduto(){
    
    $("#txtFormAuxBuscaProduto").val("");
    $.post("../forms_auxilio/ajaxformAuxiliobusca.php",{ nome: "",form: "produto"},function(msg){ $("#tableBusca").html(msg); }); //Preencher 
}
</script>
<style>
    td{
        cursor: pointer;
    }
</style>
<div class="modal fade" tabindex="-1" id="modalBuscaProduto" role="dialog">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Buscar por Produto</h5>
                <button class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" id="txtFormAuxBuscaProduto" class="form-control w-100" placeholder="Buscar">
                    </div>
                    <div class="form-group col-md-4">
                        <select id="txtCampoPesquisaProduto" name="txtCampoPesquisaProduto" class="form-control w-100">
                            <option value="descricao">Produto</option>
                            <option value="cod">Código</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <button id="btnFormAuxBuscarProduto" name="btnBuscarProduto" class="btn btn-primary w-100">Buscar</button>
                    </div>
                    
                </div>
            
            <table id="tableBusca" class="table table-responsive-md table-hover table-dark table-bordered table-striped text-center">
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
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal">Fechar</button>
            </div>
            
        </div>
    </div>
</div>
<?php

?>