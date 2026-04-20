<html>

<body>
    <section id="Classe" class="p-4 ml-64 hidden">
        <div class="grid grid-row-2 gap-8">
            <section class="container px-4 mx-auto">
                <div class="flex flex-col gap-4 mt-6">
                    <div class="flex flex-row justify-between items-center mt-8">
                        <div>
                            <h1 class="text-2xl font-bold text-white">Classes</h1>
                            <p>Gerencie todas as classes cadastradas</p>
                        </div>
                        <button class="flex flow-row items-center bg-blue-500 text-white rounded-md px-3 cursor-pointer" id="professor" onclick="modal_classe.showModal()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            <div tabindex="0" role="button" class="m-2">Nova classe</div>
                        </button>
                    </div>
                    <input id="inputPesquisa" type="text" class="mt-8 px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 min-w-full" placeholder="Buscar Alunos">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8 mt-4">
                            <div class="overflow-visible border border-gray-200 dark:border-gray-700 md:rounded-lg">
                                <table id="tabelaAlunos" class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                        <?php foreach ($classesEncontradas as $classe): ?>
                                            <tr class="flex flex-row justify-between items-center px-4">
                                                <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                    <div class="inline-flex items-center gap-x-3">
                                                        <div class="flex items-center gap-x-2">
                                                            <img class="object-cover w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1499470932971-a90681ce8530?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
                                                            <div>
                                                                <h2 class="font-medium text-gray-800 dark:text-white "><?= $classe['nome'] ?></h2>
                                                                <p class="text-sm font-normal text-gray-600 dark:text-gray-400"><span class="text-sm font-normal text-gray-600 dark:text-gray-400 ml-10"></span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="dropdown dropdown-hover">
                                                        <div tabindex="0" role="button" class="btn m-1 "> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                                            </svg></div>
                                                        <ul class="dropdown-content menu bg-base-100 rounded-box w-52 p-2 shadow-sm  absolute right-0">
                                                            <li>
                                                                <a onclick="removerClasse(<?= $classe['id'] ?>)">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 text-red-500">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                                    </svg>
                                                                    Excluir
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a onclick="obterClasse(<?= $classe['id'] ?>)">
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

    <script src="assets/js/classe.js"></script>
</body>

</html>