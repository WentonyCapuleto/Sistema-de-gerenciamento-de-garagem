<?php
// Conexão com o banco de dados
require_once('../bd.php');
if($_REQUEST['funcao'] !== '' && $_REQUEST['funcao'] !== null){
    $funcao = $_REQUEST['funcao'];
    if($funcao == 'buscasaida'){
        buscasaida($dados_banco, $_REQUEST['saida']);
    }
    if($funcao == 'excluirsaida'){
        excluirsaida($dados_banco, $_REQUEST['saida']);
    }
    if($funcao == 'editasaida'){
        editasaida($dados_banco, $_POST['dadosSaida']);
    }
    if($funcao == 'salvarnovasaida'){
        salvarnovasaida($dados_banco, $_POST['dadosSaida']);
    }
} else{
    $conn = "mysql:host=$servername;dbname=$dbname;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    try {
        $pdo = new PDO($conn, $dbusername, $dbpassword, $options);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }

    /*

    $query = "SELECT * FROM saidas 
            JOIN entradas ON entradas.id = saidas.entrada_id
            JOIN carros ON carros.id = entradas.carro_id";


            */

    $query = "SELECT c.id AS idCarro, s.id AS idSaida, e.id AS idEntrada, c.placa, c.marca, c.cpf, c.modelo, c.cor, c.ano, e.data_hora_entrada AS entrada, s.data_hora_saida AS saida, s.valor
              FROM carros c
              INNER JOIN entradas e ON c.id = e.carro_id
              INNER JOIN saidas s ON e.id = s.entrada_id";

    
    // Executar a consulta
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    
    
    // Obter os resultados
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Retornar os resultados como JSON
    header('Content-Type: application/json');
    echo json_encode($results);
}

function buscasaida($dados_banco, $idSaida){
    
    $servername = $dados_banco['servername'];
    $dbname = $dados_banco['dbname'];
    $dbusername = $dados_banco['dbusername'];
    $dbpassword = $dados_banco['dbpassword'];

    $conn = "mysql:host=$servername;dbname=$dbname;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    try {
        $pdo = new PDO($conn, $dbusername, $dbpassword, $options);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
    
    $query ="SELECT 
                c.id AS id_carro,
                c.placa,
                c.marca,
                c.cpf,
                c.modelo,
                c.cor,
                c.ano,
                e.id AS id_entrada,
                e.data_hora_entrada,
                s.id AS id_saida,
                s.data_hora_saida,
                s.valor
            FROM saidas s
            INNER JOIN entradas e ON s.entrada_id = e.id
            INNER JOIN carros c ON e.carro_id = c.id
            WHERE s.id =".$idSaida.";";
    // echo $query;
    
    // Executar a consulta
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    
    
    // Obter os resultados
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Retornar os resultados como JSON
    header('Content-Type: application/json');
    echo json_encode($results);
}

function editasaida($dados_banco, $dadosSaida){

    // Verifica se os dadosSaida contêm os valores necessários para atualização
    if (isset($dadosSaida['id']) && isset($dadosSaida['datahorasaida'])) {

       $servername = $dados_banco['servername'];
       $dbname = $dados_banco['dbname'];
       $username = $dados_banco['dbusername'];
       $password = $dados_banco['dbpassword'];

       try {
           $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
           $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

           // Prepara a query para atualizar os dados na tabela "carros"
           $sql = "UPDATE saidas SET data_hora_saida = :datahorasaida WHERE id = :id";
           $stmt = $pdo->prepare($sql);

           // Executa a query, passando os valores do array $dadosCarro
           $stmt->execute([
               'id'       => $dadosSaida['id'],
               'datahorasaida'  => $dadosSaida['datahorasaida']
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

function excluirsaida($dados_banco, $idSaida){
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

    // exclui o saida
    $sql = "DELETE FROM saidas WHERE id = ".$idSaida;
    // echo $sql;
    $stmt = $pdo->prepare($sql);
    
    try {
        $stmt->execute();
        echo json_encode('true');
    } catch (exeption $e) {
        echo $e;
    }
}

function salvarnovasaida($dados_banco, $dadosSaida) {

// Verifica se os dadosSaida contêm os valores necessários para atualização
if (isset($dadosSaida['identrada']) && isset($dadosSaida['datahorasaida']) && isset($dadosSaida['valor'])) {

    $servername = $dados_banco['servername'];
    $dbname = $dados_banco['dbname'];
    $username = $dados_banco['dbusername'];
    $password = $dados_banco['dbpassword'];


    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepara a query para atualizar os dados na tabela "saidas"
        $sql = "INSERT INTO `saidas` (`data_hora_saida`, `valor`, `entrada_id`) VALUES (:data_hora_saida, :valor, :entrada_id)";
        $stmt = $pdo->prepare($sql);
        // Executa a query, passando os valores do array $dadosCarro
        $stmt->execute([
            'entrada_id'      => $dadosSaida['identrada'],
            'data_hora_saida'  => $dadosSaida['datahorasaida'],
            'valor'          => $dadosSaida['valor']
        ]);

        // AQUI VOCÊ PODE FAZER ALGUM TRATAMENTO DEPOIS DE ATUALIZAR O REGISTRO, SE NECESSÁRIO

        echo 'true'; // Retorna true para indicar que a atualização foi bem-sucedida
    } catch (PDOException $e) {
        // Tratar erros de conexão ou queries
        echo "Erro: " . $e->getMessage();
        return false; // Retorna false para indicar que ocorreu um erro na atualização
    }
} else {

    return 'false'; // Retorna false se os dadosSaida estiverem incompletos
}
}
?>
