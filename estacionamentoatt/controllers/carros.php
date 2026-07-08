<?php
// Conexão com o banco de dados
require_once('../bd.php');
if($_REQUEST['funcao'] !== '' && $_REQUEST['funcao'] !== null){
    $funcao = $_REQUEST['funcao'];
    if($funcao == 'buscacarro'){
        buscacarro($dados_banco, $_REQUEST['carro']);
    }
    if($funcao == 'excluircarro'){
        excluircarro($dados_banco, $_REQUEST['carro']);
    }
    if($funcao == 'editacarro'){
        editarcarro($dados_banco, $_POST['dadosCarro']);
    }
    if($funcao == 'salvarnovocarro'){
        salvarnovocarro($dados_banco, $_POST['dadosCarro']);
    }
    if($funcao == 'buscacarroporplaca'){
        buscacarroporplaca($dados_banco, $_POST['placa']);
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
    $sql = "SELECT * FROM carros";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $carros = $stmt->fetchAll();

    // Retornar os dados em formato JSON
    echo json_encode($carros);
}
function editarcarro($dados_banco, $dadosCarro){
     // Verifica se os dadosCarro contêm os valores necessários para atualização
     if (isset($dadosCarro['id']) && isset($dadosCarro['modelo']) && isset($dadosCarro['placa'])
        && isset($dadosCarro['ano']) && isset($dadosCarro['cor']) && isset($dadosCarro['marca']) && isset($dadosCarro['cpf'])) {

        $servername = $dados_banco['servername'];
        $dbname = $dados_banco['dbname'];
        $username = $dados_banco['dbusername'];
        $password = $dados_banco['dbpassword'];

        try {
            $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Prepara a query para atualizar os dados na tabela "carros"
            $sql = "UPDATE carros SET modelo = :modelo, placa = :placa, ano = :ano, cor = :cor, marca = :marca, cpf = :cpf WHERE id = :id";
            $stmt = $pdo->prepare($sql);

            // Executa a query, passando os valores do array $dadosCarro
            $stmt->execute([
                'id' => $dadosCarro['id'],
                'modelo' => $dadosCarro['modelo'],
                'placa' => $dadosCarro['placa'],
                'ano' => $dadosCarro['ano'],
                'cor' => $dadosCarro['cor'],
                'marca' => $dadosCarro['marca'],
                'cpf' => $dadosCarro['cpf']
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
function buscacarroporplaca($dados_banco, $placa) {
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

    // Buscar o carro
    $sql = "SELECT * FROM carros WHERE placa = '".$placa."' limit 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $carros = $stmt->fetchAll();

    echo json_encode($carros);   
}
function salvarnovocarro($dados_banco, $dadosCarro) {
    // Verifica se os dadosCarro contêm os valores necessários para inserção
    if (
        isset($dadosCarro['modelo'])
        && isset($dadosCarro['placa'])
        && isset($dadosCarro['ano'])
        && isset($dadosCarro['cor'])
        && isset($dadosCarro['marca'])
        && isset($dadosCarro['cpf'])
    ) {
        $servername = $dados_banco['servername'];
        $dbname = $dados_banco['dbname'];
        $username = $dados_banco['dbusername'];
        $password = $dados_banco['dbpassword'];

        try {
            $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Prepara a query para inserir um novo registro na tabela "carros"
            $sql = "INSERT INTO carros (modelo, placa, ano, cor, marca, cpf) VALUES (:modelo, :placa, :ano, :cor, :marca, :cpf)";
            $stmt = $pdo->prepare($sql);

            // Executa a query, passando os valores do array $dadosCarro
            $stmt->execute([
                'modelo' => $dadosCarro['modelo'],
                'placa' => $dadosCarro['placa'],
                'ano' => $dadosCarro['ano'],
                'cor' => $dadosCarro['cor'],
                'marca' => $dadosCarro['marca'],
                'ano' => $dadosCarro['ano'],
                'cpf' => $dadosCarro['cpf']
            ]);

            // AQUI VOCÊ PODE FAZER ALGUM TRATAMENTO DEPOIS DE INSERIR O REGISTRO, SE NECESSÁRIO

            echo 'true'; // Retorna true para indicar que a inserção foi bem-sucedida
        } catch (PDOException $e) {
            // Tratar erros de conexão ou queries
            echo "Erro: " . $e->getMessage();
            return false; // Retorna false para indicar que ocorreu um erro na inserção
        }
    } else {
        return false; // Retorna false se os dadosCarro estiverem incompletos
    }
}

function buscacarro($dados_banco, $idCarro){

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

    // Buscar o carro
    $sql = "SELECT * FROM carros WHERE id = ".$idCarro;
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $carros = $stmt->fetchAll();

    echo json_encode($carros);
}

function excluircarro($dados_banco, $idCarro){
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

    // exclui o carro
    $sql = "DELETE FROM carros WHERE id = :idCarro"."; ";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idCarro', $idCarro, PDO::PARAM_INT);
    
    try {
        $stmt->execute();
        echo json_encode('true');
    } catch (exeption $e) {
        echo $e;
    }
}

?>
