<html>
<head>
    <title>Exemplo de PHP</title>
</head>
<body>
    <?php
    // Ativa a exibição de erros
    ini_set("display_errors", 1);
    // Define o tipo de conteúdo e o charset
    header('Content-Type: text/html; charset=iso-8859-1');

    // Exibe a versão atual do PHP
    echo 'Versão Atual do PHP: ' . phpversion() . '<br>';

    // Define as variáveis de conexão
    $servidor = "54.234.153.24";
    $usuario = "root";
    $senha = "Senha123";
    $bancoDeDados = "meubanco";

    // Cria a conexão com o banco de dados
    $conexao = new mysqli($servidor, $usuario, $senha, $bancoDeDados);

    // Verifica se a conexão foi bem sucedida
    if (mysqli_connect_errno()) {
        printf("Falha na conexão: %s\n", mysqli_connect_error());
        exit();
    }

    // Gera valores aleatórios para inserção no banco de dados
    $valorAleatorio1 =  rand(1, 999);
    $valorAleatorio2 = strtoupper(substr(bin2hex(random_bytes(4)), 1));
    // Obtém o nome do host
    $nomeDoHost = gethostname();

    // Define a consulta SQL para inserção de dados
    $consulta = "INSERT INTO dados (AlunoID, Nome, Sobrenome, Endereco, Cidade, Host) VALUES ('$valorAleatorio1' , '$valorAleatorio2', '$valorAleatorio2', '$valorAleatorio2', '$valorAleatorio2','$nomeDoHost')";

    // Executa a consulta e verifica se foi bem sucedida
    if ($conexao->query($consulta) === TRUE) {
      echo "Novo registro criado com sucesso";
    } else {
      echo "Erro: " . $conexao->error;
    }
    ?>
</body>
</html>
