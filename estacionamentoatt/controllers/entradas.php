<?php
// Conexão com o banco de dados
require_once('../bd.php');
if($_REQUEST['funcao'] !== '' && $_REQUEST['funcao'] !== null){
    $funcao = $_REQUEST['funcao'];
    if($funcao == 'buscaentrada'){
        buscaentrada($dados_banco, $_REQUEST['entrada']);
    }
    if($funcao == 'excluirentrada'){
        excluirentrada($dados_banco, $_REQUEST['entrada']);
    }
    if($funcao == 'editaentrada'){
        editaentrada($dados_banco, $_POST['dadosEntrada']);
    }
    if($funcao == 'novaentrada'){
        novaentrada($dados_banco, $_POST['dadosEntrada']);
    }
} else{
    $dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    try {
        $pdo = new PDO($dsn, $dbusername, $dbpassword, $options);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }

    // Buscar os carros no banco de dados
    $stmt = $pdo->prepare("SELECT * FROM entradas");
    $stmt->execute();
    $entradas = $stmt->fetchAll();
    $entradasNovo = array();
    $entradasRetorno = array();
        //print_r($entradasRetorno);
        //echo "<br>";
    foreach($entradas as $entrada){
        try {
            $pdo = new PDO($dsn, $dbusername, $dbpassword, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
        try {
            // Buscar os carros no banco de dados
            $sql = 'SELECT * FROM carros where id =' . $entrada['carro_id'];
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $carros = $stmt->fetchAll();
        
            // Verificar se a busca retornou resultados antes de acessar os dados
            if (!empty($carros)) {
                $arrayTemp = array(
                    'id' => $entrada['id'],
                    'placa' => $carros[0]['placa'],
                    'marca' => $carros[0]['marca'],
                    'cpf' => $carros[0]['cpf'],
                    'modelo' => $carros[0]['modelo'],
                    'cor' => $carros[0]['cor'],
                    'ano' => $carros[0]['ano'],
                    'entrada' => date('d/m/Y', strtotime($entrada['data_hora_entrada']))
                );
                array_push($entradasRetorno, $arrayTemp);
            } else {
                try {
                    // Buscar os carros no banco de dados
                    $sql = 'SELECT * FROM carros where id =' . $entrada['carro_id'];
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $carros = $stmt->fetchAll();
                
                    // Verificar se a busca retornou resultados antes de acessar os dados
                    if (!empty($carros)) {
                        $arrayTemp = array(
                            'id' => $entrada['id'],
                            'placa' => $carros[0]['placa'],
                            'marca' => $carros[0]['marca'],
                            'cpf' => $carros[0]['cpf'],
                            'modelo' => $carros[0]['modelo'],
                            'cor' => $carros[0]['cor'],
                            'ano' => $carros[0]['ano'],
                            'entrada' => date('d/m/Y', strtotime($entrada['data_hora_entrada']))
                        );
                        array_push($entradasRetorno, $arrayTemp);
                    } else {
                        // echo "carro não encontrado";
                        // Tratar caso não haja carro com o ID especificado
                        // ...
                    }
                } catch (PDOException $e) {
                    echo $e;
                    // Tratar exceção em caso de erro no banco de dados
                    // ...
                }
                // Tratar caso não haja carro com o ID especificado
                // ...
            }
        } catch (PDOException $e) {
            // Tratar exceção em caso de erro no banco de dados
            // ...
        }
        

    }

    //echo "<pre>";
    //print_r($entradasRetorno);
    //echo "</pre>";
    //exit;

    // Retornar os dados em formato JSON
    echo json_encode($entradasRetorno);
}
function buscaentrada($dados_banco, $idEntrada){

    $dsn = "mysql:host={$dados_banco['servername']};dbname={$dados_banco['dbname']};charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    try {
        $pdo = new PDO($dsn, $dados_banco['dbusername'], $dados_banco['dbpassword'], $options);
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }

    // Buscar os carros no banco de dados
    $stmt = $pdo->prepare("SELECT * FROM entradas where id =".$idEntrada);
    $stmt->execute();
    $entradas = $stmt->fetchAll();
    $entradasNovo = array();
    $entradasRetorno = array();
        //print_r($entradasRetorno);
        //echo "<br>";
    foreach($entradas as $entrada){
        try {
            $pdo = new PDO($dsn, $dados_banco['dbusername'], $dados_banco['dbpassword'], $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
        
        // Buscar os carros no banco de dados
        $sql = 'SELECT * FROM carros where id ='.$entrada['carro_id'];
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $carros = $stmt->fetchAll();
        // print_r($carros[0]['id']);
        //echo "<br>";
        $arrayTemp = array(
            'id' => $entrada['id'],
            'idCarro' => $entrada['carro_id'],
            'placa' => $carros[0]['placa'],
            'cpf' => $carros[0]['cpf'],
            'marca' => $carros[0]['marca'],
            'modelo' => $carros[0]['modelo'],
            'cor' => $carros[0]['cor'],
            'ano' => $carros[0]['ano'],
            'entrada' => $entrada['data_hora_entrada']
        );
        array_push($entradasRetorno, $arrayTemp);

    }

    //echo "<pre>";
    //print_r($entradasRetorno);
    //echo "</pre>";
    //exit;

    // Retornar os dados em formato JSON
    echo json_encode($entradasRetorno);
    
}

function excluirentrada($dados_banco, $idEntrada){
    $dsn = "mysql:host={$dados_banco['servername']};dbname={$dados_banco['dbname']};charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    try {
        $pdo = new PDO($dsn, $dados_banco['dbusername'], $dados_banco['dbpassword'], $options);
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }

    // exclui o entrada
    $sql = "DELETE FROM entradas WHERE id = ".$idEntrada;
    // echo $sql;
    $stmt = $pdo->prepare($sql);
    
    try {
        $stmt->execute();
        echo json_encode('true');
    } catch (exeption $e) {
        echo $e;
    }
}

function editaentrada($dados_banco, $dadosEntrada){
    // Verifica se os dadosCarro contêm os valores necessários para atualização
    if (isset($dadosEntrada['id']) && isset($dadosEntrada['idcarro']) && isset($dadosEntrada['datahoraentrada'])) {

       $servername = $dados_banco['servername'];
       $dbname = $dados_banco['dbname'];
       $username = $dados_banco['dbusername'];
       $password = $dados_banco['dbpassword'];

       try {
           $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
           $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

           // Prepara a query para atualizar os dados na tabela "carros"
           $sql = "UPDATE entradas SET carro_id = :carro_id, data_hora_entrada = :entrada WHERE id = :id";
           $stmt = $pdo->prepare($sql);

           // Executa a query, passando os valores do array $dadosCarro
           $stmt->execute([
               'id'       => $dadosEntrada['id'],
               'carro_id' => $dadosEntrada['idcarro'],
               'entrada'  => $dadosEntrada['datahoraentrada']
           ]);

           // AQUI VOCÊ PODE FAZER ALGUM TRATAMENTO DEPOIS DE ATUALIZAR O REGISTRO, SE NECESSÁRIO

           echo 'true'; // Retorna true para indicar que a atualização foi bem-sucedida
       } catch (PDOException $e) {
           // Tratar erros de conexão ou queries
           echo "Erro: " . $e->getMessage();
           return false; // Retorna false para indicar que ocorreu um erro na atualização
       }
   } else {
       return false; // Retorna false se os dadosCarro estiverem incompletos
   }
}
function novaentrada($dados_banco, $dadosEntrada){
    // Verifica se os dadosCarro contêm os valores necessários para atualização
    if (isset($dadosEntrada['idcarro']) && isset($dadosEntrada['datahoraentrada'])) {

       $servername = $dados_banco['servername'];
       $dbname = $dados_banco['dbname'];
       $username = $dados_banco['dbusername'];
       $password = $dados_banco['dbpassword'];

       try {
           $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
           $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


           // Prepara a query para atualizar os dados na tabela "carros"
           $sql = "INSERT INTO `entradas` (`data_hora_entrada`, `carro_id`) VALUES (:entrada, :carro_id)";
           $stmt = $pdo->prepare($sql);

           // Executa a query, passando os valores do array $dadosCarro
           $stmt->execute([
               'carro_id' => $dadosEntrada['idcarro'],
               'entrada'  => $dadosEntrada['datahoraentrada']
           ]);

           // AQUI VOCÊ PODE FAZER ALGUM TRATAMENTO DEPOIS DE ATUALIZAR O REGISTRO, SE NECESSÁRIO

           echo 'true'; // Retorna true para indicar que a atualização foi bem-sucedida
       } catch (PDOException $e) {
           // Tratar erros de conexão ou queries
           echo "Erro: " . $e->getMessage();
           return false; // Retorna false para indicar que ocorreu um erro na atualização
       }
   } else {
       return false; // Retorna false se os dadosCarro estiverem incompletos
   }
}
?>
