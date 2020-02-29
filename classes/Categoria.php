<?php
    class Categoria extends Sql{
        private $cod;
        private $Categoria;
        private $backcod;
        private $sql;
        public function Categoria($cod="",$Categoria=""){
            $this->setCod($cod);
            $this->setCategoria($Categoria);
            $this->setBackCod($cod);
            $this->sql=new Sql();
        }
        public function inserir(){
            $query="INSERT INTO tbcategoria VALUES(:CODIGO,:CATEGORIA)";
            $params=$this->returnParams();
            $stmt=$this->sql->query($query,$params);
            if ($stmt->rowCount()>0) return true;
            else return false;
        }
        public function atualizar(){
            $query="UPDATE tbcategoria SET cod=:CODIGO,Categoria=:CATEGORIA WHERE cod=:BACKCOD";
            $params=$this->returnParams();
            $params["BACKCOD"]=$this->getBackCod();
            
            $stmt=$this->sql->query($query,$params);
            if ($stmt->rowCount()>0) return true;
            else return false;
        }
        public function apagar(){
            $query="DELETE FROM tbcategoria WHERE cod=:CODIGO";
            $params=array(":CODIGO"=>$this->getCod());
            $stmt=$this->sql->query($query,$params);
            if ($stmt->rowCount()>0) return true;
            else return false;
        }
        public function getByCodigo(){
            $query="SELECT * FROM tbcategoria WHERE cod=:CODIGO";
            $params=array(":CODIGO"=>$this->getCod());
            $retorno=$this->sql->select($query,$params);
 
            if (isset($retorno[0])){
                $dados=$retorno[0];
                $this->setCategoria($dados["categoria"]);
                $this->setBackCod($this->getCod());
                return true;
            } else return false;
            
        }
        public static function retornaCategoria($codigo){
            $query="SELECT categoria FROM tbcategoria WHERE cod=:CODIGO";
            $params=array(":CODIGO"=>$codigo);
            if (!isset($sql)) $sql=new Sql();
            $retorno=$sql->select($query,$params);
            if (isset($retorno[0])){
                $dados=$retorno[0];
                return $dados["categoria"];
               
            }
        }
        public function getCod(){
		  return $this->cod;
	   }
        public function setCod($cod){
            $this->cod = $cod;
        }

        public function getCategoria(){
            return $this->categoria;
        }

        public function setCategoria($categoria){
            $this->categoria = $categoria;
         
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
                ":CATEGORIA"=>$this->getCategoria()
            );
        }
    }
?>