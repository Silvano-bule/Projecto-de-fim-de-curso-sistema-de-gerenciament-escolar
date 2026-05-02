<?php

$erros_alunos = $_SESSION['erro_aluno'] ?? [];
$nome = $_SESSION['nome'] ?? [];
$email = $_SESSION['email'] ?? [];
$telefone = $_SESSION['telefone'] ?? [];
$nascimento = $_SESSION['nascimento'] ?? [];
$sexo = $_SESSION['sexo'] ?? [];
$nacionalidade = $_SESSION['nacionalidade'] ?? [];
$nome_pai = $_SESSION['nome_pai'] ?? [];
$nome_mae = $_SESSION['nome_mae'] ?? [];
$numero_BI = $_SESSION['numero_BI'] ?? [];
$provincia = $_SESSION['provincia'] ?? [];
$altura = $_SESSION['alrtura'] ?? [];

unset($_SESSION['erro_aluno'], $_SESSION['nome'], $_SESSION['email'], $_SESSION['telefone'], $_SESSION['nascimento'], $_SESSION['sexo'], $_SESSION['nacionalidade'], $_SESSION['nome_pai'], $_SESSION['nome_mae'], $_SESSION['numero_BI'], $_SESSION['provincia'], $_SESSION['alrtura']);

?>
<html>

<body>
    <dialog id="my_modal_1" class="modal">
        <div class="modal-box w-screen max-w-5xl">
            <div class="flex flow-row justify-between items-center">
                <h3 class="text-lg font-bold">Inserir aluno</h3>
            </div>
            <form action="index.php?page=aluno_dashboard&action=render" method="POST" id="formulario">
                <div class="grid grid-cols-3 gap-6 mt-4 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4">
                    <input type="hidden" name="idAluno" id="id_aluno" class="ID" value="<?= $aluno['id'] ?? '' ?>">
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="username">Nome<span class="text-red-500 text-xs"> (Obrigatório)</span> </label>
                        <input name="nome_aluno" id="username" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" required>
                        <?php if (isset($erros_alunos['nome'])): ?>
                            <p class="text-red-500 text-xs italic"><?php echo $erros_alunos['nome']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="email">Email<span class="text-red-500 text-xs"> (Obrigatório)</span> </label>
                        <input name="email_aluno" id="email" type="email" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" required>
                    </div>
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="telefone">Telefone</label>
                        <input placeholder="apenas 9 dígitos" id="telefone" name="telefone_aluno" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" minlength="9" maxlength="9" pattern="\d{9}" required oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                        <?php if (isset($_GET['erro']) && $_GET['erro'] == 'telefone'): ?>
                            <p class="text-red-500  text-xs mt-1">Telefone Inválido: Deve conter exatamente 9 dígitos.</p>
                        <?php endif; ?>
                    </div>
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="Nascimento">Nascimento</label>
                        <input autocomplete="on" type="date" id="nasc" name="nascimento_aluno" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" required>
                    </div>
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="Sexo">Sexo</label>
                        <select name="sexo_aluno" id="sexo" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="Nacionalidade">Nacionalidade</label>
                        <input autocomplete="on" type="text" id="nacio" name="nacionalidade_aluno" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" required>
                    </div>
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="Nome da pai">Nome do Pai</label>
                        <input autocomplete="on" type="text" name="pai_aluno" id="nome_pai" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" required>
                    </div>
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="Nome da mae">Nome da mae</label>
                        <input autocomplete="on" type="text" name="mae_aluno" id="nome_mae" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" required>
                    </div>
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="Numero do BI">Número do BI</label>
                        <input autocomplete="on" type="text" name="numero_BI_aluno" id="numero_BI" placeholder="000000000LA000" pattern="[0-9]{9}LA[0-9]{3}" class="block w-full px-4 py-2 mt-2 text-gray-100 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-30  dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" required maxlength="14">
                    </div>
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="Provincia">Provincia</label>
                        <select name="provincia_aluno" id="provincia" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
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
                    </div>
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="Altura">Altura</label>
                        <input autocomplete="on" type="text" pattern="[0-9.,]+" placeholder="Ex: 1,75" title="Digite a altura usando o ponto ou virgula" id="altura" name="altura_aluno" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" required>
                    </div>
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="Classe">Classe</label>
                        <select id="aluno_classe" name="classe_aluno" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" required>
                            <option value="">Selecionar classe</option>
                            <?php if (empty($turmasEncontradas)): ?>
                                <option value="" disabled>Nenhuma classe cadastrada</option>
                            <?php else: ?>
                                <?php foreach ($turmasEncontradas as $turma): ?>
                                    <option value="<?php echo htmlspecialchars($turma['id']); ?>">
                                        <?php echo htmlspecialchars($turma['classe']); ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="Turma">Turma</label>
                        <!-- Primeiro, verifique se a variável existe -->
                        <select autocomplete="on" id="Turma" name="turma_aluno" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" required>

                            <!-- Option padrão com value vazio -->
                            <option value="">Selecionar turma</option>

                            <!-- Verifica se há turmas -->
                            <?php if (empty($turmasEncontradas)): ?>
                                <option value="" disabled>Nenhuma turma cadastrada</option>
                            <?php else: ?>
                                <?php foreach ($turmasEncontradas as $turma): ?>
                                    <?php
                                    // Verifica se os índices existem (segurança)
                                    $idTurma = isset($turma['idturma']) ? $turma['idturma'] : (isset($turma['id']) ? $turma['id'] : '');
                                    $nomeTurma = isset($turma['nome']) ? $turma['nome'] : '';

                                    // Só mostra se tiver nome
                                    if (!empty($nomeTurma)):?>
                                        <option value="<?php echo htmlspecialchars($idTurma); ?>">
                                            <?php echo htmlspecialchars($nomeTurma); ?>
                                        </option>
                                <?php endif; endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="Curso">Curso</label>
                        <select name="curso_aluno" id="Curso" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                            <option value="">Selecionar Curso</option>
                            <?php if (empty($cursosEncontrados)): ?>
                                <option value="" disabled>Nenhum curso cadastrado</option>
                            <?php else: ?>
                                <?php foreach ($cursosEncontrados as $curso): ?>
                                    <option value="<?php echo htmlspecialchars($curso['id']); ?>">
                                        <?php echo htmlspecialchars($curso['nome']); ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="sala">Sala</label>
                        <select  id="Sala" name="sala_aluno" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                            <option value="">Selecionar Sala</option>
                            <?php if (empty($salasEncontradas)): ?>
                                <option value="" disabled>Nenhuma sala cadastrada</option>
                            <?php else: ?>
                                <?php foreach ($salasEncontradas as $sala): ?>
                                    <option value="<?php echo htmlspecialchars($sala['id']); ?>">
                                        <?php echo htmlspecialchars($sala['nome']); ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                <button type="submit" class=" m-4  btn btn-success text-white shadow-md hover:shadow-lg transition-all cursor-poiter">
                    Salvar
                </button>
                <button id="btnClose" type="button" class="btn-fechar cursor-pointer btn btn-error  text-white hover:text-red-600 hover:bg-red-300">Fechar</button>
            </form>
        </div>
        <script>
            // Mostrar modal apenas se houver erros
            <?php if (!empty($erros_alunos)): ?>
                document.getElementById('my_modal_1').showModal();
            <?php endif; ?>
        </script>

    </dialog>
</body>

</html>