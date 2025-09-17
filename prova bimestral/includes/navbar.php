<nav class="navbar navbar-expand navbar-dark bg-primary mb-4">
    <div class="container">
        <a class="navbar-brand" href="?page=page1">Trabalho Curso</a>
        <div class="navbar-nav">
            <a class="nav-link <?= $page==='page1' ? 'active' : '' ?>" href="?page=page1">Página 1</a>
            <a class="nav-link <?= $page==='page2' ? 'active' : '' ?>" href="?page=page2">Página 2</a>
            <a class="nav-link <?= $page==='page3' ? 'active' : '' ?>" href="?page=page3">Página 3 (Quiz)</a>
        </div>
    </div>
</nav>
