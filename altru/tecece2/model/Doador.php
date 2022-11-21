<?php
    require_once("Conexao.php");

    class Doador{
        private $idDoador;
        private $cidadeDoador;
        private $bairroDoador;
        private $complementoDoador;
        private $estadoDoador;
        private $ruaDoador;
        private $cepDoador;
        private $nomeDoador;
        private $lugradouroDoador;
        private $dataNascDoador;
        private $emailDoador;
        private $senhaDoador;
        private $cpfDoador;
        private $dataInscricao;
        private $fotoDoador;

        public function getIdDoador(){
            return $this->idDoador;
        }
        public function getFotoDoador() {
            return $this->fotoDoador;
        }
        public function getCidadeDoador(){
            return $this->cidadeDoador;
        }
        public function getBairroDoador(){
            return $this->bairroDoador;
        }
        public function getComplementoDoador(){
            return $this->complementoDoador;
        }
        public function getEstadoDoador(){
            return $this->estadoDoador;
        }
        public function getRuaDoador(){
            return $this->ruaDoador;
        }
        public function getCepDoador(){
            return $this->cepDoador;
        }
        public function getNomeDoador(){
            return $this->nomeDoador;
        }
        public function getLugradouroDoador(){
            return $this->lugradouroDoador;
        }
        public function getDataNascDoador(){
            return $this->dataNascDoador;
        }
        public function getEmailDoador(){
            return $this->emailDoador;
        }
        public function getSenhaDoador(){
            return $this->senhaDoador;
        }
        public function getCpfDoador(){
            return $this->cpfDoador;
        }

        public function getDataInscricao(){
            return $this->dataInscricao;
        }

        public function setIdDoador($idDoador){
            $this->idDoador = $idDoador;
        }
        public function setFotoDoador($fotoDoador) {
            $this->fotoDoador = $fotoDoador;
        }
        public function setDataInscricao($dataInscricao) {
            $this->dataInscricao = $dataInscricao;
        }
        public function setCidadeDoador($cidadeDoador){
            $this->cidadeDoador = $cidadeDoador;
        }
        public function setBairroDoador($bairroDoador){
            $this->bairroDoador = $bairroDoador;
        }
        public function setComplementoDoador($complementoDoador){
            $this->complementoDoador = $complementoDoador;
        }
        public function setEstadoDoador($estadoDoador){
            $this->estadoDoador = $estadoDoador;
        }
        public function setRuaDoador($ruaDoador){
            $this->ruaDoador = $ruaDoador;
        }
        public function setCepDoador($cepDoador){
            $this->cepDoador = $cepDoador;
        }
        public function setNomeDoador($nomeDoador){
            $this->nomeDoador = $nomeDoador;
        }
        public function setLugradouroDoador($lugradouroDoador){
            $this->lugradouroDoador = $lugradouroDoador;
        }
        public function setDataNascDoador($dataNascDoador){
            $this->dataNascDoador = $dataNascDoador;
        }
        public function setEmailDoador($emailDoador){
            $this->emailDoador = $emailDoador;
        }
        public function setSenhaDoador($senhaDoador){
            $this->senhaDoador = $senhaDoador;
        }
        public function setCpfDoador($cpfDoador){
            $this->cpfDoador = $cpfDoador;
        }
       
        public function cadastrar ($doador){

            session_start();
    
            $_SESSION['email-session'] = $doador->getEmailDoador();
    
            $_SESSION['senha-session'] = $doador->getSenhaDoador();

            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("INSERT INTO tbdoador(iddoador,cidadedoador, 
            bairrodoador,complementodoador,estadodoador,
            ruadoador,cepdoador,nomedoador,lugradourodoador,datanascdoador, 
            emaildoador,senhadoador,cpfdoador, datainscricao,atividade,fotodoador) VALUES(?,?,?,?,?,?,?,?,?,?,?,MD5(?),?,?,?,?)");
            $stmt->bindvalue(1, $doador->getIdDoador());
            $stmt->bindvalue(2, $doador->getCidadeDoador());
            $stmt->bindvalue(3, $doador->getBairroDoador());
            $stmt->bindvalue(4, $doador->getComplementoDoador());
            $stmt->bindvalue(5, $doador->getEstadoDoador());
            $stmt->bindvalue(6, $doador->getRuaDoador());
            $stmt->bindvalue(7, $doador->getCepDoador());
            $stmt->bindvalue(8, $doador->getNomeDoador());
            $stmt->bindValue(9, $doador->getLugradouroDoador());
            $stmt->bindValue(10, $doador->getDataNascDoador());
            $stmt->bindvalue(11, $doador->getEmailDoador());
            $stmt->bindvalue(12, $doador->getSenhaDoador());
            $stmt->bindvalue(13, $doador->getCpfDoador());
            $stmt->bindvalue(14, $doador->getDataInscricao());
            $stmt->bindValue(15,1);
            $stmt->bindValue(16, $doador->getFotoDoador());

            $stmt->execute();
                                                                               
        }

        public function listar(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT 
                            tbdoador.iddoador,cidadedoador,bairrodoador,cpfdoador,
                            complementodoador,estadodoador,ruadoador,
                            cepdoador,nomedoador,lugradourodoador,datanascdoador,
                            emaildoador,senhadoador,datainscricao,
                            telefonedoador,fotodoador
                            FROM tbdoador
                            LEFT JOIN tbtelefonedoador 
                            ON tbtelefonedoador.iddoador = tbdoador.iddoador
                            WHERE tbdoador.atividade <> 0
                            ORDER BY tbdoador.iddoador";
                
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista; 
             
        }

        public function listarEspecifico($emailDoador) {
            $conexao = Conexao::conectar();
            $querySelect =
            "SELECT 
            iddoador
            FROM tbdoador
            WHERE emaildoador LIKE '$emailDoador'";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
        }

        public function deletar($idDoador) {
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("UPDATE tbdoador,tbtelefonedoador SET tbdoador.atividade = 0,tbtelefonedoador.atividade = 0 WHERE tbdoador.iddoador = ?");
            $stmt->bindParam(1,$idDoador);

            $stmt->execute();            
        }

        public function alterar($idDoador, $nomeDoador, $emailDoador, $cpfDoador, $dataNascDoador, $cidadeDoador, $estadoDoador, $bairroDoador, $ruaDoador, $cepDoador, $compDoador, $lugradouroDoador, $senhaDoador ) 
        {
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("UPDATE tbdoador SET nomedoador = ?, emaildoador = ?, cpfdoador = ?, dataNascDoador = ?, 
                                        cidadeDoador = ?, estadoDoador = ?, bairroDoador = ?, ruadoador = ?, 
                                        cepdoador = ?, complementoDoador = ?, lugradourodoador = ?, senhadoador = ?
                                        WHERE iddoador = ?");
            $stmt->bindParam(1, $nomeDoador);
            $stmt->bindParam(2,$emailDoador);
            $stmt->bindParam(3,$cpfDoador);
            $stmt->bindParam(4,$dataNascDoador);
            $stmt->bindParam(5,$cidadeDoador);
            $stmt->bindParam(6,$estadoDoador);
            $stmt->bindParam(7,$bairroDoador);
            $stmt->bindParam(8,$ruaDoador);
            $stmt->bindParam(9,$cepDoador);
            $stmt->bindParam(10,$compDoador);
            $stmt->bindParam(11,$lugradouroDoador);
            $stmt->bindParam(12,$senhaDoador);
            $stmt->bindParam(13,$idDoador);

            $stmt->execute();
        }

        public function quantidadePorMes($mes){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT
                                COUNT(iddoador)
                            FROM tbdoador
                            WHERE MONTH(datainscricao) = $mes";
            $resultado = $conexao->query($querySelect);
            $dadosMes = $resultado->fetch();
            $dadosMes = $dadosMes[0];
            $dadosRetorno = (int)$dadosMes ;
            return $dadosRetorno;
        }

        //CRIAR FUNÇÃO PRA RETORNAR VALOR DE DOADORES E ONGs//
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

        public function quantidadePorMes1($mes){
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


        public function pesquisaDoador($nomeDoador) {
            $conexao = Conexao::conectar();
            
            if(is_numeric($nomeDoador)) {
                $querySelect =
                "SELECT 
                tbdoador.iddoador,cidadedoador,bairrodoador,cpfdoador,
                complementodoador,estadodoador,ruadoador,
                cepdoador,nomedoador,lugradourodoador,datanascdoador,
                emaildoador,senhadoador,datainscricao,
                telefonedoador
                FROM tbdoador
                LEFT JOIN tbtelefonedoador 
                ON tbtelefonedoador.iddoador = tbdoador.iddoador
                WHERE tbdoador.atividade <> 0 AND tbdoador.iddoador = $nomeDoador";
            }
            else{
                $querySelect =
                "SELECT 
                tbdoador.iddoador,cidadedoador,bairrodoador,cpfdoador,
                complementodoador,estadodoador,ruadoador,
                cepdoador,nomedoador,lugradourodoador,datanascdoador,
                emaildoador,senhadoador,datainscricao,
                telefonedoador
                FROM tbdoador
                LEFT JOIN tbtelefonedoador 
                ON tbtelefonedoador.iddoador = tbdoador.iddoador
                WHERE tbdoador.atividade <> 0 AND nomedoador LIKE '%$nomeDoador%'";
            }

            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
        }
        
        public function verificarUsuario($email, $senha) {
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare(
                "SELECT
                    emaildoador, senhadoador
                FROM tbdoador 
                WHERE EXISTS (
                    SELECT * FROM tbdoador
                    WHERE
                    emaildoador = ? AND senhadoador = MD5(?))"
            );

            $stmt->bindParam(1, $email);
            $stmt->bindParam(2, $senha);

            $stmt->execute();

            $linhas = $stmt->rowCount();

            if($linhas>0) {
                $querySelect = "SELECT iddoador FROM tbdoador WHERE emaildoador LIKE '$email' AND senhadoador = MD5($senha) ";
                $resultado = $conexao->query($querySelect);
                $lista = $resultado->fetch();
                return $_SESSION['iddoador'] = $lista[0];
            }
            else{
                $stmt = $conexao->prepare(
                    "SELECT
                        emailong, senhaong
                    FROM tbong 
                    WHERE EXISTS (
                        SELECT * FROM tbong
                        WHERE
                        emailong = ? AND senhaong = MD5(?))"
                );
                
                $stmt->bindParam(1, $email);
                $stmt->bindParam(2, $senha);

                $stmt->execute();

                $linhas = $stmt->rowCount();

                if($linhas > 0) {
                    $querySelect = "SELECT idong FROM tbong WHERE emailong LIKE '$email' AND senhaong = MD5($senha) ";
                    $resultado = $conexao->query($querySelect);
                    $lista = $resultado->fetch();
                    return $_SESSION['idong'] = $lista[0];
                    //return true;
                }
                else{
                    $stmt = $conexao->prepare(
                        "SELECT
                            emailAdmin, senhaAdmin
                        FROM tbadmin 
                        WHERE EXISTS (
                            SELECT * FROM tbadmin
                            WHERE
                            emailAdmin = ? AND senhaAdmin = MD5(?))"
                    );
                    
                    $stmt->bindParam(1, $email);
                    $stmt->bindParam(2, $senha);
    
                    $stmt->execute();
    
                    $linhas = $stmt->rowCount();

                    if($linhas > 0) {
                        $querySelect = "SELECT idadmin FROM tbadmin WHERE emailadmin LIKE '$email' AND senhaadmin = MD5($senha) ";
                        $resultado = $conexao->query($querySelect);
                        $lista = $resultado->fetch();
                        return $_SESSION['idadmin'] = $lista[0];
                    }
                    else {
                        return false;
                    }
                }
                
            }
            
        }

        public function getDoador($id) {
            $conexao = Conexao::conectar();
            $querySelect=
                "SELECT 
                    tbdoador.iddoador,cidadedoador,bairrodoador,cpfdoador,
                    complementodoador,estadodoador,ruadoador,
                    cepdoador,nomedoador,lugradourodoador,datanascdoador,
                    emaildoador,senhadoador,
                    telefonedoador,fotodoador
                FROM tbdoador
                INNER JOIN tbtelefonedoador
                    ON tbtelefonedoador.iddoador = tbdoador.iddoador 
                WHERE tbdoador.iddoador = $id AND tbdoador.atividade <> 0";

            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetch();
            return $lista;
        }
        
        public function editarImg($imagem, $id) {
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT fotodoador FROM tbdoador WHERE iddoador = ? AND fotodoador LIKE '%?%'");

            $stmt->bindParam(1,$id);
            $stmt->bindParam(2,$imagem);

            if($stmt->rowCount() == 0) {
                $stmt = $conexao->prepare("UPDATE tbdoador SET fotodoador = ? WHERE iddoador = ?");

                $stmt->bindParam(1,$imagem);
                $stmt->bindParam(2,$id);
            }

            $stmt->execute();

            // $querySelect = "SELECT fotodoador FROM tbdoador WHERE iddoador = $id";

            // $resultado = $conexao->query($querySelect);
            // $lista = $resultado->fetch();
            // return $lista;
        }
 
    }
     
?>