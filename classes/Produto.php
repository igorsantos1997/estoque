<?php
require_once "Categoria.php";
require_once "SubCategoria.php";

    class Produto extends consultaSql{
        private $cod;
        private $descricao;
        private $pesoLiquido;
        private $pesoBruto;
        private $categoria;
        private $subCategoria;
        private $marca;
        private $precoDeVenda;
        private $precoDeCusto;
        private $estoque;
        private $limiteDeEstoque;
        private $obs;
        private $fornecedor;
        private $ncm;
        private $cest;
        private $codBeneficio;
        private $tributacao;
        private $backupCod;
        private $sql;
        
        public function Produto($cod="",$descricao="",$pesoLiquido="",$pesoBruto="",$categoria="",$subCategoria="",$marca="",$precoDeVenda="",$precoDeCusto="",$estoque="",$limiteDeEstoque="",$obs="",$fornecedor="",$ncm="",$cest="",$codBeneficio="",$tributacao=""){
            $this->setCodigo($cod);
            $this->setDescricao($descricao);
            $this->setPesoLiquido($pesoLiquido);
            $this->setPesoBruto($pesoBruto);
            $this->setCategoria($categoria);
            $this->setSubCategoria($subCategoria);
            $this->setMarca($marca);
            $this->setPrecoDeVenda($precoDeVenda);
            $this->setPrecoDeCusto($precoDeCusto);
            $this->setEstoque($estoque);
            $this->setLimiteDeEstoque($limiteDeEstoque);
            $this->setObs($obs);
            $this->setFornecedor($fornecedor);
            $this->setNcm($ncm);
            $this->setCest($cest);
            $this->setCodigoBeneficio($codBeneficio);
            $this->setTributacao($tributacao);
            $this->setBackupCod($cod);
            $this->sql=new Sql();
        }
        public function __toString(){
            return $this->returnParams();
        }
         public static function buscar($buscarPor){
            return self::buscarSql("tbproduto",$buscarPor);
        }
        public function listar(){
            $query="SELECT * FROM tbproduto";
            $result=$this->sql->select($query,array());
            $i=0;
            foreach ($result as $value){  
                $result[$i]["categoria"]=Categoria::retornaCategoria($result[$i]["categoria"]);
                $result[$i]["subcategoria"]=SubCategoria::retornaSubCategoria($result[$i]["subcategoria"]);
                $result[$i]["marca"]=Marca::retornaMarca($result[$i]["marca"]);
                $i++;
            }    
            return $result;
        }
        public function inserir(){
            $query="INSERT INTO tbproduto VALUES (:CODIGO,:DESCRICAO,:PESOLIQUIDO,:PESOBRUTO,:CATEGORIA,:SUBCATEGORIA,:MARCA,:PRECODEVENDA,:PRECODECUSTO,:ESTOQUE,:LIMITEDEESTOQUE,:OBS,:FORNECEDOR,:NCM,:CEST,:CODBENEFICIO,:TRIBUTACAO)";
            $params=$this->returnParams();
            $stmt=$this->sql->query($query,$params);
            if ($stmt->rowCount()>0) return true;
            else return false;
        }
        
        public function atualizar(){
            $query="UPDATE tbprodutos SET cod=:CODIGO,descricao=:DESCRICAO,pesoliquido=:PESOLIQUIDO,pesobruto=:PESOBRUTO,categoria=:CATEGORIA,subCategoria=:SUBCATEGORIA,marca=:MARCA,precoVenda=:PRECODEVENDA,precoCusto=:PRECODECUSTO,estoque=:ESTOQUE,limiteEstoque=:LIMITEDEESTOQUE,obs=:OBS,fornecedor=:FORNECEDOR, ncm=:NCM, cest=:CEST, codBeneficio=:CODBENEFICIO, tributacao=:TRIBUTACAO WHERE cod=:BACKCOD";
            $params=$this->returnParams();
            array_push($params[":BACKCOD"],$this->getBackCod());
            $stmt=$this->sql->query($query,$params);
            if ($stmt->rowCount()>0) return true;
            else return false;
        }
        public function apagar(){
            $query="DELETE FROM tbproduto WHERE cod=:CODIGO";
            $param=array("CODIGO"=>$this->getCodigo());
            $stmt=$this->sql->query($query,$param);
            if ($stmt->rowCount()>0) return true;
            else return false;
        }
        public function getByCodigo(){
            $query="SELECT * FROM tbproduto WHERE cod=:CODIGO";
            $param=array(":CODIGO"=>$this->getCodigo());
            $result=$this->sql->select($query,$param);
            if (isset($result[0])){
                $this->alimentaClasse($result[0]);
                return true;
            }
            else{
                $this->setCodigo("");
                return false; 
            } 
        }
        private function alimentaClasse($dados){
            $this->setCodigo($dados["cod"]);
            $this->setDescricao($dados["descricao"]);
            $this->setPesoLiquido($dados["pesoLiquido"]);
            $this->setPesoBruto($dados["pesoBruto"]);
            $this->setCategoria($dados["categoria"]);
            $this->setSubCategoria($dados["subcategoria"]);
            $this->setMarca($dados["marca"]);
            $this->setPrecoDeVenda($dados["precoVenda"]);
            $this->setPrecoDeCusto($dados["precoCusto"]);
            $this->setEstoque($dados["estoque"]);
            $this->setLimiteDeEstoque($dados["limiteEstoque"]);
            $this->setObs($dados["obs"]);
            $this->setFornecedor($dados["fornecedor"]);
            $this->setNcm($dados["ncm"]);
            $this->setCest($dados["cest"]);
            $this->setCodigoBeneficio($dados["codBeneficio"]);
            $this->setTributacao($dados["tributacao"]);
            
            
        }
        public function getCodigo(){
		  return $this->cod;
        }

        public function setCodigo($cod){
            $this->cod = $cod;
        }

        public function getDescricao(){
            return $this->descricao;
        }

        public function setDescricao($descricao){
            $this->descricao = $descricao;
        }

        public function getPesoLiquido(){
            return $this->pesoLiquido;
        }

        public function setPesoLiquido($pesoLiquido){
            $this->pesoLiquido = $pesoLiquido;
        }

        public function getPesoBruto(){
            return $this->pesoBruto;
        }

        public function setPesoBruto($pesoBruto){
            $this->pesoBruto = $pesoBruto;
        }

        public function getCategoria(){
            return $this->categoria;
        }

        public function setCategoria($categoria){
            $this->categoria = $categoria;
        }
         public function getSubCategoria(){
            return $this->subCategoria;
        }

        public function setSubCategoria($categoria){
            $this->subCategoria = $categoria;
        }
        public function getMarca(){
            return $this->marca;
        }

        public function setMarca($marca){
            $this->marca = $marca;
        }

        public function getPrecoDeVenda(){
            return $this->precoDeVenda;
        }

        public function setPrecoDeVenda($precoDeVenda){
            $this->precoDeVenda = $precoDeVenda;
        }

        public function getPrecoDeCusto(){
            return $this->precoDeCusto;
        }

        public function setPrecoDeCusto($precoDeCusto){
            $this->precoDeCusto = $precoDeCusto;
        }

        public function getEstoque(){
            return $this->estoque;
        }

        public function setEstoque($estoque){
            $this->estoque = $estoque;
        }

        public function getLimiteDeEstoque(){
            return $this->limiteDeEstoque;
        }

        public function setLimiteDeEstoque($limiteDeEstoque){
            $this->limiteDeEstoque = $limiteDeEstoque;
        }

        public function getObs(){
            
            return $this->obs;
            
        }

        public function setObs($obs){
            $this->obs = $obs;
           
        }
        	public function getFornecedor(){
		return $this->fornecedor;
	}

	public function setFornecedor($fornecedor){
		$this->fornecedor = $fornecedor;
	}

	public function getNcm(){
		return $this->ncm;
	}

	public function setNcm($ncm){
		$this->ncm = $ncm;
	}

	public function getCest(){
		return $this->cest;
	}

	public function setCest($cest){
		$this->cest = $cest;
	}

	public function getCodigoBeneficio(){
		return $this->codBeneficio;
	}

	public function setCodigoBeneficio($codBeneficio){
		$this->codBeneficio = $codBeneficio;
	}

	public function getTributacao(){
		return $this->tributacao;
	}

	public function setTributacao($tributacao){
		$this->tributacao = $tributacao;
	}
        public function getBackupCod(){
            return $this->backupCod;
        }

        public function setBackupCod($cod){
            $this->cod = $cod;
        }
        private function returnParams():array{
            return array(
                ":CODIGO"=>$this->getCodigo(),
                ":DESCRICAO"=>$this->getDescricao(),
                ":PESOLIQUIDO"=>$this->getPesoLiquido(),
                ":PESOBRUTO"=>$this->getPesoBruto(),
                ":CATEGORIA"=>$this->getCategoria(),
                ":SUBCATEGORIA"=>$this->getSubCategoria(),
                ":MARCA"=>$this->getMarca(),
                ":PRECODEVENDA"=>$this->getPrecoDeVenda(),
                ":PRECODECUSTO"=>$this->getPrecoDeCusto(),
                ":ESTOQUE"=>$this->getEstoque(),
                ":LIMITEDEESTOQUE"=>$this->getLimiteDeEstoque(),
                ":OBS"=>$this->getObs(),
                ":FORNECEDOR"=>$this->getFornecedor(),
                ":NCM"=>$this->getNcm(),
                ":CEST"=>$this->getCest(),
                ":CODBENEFICIO"=>$this->getCodigoBeneficio(),
                ":TRIBUTACAO"=>$this->getTributacao()
            );
        }
    }
?>