<script src="../forms_auxilio/formAuxiliobusca.js"></script>
<script src="../../_js/jquery-3.4.1.min.js"></script>
<script>
    $(function(){
        $("#tableBuscaCli").on("click","tr",function(){
            var codigo=$("td",this).html();
            if (typeof codigo!="undefined"){
                $("#txtCodigoCli").val(codigo);
                buscarCli();
                resetFormCliente();
                $("#modalBuscaCliente .close").click();
                $("#modalBuscaCliente .close").trigger("click"); 
                 
            }
        });
        resetFormCliente();
        //Preencher tabela.
   
    });
    function resetFormCliente(){
        $("#txtFormAuxBuscaCliente").val("");
        $.post("../forms_auxilio/ajaxformAuxiliobusca.php",{ nome: "", form: "cliente"},function(msg){ $("#tableBuscaCli").html(msg); }); 
    }
</script>
<style>
    td{
        cursor: pointer;
    }
</style>
    <div class="modal fade" tabindex="-1" id="modalBuscaCliente" role="dialog">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Buscar por Cliente Pessoa Física</h5>
                <button class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" id="txtFormAuxBuscaCliente" class="form-control w-100" placeholder="Buscar">
                    </div>
                    <div class="form-group col-md-4">
                        <select id="txtCampoPesquisaCliente" name="txtCampoPesquisaCliente" class="form-control w-100">
                        <option value="nome">Nome</option>
                        <option value="cod">Código</option>
                        <option value="cpf">CPF</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <button id="btnFormAuxBuscarCliente" name="btnBuscarCliente" class="btn btn-primary w-100">Buscar</button>
                    </div>
                    
                </div>
            
            <table id="tableBuscaCli" class="table table-responsive-md table-hover table-dark table-bordered table-striped text-center">
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>CPF</th>
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