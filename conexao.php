<?php

//inicio da classe de conexao
class Conexao {
    
    var $db, $conn;
    
    public function __construct($server, $database, $username, $password){
        
        $this->conn = new MySQLi($server, $username, $password,$database);
        
    }
    /**
     * Função de seleção dos registros da tabela
     * @param string $tabela Description
     * @param string $colunas string contendo as colunas separadas por virgula para seleção, se null busca por todas *
     */    
    public function select($tabela, $colunas = "*") {
        $sql = "SELECT $colunas FROM $tabela";
        $result = $this->executar($sql);
        return $this->conn->fetch_assoc($result);
    }    
    /**
     * Função para inserir dados na tabela
     * @param array $dados Array contendo os dados a serem inseridos
     * @param string $tabela tabela que será inserido os dados
     */
    public function insert($tabela, $dados) {
        foreach ($dados as $key => $value) {
            $keys[] = $key;
            $insertvalues[] = '\'' . $this->conn->real_escape_string($value) . '\'';
        }
        $keys = implode(',', $keys);
        $insertvalues = implode(',', $insertvalues);
        $sql = "INSERT INTO $tabela ($keys) VALUES ($insertvalues)";
        return $this->executar($sql);
    }
    /**
     * Função para alterar os dados da tabela
     * @param string $tabela tabela onde será alterado os dados
     * @param string $colunaPrimary nome da coluna chave primaria
     * @param int $id id do dados a ser alterado
     * @param array $dados dados que serão inserido
     * @return boolean verdadeiro ou falso
     */
    public function update($tabela, $colunaPrimay, $id, $dados) {
        foreach ($dados as $key => $value) {
            $sets[] = $key . '=\'' . $value . '\'';
        }
        $sets = implode(',', $sets);
        $sql = "UPDATE $tabela SET $sets WHERE $colunaPrimay = '$id'";
        return $this->executar($sql); 
    }
    
    public function executar($sql)
    {
        $SQL = $this->conn->query($sql);
        
        if(!$SQL)
          {
           echo $this->conn->error;
          } 
  
        return $SQL;
    }
    
}
?>
