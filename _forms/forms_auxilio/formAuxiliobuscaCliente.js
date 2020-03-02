//Js com intuito de efetuar busca no banco de dados na tabela cliente via Ajax
$(function(){
   $("#btnBuscarCliente").on("click",function(){
       var busca=$("#txtBuscaCliente").val();
        $("#tableBuscaCli").html("");
        $.post("../forms_auxilio/formAuxiliobuscaCliente.php",{ nome: busca},function(msg){ $("#tableBuscaCli").html(msg); });
   }); 
    
});