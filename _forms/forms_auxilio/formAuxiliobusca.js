$(function(){
   $("#btnBuscarProduto").on("click",function(){
       var busca=$("#txtBuscaProduto").val();
        $("#tableBusca").html("");
        $.post("../forms_auxilio/formAuxiliobuscaProduto.php",{ nome: busca},function(msg){ $("#tableBusca").html(msg); });
   }); 
    
    
});