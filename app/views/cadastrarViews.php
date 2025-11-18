<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gerenciamento Escolar</title>
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/output.css">
</head>

<body class="flex justify-center items-center min-h-screen">
    <div class="w-md max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
        <div class="px-6 py-4">
            <div class="flex justify-center mx-auto">
                <img class="w-auto h-7 sm:h-8" src="https://merakiui.com/images/logo.svg" alt="">
            </div>

            <h3 class="mt-3 text-xl font-medium text-center text-gray-600 dark:text-gray-200">Seja bem vindo</h3>

            <p class="mt-1 text-center text-gray-500 dark:text-gray-400">Criar conta</p>

            <form action="index.php?page=cadastrar" method="post" autocomplete="off">
                <div class="w-full mt-4">
                    <input autocomplete="given-name" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-500 bg-white border rounded-lg dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring focus:ring-blue-300" type="text" placeholder="Digite o seu nome" aria-label="text" name="nome" value="<?= htmlspecialchars($nome ?? '') ?>" />
                    <?php if (isset($error['nome'])): ?>
                        <p class="text-red-500 text-sm"><?= htmlspecialchars($error['nome']) ?></p>
                    <?php endif; ?>

                </div>
                <div class="w-full mt-4">
                    <input autocomplete="email" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-500 bg-white border rounded-lg dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring focus:ring-blue-300" type="email" placeholder="Email Address" aria-label="Email Address" name="email" value="<?= htmlspecialchars($email ?? '') ?>" />
                    <?php if (isset($error['email'])): ?>
                        <p class="text-red-500 text-sm"><?= htmlspecialchars($error['email']) ?></p>
                    <?php endif; ?>
                </div>

                <div class="w-full mt-4">
                    <input autocomplete="new-password" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-500 bg-white border rounded-lg dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring focus:ring-blue-300" type="password" placeholder="Password" aria-label="Password" name="senha" minlength="6" />
                    <?php if (isset($error['senha'])): ?>
                        <p class="text-red-500 text-sm"><?= htmlspecialchars($error['senha']) ?></p>
                    <?php endif; ?>
                </div>

                <div class="flex items-center justify-center mt-4">
                    <button class="px-6 py-2 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-500 cursor-pointer" type="submit">
                        Cadastrar
                    </button>
                </div>
            </form>
        </div>

        <div class="flex items-center justify-center py-4 text-center bg-gray-50 dark:bg-gray-700">
            <span class="text-sm text-gray-600 dark:text-gray-200">Já tem uma conta? </span>

            <a href="index.php?page=entrar" class="mx-2 text-sm font-bold text-blue-500 dark:text-blue-400 hover:underline">Entrar</a>
        </div>
    </div>
</body>

</html>