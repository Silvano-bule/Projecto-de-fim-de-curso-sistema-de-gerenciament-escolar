<html>

<body>
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
</body>

</html>