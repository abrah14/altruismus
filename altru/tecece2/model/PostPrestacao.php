<?php
    require_once("Conexao.php");
    require_once("PrestacaoContasOng.php");

    class PostPrestacao{

        private $idPostPrestacao;
        private $descPostPrestacao;
        private $idPrestacaoContasOng;
        private $dtPostPrestacao;
        private $prestacaoContasOng;

        public function getIdPostPrestacao(){
            return $this->idPostPrestacao;
        }
        public function getDescPostPrestacao(){
            return $this->descPostPrestacao;
        }
        public function getIdPrestacaoContasOng(){
            return $this->idPrestacaoContasOng;
        }
        public function getDtPostPrestacao(){
            return $this->dtPostPrestacao;
        }
        public function getPrestacaoContasOng(){
            return $this->prestacaoContasOng;
        }

        public function setIdPostPrestacao($idPostPrestacao){
            $this->idPostPrestacao = $idPostPrestacao;
        }
        public function setDescPostPrestacao($descPostPrestacao){
            $this->descPostPrestacao = $descPostPrestacao;
        }
        public function setIdPrestacaoContasOng($idPrestacaoContasOng){
            $this->idPrestacaoContasOng = $idPrestacaoContasOng;
        }
        public function setDtPostPrestacao($dtPostPrestacao){
            $this->dtPostPrestacao = $dtPostPrestacao;
        }
        public function setPrestacaoContasOng($prestacaoContasOng){
            $this->prestacaoContasOng = $prestacaoContasOng;
        }

        public function cadastrar($postPrestacao){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("INSERT INTO tbpostprestacao(idpostprestacao,descPostPrestacao,idprestacaoContasOng,dtPostPrestacao) 
            VALUES(?,?,?,?)");

            $stmt->bindvalue(1, $postPrestacao->getIdPostPrestacao());
            $stmt->bindValue(2, $postPrestacao->getDescPostPrestacao());
            $stmt->bindValue(3, $postPrestacao->getIdPrestacaoContasOng());
            $stmt->bindValue(4, $postPrestacao->getDtPostPrestacao());
            
            $stmt->execute();
        }

    }
?>