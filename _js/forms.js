$(function(){
            $("select").on("change",function(){
                var classe=$("option:selected", this).prop("class");
                if (classe=="optData") $("#txtBusca").attr({type: "date"});
                else if (classe=="optNumero") $("#txtBusca").attr({type: "number"});
                else if (classe=="optTexto") $("#txtBusca").attr({type: "text"});
            });
});
        function resultadoPositivo(text){
        $("#resultadoPositivo").css({display: "block"});
        $("#resultadoPositivo").html(text);
    }
        function resultadoNegativo(text){
        $("#resultadoNegativo").css({display: "block"});
        $("#resultadoNegativo").html(text);
    }
