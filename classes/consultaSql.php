<?php
    class consultaSql extends Sql{
        public static function buscarSql($tebela, $buscarPor){
            $query="SELECT * FROM $tebela WHERE ";
            $param=array();
            if (is_array($buscarPor)){
                $total=1;
                foreach ($buscarPor as $indice=>$valor){
                    if ($indice!="cod") $valor="%".$valor."%";
                    $query.="$indice LIKE :$indice ";
                    $param[":$indice"]=$valor;
                    if (count($buscarPor)>$total) $query.="AND ";
                    $total+=1;
                }
            }
            if (!isset($sql)) $sql=new Sql();
            $result=$sql->select($query,$param);
            return $result;
        }
    }
?>