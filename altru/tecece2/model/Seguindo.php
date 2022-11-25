<?php

    require_once("Conexao.php");

    class Seguindo {
        private $idSeguindo;
        private $idOng;
        private $idDoador;

        public function getIdSeguindo() {
            return $this->idSeguindo;
        }

        public function getIdOng() {
            return $this->idOng;
        }

        public function getIdDoador() {
            return $this->idDoador;
        }

        public function setIdSeguindo($idSeguindo) {
            $this->idSeguindo = $idSeguindo;
        }

        public function setIdOng($idOng) {
            $this->idOng = $idOng;
        }

        public function setIdDoador($idDoador) {
            $this->idDoador = $idDoador;
        }

        public function seguir($seguindo) {
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("INSERT INTO tbseguindo (idseguindo,idong,iddoador) VALUES(?,?,?)");
    
            $stmt->bindValue(1,$seguindo->getIdSeguindo());
            $stmt->bindValue(2,$seguindo->getIdOng());
            $stmt->bindValue(3,$seguindo->getIdDoador());

            $stmt->execute();
        }

        public function deletar($idDoador,$idOng) {
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("DELETE FROM tbseguindo WHERE iddoador = ? AND idong = ?");

            $stmt->bindParam(1,$idDoador);
            $stmt->bindParam(2,$idOng);

            $stmt->execute();
        }

        public function verificarSeguir($idDoador,$idOng) {
            $conexao = Conexao::conectar();
            $querySelect = "SELECT COUNT(*) FROM tbseguindo WHERE iddoador = $idDoador AND idong = $idOng";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista[0];
        }

        public function countSeguindo($id) {
            $conexao = Conexao::conectar();
            $querySelect = "SELECT COUNT(idong) FROM tbseguindo WHERE iddoador = $id";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetch();
            return $lista[0];
        }

        public function countSeguidores($id) {
            $conexao = Conexao::conectar();
            $querySelect = "SELECT COUNT(iddoador) FROM tbseguindo WHERE idong = $id";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetch();
            return $lista[0];
        }

        public function listarSeguindo($id) {
            $conexao = Conexao::conectar();
            $querySelect = "SELECT 
                                tbong.idong,nomeong,fotoong 
                            FROM tbseguindo
                            INNER JOIN tbong
                                ON tbong.idong = tbong.idong
                            WHERE iddoador = $id AND tbong.idong = tbseguindo.idong
                            LIMIT 3";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
        }

        public function listarSeguidores($idOng) {
            $conexao = Conexao::conectar();
            $querySelect = "SELECT 
                                tbdoador.iddoador,nomedoador,fotodoador,emaildoador
                            FROM tbong
                            INNER JOIN tbseguindo
                                ON tbseguindo.idong = tbong.idong
                                INNER JOIN tbdoador
                                    ON tbdoador.iddoador = tbdoador.iddoador
                            WHERE tbong.idong = $idOng AND tbdoador.iddoador = tbseguindo.iddoador
                            LIMIT 3";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
        }

        public function sugestao($id) {
            $conexao = Conexao::conectar();
            $querySelect = "SELECT
                                tbong.idong,nomeong,fotoong
                            FROM tbong
                            INNER JOIN tbpost
                                ON tbpost.idong = tbong.idong
                            -- INNER JOIN tbseguindo
                            --     ON tbseguindo.iddoador = tbdoador.iddoador
                            --     INNER JOIN tbong
                            --         ON tbong.idong = tbseguindo.idong
                            --         INNER JOIN tbpost
                            --             ON tbpost.idong = tbong.idong
                            WHERE dtpost = (
                                SELECT
                                    MAX(dtpost)
                                FROM tbpost
                            )
                            AND NOT EXISTS(
                                SELECT
                                    idong,iddoador
                                FROM tbseguindo
                                WHERE iddoador = $id
                            )
                            -- ) AND tbong.idong NOT IN(
                            --     SELECT
                            --         idong
                            --     FROM tbseguindo
                            -- ) AND tbdoador.iddoador NOT IN(
                            --     SELECT
                            --         iddoador
                            --     FROM tbseguindo
                            -- )
                            LIMIT 3";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
        }

    }

?>