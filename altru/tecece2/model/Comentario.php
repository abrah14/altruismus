<?php

    require_once("../model/Conexao.php");

    class Comentario {
        private $idComentario;
        private $comentario;
        private $dtComentario;
        private $idPost;
        private $idDoador;

        public function getIdComentario() {
            return $this->idComentario;
        }

        public function getComentario() {
            return $this->comentario;
        }

        public function getDtComentario() {
            return $this->dtComentario;
        }

        public function getIdPost() {
            return $this->idPost;
        }

        public function getIdDoador() {
            return $this->idDoador;
        }

        public function setIdComentario($idComentario) {
            $this->idComentario = $idComentario;
        }

        public function setComentario($comentario) {
            $this->comentario = $comentario;
        }

        public function setDtComentario($dtComentario) {
            $this->dtComentario = $dtComentario;
        }

        public function setIdPost($idPost) {
            $this->idPost = $idPost;
        }

        public function setIdDoador($idDoador) {
            $this->idDoador = $idDoador;
        }

        public function listar($idPost) {
            $conexao = Conexao::conectar();
            $querySelect = "SELECT 
                                tbcomentario.idcomentario,comentario,datacomentario,nomedoador,fotodoador,tbdoador.iddoador 
                            FROM tbdoador
                            INNER JOIN tbcomentario
                                ON tbcomentario.iddoador = tbdoador.iddoador
                                INNER JOIN tbpost
                                    ON tbpost.idpost = tbcomentario.idpost
                            WHERE tbpost.idpost = $idPost
                            ORDER BY datacomentario DESC";

            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
        }

        public function comentar($comentario) {
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("INSERT INTO tbcomentario(idcomentario,comentario,datacomentario,idpost,iddoador, atividade) VALUES(?,?,?,?,?,?) ");

            $stmt->bindValue(1,$comentario->getIdComentario());
            $stmt->bindValue(2,$comentario->getComentario());
            $stmt->bindValue(3,$comentario->getDtComentario());
            $stmt->bindValue(4,$comentario->getIdPost());
            $stmt->bindValue(5,$comentario->getIdDoador());
            $stmt->bindValue(6,1);

            $stmt->execute();
        }

        public function deletar($idComentario) {
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("UPDATE tbcomentario SET atividade = 0 WHERE idcomentario = ?");

            $stmt->bindParam(1,$idComentario);

            $stmt->execute();
        }

        public function alterar($idComentario,$comentario) {
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("UPDATE tbcomentario SET comentario = ? WHERE idcomentario = ?");

            $stmt->bindParam(1,$comentario);
            $stmt->bindParam(2,$idComentario);

            $stmt->execute();
        }

        

    }

?>