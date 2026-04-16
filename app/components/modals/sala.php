<?php
$error = $_SESSION['error'] ?? [];
$nome_sala = $_SESSION['nome_sala'] ?? '';
$capacidade = $_SESSION['capacidade'] ?? '';

unset($_SESSION['error'], $_SESSION['nome_sala'], $_SESSION['capacidade']);

?>

<html>

<body>
    <dialog id="modal_sala" class="modal">
        <div class="modal-box w-screen max-w-5xl">
            <div class="flex flow-row justify-between items-center">
                <h3 class="text-lg font-bold">Inserir sala</h3>
            </div>
            <form action="index.php?page=Sala&action=render" method="POST">
                <div class="grid grid-cols-3 gap-6 mt-4 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4">
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="username">Nome<span class="text-red-500 text-xs"> (Obrigatório)</span> </label>
                        <input name="nome_sala" id="username" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" value="<?= $nome_sala ?>" required>
                        <?php if (isset($error['nome'])): ?>
                            <p class="text-red-500 text-xs italic"><?php echo $error['nome']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="username">Capacidade<span class="text-red-500 text-xs"> </span> </label>
                        <input name="capacidade" id="username" type="number" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" value="<?= $capacidade ?>" required>
                        <?php if(isset($error['capacidade'])): ?>
                            <p class="text-red-500 text-xs italic"><?php echo $error['capacidade']; ?></p>
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
        <?php if (!empty($error)): ?>
            document.getElementById('modal_sala').showModal();
        <?php endif; ?>
    </script>
</body>

</html>