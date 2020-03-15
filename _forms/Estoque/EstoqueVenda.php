<html>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
           <link rel="stylesheet" href="../../_css/layout.css">
    <link rel="stylesheet" href="../../_lib/bootstrap/dist/css/bootstrap.css">
    <script src="../../_js/jquery-3.4.1.min.js"></script>
    <script src="../../_js/forms.js"></script>
    <script src="EstoqueScriptBuscas.js"></script>
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
            $.post("ajaxBuscaCliente.php",{ nome: busca,campo: "cod"},function(msg){ $("#txtCliente").val(msg); });
        }
        
        
            function addCaixa(){ //Adiciona item na tabela
                var codigo=$("#txtCodigo").val();
                var produto=$("#txtProduto").val();
                var preco=$("#txtPreco").val();
                var qntd=$("#txtQntd").val();
                //qntd=parseFloat(qntd)+parseFloat(verificaProdutoNaTabela(codigo));
                var retorno=verificaProdutoNaTabela(codigo);
                var valor=parseInt(retorno[0]);
                qntd=parseInt(qntd)+valor;
                
                $.post("ajaxVerificarEstoque.php",{codigo: codigo},function(result){ //Ajax para verificar qntd de item em estoque
                    if (qntd>parseInt(result)) alert("Quantidade maior que estoque!");
                    else {
                        if (valor>0){
                            removeCaixa(retorno[1]);
                        }
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
                });

            }
        
        function verificaProdutoNaTabela(codigo){ //retorna 0 caso não achar o produto, caso contrario retorna a qntd do produto na tabela e o item para posteriormente ser retirado da tabela e inserido novamente com a qntd corrigida.
            var valor=0;
            var retorno=[];
            retorno[0]=0;
            $("tr","#tableProdutosCaixa").each(function(){ 
                var produto=$("td:nth-child(1)",this).html();
                if (typeof produto!="undefined" && produto==codigo){
                    retorno[0]=parseInt($("td:nth-child(3)",this).html());
                    retorno[1]=$(this);
                } 
            });
            return retorno;
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
                modalAviso("Erro","Insira um cliente!");
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
                if (produtos.length==0) modaAviso("Erro","Nenhum produto inserido!");
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
                    $.post("ajaxSaidaEstoque.php",{codigo:codigo,descricao:"Vendido para CLIENTE",cliente:codCli,desconto: desconto,valorTotal: valorTotal},function(msg){ modalAviso("Sucesso",msg);});
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
        
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="txtCodigo">Codigo do Produto</label>
                    <div class="form-inline">
                        <input type="number" name="txtCodigo" id="txtCodigo" placeholder="Codigo" class="form-control w-75"><button id="btnFormAuxiliar" class="btnLupa" data-toggle="modal" data-target="#modalBuscaProduto"></button>
                    </div>
                </div>
                <div class="form-group col-md-4 col-lg-6">
                    <label for="txtProduto">Nome do Produto</label><input type="text" name="txtProduto" id="txtProduto" placeholder="Produto" class="form-control w-100" disabled>
                </div>
                <div class="form-group col-md-3 col-lg-2">
                    <label for="txtPreco">Preço de Venda</label><input type="number" name="txtPreco" id="txtPreco" placeholder="Preço" class="form-control w-100" disabled>
                </div>
                <div class="form-group col-md-3 col-lg-2">
                    <label for="txtQntd">Quantidade</label><input type="number" name="txtQntd" id="txtQntd" placeholder="Quantidade" class="form-control w-100">
                </div>
            </div>
        
        
        <div class="form-row my-5">
            <div class="form-group col-md-6">
                <button id="btnBuscar" class="btn btn-primary w-100 ">Buscar Produto</button>
            </div>
            <div class="form-group col-md-6">
                <button id="btnAddCaixa" class="btn btn-success w-100 ">Adicionar Produto</button>
            </div>
        </div>
        
        
        <div class="form-row">
            <div class="form-group col-md-2">
            <label for="txtCodigoCli">Codigo do Cliente</label>
                <div class="form-inline">
                     <input type="number" name="txtCodigoCli" id="txtCodigoCli" placeholder="Codigo" class="form-control w-75"><button id="btnFormAuxiliarCli" class="btnLupa" data-toggle="modal" data-target="#modalBuscaCliente"></button>
                </div>
            </div>
             <div class="form-group col-md-10">
                <label for="txtCliente">Cliente</label><input type="text" name="txtCliente" id="txtCliente" placeholder="Cliente" class="form-control w-100" disabled>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <button id="btnBuscarCli" class="btn btn-primary w-100">Buscar Cliente</button>
            </div>
        </div>
        
        <div class="form-row mt-5">
            <div class="form-group col-md-12">
                <div class="form-inline">
                    <h2 class="display-5">Total: R$</h2>
                    <h2 class="display-5" id="valorTotal">0.00</h2>
                </div>
            </div> 
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="txtDesconto">Desconto (%)</label><input type="number" id="txtDesconto" class="form-control" value="0">
            </div>
            <div class="form-group col-md-12">
                <button id="btnFinalizarVenda" class="btn btn-warning w-100">Finalizar</button>
            </div>
        </div>

        <table class="table table-hover table-responsive-md table-bordered table-striped text-center" id="tableProdutosCaixa">
            <tr>
                <th>Código</th>
                <th>Descrição</th>
                <th>Quantidade</th>
                <th>Preço Unitario</th>
                <th>Preço Total</th>
            </tr>
        </table>
    </body>
        <?php require_once("..".DIRECTORY_SEPARATOR."modalAviso.php"); ?>
        <script src="../../_lib/jquery/dist/jquery.js"></script>
        <script src="../../_lib/popper.js/dist/umd/popper.js"></script>
        <script src="../../_lib/bootstrap/dist/js/bootstrap.js"></script>
</html>
<?php

 require_once("../../config.php");

    
?>