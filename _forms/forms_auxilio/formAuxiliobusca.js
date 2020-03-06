//Js com intuito de efetuar busca no banco de dados na tabela cliente via Ajax
//Basicamente controla os clicks dos buttons e encaminha para a busca
$(function(){
    $("#btnFormAuxBuscarCliente").on("click",{nome: $("#btnFormAuxBuscarCliente").prop("name") },formAuxBusca);
    $("#btnFormAuxBuscarClientePj").click({nome: $("#btnFormAuxBuscarClientePj").prop("name") }, formAuxBusca);
    $("#btnFormAuxBuscarFornecedor").click({nome: $("#btnFormAuxBuscarFornecedor").prop("name") }, formAuxBusca);
    $("#btnFormAuxBuscarProduto").on("click",{nome: $("#btnFormAuxBuscarProduto").prop("name") },formAuxBusca);
   
});
 
function formAuxBusca(event){ 
    var nome=event.data.nome;
    //var campo=event.data.campo;
    var tabela="";
    var caminhoajax="";
    var busca="";
    var form="";
    var campo="";
    if (nome=="btnBuscarCliente"){
        busca=$("#txtFormAuxBuscaCliente").val();
        tabela="#tableBuscaCli";
        form="cliente";
        caminhoajax="../forms_auxilio/ajaxformAuxiliobusca.php";
        campo=$("#txtCampoPesquisaCliente").val();
        $.post(caminhoajax,{ nome: busca, form: form, campo: campo},function(msg){ $(tabela).html(msg); });
    } 
    else if (nome=="btnBuscarProduto"){
        busca=$("#txtFormAuxBuscaProduto").val();
        tabela="#tableBusca";
        form="produto";
        caminhoajax="../forms_auxilio/ajaxformAuxiliobusca.php";
        campo=$("#txtCampoPesquisaProduto").val();
        $.post(caminhoajax,{ nome: busca, form: form, campo: campo},function(msg){ $(tabela).html(msg); });
    }     
    else if (nome=="btnBuscarClientePj"){
        busca=$("#txtFormAuxBuscaClientePj").val();
        tabela="#tableBuscaCliPj";
        form="clientePj";
        caminhoajax="../forms_auxilio/ajaxformAuxiliobusca.php";
        campo=$("#txtCampoPesquisaClientePj").val();
        
        $.post(caminhoajax,{ nome: busca, form: form, campo: campo},function(msg){ $(tabela).html(msg); });
    } 
    else if (nome=="btnBuscarFornecedor"){
        busca=$("#txtFormAuxBuscaFornecedor").val();
        tabela="#tableBuscaFornecedor";
        form="fornecedor";
        caminhoajax="../forms_auxilio/ajaxformAuxiliobusca.php";
        campo=$("#txtCampoPesquisaFornecedor").val();
        $.post(caminhoajax,{ fornecedor: busca, form: form, campo:campo},function(msg){ $(tabela).html(msg); });
    } 
    $(tabela).html("");
   
}