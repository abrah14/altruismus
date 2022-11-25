<?php
    
    require_once("Conexao.php");

    class PrestacaoContasOng{
        private $idPrestacaoContasOng;
        private $quantidadeItensRecebido;
        private $descProdutosRecebidos;
        private $dataRecebimento;
        private $fotoOng;
        private $fotoDoador;
        private $idOng;

        public function getIdPrestacaoContasOng(){
            return $this->idPrestacaoContasOng;
        }
        public function getQuantidadeItensRecebido(){
            return $this->quantidadeItensRecebido;
        }
        public function getDescProdutosRecebidos(){
            return $this->descProdutosRecebidos;
        }
        public function getDataRecebimento(){
            return $this->dataRecebimento;
        }
        public function getFotoOng(){
            return $this->fotoOng;
        }
        public function getFotoDoador(){
            return $this->fotoDoador;
        }
        public function getIdOng(){
            return $this->idOng;
        }

        public function setIdPrestacaoContasOng($idPrestacaoContasOng){
            $this->idPrestacaoContasOng = $idPrestacaoContasOng;
        }
        public function setQuantidadeItensRecebido($quantidadeItensRecebido){
            $this->quantidadeItensRecebido = $quantidadeItensRecebido;
        }
        public function setDescProdutosRecebidos($descProdutosRecebidos){
            $this->descProdutosRecebidos = $descProdutosRecebidos;
        }
        public function setDataRecebimento($dataRecebimento){
            $this->dataRecebimento = $dataRecebimento;
        }
        public function setFotoOng($fotoOng){
            $this->fotoOng = $fotoOng;
        }
        public function setFotoDoador($fotoDoador){
            $this->fotoDoador = $fotoDoador;
        }
        public function setIdOng($idOng){
            $this->idOng = $idOng;
        }

        public function cadastrar($prestacaoContasOng){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("INSERT INTO tbprestacaocontasong(idprestacaocontasong,quantidadeitensrecebido,
            descprodutosrecebidos,datarecebimento,fotoong,fotodoador,idong) 
            VALUES(?,?,?,?,?,?,?)");

            $stmt->bindValue(1, $prestacaoContasOng->getIdPrestacaoContasOng());
            $stmt->bindValue(2, $prestacaoContasOng->getQuantidadeItensRecebido());
            $stmt->bindValue(3, $prestacaoContasOng->getDescProdutosRecebidos());
            $stmt->bindValue(4, $prestacaoContasOng->getDataRecebimento());
            $stmt->bindValue(5, $prestacaoContasOng->getFotoOng());
            $stmt->bindValue(6, $prestacaoContasOng->getFotoDoador());
            $stmt->bindValue(7, $prestacaoContasOng->getIdOng());
            
            $stmt->execute();
        }

        public function listarTD(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idPrestacaoContasOng,quantidadeItensRecebido,descProdutosRecebidos,fotoDoador,dataRecebimento,tbong.fotoong,tbong.nomeong,tbprestacaocontasong.fotoOng,tbong.idong
                            FROM tbprestacaocontasong
                            INNER JOIN tbong 
                            ON tbong.idong = tbprestacaocontasong.idong
                            ORDER BY idPrestacaoContasOng DESC";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;   
        }

        public function listar($id){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idPrestacaoContasOng,quantidadeItensRecebido,descProdutosRecebidos,fotoDoador,dataRecebimento,tbong.fotoong,tbong.nomeong,tbprestacaocontasong.fotoOng
                            FROM tbprestacaocontasong
                            INNER JOIN tbong 
                            ON tbong.idong = tbprestacaocontasong.idong
                            WHERE tbong.idong = $id";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;   
        }

        public function deletar($idPrestacaoContasOng) {
            $conexao = Conexao::conectar();
            $querySelect = "DELETE FROM tbprestacaocontasong WHERE idprestacaocontasong = $idPrestacaoContasOng";
            $resultado = $conexao->query($querySelect);
            return  $resultado;
        }

        public function alterar($idPrestacaoContasOng, $quantidadeItensRecebido, $descProdutosRecebidos, $dataRecebimento, $ong) 
        {
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("UPDATE tbprestacaocontasong 
                                        INNER JOIN tbong
                                        ON tbprestacaocontasong.idong = tbong.idong
                                        SET quantidadeitensrecebido = ?, descprodutosrecebidos = ?, datarecebimento = ?, nomeOng = ?
                                        WHERE tbprestacaocontasong.idprestacaocontasong = ?");
            $stmt->bindParam(1, $quantidadeItensRecebido);
            $stmt->bindParam(2,$descProdutosRecebidos);
            $stmt->bindParam(3,$dataRecebimento);
            $stmt->bindParam(4,$ong);
            $stmt->bindParam(5,$idPrestacaoContasOng);

            $stmt->execute();
        }

        public function pesquisaPrestacao($nomeOng,$dtInicio,$dtTermino) {
            $conexao = Conexao::conectar();
            if(is_numeric($nomeOng)) {

                if(($dtInicio == null) || ($dtTermino == null)) {
                    $querySelect = "SELECT 
                                        idprestacaocontasong,quantidadeitensrecebido,descprodutosrecebidos,
                                        datarecebimento,nomeong
                                    FROM tbprestacaocontasong
                                    INNER JOIN tbong 
                                        ON tbong.idong = tbprestacaocontasong.idOng
                                    WHERE tbprestacaocontasong.idprestacaocontasong = $nomeOng";
                }
                else{
                    if($nomeOng == null) {
                        $querySelect=
                        "SELECT 
                            idprestacaocontasong,quantidadeitensrecebido,descprodutosrecebidos,
                            datarecebimento,nomeong
                        FROM tbprestacaocontasong
                        INNER JOIN tbong 
                            ON tbong.idong = tbprestacaocontasong.idOng
                        WHERE datarecebimento BETWEEN '$dtInicio' AND '$dtTermino'
                        ";
                    }
                    else{
                        $querySelect=
                        "SELECT 
                            idprestacaocontasong,quantidadeitensrecebido,descprodutosrecebidos,
                            datarecebimento,nomeong
                        FROM tbprestacaocontasong
                        INNER JOIN tbong 
                            ON tbong.idong = tbprestacaocontasong.idOng
                        WHERE tbprestacaocontasong.idprestacaocontasong = $nomeOng
                        AND datarecebimento BETWEEN '$dtInicio' AND '$dtTermino'
                        ";
                    }
                }
            }
            else {
                if(($dtInicio == null) || ($dtTermino == null)) {
                    $querySelect = "SELECT 
                                        idprestacaocontasong,quantidadeitensrecebido,descprodutosrecebidos,
                                        datarecebimento,nomeong
                                    FROM tbprestacaocontasong
                                    INNER JOIN tbong 
                                        ON tbong.idong = tbprestacaocontasong.idOng
                                    WHERE nomeong LIKE '%$nomeOng%'";
                }
                else{
                    if($nomeOng == null) {
                        $querySelect=
                        "SELECT 
                            idprestacaocontasong,quantidadeitensrecebido,descprodutosrecebidos,
                            datarecebimento,nomeong
                        FROM tbprestacaocontasong
                        INNER JOIN tbong 
                            ON tbong.idong = tbprestacaocontasong.idOng
                        WHERE datarecebimento BETWEEN '$dtInicio' AND '$dtTermino'
                        ";
                    }
                    else{
                        $querySelect=
                        "SELECT 
                            idprestacaocontasong,quantidadeitensrecebido,descprodutosrecebidos,
                            datarecebimento,nomeong
                        FROM tbprestacaocontasong
                        INNER JOIN tbong 
                            ON tbong.idong = tbprestacaocontasong.idOng
                        WHERE nomeong LIKE '%$nomeOng%'
                        AND datarecebimento BETWEEN '$dtInicio' AND '$dtTermino'
                        ";
                    }
                }
            }
            
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
        }

}

?>