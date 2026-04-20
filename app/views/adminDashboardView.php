    <!DOCTYPE html>
    <html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard Admin</title>
        <link rel="stylesheet" href="assets/css/output.css">
        <link rel="shortcut icon" href="assets/img/logo cemu.jpg" type="image/x-icon">
    </head>

    <body class="relative container w-auto">
        <!-- Main content dashboard -->
        <section class="flex flex-row">
            <!-- Menu lateral -->
            <?php require dirname(__DIR__) . '/components/dashboard/menu.php' ?>

            <div class="content w-full">
                <!-- Main content - Conteúdo do dashboard -->
                 
                <section id="Dashboard" class="container w-auto mx-auto px-4 ml-64 sectio-content">
                    <!-- Header Dasboard -->
                    <?php require dirname(__DIR__) . '/components/dashboard/header.php' ?>

                    <!--  Dados Estatísticos -->
                    <?php require dirname(__DIR__) . '/components/dashboard/estatisticas.php' ?>

                    <!-- Tabela de dados -->
                    <?php require dirname(__DIR__) . '/components/dashboard/tabela.php' ?>

                </section>

                <!-- Area de Aluno -->
                <?php require dirname(__DIR__) . '/components/sections/aluno.php' ?>

                <!-- Area de Professor -->
                <?php require dirname(__DIR__) . '/components/sections/professor.php' ?>

                <!-- Area de turmas-->
                <?php require dirname(__DIR__) . '/components/sections/turma.php'; ?>

                <!-- Area de Cursos -->
                <?php require dirname(__DIR__) . '/components/sections/curso.php'; ?>

                <!-- Area das classes -->
                <?php require dirname(__DIR__) . '/components/sections/classe.php'; ?>

                <!-- Area das das salas -->
                <?php require dirname(__DIR__) . '/components/sections/sala.php'; ?>

            </div>
            <!--Modal Aluno -->
            <?php require dirname(__DIR__) . '/components/modals/aluno.php'; ?>

            <!-- Modal Turma -->
            <?php require dirname(__DIR__) . '/components/modals/turma.php'; ?>

            <!-- Modal Curso -->
            <?php require dirname(__DIR__) . '/components/modals/curso.php'; ?>

            <!-- Modal Professor -->
            <?php require dirname(__DIR__) . '/components/modals/professor.php'; ?>

            <!-- Modal Classe -->
            <?php require dirname(__DIR__) . '/components/modals/classe.php'; ?>

            <!-- Modal Sala -->
            <?php require dirname(__DIR__) . '/components/modals/sala.php'; ?>

            <script src="assets/js/main.js"></script>
        </section>
    </body>

    </html>