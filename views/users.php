<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/public/css/style.css">
    <script type="text/javascript" src="/public/javascript/user.js"></script>
</head>
<body>
    <header>
        <?php include_once 'public/html/menu.php'; ?>
        <h1>Usuários</h1>
    </header>
    <main>
        <a href="/usuario"><button>Cadastrar</button></a>
        <br>
        <br>
        <table>
            <thead>
                <tr>
                    <th>Identificador</th>
                    <th>Tipo de usuário</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Data da criação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= $user->getId(); ?></td>
                        <td><?= $user->getUserTypeId() == 1 ? 'Administrador' : 'Aluno'; ?></td>
                        <td><?= $user->getName(); ?></td>
                        <td><?= $user->getEmail(); ?></td>
                        <td><?= $user->getCreatedAt(); ?></td>
                        <td>
                            <a href="/usuario?id=<?= $user->getId() ?>"><button>Editar</button></a>
                            <a onclick="deleteUser('<?= $user->getId() ?>');"><button>Excluir</button></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>