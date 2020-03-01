<?php
    require_once("../../config.php");

    $cliente=$_POST["nome"];
    $campo="nome";
    if (isset($_POST["campo"])) $campo= $_POST["campo"];
    $resultado=Cliente::buscar(array($campo=>$cliente));
            echo "<table border=1>";
            echo "<tr>";
            echo "<th>Código</th>";
            echo "<th>Nome</th>";
            echo "<th>CPF</th>";
            echo "</tr>";
            foreach ($resultado as $valor){
                    
                    echo "<tr>";
                    //if (is_array($valor)) preencheLista($valor);
                    echo "<td>".$valor["cod"]."</td>";
                    echo "<td>".$valor["nome"]."</td>";
                    echo "<td>".$valor["cpf"]."</td>";
                    echo "</tr>";
                }
             echo "</table>";
?>