<?php

    require_once("Conexao.php");

    class Reacao {
        private $idReacao;
        private $tipoReacao;
        private $dtReacao;
        private $idPost;
        private $idPerfil;
        private $tipoPerfil;

        public function getIdReacao() {
            return $this->idReacao;
        }

        public function getTipoReacao() {
            return $this->tipoReacao;
        }

        public function getDtReacao() {
            return $this->dtReacao;
        }

        public function getIdPost() {
            return $this->idPost;
        }

        public function getIdPerfil() {
            return $this->idPerfil;
        }

        public function getTipoPerfil() {
            return $this->tipoPerfil;
        }

        public function setIdReacao($idReacao) {
            $this->idReacao = $idReacao;
        }

        public function setTipoReacao($tipoReacao) {
            $this->tipoReacao = $tipoReacao;
        }

        public function setDtReacao($dtReacao) {
            $this->dtReacao = $dtReacao;
        }
        
        public function setIdPost($idPost) {
            $this->idPost = $idPost;
        }

        public function setIdPerfil($idPerfil) {
            $this->idPerfil = $idPerfil;
        }

        public function setTipoPerfil($tipoPerfil) {
            $this->tipoPerfil = $tipoPerfil;
        }

        public function reagir($reagir) {
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("INSERT INTO tbreacao(idreacao,tiporeacao,datareacao,idpost,idperfil,tipoperfil) VALUES(?,?,?,?,?,?) ");

            $stmt->bindValue(1,$reagir->getIdReacao());
            $stmt->bindValue(2,$reagir->getTipoReacao());
            $stmt->bindValue(3,$reagir->getDtReacao());
            $stmt->bindValue(4,$reagir->getIdPost());
            $stmt->bindValue(5,$reagir->getIdPerfil());
            $stmt->bindValue(6,$reagir->getTipoPerfil());

            $stmt->execute();
        }

        public function deletar($idPost,$idPerfil,$tipoPerfil) {
            $conexao = Conexao::conectar();
            $sql = "DELETE FROM tbreacao WHERE idperfil = ? AND tipoperfil = ? AND idpost = ?";

            $stmt = $conexao->prepare($sql);
            $stmt->execute([ $idPerfil, $tipoPerfil, $idPost]);
        }

        public function verificar($idPost,$tipoPerfil,$idPerfil) {
            $conexao = Conexao::conectar();
            
            $stmt = $conexao->prepare(
                "SELECT idreacao FROM tbreacao WHERE idperfil = ? AND tipoperfil = ? AND idpost = ?"
            );

            $stmt->bindParam(1,$idPerfil);
            $stmt->bindParam(2,$tipoPerfil);
            $stmt->bindParam(3,$idPost);

            $stmt->execute();

            if($tipoPerfil == "ong") {

                if($stmt->rowCount() > 0) {
                    return "curtiu";
                }
                else {
                    return false;
                }

            }
            else if($tipoPerfil == "doador") {

                if($stmt->rowCount() > 0) {
                    return "curtiu";
                }
                else {
                    return false;
                }

            }
            else {
                return false;
            }

        }

        public function countReacao($id, $tipo) {
            $conexao = Conexao::conectar();
            $query = 
                "SELECT
                    COUNT(idreacao)
                FROM tbreacao
                WHERE idperfil = $id AND tipoperfil = '$tipo'";

            $resultado = $conexao->query($query);
            $lista = $resultado->fetch();
            return $lista[0];
        }

    }

?>