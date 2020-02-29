<html>
    <link rel="stylesheet" href="../../_css/layout.css">
    <script src="../../_js/jquery-3.4.1.min.js"></script>
    <script src="../../_js/forms.js"></script>
    <script>
        $(function(){
            $("select").on("click",function(){
                if ($(this).val()=="DataVenda") $("#txtBusca").attr({type: "date"});
                else if ($(this).val()=="CodigoDaVenda") $("#txtBusca").attr({type: "number"});
                else $("#txtBusca").attr({type: "text"});
            });
            $("tr").on("click",function(){
                var codigo=$("td",this).html();
                alert (codigo);
            });
        });
    </script>
    <body>
        <p class="form_titulo">Venda</p>
        <label for="txtBusca"></label><input type="number" name="txtBusca" id="txtBusca" placeholder="Busca" class="txtBox">
        <label for="txtCriterio">Buscar por</label><select id="txtCriterio" name="txtCriterio" class="txtBox">
            <option value="CodigoDaVenda" class="optNumero">Código da Venda</option>
            <option value="Cliente" class="optTexto">Cliente</option>
            <option value="DataVenda" class="optData">Data da venda</option>
            <option value="Produto" class="optTexto">Produto</option>
        </select>
        <br>
        <table border="1">
            <tr>
                <th>Código</th>
                <th>Descrição</th>
                <th>Quantidade</th>
                <th>Preço</th>
            </tr>
            <tr>
                <td>0</td>
                <td>Notebook</td>
                <td>1</td>
                <td>R$1500,00</td>
                
            </tr>
                        <tr>
                <td>1</td>
                <td>TV</td>
                <td>1</td>
                <td>R$1200,00</td>
                
            </tr>
        </table>
    </body>
</html>