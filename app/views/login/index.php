<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../../public/output.css">
    <link rel="shortcut icon" href="../../../img/logo.png" type="image/x-icon">
</head>

<body>
    <section class="bg-white dark:bg-gray-900">
        <div class="flex justify-center min-h-screen">
            <div class="hidden bg-cover lg:block lg:w-2/5"
                style="background-image: url('https://images.unsplash.com/photo-1494621930069-4fd4b2e24a11?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=715&q=80')">
            </div>

            <div class="flex items-center w-full max-w-3xl p-8 mx-auto lg:px-12 lg:w-3/5">
                <div class="w-full">
                    <h1 class="text-2xl font-semibold tracking-wider text-gray-800 capitalize dark:text-white">
                        Seja bem-vindo de volta
                    </h1>

                    <p class="mt-4 text-gray-500 dark:text-gray-400">
                        Mantenha a informacao perto de ti e fica perto todos e de tudo
                    </p>
                    <div class="mt-3 md:flex md:items-center md:-mx-2">
                        <button
                            class="btn_aluno flex justify-center w-full px-6 py-3 text-blue-500 border border-blue-500 rounded-lg md:w-auto md:mx-2 focus:outline-none cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>

                            <span class="mx-2">
                                Aluno
                            </span>
                        </button>

                        <button
                            class="btn_professor flex justify-center w-full px-6 py-3 text-blue-500 border border-blue-500 rounded-lg md:w-auto md:mx-2 focus:outline-none cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>

                            <span class="mx-2">
                                Professor
                            </span>
                        </button>
                        <button
                            class="btn_admin flex justify-center w-full px-6 py-3 text-blue-500 border border-blue-500 rounded-lg md:w-auto md:mx-2 focus:outline-none cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>

                            <span class="mx-2">
                                Admin
                            </span>
                        </button>
                    </div>
                    <form id="form-aluno" class="grid grid-cols-1 gap-6 mt-8 md:grid-cols-2" action="" method="post">
                        <div>
                            <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Digte o seu nome ou
                                senha</label>
                            <input type="text" id="input_name" placeholder="John"
                                class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:ring focus:ring-blue-400 focus:outline-none focus:ring-opacity-40"
                                name="nome" required />
                        </div>
                        <div>
                            <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Digite a sua
                                senha</label>
                            <input id="input_password" type="password" placeholder="XXX-XX-XXXX-XXX"
                                class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                name="pass" required maxlength="20" minlength="8" />
                        </div>


                        <a href="../cadastrar/index.php"
                            class="flex items-center justify-between w-full px-6 py-3 text-sm tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                            <span>Cadastrar</span>

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 rtl:-scale-x-100" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                        <button type="submit" id="btn_submit"
                            class="flex items-center justify-between w-full px-6 py-3 text-sm tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                            <span>Entrar</span>

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 rtl:-scale-x-100" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </form>
                    <p class="text-blue-500 underline my-9 cursor-pointer">Esquci a minha senha</p>
                </div>
            </div>
        </div>
    </section>
    <script src="../js/main.js"></script>

</body>

</html>

<?php

require  dirname(__DIR__, 3). '\vendor\autoload.php';

use \App\controllers\appController\page;

 echo page::getDates()

?>