$(function(){
    
            $("select").on("change",function(){
                alteraPropTxt(this);
            });
});
        function alteraPropTxt(objeto){
            var classe=$("option:selected", objeto).prop("class");
            if (classe=="optData") $("#txtBusca").attr({type: "date"});
            else if (classe=="optNumero") $("#txtBusca").attr({type: "number"});
            else if (classe=="optTexto") $("#txtBusca").attr({type: "text"});
        }
