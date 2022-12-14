<?php

date_default_timezone_set('America/Sao_Paulo');

define('BD_SERVIDOR','localhost');
define('BD_USUARIO','root');
define('BD_SENHA','');
define('BD_BANCO','login');
    
class Banco{

    protected $mysqli;

    public function __construct(){
        $this->conexao();
    }

    private function conexao(){
        $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO , BD_SENHA, BD_BANCO);
    }

    public function setCadastro($email,$senha,$endereco,$bairro,$cep,$cidade,$estado){
        $stmt = $this->mysqli->prepare("INSERT INTO cadastro (`email`, `senha`, `endereco`, `bairro`, `cep`, `cidade`, `estado`) VALUES (?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssss",$email,$senha,$endereco,$bairro,$cep,$cidade,$estado);
        if( $stmt->execute() == TRUE){
            return true ;
        }else{
            return false;
        }

    }

    public function getCadastro($id) {
        try {
            if (isset($id) && $id >0) {
                $stmt = $this->mysqli->query("SELECT * FROM cadastro WHERE id = '".$id."';");
            }else {
                $stmt = $this->mysqli->query("SELECT * FROM cadastro;");
            }
            $lista = $stmt->fetch_all(MYSQLI_ASSOC);
            $f_lista = array();
            $i = 0;
            foreach ($lista as $l) {
                $f_lista[$i]['id'] = $l['id'];
                $f_lista[$i]['email'] = $l['email'];
                $f_lista[$i]['senha'] = $l['senha'];
                $f_lista[$i]['endereco'] = $l['endereco'];
                $f_lista[$i]['bairro'] = $l['bairro'];
                $f_lista[$i]['cep'] = $l['cep'];
                $f_lista[$i]['cidade'] = $l['cidade'];
                $f_lista[$i]['estado'] = $l['estado'];
                $i++;
            }
            return $f_lista;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }

    public function updateCadastro($id,$email,$senha,$endereco,$bairro,$cep,$cidade,$estado){
        $stmt = $this->mysqli->query("UPDATE cadastro SET `email` = '".$email."', `senha` = '".$senha."', `endereco` = '".$endereco."', `bairro` = '".$bairro."', `cep` = '".$cep."', `cidade` = '".$cidade."', `estado` = '".$estado."' WHERE `id` = '".$id."';");
        if ($stmt > 0) {
            return true;
        }else {
            return false;
        }
    }

    public function excluirCadastro($id){
        $stmt = $this->mysqli->query("DELETE FROM cadastro WHERE `id` = '".$id."';");
        if ($stmt > 0) {
            return true;    
        }else {
            return false;
        }
    }
}    
?>
