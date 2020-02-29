<html>
    <link rel="stylesheet" href="../../_css/layout.css">
    <script src="../../_js/jquery-3.4.1.min.js"></script>
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
        <p class="form_titulo">Entrada de Estoque - Devolução do Cliente</p>
        <label for="txtBusca"></label><input type="number" name="txtBusca" id="txtBusca" placeholder="Busca" class="txtBox">
        <label for="txtCriterio">Buscar por</label><select id="txtCriterio" name="txtCriterio" class="txtBox">
            <option value="CodigoDaVenda">Código da Venda</option>
            <option value="Cliente">Cliente</option>
            <option value="DataVenda">Data da venda</option>
            <option value="Produto">Produto</option>
        </select>
        <br>
        <table border="1">
            <tr>
                <th>Código</th>
                <th>Cliente</th>
                <th>Data</th>
                <th>Produto</th>
            </tr>
            <tr>
                <td>0</td>
                <td>Igor Alexandre</td>
                <td>27/02/2020</td>
                <td>Notebook</td>
                
            </tr>
                        <tr>
                <td>1</td>
                <td>Alexandre</td>
                <td>27/02/2020</td>
                <td>Notebook</td>
                
            </tr>
        </table>
    </body>
</html>