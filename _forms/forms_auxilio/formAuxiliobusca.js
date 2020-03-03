//Js com intuito de efetuar busca no banco de dados na tabela cliente via Ajax
$(function(){
   $("#btnFormAuxBuscarCliente").on("click",{nome: $("#btnFormAuxBuscarCliente").prop("name") },formAuxBusca);
    $("#btnFormAuxBuscarProduto").on("click",{nome: $("#btnFormAuxBuscarProduto").prop("name") },formAuxBusca);
   
});

function formAuxBusca(event){ 
    var nome=event.data.nome;
    var tabela="";
    var caminhoJson="";
    var busca="";
    var form="";
    if (nome=="btnBuscarCliente"){
       busca=$("#txtFormAuxBuscaCliente").val();
       tabela="#tableBuscaCli";
       caminhoJson="../forms_auxilio/JsonformAuxiliobusca.php";
        form="cliente";
    } 
    else if (nome=="btnBuscarProduto"){
       busca=$("#txtFormAuxBuscaProduto").val();
       tabela="#tableBusca";
       caminhoJson="../forms_auxilio/JsonformAuxiliobusca.php";
        form="produto";
    } 
    $(tabela).html("");
    $.post(caminhoJson,{ nome: busca, form: form},function(msg){ $(tabela).html(msg); });
}