<html>

<body>

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
                        <li><a id="aluno" onclick="my_modal_1.showModal()">Aluno</a></li>
                        <li><a id="professor" onclick="modal_professor.showModal()">Professor</a></li>
                        <li><a id="turma" onclick="modal_turma.showModal()">Turma</a></li>
                        <li><a id="curso" onclick="modal_curso.showModal()">Curso</a></li>
                        <li><a id="classe" onclick="modal_classe.showModal()">Classe</a></li>
                        <li><a id="sala" onclick="modal_sala.showModal()">Sala</a></li>
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
</body>

</html>