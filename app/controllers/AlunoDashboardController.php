<?php

namespace App\controllers;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\controllers\AuthController;
use App\Models\Aluno;

class AlunoDashboardController
{
    public function render()
    {
        AuthController::iniciarSessao();

        echo "Usuario Dasbord";
    }


    public static function matricularAluno()
    {
        //Usamos isso para ler o texto JSON que o JS enviou no corpo da requisição
        $nomeAluno = $_POST['nome_aluno'];
        $addressAluno = $_POST['address_aluno'];

        $nome = filter_input(INPUT_POST, 'nome_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
        $address = filter_input(INPUT_POST, 'address_aluno', FILTER_SANITIZE_SPECIAL_CHARS);

        $erro = [];
        $sinalizador  = true;
        if (!$nome || !$address) {
            die("Por favor prencha todos os campos corretamente");
        }

        Aluno::salvarAluno($nome, $address);

        header("Location: ../../public/index.php?page=admin_dashboard");
        exit;
    }
}
AlunoDashboardController::matricularAluno();
