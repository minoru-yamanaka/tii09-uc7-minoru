<?php
require_once '../backend/DAO/EnderecoDAO.php';
require_once '../backend/DAO/PacienteDAO.php';

$dao = new EnderecoDAO();
$pacienteDao = new PacienteDAO();
$pacientes = $pacienteDao->getAll();
$endereco = null;

if (isset($_GET['id'])) {
    $endereco = $dao->getById($_GET['id']);
}

if ($_POST) {
    $id = $_POST['id'] ?? null;
    $logradouro = $_POST['logradouro'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $paciente_id = $_POST['paciente_id'];

    $endereco = new Endereco($id, $logradouro, $bairro, $cidade, $estado, $paciente_id);
    if ($id) {
        $dao->update($endereco);
    } else {
        $dao->create($endereco);
        header("location:form_endereco.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Endereços</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <main class="main-content">
        <div class="container">
            <div class="login-card">
                <form action="form_endereco.php" method="post">

                    <h1><?= $endereco ? "Editar Endereços" : "Cadastro de Endereços" ?></h1>

                    <?php if ($endereco) : ?>
                        <input type="hidden" name="id" value="<?= $endereco->getId() ?>">
                    <?php endif; ?>

                    <div>
                        <label for="logradouro">Logradouro:</label>
                        <input type="text" name="logradouro" id="logradouro" required value="<?= $endereco ? $endereco->getLogradouro() : '' ?>">
                    </div>

                    <div>
                        <label for="bairro">Bairro:</label>
                        <input type="text" name="bairro" id="bairro" required value="<?= $endereco ? $endereco->getBairro() : '' ?>">
                    </div>
                    <div>
                        <label for="cidade">Cidade:</label>
                        <input type="text" name="cidade" id="cidade" required value="<?= $endereco ? $endereco->getCidade() : '' ?>">
                    </div>
                    <div>
                        <label for="estado">Estado:</label>
                        <input type="text" name="estado" id="estado" required value="<?= $endereco ? $endereco->getEstado() : '' ?>">
                    </div>
                    <p>Lista de Pacientes</p>
                    <div>
                        <select name="paciente_id" id="paciente_id">
                            <option></option>
                            <?php foreach ($pacientes as $paciente) : ?>
                                <option value="<?= $paciente->getId() ?>"><?= $paciente->getNome() ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit">Cadastrar</button>
                    <br>
                    <p>Já cadastrou o endereço? <a href="lista_paciente.php">Acesse a lista de endereços</a> ou volte para <a href="../index.php">Home</a> </p>
                </form>
            </div>
        </div>
    </main>

</body>
</html>