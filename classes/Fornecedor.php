<?php
class Fornecedor extends Sql{
    private $cod;
    private $nomeFantasia;
    private $razaoSocial;
    private $cnpj;
    private $ie;
    private $isentoie;
    private $conticms;
    private $telefone;
    private $celular;
    private $endereco;
    private $email;
    private $obs;
    private $backCod;
    private $sql;
    
    public function Fornecedor($cod="", $nomeFantasia="", $razaoSocial="",$cnpj="",$ie="",$isentoie="",$conticms="",$telefone="",$celular="",$endereco="",$email="",$obs=""){
        $this->setCod($cod);
        $this->setNomeFantasia($nomeFantasia);
        $this->setRazaoSocial($razaoSocial);
        $this->setCnpj($cnpj);
        $this->setIe($ie);
        $this->setIsentoie($isentoie);
        $this->setConticms($conticms);
        $this->setTelefone($telefone);
        $this->setCelular($celular);
        $this->setEndereco($endereco);
        $this->setEmail($email);
        $this->setObs($obs);
        $this->setBackCod($cod);
        $this->sql=new Sql();
    }
    public static function buscar($valor){
            $query="SELECT * FROM tbfornecedor WHERE nomeFantasia LIKE :NOME or razaoSocial LIKE :NOME";
            $valor="%".$valor."%";
            $param=array(":NOME"=>$valor);
            if (!isset($sql)) $sql=new Sql();
            $result=$sql->select($query,$param);
            
            return $result;
        }
    public function inserir(){
        $query="INSERT INTO tbfornecedor VALUES (:COD,:NOMEFANTASIA,:RAZAOSOCIAL,:CNPJ,:IE,:ISENTOIE,:CONTICMS,:TELEFONE,:CELULAR,:ENDERECO,:EMAIL,:OBS)";
        $params=$this->returnParams();
        $stmt=$this->sql->query($query,$params);
        
        //print_r ($stmt->errorInfo());
        if ($stmt->rowCount()){
            return true;
        } else return false;
    }
    
    public function atualizar(){
        $query="UPDATE tbfornecedor SET cod=:COD, nomeFantasia=:NOMEFANTASIA,razaoSocial=:RAZAOSOCIAL,cnpj=:CNPJ,ie=:IE,isentoie=:ISENTOIE,conticms=:CONTICMS,telefone=:TELEFONE,celular=:CELULAR,endereco=:ENDERECO,email=:EMAIL,obs=:OBS WHERE cod=:BACKCOD";
        $params=$this->returnParams();
        $stmt=$this->sql->query($query,$params);
        array_push($params[":BACKCOD"],$this->getBackCod());
        if ($stmt->rowCount()){
            return true;
        } else return false;
    }
    
    public function apagar(){
        $query="DELETE FROM tbfornecedor WHERE cod=:COD";
        $param=array(
            ":COD"=>$this->getCod()
        );
        $stmt=$this->sql->query($query,$param);
        if ($stmt->rowCount()){
            return true;
        } else return false;
    }
    
    public function getByCodigo(){
        $query="SELECT * FROM tbfornecedor WHERE cod=:COD";
        $param=array(":COD"=>$this->getCod());
        $result = $this->sql->select($query,$param);
        if (isset($result[0])){
             $this->alimentarClasse($result[0]);
            return true;
        } else return false;
       
        
    }
      private function alimentarClasse($dados){
            $this->setCod($dados["cod"]);
            $this->setNomeFantasia($dados["nomeFantasia"]);
            $this->setRazaoSocial($dados["razaoSocial"]);
            $this->setCnpj($dados["cnpj"]);
            $this->setTelefone($dados["telefone"]);
            $this->setCelular($dados["celular"]);
            $this->setIe($dados["ie"]);
            $this->setIsentoie($dados["isentoie"]);
            $this->setConticms($dados["conticms"]);
            $this->setEmail($dados["email"]);
            $this->setObs($dados["obs"]);
            $this->setBackCod($dados["cod"]);
        }
         public function listar(){
            $query="SELECT * FROM tbfornecedor";
            if (!isset($sql)) $sql=new Sql();
            $result=$sql->select($query,array());
            return $result;
        }
    public function getCod(){
            return $this->cod;
        }

        public function setCod($cod){
            $this->cod = $cod;
        }

        public function getNomeFantasia(){
            return $this->nomeFantasia;
        }

        public function setNomeFantasia($nomeFantasia){
            $this->nomeFantasia = $nomeFantasia;
        }

        public function getRazaoSocial(){
            return $this->razaoSocial;
        }

        public function setRazaoSocial($razaoSocial){
            $this->razaoSocial = $razaoSocial;
        }

        public function getCnpj(){
            return $this->cnpj;
        }

        public function setCnpj($cnpj){
            $this->cnpj = $cnpj;
        }

        public function getIe(){
            return $this->ie;
        }

        public function setIe($ie){
            $this->ie = $ie;
        }

        public function getIsentoie(){
            return $this->isentoie;
        }

        public function setIsentoie($isentoie){
            $this->isentoie = $isentoie;
        }

        public function getConticms(){
            return $this->conticms;
        }

        public function setConticms($conticms){
            $this->conticms = $conticms;
        }

        public function getTelefone(){
            return $this->telefone;
        }

        public function setTelefone($telefone){
            $this->telefone = $telefone;
        }

        public function getCelular(){
            return $this->celular;
        }

        public function setCelular($celular){
            $this->celular = $celular;
        }

        public function getEndereco(){
            return $this->endereco;
        }

        public function setEndereco($endereco){
            $this->endereco = $endereco;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function getObs(){
            return $this->obs;
        }

        public function setObs($obs){
            $this->obs = $obs;
        }
    
        public function setBackCod($cod){
            $this->backCod = $cod;
        }
        public function getBackCod(){
            return $this->backCod;
        }
    private function returnParams():array{
        return array(
            ":COD"=>$this->getCod(),
            ":NOMEFANTASIA"=>$this->getNomeFantasia(),
            ":RAZAOSOCIAL"=>$this->getRazaoSocial(),
            ":CNPJ"=>$this->getCnpj(),
            ":IE"=>$this->getIe(),
            ":ISENTOIE"=>$this->getIsentoie(),
            ":CONTICMS"=>$this->getConticms(),
            ":TELEFONE"=>$this->getTelefone(),
            ":CELULAR"=>$this->getCelular(),
            ":ENDERECO"=>$this->getEndereco(),
            ":EMAIL"=>$this->getEmail(),
            ":OBS"=>$this->getObs()
        );
    }
}
?>