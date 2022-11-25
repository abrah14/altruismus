<?php

    require_once("Conexao.php");
    
    class Ong{
        private $idOng;

        private $cepOng;
        private $cidadeOng;
        private $bairroOng;
        private $complementoOng;
        private $estadoOng;
        private $ruaOng;
        private $nomeOng;
        private $emailOng;
        private $senhaOng;
        private $dataNascOng;
        private $lugradouroOng;
        private $fotoOng;
        private $dataInscricao;

        public function getIdOng(){
            return $this->idOng;
        }

        public function getFotoOng() {
            return $this->fotoOng;
        }

        public function getCepOng(){
            return $this->cepOng;
        }
        public function getCidadeOng(){
            return $this->cidadeOng;
        }
        public function getBairroOng(){
            return $this->bairroOng;
        }
        public function getComplementoOng(){
            return $this->complementoOng;
        }
        public function getEstadoOng(){
            return $this->estadoOng;
        }
        public function getRuaOng(){
            return $this->ruaOng;
        }
        public function getNomeOng(){
            return $this->nomeOng;
        }
        public function getEmailOng(){
            return $this->emailOng;
        }
        public function getSenhaOng(){
            return $this->senhaOng;
        }
        public function getDataNascOng(){
            return $this->dataNascOng;
        }
        public function getLugradouroOng(){
            return $this->lugradouroOng;
        }

        public function getDataInscricao(){
            return $this->dataInscricao;
        }


        public function setFotoOng($fotoOng) {
            $this->fotoOng = $fotoOng;
        }

        public function setDataInscricao($dataInscricao) {
            $this->dataInscricao = $dataInscricao;
        }

        public function setIdOng($idOng){
            $this->idOng = $idOng;
        }
        public function setCepOng($cepOng){
            $this->cepOng = $cepOng;
        }
        public function setCidadeOng($cidadeOng){
            $this->cidadeOng = $cidadeOng;
        }
        public function setBairroOng($bairroOng){
            $this->bairroOng = $bairroOng;
        }
        public function setComplementoOng($complementoOng){
            $this->complementoOng = $complementoOng;
        }
        public function setEstadoOng($estadoOng){
            $this->estadoOng = $estadoOng;
        }
        public function setRuaOng($ruaOng){
            $this->ruaOng = $ruaOng;
        }
        public function setNomeOng($nomeOng){
            $this->nomeOng = $nomeOng;
        }
        public function setEmailOng($emailOng){
            $this->emailOng = $emailOng;
        }
        public function setSenhaOng($senhaOng){
            $this->senhaOng = $senhaOng;
        }
        public function setDataNascOng($dataNascOng){
            $this->dataNascOng = $dataNascOng;
        }
        public function setLugradouroOng($lugradouroOng){
            $this->lugradouroOng = $lugradouroOng;
        }

        public function cadastrar ($ong){

            session_start();
    
            $_SESSION['email-session'] = $ong->getEmailOng();
    
            $_SESSION['senha-session'] = $ong->getSenhaOng();

            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("INSERT INTO tbong(idOng,cepOng,cidadeOng,bairroOng ,complementoOng,
            estadoOng,ruaOng,nomeOng,emailOng,senhaOng,dataNascOng,lugradouroOng,atividade,fotoong,datainscricao) VALUES(?,?,?,?,?,?,?,?,?,MD5(?),?,?,?,?,?)");
            $stmt->bindvalue(1, $ong->getIdOng());
            $stmt->bindvalue(2, $ong->getCepOng());
            $stmt->bindvalue(3, $ong->getCidadeOng());
            $stmt->bindvalue(4, $ong->getBairroOng());
            $stmt->bindvalue(5, $ong->getComplementoOng());
            $stmt->bindvalue(6, $ong->getEstadoOng());
            $stmt->bindvalue(7, $ong->getRuaOng());
            $stmt->bindvalue(8, $ong->getNomeOng());
            $stmt->bindValue(9, $ong->getEmailOng());
            $stmt->bindValue(10, $ong->getSenhaOng());
            $stmt->bindValue(11, $ong->getDataNascOng());
            $stmt->bindValue(12, $ong->getLugradouroOng());
            $stmt->bindValue(13,1);
            $stmt->bindValue(14, $ong->getFotoOng());
            $stmt->bindValue(15, $ong->getDataInscricao());

            $stmt->execute();
                                                                               
        }
        public function listar(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT 
                            tbong.idong,cidadeong,bairroong,
                            complementoong,estadoong,ruaong,
                            cepong,nomeong,lugradouroong,datanascong,
                            emailong,senhaong,telefoneong,fotoong
                            FROM tbong
                            LEFT JOIN tbtelefoneong
                            ON tbtelefoneong.idong = tbong.idong
                            WHERE tbong.atividade <> 0
                            ORDER BY tbong.idong";
                
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista; 
        }

        public function listarEspecifico($emailOng) {
            $conexao = Conexao::conectar();
            $querySelect =
            "SELECT 
            idong
            FROM tbong
            WHERE emailong LIKE '$emailOng'";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
        }

        public function deletar($idOng) {
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("UPDATE tbong,tbtelefoneong,tbpost SET tbpost.atividade = 0,tbong.atividade = 0,tbtelefoneong.atividade = 0 WHERE tbong.idong = ?");
            $stmt->bindParam(1,$idOng);

            $stmt->execute();
        }

        public function alterar($idOng, $nomeOng, $emailOng, $dtNasc, $cidadeOng, $estadoOng, $bairroOng, $ruaOng, $cepOng, $compOng, $lugradouroOng, $senhaOng, $fotoOng ) 
        {
            $conexao = Conexao::conectar();

            if(isset($fotoOng) && !empty($fotoOng)) {
                $stmt = $conexao->prepare("UPDATE tbong SET nomeong = ?, emailong = ?, datanascong = ?, 
                                            cidadeong = ?, estadoong = ?, bairroong = ?, ruaong = ?, 
                                            cepong = ?, complementoong = ?, lugradouroong = ?, senhaong = ?, fotoong = ?
                                            WHERE idong = ?");
                $stmt->bindParam(1, $nomeOng);
                $stmt->bindParam(2,$emailOng);
                $stmt->bindParam(3,$dtNasc);
                $stmt->bindParam(4,$cidadeOng);
                $stmt->bindParam(5,$estadoOng);
                $stmt->bindParam(6,$bairroOng);
                $stmt->bindParam(7,$ruaOng);
                $stmt->bindParam(8,$cepOng);
                $stmt->bindParam(9,$compOng);
                $stmt->bindParam(10,$lugradouroOng);
                $stmt->bindParam(11,$senhaOng);
                $stmt->bindParam(12,$fotoOng);
                $stmt->bindParam(13,$idOng);
            } else {
                $stmt = $conexao->prepare("UPDATE tbong SET nomeong = ?, emailong = ?, datanascong = ?, 
                                            cidadeong = ?, estadoong = ?, bairroong = ?, ruaong = ?, 
                                            cepong = ?, complementoong = ?, lugradouroong = ?, senhaong = ?
                                            WHERE idong = ?");
                $stmt->bindParam(1, $nomeOng);
                $stmt->bindParam(2,$emailOng);
                $stmt->bindParam(3,$dtNasc);
                $stmt->bindParam(4,$cidadeOng);
                $stmt->bindParam(5,$estadoOng);
                $stmt->bindParam(6,$bairroOng);
                $stmt->bindParam(7,$ruaOng);
                $stmt->bindParam(8,$cepOng);
                $stmt->bindParam(9,$compOng);
                $stmt->bindParam(10,$lugradouroOng);
                $stmt->bindParam(11,$senhaOng);
                $stmt->bindParam(12,$idOng);
            }


            $stmt->execute();
        }


        public function pesquisaOng($nomeOng) {
            $conexao = Conexao::conectar();

            if(is_numeric($nomeOng)) {
                $querySelect=
                "SELECT 
                    tbong.idong,cepong,cidadeong,bairroong,complementoong,estadoong,
                    ruaong,nomeong,emailong,senhaong,datanascong,lugradouroong,telefoneong
                FROM tbong 
                LEFT JOIN tbtelefoneong
                ON tbtelefoneong.idong = tbong.idong
                WHERE tbong.idong = $nomeOng AND tbong.atividade <> 0";
            }
            else{
                $querySelect=
                "SELECT 
                    tbong.idong,cepong,cidadeong,bairroong,complementoong,estadoong,
                    ruaong,nomeong,emailong,senhaong,datanascong,lugradouroong,telefoneong
                FROM tbong 
                LEFT JOIN tbtelefoneong
                ON tbtelefoneong.idong = tbong.idong
                WHERE nomeong LIKE '%$nomeOng%' AND tbong.atividade <> 0";
            }

            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
        }

        public function pesquisaNomeOng($nomeOng) {
            $conexao = Conexao::conectar();

            $querySelect=
            "SELECT 
                tbong.idong,nomeong,msgpost,imagempost,fotoong,dtpost,tbpost.idpost
            FROM tbong 
            INNER JOIN tbpost
            ON tbpost.idong = tbong.idong
            WHERE nomeong LIKE '%$nomeOng%' AND tbong.atividade <> 0 AND tbpost.atividade <> 0";

            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
        }

        public function listarPorNome($nomeOng) {
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idong FROM tbong WHERE nomeong LIKE '$nomeOng' AND atividade <> 0";

            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetch();
            return $lista[0];
        }

        public function getOng($id) {
            $conexao = Conexao::conectar();
            $querySelect = "SELECT 
                            tbong.idong,cidadeong,bairroong,
                            complementoong,estadoong,ruaong,
                            cepong,nomeong,lugradouroong,datanascong,
                            emailong,senhaong,telefoneong,fotoong,datainscricao
                            FROM tbong
                            INNER JOIN tbtelefoneong
                            ON tbtelefoneong.idong = tbong.idong
                            WHERE tbong.atividade <> 0 AND tbong.idong = $id";
                
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetch();
            return $lista; 
        }

        public function contagemUsers() {
            $conexao = Conexao::conectar();
            $querySelect = "SELECT
                                *
                            FROM
                                vwcalcularong
                                ,vwcalculardoador
                                ,vwrespostausuariosim
                                ,vwrespostausuarionao
                                ,vwrestacaocontasong";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
        }

        public function quantidadePorMes($mes){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT
                                COUNT(idong)
                            FROM tbong
                            WHERE MONTH(datainscricao) = $mes";
            $resultado = $conexao->query($querySelect);
            $dadosMes = $resultado->fetch();
            $dadosMes = $dadosMes[0];
            $dadosRetorno = (int)$dadosMes ;
            return $dadosRetorno;
        }  

    }

    
    

?>