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
                var cod=$("td",this).html();
                if (cod) $(this).remove();
            });
            $("#btnAddCaixa").on("click",addCaixa);
            $("#btnFormAuxiliar").on("click",function(){
                
                $(".form_busca_produto").css({display: "block"});
            });
            $("#txtCodigo").change(function(){
                buscar();
            });
        });
        function buscar(){
             var busca=$("#txtCodigo").val();
            $.post("jsonBuscaProduto.php",{ nome: busca,campo: "cod"},function(msg){ $("#controls").html(msg); });
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
                    limpaCampos();
                }
            }
        function limpaCampos(){
                $("#txtCodigo").val("");
                $("#txtProduto").val("");
                $("#txtPreco").val("");
                $("#txtQntd").val("");
        }

    </script>
    <body>
        <?php
            require_once ("../forms_auxilio/formAuxilio.php");
        ?>
        <p class="form_titulo">Venda</p>
        <div id="controls">
            <label for="txtCodigo">Codigo</label><input type="number" name="txtCodigo" id="txtCodigo" placeholder="Codigo" class="txtBox">
            
            <label for="txtProduto">Produto</label><input type="text" name="txtProduto" id="txtProduto" placeholder="Produto" class="txtBox" disabled>
            <label for="txtPreco">Preço</label><input type="number" name="txtPreco" id="txtPreco" placeholder="Preço" class="txtBox" disabled>
            <label for="txtQntd">Quantidade</label><input type="number" name="txtQntd" id="txtQntd" placeholder="Quantidade" class="txtBox">
        </div>
        <br>
        <button id="btnBuscar">Buscar</button>
        <button id="btnFormAuxiliar">B</button>
        <button id="btnAddCaixa">Adicionar</button>
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