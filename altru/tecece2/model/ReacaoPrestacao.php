<?php

    require_once("Conexao.php");

    class ReacaoPrestacao {
        private $idReacaoPrestacao;
        private $tipoReacao;
        private $idPrestacaoContasOng;
        private $idPost;
        private $idPerfil;
        private $tipoPerfil;

        public function getIdReacaoPrestacao() {
            return $this->idReacaoPrestacao;
        }

        public function getTipoReacao() {
            return $this->tipoReacao;
        }

        public function getIdPrestacaoContasOng() {
            return $this->idPrestacaoContasOng;
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


        public function setIdReacaoPrestacao($idReacaoPrestacao) {
            $this->idReacaoPrestacao = $idReacaoPrestacao;
        }

        public function setTipoReacao($tipoReacao) {
            $this->tipoReacao = $tipoReacao;
        }

        public function setIdPrestacaoContasOng($idPrestacaoContasOng) {
            $this->idPrestacaoContasOng = $idPrestacaoContasOng;
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

        public function reagirPresta($reagirPresta) {
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("INSERT INTO tbreacaoprestacao(idreacaoprestacao,idPrestacaoContasOng,tiporeacao,idperfil,tipoperfil,idpostprestacao) VALUES(?,?,?,?,?,?) ");

            $stmt->bindValue(1,$reagirPresta->getIdReacaoPrestacao());
            $stmt->bindValue(2,$reagirPresta->getIdPrestacaoContasOng());
            $stmt->bindValue(3,$reagirPresta->getTipoReacao());
            $stmt->bindValue(4,$reagirPresta->getIdPerfil());
            $stmt->bindValue(5,$reagirPresta->getTipoPerfil());
            $stmt->bindValue(6,$reagirPresta->getIdPost());

            $stmt->execute();
        }

        public function deletar($idPrestacaoContasOng,$idPerfil,$tipoPerfil) {
            $conexao = Conexao::conectar();
            $sql = "DELETE FROM tbreacaoprestacao WHERE idperfil = ? AND tipoperfil = ? AND idprestacaocontasong = ?";

            $stmt = $conexao->prepare($sql);
            $stmt->execute([ $idPerfil, $tipoPerfil, $idPrestacaoContasOng]);
        }

        public function verificar($idPrestacaoContasOng,$tipoPerfil,$idPerfil) {
            $conexao = Conexao::conectar();
            
            $stmt = $conexao->prepare(
                "SELECT idreacaoprestacao FROM tbreacaoprestacao
                INNER JOIN tbprestacaocontasong
                    ON tbprestacaocontasong.idprestacaocontasong = tbreacaoprestacao.idprestacaocontasong
                 WHERE tbprestacaocontasong.idprestacaocontasong = ? AND tipoperfil = ? AND idperfil = ?"
            );

            $stmt->bindParam(1,$idPrestacaoContasOng);
            $stmt->bindParam(2,$tipoPerfil);
            $stmt->bindParam(3,$idPerfil);

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

    }

?>