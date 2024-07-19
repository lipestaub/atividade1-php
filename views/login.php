<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/public/css/style.css">
    <script type="text/javascript" src="/public/javascript/user.js"></script>
</head>
<body>
    <header>
        <h1>Entrar</h1>
    </header>
    <main>
        <form onsubmit="sendLoginForm(event);">
            <label for="email">E-mail</label>
            <br>
            <input type="email" name="email" id="email">
            <br>
            <label for="password">Senha</label>
            <br>
            <input type="password" name="password" id="password">
            <br>
            <br>
            <button>Entrar</button>
        </form>
    </main>
</body>
</html>