<nav>
    <ul>
        <li><a href="/principal">Principal</a></li>

        <?php if ($user->getUserTypeId() == 1) : ?>
            <li><a href="/usuarios">Usuários</a></li>
            <li><a href="/materias">Matérias</a></li>
            <li><a href="/notas">Notas</a></li>
        <?php else : ?>
            <li><a href="/minhas-notas">Minhas notas</a></li>
        <?php endif; ?>
            
        <li><a href="/alterar-cadastro">Alterar dados</a></li>
        <li><a href="/alterar-senha">Alterar senha</a></li>
        <li><a href="/sair">Sair</a></li>
    </ul>
</nav>