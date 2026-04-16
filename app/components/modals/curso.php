<?php 

$error_curso = $_SESSION['error_curso'] ?? [];
$nome_curso = $_SESSION['nome_curso'] ?? '';
$descricao_curso = $_SESSION['descricao_curso'] ?? '';

unset($_SESSION['error_curso'], $_SESSION['nome_curso'], $_SESSION['descricao_curso']);

?>

<html>

<body>
    <dialog id="modal_curso" class="modal">
        <div class="modal-box w-screen max-w-2xl">
            <div class="flex flow-row justify-between items-center">
                <h3 class="text-lg font-bold">Criar Curso</h3>
            </div>
            <form action="index.php?page=Curso&action=render" method="POST" id="formulario">
                <input type="hidden" id="idCurso" name="idCurso">
                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-2">
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="curso">Nome do Curso</label>
                        <input placeholder="Ex: Informática, CFB, CEJ..." name="nome_curso" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" required>

                        <?php if (isset($error_curso['nome_curso'])): ?>
                            <p class="text-red-500 text-xs"><?php echo $error_curso['nome_curso']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="area_tecnica">Descrição<span class="text-red-500 text-xs"> (Obrigatório)</span> </label>
                        <input placeholder="Texto sobre o curso" name="descricao_curso" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" required>
                        <?php if (isset($error_curso['descricao_curso'])): ?>
                            <p class="text-red-500 text-xs"><?php echo $error_curso['descricao_curso']; ?></p>
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
        <?php if (!empty($error_curso)): ?>
            document.getElementById('modal_curso').showModal();
        <?php endif; ?>
    </script>
</body>

</html>