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
        <section class="flex flex-row">
            <!-- Menu lateral -->
            <aside
                class="flex flex-col w-64 h-screen px-5 py-8 overflow-y-auto bg-white border-r rtl:border-r-0 rtl:border-l dark:bg-gray-900 dark:border-gray-700 fixed left-0 top-0">
                <a href="#">
                    <img class="w-auto h-7" src="assets/img/logo_cemu_bg.png" alt="logo">
                </a>

                <div class="flex flex-col justify-between flex-1 mt-6">
                    <nav class="flex-1 -mx-3 space-y-3 ">
                        <a class="flex items-center px-3 py-2 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700 cursor-pointer"
                            data-alvo="Dashboard">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605" />
                            </svg>
                            <span class="mx-2 text-sm font-medium">Dashboard</span>
                        </a>
                        <a class="flex items-center px-3 py-2 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700 cursor-pointer"
                            data-alvo="Aluno">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                            <span class="mx-2 text-sm font-medium">Aluno</span>
                        </a>
                        <a class="flex items-center px-3 py-2 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700 cursor-pointer"
                            data-alvo="Professores">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 010 3.75H5.625a1.875 1.875 0 010-3.75z" />
                            </svg>
                            <span class="mx-2 text-sm font-medium">Professores</span>
                        </a>
                    </nav>

                    <div class="mt-6">
                        <div class="flex items-center justify-between mt-6">
                            <a href="" class="flex items-center gap-x-2">
                                <img class="object-cover rounded-full h-7 w-7"
                                    src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&h=634&q=80"
                                    alt="avatar" />
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-200"><?= $dados['nome'] ?></span>
                            </a>

                            <a href="index.php?page=Auth&action=logout"
                                class="text-gray-500 transition-colors duration-200 rotate-180 dark:text-gray-400 rtl:rotate-0 hover:text-blue-500 dark:hover:text-blue-400">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </aside>
            <div class="content w-full">
                <!-- Main content - Conteúdo do dashboard -->
                <section id="Dashboard" class="container w-auto mx-auto px-4 ml-64 sectio-content hidden">
                    <div class="grid grid-row-4">
                        <div class="flex flex-row items-center justify-between mt-6 p-4 rounded-lg mx-4">
                            <div>
                                <h1 id="year">Ano lectivo</h1>
                            </div>
                            <div class="flex flex-row gap-2 items-center justify-center">
                                <div class="dropdown dropdown-hover">
                                    <div class="flex flow-row items-center bg-blue-500 text-white rounded-md px-3 cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                        </svg>
                                        <div tabindex="0" role="button" class="m-2">Adicionar novo</div>
                                    </div>
                                    <ul tabindex="-1" class="dropdown-content menu bg-blue-600 rounded-box z-1 w-52 p-2 shadow-sm mt-1 text-white">
                                        <li><a id="turma" onclick="modal_turma.showModal()">Turma</a></li>
                                        <li><a id="curso" onclick="modal_curso.showModal()">Curso</a></li>
                                        <li><a id="aluno" onclick="my_modal_1.showModal()">Aluno</a></li>
                                        <li><a id="professor" onclick="modal_professor.showModal()">Professor</a></li>
                                        <li><a id="classe" onclick="modal_classe.showModal()">Classe</a></li>
                                    </ul>
                                </div>
                                <div class="relative mx-3">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                        <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                                            <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </span>

                                    <input type="text" class="w-full py-1.5 pl-10 pr-4 text-gray-700 bg-white border rounded-md dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring" placeholder="Search" />
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!--  Dados Estatísticos -->
                    <div class="grid grid-cols-3 gap-6 mt-6 mx-4">
                        <article class="flex flex-col gap-4 rounded-lg border border-gray-100 bg-white p-6 dark:border-gray-800 dark:bg-gray-900">
                            <div>
                                <strong class="block text-sm font-medium text-gray-500 dark:text-gray-400">
                                    <font dir="auto" style="vertical-align: inherit;">
                                        <font dir="auto" style="vertical-align: inherit;">Usuarios</font>
                                    </font>
                                </strong>

                                <p>
                                    <span class="text-2xl font-medium text-gray-900 dark:text-white">
                                        <font dir="auto" style="vertical-align: inherit;">
                                            <font dir="auto" style="vertical-align: inherit;"><?= $dados['totalUsers'] ?></font>
                                        </font>
                                    </span>
                                </p>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>

                            </div>
                        </article>
                        <article class="flex flex-col gap-4 rounded-lg border border-gray-100 bg-white p-6 dark:border-gray-800 dark:bg-gray-900">
                            <div>
                                <strong class="block text-sm font-medium text-gray-500 dark:text-gray-400">
                                    <font dir="auto" style="vertical-align: inherit;">
                                        <font dir="auto" style="vertical-align: inherit;">Alunos</font>
                                    </font>
                                </strong>

                                <p>
                                    <span class="text-2xl font-medium text-gray-900 dark:text-white">
                                        <font dir="auto" style="vertical-align: inherit;">
                                            <font dir="auto" style="vertical-align: inherit;"><?= $dados['totalAlunos'] ?></font>
                                        </font>
                                    </span>
                                </p>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                </svg>
                            </div>
                        </article>
                        <article class="flex flex-col gap-4 rounded-lg border border-gray-100 bg-white p-6 dark:border-gray-800 dark:bg-gray-900">
                            <div>
                                <strong class="block text-sm font-medium text-gray-500 dark:text-gray-400">
                                    <font dir="auto" style="vertical-align: inherit;">
                                        <font dir="auto" style="vertical-align: inherit;">Professores</font>
                                    </font>
                                </strong>

                                <p>
                                    <span class="text-2xl font-medium text-gray-900 dark:text-white">
                                        <font dir="auto" style="vertical-align: inherit;">
                                            <font dir="auto" style="vertical-align: inherit;"><?= $dados['totalProfessores'] ?></font>
                                        </font>
                                    </span>
                                </p>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                                </svg>
                            </div>
                        </article>
                        <article class="flex flex-col gap-4 rounded-lg border border-gray-100 bg-white p-6 dark:border-gray-800 dark:bg-gray-900">
                            <div>
                                <strong class="block text-sm font-medium text-gray-500 dark:text-gray-400">
                                    <font dir="auto" style="vertical-align: inherit;">
                                        <font dir="auto" style="vertical-align: inherit;">Turma</font>
                                    </font>
                                </strong>

                                <p>
                                    <span class="text-2xl font-medium text-gray-900 dark:text-white">
                                        <font dir="auto" style="vertical-align: inherit;">
                                            <font dir="auto" style="vertical-align: inherit;"><?= $dados['totalTurmas'] ?></font>
                                        </font>
                                    </span>
                                </p>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205 3 1m1.5.5-1.5-.5M6.75 7.364V3h-3v18m3-13.636 10.5-3.819" />
                                </svg>
                            </div>
                        </article>
                        <article class="flex flex-col gap-4 rounded-lg border border-gray-100 bg-white p-6 dark:border-gray-800 dark:bg-gray-900">
                            <div>
                                <strong class="block text-sm font-medium text-gray-500 dark:text-gray-400">
                                    <font dir="auto" style="vertical-align: inherit;">
                                        <font dir="auto" style="vertical-align: inherit;">Cursos</font>
                                    </font>
                                </strong>
                                <p>
                                    <span class="text-2xl font-medium text-gray-900 dark:text-white">
                                        <font dir="auto" style="vertical-align: inherit;">
                                            <font dir="auto" style="vertical-align: inherit;"><?= $dados['totalCursos'] ?> </font>
                                        </font>
                                    </span>
                                </p>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                </svg>
                            </div>
                        </article>
                        <article class="flex flex-col gap-4 rounded-lg border border-gray-100 bg-white p-6 dark:border-gray-800 dark:bg-gray-900">
                            <div>
                                <strong class="block text-sm font-medium text-gray-500 dark:text-gray-400">
                                    <font dir="auto" style="vertical-align: inherit;">
                                        <font dir="auto" style="vertical-align: inherit;">Classe</font>
                                    </font>
                                </strong>

                                <p>
                                    <span class="text-2xl font-medium text-gray-900 dark:text-white">
                                        <font dir="auto" style="vertical-align: inherit;">
                                            <font dir="auto" style="vertical-align: inherit;"><?= $dados['totalClasses'] ?> </font>
                                        </font>
                                    </span>
                                </p>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 0 1-1.125-1.125v-3.75ZM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-8.25ZM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-2.25Z" />
                                </svg>
                            </div>
                        </article>
                    </div>

                    <!-- Tabela de dados -->
                    <div>
                        <section class="container px-4 py-8 mx-auto">
                            <div class="flex flex-col">
                                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                        <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                                <thead class="bg-gray-50 dark:bg-gray-800">
                                                    <tr>
                                                        <h1 class="py-3.5 px-4 text-lg font-bold text-left text-white">Gestão rápida de alunos</h1>
                                                        <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left  rtl:text-right text-gray-500 dark:text-gray-400">
                                                            <div class="flex items-center gap-x-3">
                                                                <button class="flex items-center gap-x-2">

                                                                    <span>Matricula Nª</span>

                                                                    <svg class="h-3" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M2.13347 0.0999756H2.98516L5.01902 4.79058H3.86226L3.45549 3.79907H1.63772L1.24366 4.79058H0.0996094L2.13347 0.0999756ZM2.54025 1.46012L1.96822 2.92196H3.11227L2.54025 1.46012Z" fill="currentColor" stroke="currentColor" stroke-width="0.1" />
                                                                        <path d="M0.722656 9.60832L3.09974 6.78633H0.811638V5.87109H4.35819V6.78633L2.01925 9.60832H4.43446V10.5617H0.722656V9.60832Z" fill="currentColor" stroke="currentColor" stroke-width="0.1" />
                                                                        <path d="M8.45558 7.25664V7.40664H8.60558H9.66065C9.72481 7.40664 9.74667 7.42274 9.75141 7.42691C9.75148 7.42808 9.75146 7.42993 9.75116 7.43262C9.75001 7.44265 9.74458 7.46304 9.72525 7.49314C9.72522 7.4932 9.72518 7.49326 9.72514 7.49332L7.86959 10.3529L7.86924 10.3534C7.83227 10.4109 7.79863 10.418 7.78568 10.418C7.77272 10.418 7.73908 10.4109 7.70211 10.3534L7.70177 10.3529L5.84621 7.49332C5.84617 7.49325 5.84612 7.49318 5.84608 7.49311C5.82677 7.46302 5.82135 7.44264 5.8202 7.43262C5.81989 7.42993 5.81987 7.42808 5.81994 7.42691C5.82469 7.42274 5.84655 7.40664 5.91071 7.40664H6.96578H7.11578V7.25664V0.633865C7.11578 0.42434 7.29014 0.249976 7.49967 0.249976H8.07169C8.28121 0.249976 8.45558 0.42434 8.45558 0.633865V7.25664Z" fill="currentColor" stroke="currentColor" stroke-width="0.3" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </th>

                                                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                            Nome
                                                        </th>

                                                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                            Data
                                                        </th>

                                                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                            Classe
                                                        </th>

                                                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                            Turma
                                                        </th>

                                                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                            Sala
                                                        </th>

                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                                    <?php if (!empty($dados['alunosRecentes'])): ?>
                                                        <?php foreach ($dados['alunosRecentes'] as $aluno): ?>
                                                            <tr>
                                                                <td class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap">
                                                                    <div class="inline-flex items-center gap-x-3">
                                                                        <span><?= htmlspecialchars($aluno['numero_matricula'] ?? 'N/A') ?></span>
                                                                    </div>
                                                                </td>
                                                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                                    <?= htmlspecialchars($aluno['nome'] ?? 'N/A') ?>
                                                                </td>
                                                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                                    <?= htmlspecialchars($aluno['nascimento'] ?? 'N/A') ?>
                                                                </td>
                                                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                                    <?= htmlspecialchars($aluno['id_classe'] ?? 'N/A') ?>
                                                                </td>
                                                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                                    <!-- Aqui você pode buscar o nome da turma se quiser, mas por simplicidade, mostra o ID -->
                                                                    <?= htmlspecialchars($aluno['id_turma'] ?? 'N/A') ?>
                                                                </td>
                                                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                                    <?= htmlspecialchars($aluno['sala'] ?? 'N/A') ?>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <?php if (!empty($dados['alunosRecentes'])): ?>
                                                        <?php else: ?>
                                                            <tr>
                                                                <td colspan="7" class="text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap p-4">
                                                                    <p class="text-center text-gray-500 font-light">Nenhum aluno encontrado</p>
                                                                </td>
                                                            </tr>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </section>

                <!-- Area de Aluno -->
                <section id="Aluno" class="p-4 ml-64">
                    <div class="grid grid-row-2 gap-8">
                        <section class="container px-4 mx-auto">
                            <div class="flex flex-col gap-4 mt-6">
                                <div class="flex flex-row justify-between items-center mt-8">
                                    <div>
                                        <h1 class="text-2xl font-bold text-white">Alunos</h1>
                                        <p>Gerencie todos os alunos cadastrados</p>
                                    </div>
                                    <button class="flex flow-row items-center bg-blue-500 text-white rounded-md px-3 cursor-pointer" id="aluno" onclick="my_modal_1.showModal()">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                        </svg>
                                        <div tabindex="0" role="button" class="m-2">Novo aluno</div>
                                    </button>
                                </div>
                                <input id="inputPesquisa" type="text" class="mt-8 px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 min-w-full" placeholder="Buscar Alunos">
                                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8 mt-4">
                                        <div class="overflow-visible border border-gray-200 dark:border-gray-700 md:rounded-lg">
                                            <table id="tabelaAlunos" class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                                    <?php foreach ($dados['alunos'] as $aluno): ?>
                                                        <tr class="flex flex-row justify-between items-center px-4">
                                                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                                <div class="inline-flex items-center gap-x-3">
                                                                    <div class="flex items-center gap-x-2">
                                                                        <img class="object-cover w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1499470932971-a90681ce8530?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
                                                                        <div>
                                                                            <h2 class="font-medium text-gray-800 dark:text-white "><?= $aluno['nome'] ?></h2>
                                                                            <p class="text-sm font-normal text-gray-600 dark:text-gray-400"><?= $aluno['email'] ?> <span class="text-sm font-normal text-gray-600 dark:text-gray-400 ml-10"><?= $aluno['telefone'] ?> </span></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap"><?= $aluno['email'] ?></td>
                                                            <td>
                                                                <div class="dropdown dropdown-hover">
                                                                    <div tabindex="0" role="button" class="btn m-1 "> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                                                        </svg></div>
                                                                    <ul class="dropdown-content menu bg-base-100 rounded-box w-52 p-2 shadow-sm  absolute right-0">
                                                                        <li>
                                                                            <a onclick="removerAluno(<?= $aluno['idaluno'] ?>)">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 text-red-500">
                                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                                                </svg>
                                                                                Excluir
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a onclick="editarAluno(<?= $aluno['idaluno'] ?>)">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                                                </svg>
                                                                                Editar
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </section>

                <!-- Area de Professor -->
                <section id="Professores" class="p-4 ml-64 hidden">
                    <div class="grid grid-row-2 gap-8">
                        <section class="container px-4 mx-auto">
                            <div class="flex flex-col gap-4 mt-6">
                                <div class="flex flex-row justify-between items-center mt-8">
                                    <div>
                                        <h1 class="text-2xl font-bold text-white">Professores</h1>
                                        <p>Gerencie todos os professores cadastrados</p>
                                    </div>
                                    <button class="flex flow-row items-center bg-blue-500 text-white rounded-md px-3 cursor-pointer" id="professor" onclick="my_modal_2.showModal()">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                        </svg>
                                        <div tabindex="0" role="button" class="m-2">Novo professor</div>
                                    </button>
                                </div>
                                <input id="inputPesquisa" type="text" class="mt-8 px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 min-w-full" placeholder="Buscar Alunos">
                                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8 mt-4">
                                        <div class="overflow-visible border border-gray-200 dark:border-gray-700 md:rounded-lg">
                                            <table id="tabelaAlunos" class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                                    <?php foreach ($dados['professores'] as $professor): ?>
                                                        <tr class="flex flex-row justify-between items-center px-4">
                                                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                                <div class="inline-flex items-center gap-x-3">
                                                                    <div class="flex items-center gap-x-2">
                                                                        <img class="object-cover w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1499470932971-a90681ce8530?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
                                                                        <div>
                                                                            <h2 class="font-medium text-gray-800 dark:text-white "><?= $professor['nome'] ?></h2>
                                                                            <p class="text-sm font-normal text-gray-600 dark:text-gray-400"><?= $professor['email'] ?> <span class="text-sm font-normal text-gray-600 dark:text-gray-400 ml-10"><?= $professor['telefone'] ?> </span></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap"><?= $professor['email'] ?></td>
                                                            <td>
                                                                <div class="dropdown dropdown-hover">
                                                                    <div tabindex="0" role="button" class="btn m-1 "> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                                                        </svg></div>
                                                                    <ul class="dropdown-content menu bg-base-100 rounded-box w-52 p-2 shadow-sm  absolute right-0">
                                                                        <li>
                                                                            <a onclick="removerProfessor(<?= $professor['idprofessor'] ?>)">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 text-red-500">
                                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                                                </svg>
                                                                                Excluir
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a onclick="editarProfessor(<?= $professor['idprofessor'] ?>)">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                                                </svg>
                                                                                Editar
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </section>
            </div>

            <!--Modal Aluno -->
            <dialog id="my_modal_1" class="modal">
                <div class="modal-box w-screen max-w-5xl">
                    <div class="flex flow-row justify-between items-center">
                        <h3 class="text-lg font-bold">Inserir aluno</h3>
                    </div>
                    <form action="index.php?page=aluno_dashboard" method="POST" id="formulario">
                        <div class="grid grid-cols-3 gap-6 mt-4 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4">
                            <input type="hidden" name="idaluno" id="idaluno">
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="username">Nome<span class="text-red-500 text-xs"> (Obrigatório)</span> </label>
                                <input name="nome_aluno" id="username" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" required>
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="email">Email<span class="text-red-500 text-xs"> (Obrigatório)</span> </label>
                                <input name="email_aluno" id="email" type="email" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" required>
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="telefone">Telefone</label>
                                <input placeholder="apenas 9 dígitos" id="telefone" name="telefone_aluno" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" minlength="9" maxlength="9" pattern="\d{9}" required oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                <?php if (isset($_GET['erro']) && $_GET['erro'] == 'telefone'): ?>
                                    <p class="text-red-500  text-xs mt-1">Telefone Inválido: Deve conter exatamente 9 dígitos.</p>
                                <?php endif; ?>
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="Nascimento">Nascimento</label>
                                <input autocomplete="on" type="date" id="nasc" name="nascimento_aluno" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" required>
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="Sexo">Sexo</label>
                                <select name="sexo_aluno" id="sexo" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="Nacionalidade">Nacionalidade</label>
                                <input autocomplete="on" type="text" id="nacio" name="nacionalidade_aluno" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" required>
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="Nome da pai">Nome do Pai</label>
                                <input autocomplete="on" type="text" name="pai_aluno" id="nome_pai" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" required>
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="Nome da mae">Nome da mae</label>
                                <input autocomplete="on" type="text" name="mae_aluno" id="nome_mae" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" required>
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="Numero do BI">Número do BI</label>
                                <input autocomplete="on" type="text" name="numero_BI_aluno" id="numero_BI" placeholder="000000000LA000" pattern="[0-9]{9}LA[0-9]{3}" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-30  dark:border-gray-600 focus:border-blue-400 focus:ring-blue-30０ focus:ring-opacity-4０ dark:focus:border-blue-3００ focus:outline-none focus:ring" required maxlength="14">
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="Provincia">Provincia</label>
                                <select name="provincia_aluno" id="provincia" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                                    <option value="Bengo">Bengo</option>
                                    <option value="Benguela">Benguela</option>
                                    <option value="Bié">Bié</option>
                                    <option value="Cabinda">Cabinda</option>
                                    <option value="Cuando Cubango">Cuando Cubango</option>
                                    <option value="Cuanza Norte">Cuanza Norte</option>
                                    <option value="Cuanza Sul">Cuanza Sul</option>
                                    <option value="Cunene">Cunene</option>
                                    <option value="Huanbo">Huambo</option>
                                    <option value="Huíla">Huíla</option>
                                    <option value="Luanda">Luanda</option>
                                    <option value="Lunda Norte">Lunda Norte</option>
                                    <option value="Lunda Norte">Lunda Sul</option>
                                    <option value="malanje">Malanje</option>
                                    <option value="Moxico">Moxico</option>
                                    <option value="Namibe">Namibe</option>
                                    <option value="Uige">Uige</option>
                                    <option value="Zaire">Zaire</option>

                                </select>
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="Altura">Altura</label>
                                <input autocomplete="on" type="text" pattern="[0-9.,]+" placeholder="Ex: 1,75" title="Digite a altura usando o ponto ou virgula" id="altura" name="altura_aluno" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" required>
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="Classe">Classe</label>
                                <select name="classe_aluno" id="classe" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" required>
                                    <option value="">Selecionar classe</option>
                                    <?php if (empty($classesEncontradas)): ?>
                                        <option value="" disabled>Nenhuma classe cadastrada</option>
                                    <?php else: ?>
                                        <?php foreach ($classesEncontradas as $classe): ?>
                                            <option value="<?php echo htmlspecialchars($classe['idclasse']); ?>">
                                                <?php echo htmlspecialchars($classe['nome']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="Classe">Turma</label>
                                <!-- Primeiro, verifique se a variável existe -->
                                <select autocomplete="on" id="turma" name="turma_aluno" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" required>

                                    <!-- Option padrão com value vazio -->
                                    <option value="">Selecionar turma</option>

                                    <!-- Verifica se há turmas -->
                                    <?php if (empty($turmasEncontradas)): ?>
                                        <option value="" disabled>Nenhuma turma cadastrada</option>
                                    <?php else: ?>
                                        <?php foreach ($turmasEncontradas as $turma): ?>
                                            <?php
                                            // Verifica se os índices existem (segurança)
                                            $idTurma = isset($turma['idturma']) ? $turma['idturma'] : (isset($turma['id']) ? $turma['id'] : '');
                                            $nomeTurma = isset($turma['nome']) ? $turma['nome'] : '';

                                            // Só mostra se tiver nome
                                            if (!empty($nomeTurma)):
                                            ?>
                                                <option value="<?php echo htmlspecialchars($idTurma); ?>">
                                                    <?php echo htmlspecialchars($nomeTurma); ?>
                                                </option>
                                        <?php
                                            endif;
                                        endforeach;
                                        ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="Curso">Curso</label>
                                <select name="curso" id="Curso" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                                    <option value="">Selecionar Curso</option>
                                    <?php if (empty($cursosEncontrados)): ?>
                                        <option value="" disabled>Nenhum curso cadastrado</option>
                                    <?php else: ?>
                                        <?php foreach ($cursosEncontrados as $curso): ?>
                                            <option value="<?php echo htmlspecialchars($curso['idcurso']); ?>">
                                                <?php echo htmlspecialchars($curso['nome']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="sala">Sala</label>
                                <select name="sala" id="sala" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                                    <option value="">Selecionar Sala</option>
                                    <?php if (empty($turmasEncontradas)): ?>
                                        <option value="" disabled>Nenhuma sala cadastrada</option>
                                    <?php else: ?>
                                        <?php foreach ($turmasEncontradas as $turma): ?>
                                            <option value="<?php echo htmlspecialchars($turma['idturma']); ?>">
                                                <?php echo htmlspecialchars($turma['sala']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class=" m-4  btn btn-success text-white shadow-md hover:shadow-lg transition-all cursor-poiter">
                            Salvar
                        </button>
                        <button id="btnClose" type="button" class="cursor-pointer btn btn-error  text-white hover:text-red-600 hover:bg-red-300">Fechar</button>
                    </form>
                </div>
            </dialog>
            <dialog id="modal_turma" class="modal">
                <div class="modal-box w-screen max-w-2xl">
                    <div class="flex flow-row justify-between items-center">
                        <h3 class="text-lg font-bold">Criar Turma</h3>
                    </div>
                    <form action="index.php?page=turma&action=pegarInfoTurma" method="POST" id="formulario">
                        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-2">
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="nome_turma">Nome da Turma</label>
                                <input placeholder="Ex: A,B" name="nome_turma" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" required>
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="periodo_turma">Periodo<span class="text-red-500 text-xs"> (Obrigatório)</span> </label>
                                <input placeholder="Manhã, Tarde" name="periodo_turma" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" required>
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="sala_turma">Sala</label>
                                <input placeholder="Ex: Sala 9" name="sala_turma" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" required>
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="capacidade_turma">Capacidade</label>
                                <input name="capacidade_turma" type="number" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" minlength="1" maxlength="60" required>
                                <?php if (isset($error['capacidade'])): ?>
                                    <p class="text-red-500 text-xs mt-1"><?= $error['capacidade'] ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <button type="submit" class=" m-4  btn btn-success text-white shadow-md hover:shadow-lg transition-all cursor-poiter">
                            Salvar
                        </button>
                        <button id="btnClose" type="button" class="cursor-pointer btn btn-error  text-white hover:text-red-600 hover:bg-red-300">Fechar</button>
                    </form>
                </div>
            </dialog>
            <dialog id="modal_curso" class="modal">
                <div class="modal-box w-screen max-w-2xl">
                    <div class="flex flow-row justify-between items-center">
                        <h3 class="text-lg font-bold">Criar Curso</h3>
                    </div>
                    <form action="/TCC/SGE/app/controllers/CursoController.php" method="POST" id="formulario">
                        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-2">
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="curso">Nome do Curso</label>
                                <input placeholder="Ex: A,B" name="nome_curso" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" required>
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="area_tecnica">Area Tecnica<span class="text-red-500 text-xs"> (Obrigatório)</span> </label>
                                <input placeholder="Manhã, Tarde" name="area_tecnica_curso" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" required>
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="status">Status</label>
                                <select placeholder="Ex: Ativo, Inativo" name="status_curso" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" required>
                                    <option value="Ativo">Ativo</option>
                                    <option value="Inativo">Inativo</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class=" m-4  btn btn-success text-white shadow-md hover:shadow-lg transition-all cursor-poiter">
                            Salvar
                        </button>
                        <button id="btnClose" type="button" class="cursor-pointer btn btn-error  text-white hover:text-red-600 hover:bg-red-300">Fechar</button>
                    </form>
                </div>
            </dialog>
            <dialog id="modal_professor" class="modal">
                <div class="modal-box w-screen max-w-5xl">
                    <div class="flex flow-row justify-between items-center">
                        <h3 class="text-lg font-bold">Inserir Professor</h3>
                    </div>
                    <form action="index.php?page=professor_dashboard&action=salvarDados" method="POST">
                        <div class="grid grid-cols-3 gap-6 mt-4 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4">
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="username">Nome<span class="text-red-500 text-xs"> (Obrigatório)</span> </label>
                                <input name="nome_professor" id="nome_professor" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" required>
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="email">Email<span class="text-red-500 text-xs"> (Obrigatório)</span> </label>
                                <input name="email_professor" id="email_professor" type="email" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" required>
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="telefone">Telefone</label>
                                <input placeholder="apenas 9 dígitos" name="telefone_professor" id="telefone_professor" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" required>
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="Nascimento">Nascimento</label>
                                <input autocomplete="on" type="date" name="nascimento_professor" id="nascimento_professor" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" required>
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="Sexo">Sexo</label>
                                <select name="sexo_professor" id="sexo_professor" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="Nacionalidade">Nacionalidade</label>
                                <input autocomplete="on" type="text" name="nacionalidade_professor" id="nacionalidade_professor" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" required>
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="Provincia">Provincia</label>
                                <select name="provincia_professor" id="provincia_professor" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                                    <option value="Bengo">Bengo</option>
                                    <option value="Benguela">Benguela</option>
                                    <option value="Bié">Bié</option>
                                    <option value="Cabinda">Cabinda</option>
                                    <option value="Cuando Cubango">Cuando Cubango</option>
                                    <option value="Cuanza Norte">Cuanza Norte</option>
                                    <option value="Cuanza Sul">Cuanza Sul</option>
                                    <option value="Cunene">Cunene</option>
                                    <option value="Huanbo">Huambo</option>
                                    <option value="Huíla">Huíla</option>
                                    <option value="Luanda">Luanda</option>
                                    <option value="Lunda Norte">Lunda Norte</option>
                                    <option value="Lunda Norte">Lunda Sul</option>
                                    <option value="malanje">Malanje</option>
                                    <option value="Moxico">Moxico</option>
                                    <option value="Namibe">Namibe</option>
                                    <option value="Uige">Uige</option>
                                    <option value="Zaire">Zaire</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class=" m-4  btn btn-success text-white shadow-md hover:shadow-lg transition-all cursor-poiter">
                            Salvar
                        </button>
                        <button id="btnClose" type="button" class="cursor-pointer btn btn-error  text-white hover:text-red-600 hover:bg-red-300">Fechar</button>
                    </form>
                </div>
            </dialog>
            <dialog id="modal_classe" class="modal">
                <div class="modal-box w-screen max-w-5xl">
                    <div class="flex flow-row justify-between items-center">
                        <h3 class="text-lg font-bold">Inserir classe</h3>
                    </div>
                    <form action="index.php?page=classe&action=pegarInfoClasse" method="POST">
                        <div class="grid grid-cols-3 gap-6 mt-4 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4">
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="username">Nome<span class="text-red-500 text-xs"> (Obrigatório)</span> </label>
                                <input name="nome_classe" id="username" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" required>
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="curso">Curso</label>
                                <select name="curso" id="curso" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                                    <option value="">Selecionar Curso</option>
                                    <?php if (empty($cursosEncontrados)): ?>
                                        <option value="" disabled>Nenhum curso cadastrado</option>
                                    <?php else: ?>
                                        <?php foreach ($cursosEncontrados as $curso): ?>
                                            <option value="<?php echo htmlspecialchars($curso['idcurso']); ?>">
                                                <?php echo htmlspecialchars($curso['nome']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class=" m-4  btn btn-success text-white shadow-md hover:shadow-lg transition-all cursor-poiter">
                            Salvar
                        </button>
                        <button id="btnClose" type="button" class="cursor-pointer btn btn-error  text-white hover:text-red-600 hover:bg-red-300">Fechar</button>
                    </form>
                </div>
            </dialog>

            <script src="assets/js/main.js"></script>
    </body>

    </html>