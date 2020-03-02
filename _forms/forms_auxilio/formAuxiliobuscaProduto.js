//Posteriormente faria apenas um arquivo JS tanto para produto quanto para cliente.. colocarei uma id única para o botão de pesquisa mas com um nome diferente para diferenciar os forms.
$(function(){
   $("#btnBuscarProduto").on("click",function(){
       var busca=$("#txtBuscaProduto").val();
        $("#tableBusca").html("");
        $.post("../forms_auxilio/formAuxiliobuscaProduto.php",{ nome: busca},function(msg){ $("#tableBusca").html(msg); });
   }); 
    
});