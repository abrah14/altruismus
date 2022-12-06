<?php

    require_once("Conexao.php");

    class ReacaoComent {
        private $idReacaoComent;
        private $idPerfilCurtiu;
        private $tipoPerfil;
        private $idComent;

        public function getIdReacaoComent() {
            return $this->idReacaoComent;
        }

        public function getIdPerfilCurtiu() {
            return $this->idPerfilCurtiu;
        }

        public function getTipoPerfil() {
            return $this->tipoPerfil;
        }

        public function getIdComent() {
            return $this->idComent;
        }

        public function setIdComent($idComent) {
            $this->idComent = $idComent;
        }

        public function verificar($idComent, $idPerfil, $tipoPerfil) {
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("SELECT * FROM tbreacaocoment WHERE idcomentario = ? AND idperfilcurtiu = ? AND tipoperfil = ?");

            $stmt->bindParam(1,$idComent);
            $stmt->bindParam(2,$idPerfil);
            $stmt->bindParam(3,$tipoPerfil);

            $stmt->execute();

            if($tipoPerfil == "ong") {
                if($stmt->rowCount() > 0) {
                    return "curtiuComentario";
                }
                else {
                    return false;
                }
            }
            else if($tipoPerfil == "doador") {
                if($stmt->rowCount() > 0) {
                    return "curtiuComentario";
                }
                else {
                    return false;
                }
            }

            else {
                return false;
            }

        }

        public function countReacaoComent($id, $tipo) {
            $conexao = Conexao::conectar();
            $query = 
                "SELECT
                    COUNT(idreacaocoment)
                FROM tbreacaocoment
                WHERE idperfilcurtiu = $id AND tipoperfil = '$tipo'";

            $resultado = $conexao->query($query);
            $lista = $resultado->fetch();
            return $lista[0];
        }

    }

?>