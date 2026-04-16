<?php
$erro = $_SESSION['erro'] ?? [];
$nome_turma = $_SESSION['nome_turma'] ?? '';
$periodo_turma = $_SESSION['periodo_turma'] ?? '';

unset($_SESSION['erro'], $_SESSION['nome_turma'], $_SESSION['periodo_turma']);
?>

<html>

<body>
    <dialog id="modal_turma" class="modal">
        <div class="modal-box w-screen max-w-2xl">
            <div class="flex flow-row justify-between items-center">
                <h3 class="text-lg font-bold">Criar Turma</h3>
            </div>
            <form action="index.php?page=turma&action=render" method="POST" id="formulario">
                <input type="hidden" name="idTurma" id="idTurma">
                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-2">
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="nome_turma">Nome da Turma</label>
                        <input placeholder="Ex: A,B" id="nome_turma" name="nome_turma" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" value="<?= htmlspecialchars($nome_turma) ?>" required>
                        <?php if (isset($erro['nome'])): ?>
                            <p class="text-red-500 text-xs"><?php echo $erro['nome']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="periodo_turma">Periodo<span class="text-red-500 text-xs"> (Obrigatório)</span> </label>
                        <input placeholder="Manhã, Tarde" id="periodo_turma" name="periodo_turma" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" value="<?= htmlspecialchars($periodo_turma) ?>" required>
                        <?php if (isset($erro['periodo'])): ?>
                            <p class="text-red-500 text-xs"><?php echo $erro['periodo']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="sala_turma">Sala</label>
                        <select id="sala_turma" name="sala_turma" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                            <option value="">Selecione uma sala</option>
                            <?php

                            foreach ($dados['salasEncontradas'] as $sala): ?>
                                <option value="<?= $sala['id'] ?>">
                                    <?= htmlspecialchars($sala['nome']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (isset($erro['sala'])): ?>
                            <p class="text-red-500 text-xs"><?php echo $erro['sala']; ?></p>
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
        <?php if (!empty($erro)): ?>

        console.log('Erro encontrado:', <?php echo json_encode($erro); ?>);
            document.getElementById('modal_turma').showModal();
        <?php endif; ?>
    </script>
</body>

</html>