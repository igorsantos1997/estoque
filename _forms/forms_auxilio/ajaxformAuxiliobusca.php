<?php
    require_once("../../config.php");
    
    $form=$_POST["form"];
    if ($form=="cliente"){
        $cliente=$_POST["nome"];
        $campo="nome";
        if (isset($_POST["campo"])) $campo= $_POST["campo"];
        $resultado=Cliente::buscar(array($campo=>$cliente)); //Cliente Pessoa Física 
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
    }

    elseif ($form=="clientePj"){
        $cliente=$_POST["nome"];
        $campo="razaoSocial";
        if (isset($_POST["campo"])) $campo= $_POST["campo"];
        $resultado=Empresa::buscar(array($campo=>$cliente)); //Cliente Pessoa Jurídica 
                echo "<table border=1>";
                echo "<tr>";
                echo "<th>Código</th>";
                echo "<th>Razão Social</th>";
                echo "<th>Nome Fantasia</th>";
                echo "<th>Cnpj</th>";
                echo "</tr>";
                foreach ($resultado as $valor){
                        echo "<tr>";
                        //if (is_array($valor)) preencheLista($valor);
                        echo "<td>".$valor["cod"]."</td>";
                        echo "<td>".$valor["razaoSocial"]."</td>";
                        echo "<td>".$valor["nomeFantasia"]."</td>";
                        echo "<td>".$valor["cnpj"]."</td>";
                        echo "</tr>";
                    }
                 echo "</table>";
    }
    elseif ($form=="fornecedor"){
        $fornecedor=$_POST["fornecedor"];
        $campo="razaoSocial";
        if (isset($_POST["campo"])) $campo= $_POST["campo"];
        $resultado=Fornecedor::buscar(array($campo=>$fornecedor)); //Fornecedor
                echo "<table border=1>";
                echo "<tr>";
                echo "<th>Código</th>";
                echo "<th>Razão Social</th>";
                echo "<th>Nome Fantasia</th>";
                echo "<th>Cnpj</th>";
                echo "</tr>";
                foreach ($resultado as $valor){
                        echo "<tr>";
                        //if (is_array($valor)) preencheLista($valor);
                        echo "<td>".$valor["cod"]."</td>";
                        echo "<td>".$valor["razaoSocial"]."</td>";
                        echo "<td>".$valor["nomeFantasia"]."</td>";
                        echo "<td>".$valor["cnpj"]."</td>";
                        echo "</tr>";
                    }
                 echo "</table>";
    }
    elseif ($form=="produto"){
        $produto=$_POST["nome"];
        $campo="descricao";
        if (isset($_POST["campo"])) $campo= $_POST["campo"];
        $resultado=Produto::buscar(array($campo=>$produto));
                echo "<table border=1>";
                echo "<tr>";
                echo "<th>Código</th>";
                echo "<th>Descrição</th>";
                echo "<th>Categoria</th>";
                echo "<th>SubCategoria</th>";
                echo "<th>Fornecedor</th>";
                echo "<th>Preço</th>";
                echo "</tr>";
                foreach ($resultado as $valor){
                        echo "<tr>";
                        //if (is_array($valor)) preencheLista($valor);
                        echo "<td>".$valor["cod"]."</td>";
                        echo "<td>".$valor["descricao"]."</td>";
                        echo "<td>".$valor["categoria"]."</td>";
                        echo "<td>".$valor["subcategoria"]."</td>";
                        echo "<td>".$valor["fornecedor"]."</td>";
                        echo "<td>".$valor["precoVenda"]."</td>";
                        echo "</tr>";
                    }
                 echo "</table>";
    }
?>
