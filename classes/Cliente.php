<?php
    class Cliente extends Sql{
        private $codigo;
        private $nome;
        private $dtNascimento;
        private $sexo;
        private $telefone;
        private $celular;
        private $rg;
        private $cpf;
        private $endereco;
        private $email;
        private $obs;
        private $limiteDebito;
        private $backCodigo; //Isso é realmente necessário? 
        private $sql;
        public function Cliente($codigo="",$nome="",$dtNascimento="",$sexo="",$telefone="",$celular="",$rg="",$cpf="",$endereco="",$email="",$obs="",$limiteDebito=""){
            $this->sql= new Sql();
            $this->setCodigo($codigo);
            $this->setNome($nome);
            $this->setDtNascimento($dtNascimento);
            $this->setSexo($sexo);
            $this->setTelefone($telefone);
            $this->setCelular($celular);
            $this->setRg($rg);
            $this->setCpf($cpf);
            $this->setEndereco($endereco);
            $this->setEmail($email);
            $this->setObs($obs);
            $this->setLimiteDebito($limiteDebito);
            $this->setBackCodigo($codigo);
            
        }
        public function __toString(){
            return $this->returnParams();
        }
        public static function buscar($valor,$buscarPor="nome"){
            $query="";
            $param="";
            $valor="%".$valor."%";
            if ($buscarPor=="nome"){
                $query="SELECT * FROM tbcliente WHERE nome LIKE :NOME";
                $param=array(":NOME"=>$valor);
            } 
            elseif ($buscarPor=="cpf"){
                $query="SELECT * FROM tbcliente WHERE cpf LIKE :CPF";
                $param=array(":CPF"=>$valor);
            } 
            
            
            
            if (!isset($sql)) $sql=new Sql();
            $result=$sql->select($query,$param);
            
            return $result;
        }
        public static function listar(){
            $query="SELECT * FROM tbcliente";
            if (!isset($sql)) $sql=new Sql();
            $result=$sql->select($query,array());
            return $result;
        }
        public function apagar(){
            $query="DELETE FROM tbcliente WHERE cod=:CODIGO";
            $param=array(
            ":CODIGO"=>$this->getCodigo()
            );
            $stmt=$this->sql->query($query,$params);
            if ($stmt->rowCount()>0){
                return true;
            } else{
                return false;
            }
        }
        public function atualizar(){
            $query="UPDATE tbcliente SET cod=:CODIGO,nome=:NOME,dtNascimento=:DTNASCIMENTO,sexo=:SEXO,telefone=:TELEFONE,celular=:CELULAR,rg=:RG,cpf=:CPF,endereco=:ENDERECO,email=:EMAIL,obs=:OBS,limiteDebito=:LIMITEDEBITO WHERE cod=:BACKCOD";
            $params=$this->returnParams();
            array_push($params[":BACKCOD"],$this->getBackCod());
            $stmt=$this->sql->query($query,$params);
            
            if ($stmt->rowCount()>0){
                return true;
            } else{
                return false;
            }
            
        }
        public function inserir(){
            $query="INSERT INTO tbcliente VALUES (:CODIGO,:NOME,:DTNASCIMENTO,:SEXO,:TELEFONE,:CELULAR,:RG,:CPF,:ENDERECO,:EMAIL,:OBS,:LIMITEDEBITO)";
            $params=$this->returnParams();
            $stmt=$this->sql->query($query,$params);
            if ($stmt->rowCount()>0){
                return true;
            } else{
                return false;
            }
        }
        public function getByCodigo(){
                $query="SELECT * FROM tbcliente WHERE cod=(:CODIGO)";
                $param=array(":CODIGO"=>$this->getCodigo());
                $result=$this->sql->select($query,$param);
                if (isset($result[0])){
                    $dados=$result[0];
                    $this->alimentarClasse($dados); 
                    
                    return true;
                } 
                else{
                    $this->setCodigo("");
                    return false; 
                } 
        }
        private function alimentarClasse($dados){
            $this->setCodigo($dados["cod"]);
            $this->setNome($dados["nome"]);
            $this->setDtNascimento($dados["dtNascimento"]);
            $this->setSexo($dados["sexo"]);
            $this->setTelefone($dados["telefone"]);
            $this->setCelular($dados["celular"]);
            $this->setRg($dados["rg"]);
            $this->setCpf($dados["cpf"]);
            $this->setEndereco($dados["endereco"]);
            $this->setEmail($dados["email"]);
            $this->setObs($dados["obs"]);
            $this->setLimiteDebito($dados["limiteDebito"]);
            $this->setBackCodigo($dados["cod"]);
            
        }
        public function getCodigo(){
            return $this->codigo;
        }

        public function setCodigo($codigo){
            $this->codigo = $codigo;
        }
        public function getBackCodigo(){
            return $this->backCodigo;
        }

        public function setBackCodigo($codigo){
            $this->backCodigo = $codigo;
        }
        public function getNome(){
            return $this->nome;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getDtNascimento(){
            return $this->dtNascimento;
        }

        public function setDtNascimento($dtNascimento){
            $this->dtNascimento = $dtNascimento;
        }

        public function getSexo(){
            return $this->sexo;
        }

        public function setSexo($sexo){
            $this->sexo = $sexo;
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

        public function getRg(){
            return $this->rg;
        }

        public function setRg($rg){
            $this->rg = $rg;
        }

        public function getCpf(){
            return $this->cpf;
        }

        public function setCpf($cpf){
            $this->cpf = $cpf;
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
        public function getLimiteDebito(){
            return $this->limiteDebito;
        }

        public function setLimiteDebito($limiteDebito){
            $this->limiteDebito = $limiteDebito;
        }
        private function returnParams():array{
            return array(
                ":CODIGO"=>$this->getCodigo(),
                ":NOME"=>$this->getNome(),
                ":DTNASCIMENTO"=>$this->getDtNascimento(),
                ":SEXO"=>$this->getSexo(),
                ":TELEFONE"=>$this->getTelefone(),
                ":CELULAR"=>$this->getCelular(),
                ":RG"=>$this->getRg(),
                ":CPF"=>$this->getCpf(),
                ":ENDERECO"=>$this->getEndereco(),
                ":EMAIL"=>$this->getEmail(),
                ":OBS"=>$this->getObs(),
                ":LIMITEDEBITO"=>$this->getLimiteDebito()
            );
        }
    
}
?>