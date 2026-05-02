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
            <?php require dirname(__DIR__) . '/components/professorComponents/dashboard/menu.php' ?>

            <div class="content w-full">
                <!-- Main content - Conteúdo do dashboard -->

                <section id="Dashboard" class="container w-auto mx-auto px-4 ml-64 sectio-content hidden">
                    <!-- Header Dasboard -->
                    <?php require dirname(__DIR__) . '/components/professorComponents/dashboard/header.php' ?>

                    <!--  Dados Estatísticos -->
                    <?php require dirname(__DIR__) . '/components/professorComponents/dashboard/estatisticas.php' ?>

                    <!-- Tabela de dados -->
                    <?php require dirname(__DIR__) . '/components/professorComponents/dashboard/tabela.php' ?>

                </section>

                <!-- Area de Aluno -->
                <?php require dirname(__DIR__) . '/components/professorComponents/sections/aluno.php' ?>

                <!-- Area de Professor -->
                <?php require dirname(__DIR__) . '/components/professorComponents/sections/professor.php' ?>

                <!-- Area de turmas-->
                <?php require dirname(__DIR__) . '/components/professorComponents/sections/turma.php'; ?>

                <!-- Area de Cursos -->
                <?php require dirname(__DIR__) . '/components/professorComponents/sections/curso.php'; ?>


                <!-- Area das salas -->
                <?php require dirname(__DIR__) . '/components/professorComponents/sections/sala.php'; ?>

                <!-- Area das  Disciplina -->
                <?php require dirname(__DIR__) . '/components/professorComponents/sections/disciplina.php'; ?>

                <!-- Modal para adicionar notas -->
                 <?php require dirname(__DIR__) . '/components/professorComponents/modals/nota.php'?>
            </div>
        </section>
        <script src="assets/js/main.js"></script>
    </body>

    </html>
    </body>

    </html>