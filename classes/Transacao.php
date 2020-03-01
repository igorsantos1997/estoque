<?php
    class Transacao extends consultaSql{
        private $cod;
        private $codCliente;
        private $codProdutos; 
        private $dataHora;
        private $descricao;
        private $valorProdutos;
        private $desconto;
        private $taxaEntrega;
        private $totalFinal;
        private $meioPagamento;
        private $backCodigo;
        private $sql;
        
        public function Transacao($cod="",$codCliente="",$codProdutos="",$dataHora="",$descricao="",$desconto="",$taxaEntrega="",$totalFinal="",$meioPagamento=""){
            $this->sql=new Sql();
            $dados=array(
                "cod"=>$cod,
                "codCliente"=>$codCliente,
                "codProdutos"=>$codProdutos,
                "dataHora"=>$dataHora,
                "descricao"=>$descricao,
                "desconto"=>$desconto,
                "taxaEntrega"=>$taxaEntrega,
                "totalFinal"=>$totalFinal,
                "meioPagamento"=>$meioPagamento,
                "backCodigo"=>$cod
            );
            $this->alimentarClasse($dados);
        }
        
        private function alimentaClasse($dados){
            $this->setCodigo($dados["cod"]);
            $this->setCodigoCliente($dados["codCliente"]);
            $this->setCodigoProdutos($dados["codProdutos"]);
            $this->setDataHora($dados["dataHora"]);
            $this->setDescricao($dados["descricao"]);
            $this->setDesconto($dados["desconto"]);
            $this->setTaxaEntrega($dados["taxaEntrega"]);
            $this->setTotalFinal($dados["totalFinal"]);
            $this->setMeioPagamento($dados["meioPagamento"]);
            $this->setBackCodigo($dados["backCodigo"]);
            
        }
        
        public function inserir(){
            $query="INSERT INTO tbtransacao VALUES (:cod,:codCliente,:codProdutos,:dataHora,:descricao,:desconto,:taxaEntrega,:totalFinal,:meioPagamento)";
            $params=$this->returnParams();
            $stmt=$this->sql->query($query,$params);
            if ($stmt->rowCount()>0) return true;
            else return false;
        }
        public function apagar(){
            $query="DELETE FROM tbtransacao WHERE cod=:cod";
            $param=array(":cod"=>$this->getCodigo());
            $stmt=$this->sql->query($query,$param);
            if ($stmt->rowCount()>0) return true;
            else return false;
        }
        public function atualizar(){
            $query="UPDATE tbtransacao set cod=:cod,codCliente=:codCliente,codProdutos=:codProdutos,dataHora=:dataHora,descricao=:descricao,desconto=:desconto,taxaEntrega=:taxaEntrega,totalFinal=:totalFinal,meioPagamento=:meioPagamento WHERE cod=:backCodigo";
            $params=$this->returnParmas();
            $params["backCodigo"]=$this->getBackCodigo();
            $stmt=$this->sql->query($query,$params);
            if ($stmt->rowCount()>0) return true;
            else return false;
        }
        public function getByCodigo(){
            $query = "SELECT * FROM tbtransacao WHERE cod=:cod";
            $param=array(":cod"=>$this->getCodigo());
            $dados=$this->sql->select($query,$param);
            if ($stmt->rowCount()>0){
                $this->alimentaClasse($dados);
                return true;
            } 
            else{
                $this->setCodigo("");
                return false; 
            }         
        }
        private function returnParams():array{
            return array(
                "cod"=>$this->getCodigo(),
                "codCliente"=>$this->getCodigoCliente(),
                "codProdutos"=>$this->getCodigoProdutos(),
                "dataHora"=>$this->getDataHora(),
                "descricao"=>$this->getDescricao(),
                "desconto"=>$this->getDesconto(),
                "taxaEntrega"=>$this->getTaxaEntrega(),
                "totalFinal"=>$this->getTotalFinal(),
                "meioPagamento"=>$this->getMeioPagamento()
            );
        }
        public function getCodigo(){
            return $this->cod;
        }

        public function setCodigo($cod){
            $this->cod = $cod;
        }

        public function getCodigoCliente(){
            return $this->codCliente;
        }

        public function setCodigoCliente($codCliente){
            $this->codCliente = $codCliente;
        }

        public function getCodigoProdutos(){
            return $this->codProdutos;
        }

        public function setCodigoProdutos($codProdutos){
            $this->codProdutos = $codProdutos;
        }

        public function getDataHora(){
            return $this->dataHora;
        }

        public function setDataHora($dataHora){
            $this->dataHora = $dataHora;
        }

        public function getDescricao(){
            return $this->descricao;
        }

        public function setDescricao($descricao){
            $this->descricao = $descricao;
        }

        public function getValorProdutos(){
            return $this->valorProdutos;
        }

        public function setValorProdutos($valorProdutos){
            $this->valorProdutos = $valorProdutos;
        }

        public function getDesconto(){
            return $this->desconto;
        }

        public function setDesconto($desconto){
            $this->desconto = $desconto;
        }

        public function getTaxaEntrega(){
            return $this->taxaEntrega;
        }

        public function setTaxaEntrega($taxaEntrega){
            $this->taxaEntrega = $taxaEntrega;
        }

        public function getTotalFinal(){
            return $this->totalFinal;
        }

        public function setTotalFinal($totalFinal){
            $this->totalFinal = $totalFinal;
        }

        public function getMeioPagamento(){
            return $this->meioPagamento;
        }

        public function setMeioPagamento($meioPagamento){
            $this->meioPagamento = $meioPagamento;
        }
        public function getBackCodigo(){
		return $this->backCodigo;
        }

        public function setBackCodigo($backCodigo){
            $this->backCodigo = $backCodigo;
        }
    }
?>