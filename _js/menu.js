$(function (e){
     $(".menu_box").hide(); 
    menu=""; 
        $.getJSON("menu.json", function(result){
        
         $.each(result, function(valor,id){
            criaMenu(valor, id);
             
        });
        $(".menu").html(menu);
        
    });
    
    function criaSubMenu(result){
        
        menu+="<ul class='sub-menu'>";
        $.each(result,function (num, valor){ //Retorna o array como os valores.. 
            $.each(valor,function (valor, id){
                menu+="<li class='sub-menu-item'><a href='#' id='"+id+"'>"+valor+"</a></li>";
            });
            
        });
        menu+="</ul></li>"
    }
    function criaMenu(valor, id){ //Primeiro há uma leitura do json, depois joga o resultado aqui.
       
        menu+="<li class='item'><a href='#' ";
        
        if (Array.isArray(id)){ //se o id for um array, joga o valor na funç criaSubMenu
            menu+=">"+valor+"</a>";
            criaSubMenu(id);
        } else {
            menu+="id='"+id+"'>"+valor+"</a></li>";
        }
        
    }

    
    function menu_box(args){
        var html="<span style='float:right;cursor:pointer;font-size:1.2em;padding: 6px;' id='fechar_menu_box'>X</span>";
        html+="<ul>";
        for (var i=0;i<args.length;i++){
            var item=args[i].split(':')[0];
            var path=args[i].split(':')[1];
            path=path.replace(",",""); //Esse valor está vindo com uma vírgula no final :(
            html+="<li><a href='#' id='"+path+"'>"+item+"</li>"
        }
        html+="</ul>";
       
        $(".menu_box").html(html);
        $(".menu_box").show();
        
    }
    $(document).on("click","li a",function(){
       $(".menu_box").hide(); 
    });
    
    $(document).on("click","#fechar_menu_box",function(){$(".menu_box").hide()});
    
    $(document).on("click",".dropdown-menu a",function(){
        var id=$(this).attr("id").split("_");
        var pasta=id[0];
        var arquivo=id[1];
        
        if (pasta=="box"){ //Gambiarra louca aqui.
            $.getJSON("box.json",function (result){
                $.each(result,function(valor,id){
                    
                    if (arquivo==valor){
                        var arg=[];
                        $.each(id, function(num, valor){
                            $.each(valor,function(valor,id){
                                arg.push(valor+":"+id+",");
                            });
                        });
                       
                        menu_box(arg);
                    }
                });
            });
            
        } else{
            var path="_forms/"+pasta+"/"+arquivo+".php";
            $("#frame_conteudo").attr({src : path});    
        }
        
    });
});