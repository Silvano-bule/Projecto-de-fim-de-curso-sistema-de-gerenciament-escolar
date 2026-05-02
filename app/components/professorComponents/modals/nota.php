<html>

<body>
    <dialog id="modal_nota" class="modal">
        <div class="modal-box max-w-xl">
            <div class="flex flow-row justify-between items-center">
                <h3 class="text-lg font-bold">Criar Nota</h3>
            </div>
            <form action="index.php?page=nota&action=render" method="POST" id="formulario">
                <input type="hidden" name="idTurma" id="id_turma">
                <div class="grid grid-cols-1 gap-6 mt-4">
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="aluno">Aluno</label>
                        <select id="aluno" name="nome_aluno" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:outline-none focus:ring" required>
                            <option value="">Selecione um aluno</option>
                            <?php if (is_array($alunosDoProf) && !empty($alunosDoProf)): ?>
                                <?php foreach ($alunosDoProf as $item): ?>
                                    <?php
                                    // Garantimos que $item é um array e as chaves existem
                                    $nomeAluno = $item['nome_aluno'] ?? 'Sem Nome';
                                    $idAluno = $item['id_aluno'] ?? '';
                                    ?>
                                    <option value="<?= $idAluno ?>"><?= $nomeAluno ?></option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <option value="">Nenhum aluno encontrado</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="Disciplina">Disciplina<span class="text-red-500 text-xs"> (Obrigatório)</span> </label>

                        <select id="disciplina" name="disciplina" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:outline-none focus:ring" required>

                            <option value="">Selecione uma disciplina</option>
                            <?php if (is_array($listarDisciplinasDoProfessor) && !empty($listarDisciplinasDoProfessor)): ?>
                                <?php foreach ($listarDisciplinasDoProfessor as $item): ?>
                                    <?php
                                    // Garantimos que $item é um array e as chaves existe
                                    $id_disciplina = $item['id_disciplina'] ?? 'Sem Disciplina';
                                    $nome_disciplina = $item['nome_disciplina'] ?? 'Sem Disciplina';
                                    ?>
                                    <option value="<?= $id_disciplina ?>?>">
                                        <?= $nome_disciplina ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <option value="">Nenhum dado encontrado</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="grid grid-cols-2  gap-4">
                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="classe">Nota<span class="text-red-500 text-xs"> (Obrigatório)</span> </label>
                            <input placeholder="10,5, 20..." id="Nota" name="nota_aluno" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                        </div>
                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="trimestre">Trimestre</label>
                            <select id="trimestre" name="nota_trimestre" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                                <option value="">Selecione uma sala</option>
                                <option value="1º Trimestre">1º Trimestre</option>
                                <option value="2º Trimestre">2º Trimestre</option>
                                <option value="3º Trimestre">3º Trimestre</option>
                            </select>
                            <?php if (isset($erro['sala'])): ?>
                                <p class="text-red-500 text-xs"><?php echo $erro['sala']; ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="data">Data</label>
                            <input type="date" id="data" name="data_nota" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">

                            <?php if (isset($erro['sala'])): ?>
                                <p class="text-red-500 text-xs"><?php echo $erro['sala']; ?></p>
                            <?php endif; ?>
                        </div>
                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="trimestre">Tipo</label>
                            <select id="nota" name="tipo_nota" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                                <option value="">Selecione uma sala</option>
                                <option value="Prova">Prova</option>
                                <option value="Avaliação">Avaliação</option>
                                <option value="Trabalho">Trabalho</option>
                                <option value="Participação">Participação</option>

                            </select>
                            <?php if (isset($erro['sala'])): ?>
                                <p class="text-red-500 text-xs"><?php echo $erro['sala']; ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <button type="submit" class=" m-4  btn btn-success text-white shadow-md hover:shadow-lg transition-all cursor-poiter">
                    Salvar
                </button>
                <button id="btnClose" type="button" class="cursor-pointer btn btn-error  text-white hover:text-red-600 hover:bg-red-300">Fechar</button>
            </form>
        </div>
    </dialog>

    <script>
        <?php if (!empty($erro)): ?>

            console.log('Erro encontrado:', <?php echo json_encode($erro); ?>);
            document.getElementById('modal_turma').showModal();
        <?php endif; ?>
    </script>
</body>

</html>