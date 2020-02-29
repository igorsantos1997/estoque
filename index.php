<!DOCTYPE html>
<?php
    require_once("config.php");
?>
<html>
    <head>
        <title>Gestão de Pedidos</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="_css/layout.css">
        <script src="_js/jquery-3.4.1.min.js"></script>
        <script src="_js/menu.js"></script>
    </head>
    <body>
        <div class="menu_box"></div>
        <div class="barra_superior"></div>
        <ul class="menu"><!-- Menu criado via JS e JSON. Os items do menu estão em um arquivo JSON, e o JS interpreta as informações --></ul>
        <div class="conteudo">
            <iframe id="frame_conteudo" src="" width="98%" height="85%"></iframe>
        </div>
    </body>
</html>