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
                $("#modalBuscaClientePj .close").click();
                $("#modalBuscaClientePj .close").trigger("click"); 
                
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
<style>
    td{
        cursor: pointer;
    }
</style>
 <div class="modal fade" tabindex="-1" id="modalBuscaClientePj" role="dialog">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Buscar por Cliente Pessoa Jurídica</h5>
                <button class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" id="txtFormAuxBuscaClientePj" class="form-control w-100" placeholder="Buscar">
                    </div>
                    <div class="form-group col-md-4">
                        <select id="txtCampoPesquisaClientePj" name="txtCampoPesquisaClientePj" class="form-control w-100">
                        <option value="razaoSocial">Razão Social</option>
                        <option value="nomeFantasia">Nome Fantasia</option>
                        <option value="cod">Código</option>
                        <option value="cnpj">CNPJ</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <button id="btnFormAuxBuscarClientePj" name="btnBuscarClientePj" class="btn btn-primary w-100">Buscar</button>
                    </div>
                    
                </div>
            
            <table id="tableBuscaCliPj" class="table table-responsive-md table-hover table-dark table-bordered table-striped text-center">
                <tr>
                <th>Código</th>
                <th>Razão Social</th>
                <th>Nome Fantasia</th>
                <th>CNPJ</th>
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