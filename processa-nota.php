<?php
    @ini_set('display_errors', 'on');
    @error_reporting(E_ALL | E_STRICT);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        //Variáveis de acesso Db
        define('DB_SERVER', 'localhost');
        define('DB_NAME', 'banco_flavio');
        define('DB_USERNAME', 'flavios');
        define('DB_PASSWORD', '321654');

        require_once 'conexao.php';
        
        
        
        $conexao = new Conexao(DB_SERVER, DB_NAME, DB_USERNAME, DB_PASSWORD);        
        $dados = array('cpfcnpj' => $_POST['txtcpfcnpj'], 
                       'ierg' => $_POST['txtinscricaoe'], 
                       'imunicipal' => $_POST['txtinscricaom'], 
                       'nome' => $_POST['txtnomeempresa'], 
                       'endereco' => $_POST['txtendereco'],);        
        $insert_id = $conexao->insert('tb_notas', $dados);    
        $insert_id = $conexao->select('tb_notas', 'max(id_nota) as id_nota');    
        $insert_id = $insert_id["id_nota"];
        
        for($i=0;$i<count($_POST["txtnome"]);$i++)
        {
            $dados = array('id_nota' =>$insert_id, 
                       'nome' => $_POST["txtnome"][$i], 
                       'quantidade' => $_POST["txtqtd"][$i], 
                       'preco' => $_POST["txtpreco"][$i]);        
            $insert = $conexao->insert('tb_itens_nota', $dados); 
                   
        }
            
        if($insert == true){
            echo 'Nota inserida com sucesso';
        }
        ?>
    </body>
</html>
