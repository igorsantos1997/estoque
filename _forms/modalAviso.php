<!-- Arquivo com o intuito de padronizar o modal de aviso, e para n ficar repetindo em todos os arquivos -->
<div class="modal fade" tabindex="-1" id="modalAviso" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
<script>
    function modalAviso(titulo,mensagem){
        $("#modalAviso h5").html(titulo);
        $("#modalAviso .modal-body").html(mensagem);
        $("#modalAviso").modal("show");
    }
</script>