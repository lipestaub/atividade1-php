<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= empty($user_data) ? 'Cadastrar' : 'Editar'; ?> usuário</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/public/css/style.css">
    <script type="text/javascript" src="/public/javascript/user.js"></script>
</head>
<body>
    <header>
        <?php include_once 'public/html/menu.php'; ?>
        <h1><?= $operation; ?> usuário</h1>
    </header>
    <main>
        <form onsubmit="sendUserForm(event);">
            <label for="name">Nome</label>
            <br>
            <input type="text" name="name" id="name" value="<?= empty($user_data) ? '' : $user_data->getName(); ?>">
            <br>
            <label for="user_type_id">Tipo de usuário</label>
            <br>
            <select name="user_type_id" id="user_type_id">
                <option value="0">Selecione...</option>
                <?php foreach ($user_types as $user_type) : ?>
                    <?php if (!empty($user_data) && ($user_data->getUserTypeId() == $user_type->getId())) : ?>
                        <option value="<?= $user_type->getId() ?>" selected><?= $user_type->getDescription() ?></option>
                    <?php else : ?>
                        <option value="<?= $user_type->getId() ?>"><?= $user_type->getDescription() ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
            <br>
            <label for="email">E-mail</label>
            <br>
            <input type="email" name="email" id="email" value="<?= empty($user_data) ? '' : $user_data->getEmail(); ?>">
            <br>
            <label for="password">Senha</label>
            <br>
            <input type="password" name="password" id="password" placeholder="<?= empty($user_data) ? '' : '(Para manter a senha atual, deixe o campo vazio.)'; ?>">
            <input type="hidden" name="id" id="id" value="<?= empty($user_data) ? '' : $user_data->getId(); ?>">
            <input type="hidden" name="operation" id="operation" value="<?= $operation; ?>">
            <br>
            <br>
            <button><?= $operation; ?></button>
        </form>
    </main>
</body>
</html>