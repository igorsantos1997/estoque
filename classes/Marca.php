<?php
    class Marca extends Sql{
        private $cod;
        private $marca;
        private $backcod;
        private $sql;
        public function Marca($cod="",$marca=""){
            $this->setCod($cod);
            $this->setMarca($marca);
            $this->setBackCod($cod);
            $this->sql=new Sql();
        }
        public function inserir(){
            $query="INSERT INTO tbmarca VALUES(:CODIGO,:MARCA)";
            $params=$this->returnParams();
            $stmt=$this->sql->query($query,$params);
            if ($stmt->rowCount()>0) return true;
            else return false;
        }
        public function atualizar(){
            $query="UPDATE tbmarca SET cod=:CODIGO,marca=:MARCA WHERE cod=:BACKCOD";
            $params=$this->returnParams();
            $params[":BACKCOD"]=$this->getBackCod();
            $stmt=$this->sql->query($query,$params);
            echo $this->getBackCod();
            if ($stmt->rowCount()>0) return true;
            else return false;
        }
        public function apagar(){
            $query="DELETE FROM tbmarca WHERE cod=:CODIGO";
            $params=array(":CODIGO"=>$this->getCod());
            $stmt=$this->sql->query($query,$params);
            if ($stmt->rowCount()>0) return true;
            else return false;
        }
        public function getByCodigo(){
            $query="SELECT * FROM tbmarca WHERE cod=:CODIGO";
            $params=array(":CODIGO"=>$this->getCod());
            $retorno=$this->sql->select($query,$params);
            if (isset($retorno[0])){
                $dados=$retorno[0];
                $this->setCategoria=$dados["marca"];
                
            }
        }
        public static function listar(){
             $query="SELECT * FROM tbmarca";
            if (!isset($sql)) $sql=new Sql();
            $retorno=$sql->select($query);
            return $retorno;
        }
        public static function retornaMarca($codigo){
            $query="SELECT marca FROM tbmarca WHERE cod=:CODIGO";
            $params=array(":CODIGO"=>$codigo);
            if (!isset($sql)) $sql=new Sql();
            $retorno=$sql->select($query,$params);
            if (isset($retorno[0])){
                $dados=$retorno[0];
                return $dados["marca"];
               
            }
        }
        public function getCod(){
		  return $this->cod;
	   }
        public function setCod($cod){
            $this->cod = $cod;
        }

        public function getMarca(){
            return $this->marca;
        }

        public function setMarca($marca){
            $this->marca = $marca;
        }
        public function getBackCod(){
            return $this->backcod;
        }

        public function setBackCod($cod){
            $this->backcod = $cod;
        }
        private function returnParams($retornarBackCod=false):array{
            return array(
                ":CODIGO"=>$this->getCod(),
                ":MARCA"=>$this->getMarca()
            );
        }
    }
?>