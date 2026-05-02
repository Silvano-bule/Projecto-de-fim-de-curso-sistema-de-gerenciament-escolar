    <section id="classmate" class="p-4 ml-64 hidden">
        <div class="grid grid-row-2 gap-8">
            <section class="container px-4 mx-auto">
                <div class="flex flex-col gap-4 mt-6">
                    <div class="flex flex-row justify-between items-center mt-8">
                        <div>
                            <h1 class="text-2xl font-bold text-white">Meus alunos</h1>
                            <p>Alunos - Nome da turma</p>
                        </div>
                        <div class="flex flex-row gap-4">
                            <fieldset class="fieldset w-56">
                                <select class="select">
                                    <?php if (!empty($registroGeralProfessor)): ?>
                                        <?php foreach ($registroGeralProfessor as $tur): ?>
                                            <option onclick="pegarTurma(<?= $tur['id_turma'] ?>)" class="turma"><?= $tur['nome_turma'] ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </fieldset>

                            <label class="input">
                                <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <g
                                        stroke-linejoin="round"
                                        stroke-linecap="round"
                                        stroke-width="2.5"
                                        fill="none"
                                        stroke="currentColor">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <path d="m21 21-4.3-4.3"></path>
                                    </g>
                                </svg>
                                <input type="search" class="grow" placeholder="Buscar..." />
                            </label>
                        </div>
                    </div>
                    <input id="inputPesquisa" type="text" class="mt-8 px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 min-w-full" placeholder="Buscar Alunos">

                    <div class="overflow-x-auto">
                        <table class="table">
                            <!-- head -->
                            <thead>
                                <tr>
                                    <th>Maatricula</th>
                                    <th>Aluno</th>
                                    <th>Turma</th>
                                </tr>
                            </thead>
                            <tbody id="corpo">
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </section>

    <script src="assets/js/area_prof.js"></script>