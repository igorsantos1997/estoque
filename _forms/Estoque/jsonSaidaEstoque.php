<?php
    require_once("../../config.php");
    $codCli=$_POST["cliente"];
    $codigo=$_POST["codigo"];
    $descricao=$_POST["descricao"];
    $desconto=$_POST["desconto"];
    $valorTotal=$_POST["valorTotal"];

    date_default_timezone_set('America/Sao_Paulo');
    $data=date("Y/m/d H:i:s");

    $transacao= new Transacao("",$codCli,$codigo,$data,$descricao,$desconto,"",$valorTotal,"");
    if ($transacao->inserir()) echo "Venda Finalizada";
    else echo "Erro ao finalizar venda!";
?>