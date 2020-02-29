<?php
    class SubCategoria extends Sql{
        private $cod;
        private $codPai;
        
        private $subCategoria;
        private $backcod;
        private $sql;
        public function SubCategoria($cod="",$codPai="",$subCategoria=""){
            $this->setCod($cod);
            $this->setCodPai($codPai);
            
            $this->setSubCategoria($subCategoria);
            $this->setBackCod($cod);
            $this->sql=new Sql();
        }
        public function inserir(){
            $query="INSERT INTO tbsubcategoria VALUES(:CODIGO,:CODPAI,:SUBCATEGORIA)";
            $params=$this->returnParams();
            $stmt=$this->sql->query($query,$params);
            if ($stmt->rowCount()>0) return true;
            else return false;
        }
        public function atualizar(){
            $query="UPDATE tbsubcategoria SET cod=:CODIGO,codPai=:CODPAI,subCategoria=:SUBCATEGORIA WHERE cod=:BACKCOD";
            $params=$this->returnParams();
            $params["BACKCOD"]=$this->getBackCod();
            $stmt=$this->sql->query($query,$params);
            if ($stmt->rowCount()>0) return true;
            else return false;
        }
        public function apagar(){
            $query="DELETE FROM tbsubcategoria WHERE cod=:CODIGO";
            $params=array(":CODIGO"=>$this->getCod());
            $stmt=$this->sql->query($query,$params);
            if ($stmt->rowCount()>0) return true;
            else return false;
        }
        public function getByCodigo(){
            $query="SELECT * FROM tbsubcategoria WHERE cod=:CODIGO";
            $params=array(":CODIGO"=>$this->getCod());
            $retorno=$this->sql->select($query,$params);
            if (isset($retorno[0])){
                $dados=$retorno[0];
                $this->setSubCategoria($dados["subCategoria"]);
                $this->setBackCod($this->getCod());
                return true;
            } else return false;
        }
        public static function retornaSubCategoria($codigo){
            $query="SELECT subcategoria FROM tbsubcategoria WHERE cod=:CODIGO";
            $params=array(":CODIGO"=>$codigo);
            if (!isset($sql)) $sql=new Sql();
            $retorno=$sql->select($query,$params);
            if (isset($retorno[0])){
                $dados=$retorno[0];
                return $dados["subcategoria"];
               
            }
        }
        public function getCod(){
		  return $this->cod;
	   }
        public function setCod($cod){
            $this->cod = $cod;
        }
        public function getCodPai(){
		  return $this->codPai;
	   }
        public function setCodPai($cod){
            $this->codPai = $cod;
        }
        public function getSubCategoria(){
            return $this->subCategoria;
        }

        public function setSubCategoria($subCategoria){
            $this->subCategoria = $subCategoria;
            
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
                ":CODPAI"=>$this->getCodPai(),
                ":SUBCATEGORIA"=>$this->getSubCategoria()
            );
        }
    }
?>