<?php
    class Sql extends Pdo{
        private $conexao;
        public function Sql(){
            try{
                $this->conexao=new Pdo ("mysql:dbname=dbEstoque;host=localhost","root","");
            } catch(Exception $e) {
                echo "Erro ao conectar ao Banco de Dados!";
            }
        }
        private function setParams($statement,$params){
            foreach($params as $key=>$value){
                $this->setParam($statement,$key,$value);
                
            }
        }
        private function setParam($statement,$key,$value){
            
                $statement->bindParam($key,$value);
        }
        public function query($query,$params=array()){
            try{
                $stmt=$this->conexao->prepare($query);
                $this->setParams($stmt,$params);
                $stmt->execute();
                return $stmt;
            } catch (Exception $e){
                
            }
        }
        public function select($query,$params=array()):array{
            try{
                $stmt=$this->query($query,$params);
                //print_r ($stmt->errorInfo());
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch (Exception $e){}
        }
    }
?>