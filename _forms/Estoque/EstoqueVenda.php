<html>
    <link rel="stylesheet" href="../../_css/layout.css">
    <script src="../../_js/jquery-3.4.1.min.js"></script>
    <script src="../../_js/forms.js"></script>
    <style>
        #item{
            transition: .4s;
            cursor: pointer;
        }
        #item:hover{
            background-color: brown;
            color: white;
        }
    </style>
            
    <script>
        $(function(){
            $("select").on("click",function(){
                if ($(this).val()=="DataVenda") $("#txtBusca").attr({type: "date"});
                else if ($(this).val()=="CodigoDaVenda") $("#txtBusca").attr({type: "number"});
                else $("#txtBusca").attr({type: "text"});
            });
           
            $("#btnBuscar").on("click",function(){
               buscar();
            });
            $("#tableProdutosCaixa").on("click","tr",function(){
                removeCaixa(this);
            });
            $("#btnAddCaixa").on("click",addCaixa);
            
            $("#txtCodigo").change(function(){
                buscar();
            });
            $("#txtCodigoCli").change(function(){
                buscarCli();
            });
            $("#btnFinalizarVenda").on("click",finalizaVenda);
            
            $("#btnBuscarCli").on("click",function(){
                //$(".form_busca_cliente").css({display: "block"});
                buscarCli();
            });
            $("#btnFormAuxiliar").on("click",function(){
                $(".form_busca_produto").css({display: "block"});
                 $(".form_busca_cliente").css({display: "none"});
            });
            
            $("#btnFormAuxiliarCli").on("click",function(){
                $(".form_busca_cliente").css({display: "block"});
                 $(".form_busca_produto").css({display: "none"});
            });
            $("#txtDesconto").change(function(){
                atualizaValorTotal();
            });
        });
        function buscar(){
             var busca=$("#txtCodigo").val();
            $.post("jsonBuscaProduto.php",{ nome: busca,campo: "cod"},function(msg){ preencheCampoProduto(msg) });
        }
        function calcularDesconto(){
                var valorTotal=parseFloat($("#valorTotal").html());
                var desconto=parseInt($("#txtDesconto").val());
                desconto=parseInt($("#txtDesconto").val());
                if (desconto<0){ $("#txtDesconto").val(0);desconto=0;}
                else if (desconto>100){ $("#txtDesconto").val(100);desconto=0;}
                else if (isNaN(desconto)){ $("#txtDesconto").val(0);desconto=0;}
                    desconto=desconto/100;
                    valorTotal=valorTotal*(1-desconto);
                    valorTotal=valorTotal.toFixed(2);
                    $("#valorTotal").html(valorTotal);
                    
        }
        function buscarCli(){
             var busca=$("#txtCodigoCli").val();
            $.post("jsonBuscaCliente.php",{ nome: busca,campo: "cod"},function(msg){ $("#txtCliente").val(msg); });
        }
        
        
            function addCaixa(){
                var codigo=$("#txtCodigo").val();
                var produto=$("#txtProduto").val();
                var preco=$("#txtPreco").val();
                var qntd=$("#txtQntd").val();
                
                if (produto!="" && produto!="N/A"){
                    var precoFinal=parseFloat($("#txtPreco").val())*parseFloat(qntd);
                    var html="<tr id='item'>";
                    var html=html+"<td>"+codigo+"</td>";
                    var html=html+"<td>"+produto+"</td>";
                    var html=html+"<td>"+qntd+"</td>";
                    var html=html+"<td>"+preco+"</td>";
                    var html=html+"<td>"+precoFinal+"</td>";

                    $("#tableProdutosCaixa").append(html);
                    atualizaValorTotal();
                    limpaCamposProdutos();
                   
                }
            }
        
        
        function removeCaixa(item){
            var cod=$("td",item).html();
            var valor=$("td:last-child",item).html();
            if (cod) $(item).remove();
            atualizaValorTotal();
        }
        function atualizaValorTotal(){
            var valor=0;
            $("tr","#tableProdutosCaixa").each(function(){
                var valorTabela=$("td:last-child",this).html();
               if (typeof valorTabela!=="undefined"){
                valor+=parseFloat(valorTabela);
                
               }
            });
            valor=valor.toFixed(2);
            $("#valorTotal").html(valor);
            calcularDesconto();
        }
        function limpaCamposProdutos(){
                $("#txtCodigo").val("");
                $("#txtProduto").val("");
                $("#txtQntd").val("");
                $("#txtPreco").val("");
        }
        function limpaCampos(){
                $("#txtCodigo").val("");
                $("#txtProduto").val("");
                $("#txtQntd").val("");
                $("#txtPreco").val("");
                $("#txtCodigoCli").val("");
                $("#txtCliente").val("");
                $("#txtDesconto").val("0");
        }
        function preencheCampoProduto(dados){
            var dados=dados.split(';');
            $("#txtProduto").val(dados[0]);
            $("#txtPreco").val(dados[1]);
            $("#txtQntd").val(1);
        }
        function finalizaVenda(){
            buscarCli();
            var produtos=[];
            var cod;
            var descricao;
            var qntd;
            var precoUn;
            var precoFn;
            //Valida
            
            var Cli=$("#txtCliente").val();
            if (Cli=="" || Cli=="N/A"){ 
                alert ("Insira um cliente!");
            } 
            else{
                $("tr","#tableProdutosCaixa").each(function(indice,valor){
                    $("td",valor).each(function(i,v){
                        if (i==0) cod=$(v).html();
                        else if (i==1) descricao=$(v).html();
                        else if (i==2) qntd=$(v).html();
                        else if (i==3) precoUn=$(v).html();
                        else if (i==4){
                            precoFn=$(v).html();

                            var addArray=[cod,descricao,qntd,precoUn,precoFn];
                            produtos.push(addArray);

                        }
                    });
                    removeCaixa(valor); //depois de adicionar os valores do item no array, o item é retirado da lista.
                    $("#valorTotal").html(0);
                });
                if (produtos.length==0) alert("Nenhum produto inserido");
                else{
                        var codigo="";
                        var descricao;
                        var qntd;
                        var precoUn;
                        var precoFn;
                        var codCli=$("#txtCodigoCli").val();
                        var valorTotal=parseFloat($("#valorTotal").html());
                        var desconto=parseInt($("#txtDesconto").val());
                        produtos.forEach(function(valor,indice){
                            qntd=valor[2];
                            
                            precoUn=valor[3];
                            precoFn=valor[4];
                            codigo=codigo+valor[0]+":"+qntd+";";
                            
                          });
                    $.post("jsonSaidaEstoque.php",{codigo:codigo,descricao:"Vendido para CLIENTE",cliente:codCli,desconto: desconto,valorTotal: valorTotal},function(msg){ $("#result").html(msg);});
                     limpaCampos();
                }
            }
        }
    </script>
    <body>
        <?php
            require_once ("../forms_auxilio/formAuxilioProduto.php");
            require_once ("../forms_auxilio/formAuxilioCliente.php");
        ?>
        <p class="form_titulo">Venda</p>
        <div id="result"></div>
        <div id="controls">
            <label for="txtCodigo">Codigo</label><input type="number" name="txtCodigo" id="txtCodigo" placeholder="Codigo" class="txtBox">
            
            <label for="txtProduto">Produto</label><input type="text" name="txtProduto" id="txtProduto" placeholder="Produto" class="txtBox" disabled>
            <label for="txtPreco">Preço</label><input type="number" name="txtPreco" id="txtPreco" placeholder="Preço" class="txtBox" disabled>
            <label for="txtQntd">Quantidade</label><input type="number" name="txtQntd" id="txtQntd" placeholder="Quantidade" class="txtBox">
        </div>
        

        <button id="btnBuscar">Buscar</button>
        <button id="btnFormAuxiliar">B</button>
        <button id="btnAddCaixa">Adicionar</button>
        <br><br>
        <div id="controlsCli">
            <label for="txtCodigoCli">Codigo</label><input type="number" name="txtCodigoCli" id="txtCodigoCli" placeholder="Codigo do Cliente" class="txtBox">
            <label for="txtCliente">Cliente</label><input type="text" name="txtCliente" id="txtCliente" placeholder="Cliente" class="txtBox" disabled>
        </div>
        <button id="btnBuscarCli">Buscar</button><button id="btnFormAuxiliarCli">B</button>
        <br>
        <div style="float:right;font-size: 1.2em;color: red" id="valorTotal">0</div>
        <div style="float:right;font-size: 1.2em;color: red">Total: R$</div>
        <br> 
        <label for="txtDesconto">Desconto (%)</label><input type="number" id="txtDesconto" class="txtBox" value="0">
        
        <button id="btnFinalizarVenda" style="float:right">Finalizar</button>
        <table border="1" id="tableProdutosCaixa">
            <tr>
                <th>Código</th>
                <th>Descrição</th>
                <th>Quantidade</th>
                <th>Preço Unitario</th>
                <th>Preço Total</th>
            </tr>
        </table>
    </body>
</html>
<?php

 require_once("../../config.php");

    
?>