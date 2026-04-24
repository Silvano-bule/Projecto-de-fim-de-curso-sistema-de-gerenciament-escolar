<?php
$erro_disciplina = $_SESSION['erro_disciplina'] ?? '';
$nome_disciplina = $_SESSION['nome_disciplina'] ?? '';
$curso = $_SESSION['curso'] ?? '';

unset($_SESSION['erro_disciplina'], $_SESSION['nome_disciplina'], $_SESSION['curso']);
?>

<html>

<body>
    <dialog id="modal_disc" class="modal">
        <div class="modal-box w-screen max-w-2xl">
            <div class="flex flow-row justify-between items-center">
                <h3 class="text-lg font-bold">Criar Disciplina</h3>
            </div>
            <form action="index.php?page=disciplina&action=render" method="POST" id="formulario">
                <input type="hidden" name="idDisciplina" id="id_disciplina">
                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-2">
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="nome_disciplina">Nome da Disciplina</label>
                        <input placeholder="Ex: Matemática, física, química..." id="nome_disc" name="nome_disciplina" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" value="<?= htmlspecialchars($nome_disciplina) ?>" required>
                        <?php if (isset($erro['nome_disciplina'])): ?>
                            <p class="text-red-500 text-xs"><?php echo $erro['nome_disciplina']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="curso">Cursos</label>
                        <select id="cursoDisciplina" name="curso" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                            <option value="">Selecione um curso</option>
                            <?php

                            foreach ($cursosEncontrados as $curso): ?>
                                <option value="<?= $curso['id'] ?>">
                                    <?= htmlspecialchars($curso['nome']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (isset($erro['curso'])): ?>
                            <p class="text-red-500 text-xs"><?php echo $erro['curso']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="professor">Professor</label>
                        <select id="professor" name="professor" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                            <option value="">Selecione um professor</option>
                            <?php

                            foreach ($professores as $prof): ?>
                                <option value="<?= $prof['id'] ?>">
                                    <?= htmlspecialchars($prof['nome']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (isset($erro['curso'])): ?>
                            <p class="text-red-500 text-xs"><?php echo $erro['curso']; ?></p>
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

    <script>
        <?php if (!empty($erro_disciplina)): ?>
            document.getElementById('modal_disc').showModal();
        <?php endif; ?>
    </script>
</body>

</html>