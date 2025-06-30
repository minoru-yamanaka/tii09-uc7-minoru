<?php
require_once '../backend/DAO/MedicoDAO.php';

$dao = new MedicoDAO();
$medicos = $dao->getAll();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Medicos</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
        

    <main class="main-content">
        <div class="container">

            <div class="container">
                <div class="section">                    
                    <!-- Área para usuários logados -->
                    <!-- <section class="login-prompt">
                            <div class="login-card">

                            <h3>Acesso de administrador</h3>
                                <p>Você logado para acessar o sistema.</p>
                                <div class="action-buttons">
                                    <a href="index.php" class="btn btn-primary">Home</a>
                                    <a href="./frontend/login.php" class="btn btn-primary">Fazer Login</a>
                                    <a href="./frontend/cadastro.php" class="btn btn-secondary">Criar Conta</a>
                                    <a href="./frontend/logout.php" class="btn btn-secondary">Sair</a>
                                </div>
                            
                   
                           <h3>Cadastros</h3>
                            <p>Área de cadastro no sistema.</p>
                            <div class="action-buttons">
                                <a href="./frontend/form_paciente.php" class="btn btn-primary">Cadastro de Pacientes</a>
                                <a href="./frontend/form_convenio.php" class="btn btn-primary">Cadastro de Convênios</a>
                                <a href="./frontend/form_medicos.php" class="btn btn-secondary">Cadastro de Médicos</a>
                                <a href="./frontend/form_consultas.php" class="btn btn-secondary">Cadastro de Consultas</a>
                                <a href="./frontend/form_endereco.php" class="btn btn-secondary">Cadastro de Endereços</a>
                            </div>
                           

                        <h3>Listas</h3>
                        <p>Área de listagem no sistema.</p>
                            <div class="action-buttons">
                                <a href="./frontend/lista_paciente.php" class="btn btn-primary">Lista de Pacientes</a>
                                <a href="./frontend/lista_convenio.php" class="btn btn-primary">Lista de Convênios</a>
                                <a href="./frontend/lista_medicos.php" class="btn btn-secondary">Lista de Médicos</a>
                                <a href="./frontend/lista_consultas.php" class="btn btn-secondary">Lista de Consultas</a>
                                <a href="./frontend/lista_endereco.php" class="btn btn-secondary">Lista de Endereços</a>
                            </div>
                    </section> -->
      
            

          

                <table class="table-container"> 
                    <thead>
                        <tr>
                            <th>Id:</th>
                            <th>Nome:</th>
                            <th>Especialidade:</th>
                            <th>CRM:</th>
                            <th>Ações</th> </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($medicos as $medico): ?>
                            <tr>
                                <td><?= $medico->getId() ?></td>
                                <td><?= $medico->getNome() ?></td>
                                <td><?= $medico->getEspecialidade() ?></td>
                                <td><?= $medico->getCrm() ?></td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="form_medicos.php?id=<?= $medico->getId() ?>" class="btn-edit">Alterar</a>
                                        <a href="../backend/excluirMedicos.php?id=<?= $medico->getId() ?>" class="btn-delete">Excluir</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>  
        
        

        </div>
    </main>

    
</body>
</html>