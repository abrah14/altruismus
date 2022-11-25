<?php

    require_once("Conexao.php");

    class Post {

        private $idPost;
        private $idOng;
        private $msg;
        private $dtPost;
        private $img;

        public function getIdPost() {
            return $this->idPost;
        }

        public function getImg() {
            return $this->img;
        }

        public function getIdOng() {
            return $this->idOng;
        }

        public function getMsg() {
            return $this->msg;
        
        }
        public function getDtPost() {
            return $this->dtPost;
        }

        public function setDtPost($dtPost) {
            $this->dtPost = $dtPost;
        }

        public function setMsg($msg) {
            $this->msg = $msg;
        }

        public function setIdOng($idOng) {
            $this->idOng = $idOng;
        }

        public function setIdPost($idPost) {
            $this->idPost = $idPost;
        }

        public function setImg($img) {
            $this->img = $img;
        }

        public function postagem($post) {
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("INSERT INTO tbpost (idpost,msgpost,dtpost,imagempost,idong,atividade) VALUES(?,?,?,?,?,?)");
    
            $stmt->bindValue(1,$post->getIdPost());
            $stmt->bindValue(2,$post->getMsg());
            $stmt->bindValue(3,$post->getDtPost());
            $stmt->bindValue(4,$post->getImg());
            $stmt->bindValue(5,$post->getIdOng());
            $stmt->bindValue(6,1);

            $stmt->execute();
        }

        public function listarPostId($idPost) {
            $conexao = Conexao::conectar();
            $querySelect = "SELECT 
                            tbpost.idpost,msgpost,dtpost,imagempost,nomeong, tbong.idong,fotoong
                            FROM tbpost
                            INNER JOIN tbong
                            ON tbong.idong = tbpost.idong
                            WHERE tbpost.idpost = $idPost";
                
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista; 
        }

        public function listar($id){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT 
                            tbpost.idpost,msgpost,dtpost,imagempost,tbong.nomeong, tbong.idong,fotoong
                            FROM tbpost
                            INNER JOIN tbong
                            ON tbong.idong = tbpost.idong
                            WHERE tbong.idong = $id AND tbong.atividade <> 0 AND tbpost.atividade <> 0";
                
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista; 
        }

        public function listarTd(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT 
                                tbpost.idpost,msgpost,dtpost,imagempost,nomeong,tbong.idong,fotoong
                            FROM tbpost
                            INNER JOIN tbong
                            ON tbong.idong = tbpost.idong
                            WHERE tbong.atividade <> 0 AND tbpost.atividade <> 0 AND tbpost.atividade <> 0
                            ORDER BY dtpost";
                
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista; 
        }

        public function listarDeSeguidores($seguidor){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT 
                                tbpost.idpost,msgpost,dtpost,imagempost,nomeong,tbong.idong,fotoong
                            FROM tbpost
                            INNER JOIN tbong
                                ON tbong.idong = tbpost.idong
                                INNER JOIN tbseguindo
                                    ON tbseguindo.idong = tbong.idOng
                            WHERE tbseguindo.iddoador = $seguidor AND tbpost.atividade <> 0 AND tbpost.atividade <> 0
                            ORDER BY dtpost";
                
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista; 
        }

        public function deletar($idPost) {
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("UPDATE tbreacao,tbpost,tbcomentario SET tbreacao.atividade = 0,tbpost.atividade = 0, tbcomentario.atividade = 0 WHERE tbpost.idpost = ? AND tbcomentario.idpost = ? AND tbreacao.idpost = ?");

            $stmt->bindParam(1,$idPost);
            $stmt->bindParam(2,$idPost);
            $stmt->bindParam(3,$idPost);

            $stmt->execute();
        }

        public function pesquisaPost($texto) {
            $conexao = Conexao::conectar();

            $querySelect=
            "SELECT 
                tbong.idong,nomeong,msgpost,imagempost,fotoong,dtpost,tbpost.idpost
            FROM tbpost 
            INNER JOIN tbong
            ON tbpost.idong = tbong.idong
            WHERE msgpost LIKE '%$texto%' AND tbpost.atividade <> 0 AND tbong.atividade <> 0";
            

            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
        }

    }

?>