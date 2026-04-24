<?php

namespace App\controllers;

use App\Models\Usuarios;
use App\controllers\AuthController;
use App\Models\Aluno;
use App\Models\Teacher;

class cadastrarController
{
    /* public function rende()
    {
        if (session_status() === PHP_SESSION_NONE) {
            AuthController::iniciarSessao();
        }

        // ===========================
        // GET → mostrar form com erros (se existirem)
        // ===========================

        $error = $_SESSION['error'] ?? [];
        $nome = $_SESSION['nome'] ?? '';
        $email = $_SESSION['email'] ?? '';
        $senha = $_SESSION['senha'] ?? '';
        $tipo = $_SESSION['tipo'] ?? '';

        // limpar para não ficar preso
        unset($_SESSION['error'], $_SESSION['nome'], $_SESSION['email'], $_SESSION['senha'], $_SESSION['tipo']);

        // ===========================
        // POST → processar cadastro
        // ===========================

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nome = trim($_POST['nome'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $senha = trim($_POST['senha'] ?? '');
            $tipo = trim($_POST['tipo'] ?? '');

            $error = [];

            // validações
            if ($nome === '') {
                $error['nome'] = "Nome é obrigatório.";
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error['email'] = "Email inválido.";
            }
            if ($tipo === '') {
                $error['tipo'] = "Tipo de usuario é obrigatório.";
            }

            if (Usuarios::buscarPorEmail($email)) {
                $error['email'] = 'Este email já está cadastrado';
            }

            if (strlen($senha) < 6) {
                $error['senha'] = "A senha precisa ter pelo menos 6 caracteres.";
            }

            // tem erro → salvar sessão e redirect
            if (!empty($error)) {
                $_SESSION['error'] = $error;
                $_SESSION['nome'] = $nome;
                $_SESSION['email'] = $email;
                $_SESSION['senha'] = $senha;
                $_SESSION['tipo'] = $tipo;

                header("Location: ?page=cadastrar");
                exit;
            }

            // sem erro → salvar
            $idUsuario  = Usuarios::salvar($nome, $email, $senha, $tipo);

            Aluno::ligarAluno($idUsuario);
            header("Location: ?page=entrar");
            exit;
        }

        // exibir view
        require_once __DIR__ . '/../views/cadastrarViews.php';
    } */

    public function render()
    {
        $this->criarSessão();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->processarcadastro();
        }

        $this->renderizarView();
    }

    private function criarSessão()
    {
        if (session_status() === PHP_SESSION_NONE) {
            AuthController::iniciarSessao();
        }
    }

    private function processarcadastro()
    {
        $error = [];
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
        $tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS);

        $error = $this->validarDados($nome, $email, $senha, $tipo);

        if (!empty($error)) {
            $this->redireccionarComErro($error, $nome, $email, $senha, $tipo);
            return;
        }


        $this->salvarUsuario($nome, $email, $senha, $tipo);

        header("Location: ?page=entrar");
        exit;
    }

    private function validarDados($nome, $email, $senha, $tipo)
    {
        if ($nome === '') $error['nome'] = "Nome éobrogatório.";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $error['email'] = "Email é obrigatório.";
        if (strlen($senha) < 6) $error['senha'] = "Senha é curta.";
        if ($tipo === '') $error['tipo'] = "Tipo de usuario é obrigatório.";

        $usuario = Usuarios::buscarPorEmail($email);
        if ($usuario) {
            $error['email'] = 'Este email já está vinculado a uma conta';
        }

        $professor = $this->verificarUsuario($nome);
        if (!$professor) {
            $error['nome'] = 'Professor não existente no sistema';
            return $error;
        }
        $email_professor = $this->verificarEmail($email);

        if (!$email_professor) {
            $error['email'] = 'Email não vinculado a nehum professor autorizado';
            return $error;
        }
        return $error;
    }
    private function redireccionarComErro($error, $nome, $email, $senha, $tipo)
    {
        $_SESSION['error'] = $error;
        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        $_SESSION['tipo'] = $tipo;

        header("Location: ?page=cadastrar");
        exit;
    }

    private function salvarUsuario($nome, $email, $senha, $tipo)
    {
        Usuarios::salvar($nome, $email, $senha, $tipo);
    }

    private function renderizarView()
    {

        $error = $_SESSION['error'] ?? '';
        $nome = $_SESSION['nome'] ?? '';
        $email = $_SESSION['email'] ?? '';


        unset($_SESSION['error'], $_SESSION['email'], $_SESSION['senha'], $_SESSION['tipo']);
        require_once __DIR__ . '/../views/cadastrarViews.php';
        exit;  // Para a execução aqui
    }
    private function verificarUsuario($nome)
    {
        $professor = Teacher::verificarUsuario($nome);
        return $professor;
        /* var_dump($nome);
        exit; */
    }
    private function verificarEmail($email)
    {
        $email = Teacher::verificarEmail($email);
        return $email;
        /* var_dump($nome);
        exit; */
    }
    /* 
        ======= PASSO PARA REFACTORAÇÃO DO MEU CÓDIGO: =======

        1- CRIAR UM METODO PRINCIPAL OU DE ENTRADA PARA O  MEU CONTROLLER, QUE VAI SER RESPONSAVEL POR CHAMAR OS OUTROS MÉTODOS;
        2- RECEBER OS VALORES DO USUARIO;
        3- FAZER VALIDAÇÕES;
        4- SE TIVER ERROS, SALVAR OS ERROS E OS VALORES DO USUÁRIO NA SESSÃO PARA MOSTRAR NA VIEW;
        5- REDIRECIONAR CONSOANTE O RESULTADO DAS VALIDAÇÕES;
        6- SE NÃO TIVER ERROS, SALVAR O USUÁRIO NO BANCO DE DADOS
        7- REDIRECIONAR PARA A PÁGINA DE LOGIN;
   */
}
