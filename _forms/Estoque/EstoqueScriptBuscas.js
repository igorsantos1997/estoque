function buscar(){
             var busca=$("#txtCodigo").val();
            $.post("ajaxBuscaProduto.php",{ nome: busca,campo: "cod"},function(msg){ preencheCampoProduto(msg) });
        }
function preencheCampoProduto(dados){
            var dados=dados.split(';');
            $("#txtProduto").val(dados[0]);
            $("#txtPreco").val(dados[1]);
            $("#txtQntd").val(1);
        }