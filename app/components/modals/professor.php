<?php
$error_prof = $_SESSION['error_professor'] ?? null;
$nome = $_SESSION['nome_professor'] ?? '';
$email = $_SESSION['email_professor'] ?? '';
$telefone = $_SESSION['telefone_professor'] ?? '';
$nascimento = $_SESSION['nascimento_professor'] ?? '';
$sexo = $_SESSION['sexo_professor'] ?? '';
$nacionalidade = $_SESSION['nacionalidade_professor'] ?? '';
$provincia = $_SESSION['provincia_professor'] ?? '';

unset($_SESSION['error_professor'], $_SESSION['nome_professor'], $_SESSION['email_professor'], $_SESSION['telefone_professor'], $_SESSION['nascimento_professor'], $_SESSION['sexo_professor'], $_SESSION['nacionalidade_professor'], $_SESSION['provincia_professor']);
?>
<html>

<body>

    <dialog id="modal_professor" class="modal">
        <div class="modal-box w-screen max-w-5xl">
            <div class="flex flow-row justify-between items-center">
                <h3 class="text-lg font-bold">Inserir Professor</h3>
            </div>

            <form action="index.php?page=professor_dashboard&action=render" method="POST" id="formulario">
                <input type="hidden" name="idProfessor" id="idProfessor" class="ID">
                <div class="grid grid-cols-3 gap-6 mt-4 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4">
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="username">Nome<span class="text-red-500 text-xs"> (Obrigatório)</span> </label>
                        <input name="nome_professor" id="nome_professor" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" value="<?php echo htmlspecialchars($nome); ?>" required>
                        <?php if (isset($error_professor['nome'])): ?>
                            <p class="text-red-500 text-xs"><?php echo $error_professor['nome']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="email">Email<span class="text-red-500 text-xs"> (Obrigatório)</span> </label>
                        <input name="email_professor" id="email_professor" type="email" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" value="<?php echo htmlspecialchars($email); ?>"
                            required>
                        <?php if (isset($error_professor['email'])): ?>
                            <p class="text-red-500 text-xs"><?php echo $error_professor['email']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="telefone">Telefone</label>
                        <input placeholder="apenas 9 dígitos" name="telefone_professor" id="telefone_professor" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" value="<?php echo htmlspecialchars($telefone); ?>" required>
                        <?php if (isset($error_prof['telefone'])): ?>
                            <p class="text-red-500 text-xs"><?php echo $error_prof['telefone']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="Nascimento">Nascimento</label>
                        <input autocomplete="on" type="date" name="nascimento_professor" id="nascimento_professor" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" value="<?php echo htmlspecialchars($nascimento); ?>" required>
                        <?php if (isset($error_professor['nascimento'])): ?>
                            <p class="text-red-500 text-xs"><?php echo $error_professor['nascimento']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="Sexo">Sexo</label>
                        <select name="sexo_professor" id="sexo_professor" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                        <?php if (isset($error_professor['sexo'])): ?>
                            <p class="text-red-500 text-xs"><?php echo $error_professor['sexo']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="Nacionalidade">Nacionalidade</label>
                        <input autocomplete="on" type="text" name="nacionalidade_professor" id="nacionalidade_professor" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" value="<?php echo htmlspecialchars($nacionalidade); ?>" required>
                        <?php if (isset($error_professor['nacionalidade'])): ?>
                            <p class="text-red-500 text-xs"><?php echo $error_professor['nacionalidade']; ?></p>
                        <?php endif; ?>
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
                        <?php if (isset($error_professor['provincia'])): ?>
                            <p class="text-red-500 text-xs"><?php echo $error_professor['provincia']; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <button type="submit" class=" m-4  btn btn-success text-white shadow-md hover:shadow-lg transition-all cursor-poiter">
                    Salvar
                </button>
                <button id="btnClose" type="button" class="btn-fechar cursor-pointer btn btn-error  text-white hover:text-red-600 hover:bg-red-300">Fechar</button>
            </form>
        </div>
    </dialog>

    <script>
        <?php if (!empty($error_prof)): ?>
            document.getElementById('modal_professor').showModal();
        <?php endif; ?>
    </script>
</body>

</html>