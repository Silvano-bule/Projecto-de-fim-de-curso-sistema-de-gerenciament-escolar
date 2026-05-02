<?php

/**
 * ============================================================================
 * ADMIN DASHBOARD CONTROLLER
 * ============================================================================
 * 
 * PROPÓSITO:
 * Este arquivo controla a PÁGINA PRINCIPAL do administrador.
 * É como o "painel de controle" de um videogame - mostra tudo o que está
 * acontecendo no sistema (quantos alunos, professores, turmas, etc.).
 * 
 * FUNCIONALIDADES:
 * - Mostra números de estatísticas (total de alunos, professores, etc.)
 * - Busca dados recentes do banco de dados
 * - Valida se o usuário é ADMIN (não deixa professor ou aluno acessar)
 * - Passa tudo para mostrar na tela (View)
 * 
 * ESTRUTURA DO ARQUIVO:
 * 1. Imports (trazer código de outros lugares)
 * 2. Definição da classe AdminDashboardController
 * 3. Função render() - mostra o painel
 * 
 * ============================================================================
 */

namespace App\controllers;

// Importar outras classes que vamos usar
use App\controllers\AuthController;
use App\Models\Usuarios;
use App\Models\Aluno;
use App\Models\Turma;
use App\Models\Curso;
use App\Models\Teacher;
use App\Models\Classe;
use App\Models\Disciplina;
use App\Models\Matricula;
use App\Models\salaModels;

class AdminDashboardController
{
    /**
     * FUNÇÃO: render()
     * 
     * O QUE FAZ:
     * Esta é a FUNÇÃO PRINCIPAL. Quando alguém acessa o painel do admin,
     * esta função é chamada. Ela:
     * 
     * 1. Verifica se está logado (autenticação)
     * 2. Verifica se é ADMIN (não deixa outro tipo)
     * 3. Busca TODOS os dados:
     *    - Total de alunos
     *    - Total de professores
     *    - Total de turmas
     *    - Alunos recentes
     *    - E tudo mais
     * 4. Passa os dados para a tela (view HTML)
     * 
     * FLUXO:
     * AdminDashboardController->render()
     *     ↓
     * Checa autenticação
     *     ↓
     * Busca dados em Models (banco de dados)
     *     ↓
     * Cria array $dados com tudo
     *     ↓
     * Passa para adminDashboardView.php (a tela HTML)
     *     ↓
     * HTML é mostrado no navegador
     */



    /*  public function render()
    {
        // 1. INICIAR SESSÃO
        // Sem isto, $_SESSION não funciona
        AuthController::iniciarSessao();

        // 2. BUSCAR DADOS RECENTES
        // Pega os últimos 3 alunos adicionados ao sistema
        $alunosRecentes = Aluno::listarAlunosRecentes();

        // Se por algum motivo não retornar array, cria vazio
        if (!is_array($alunosRecentes)) {
            $alunosRecentes = [];
        }

        /* 
        // 3. BUSCAR TURMAS
        // Pega todas as turmas do sistema
        $turmasEncontradas = Turma::listarTurma();
        if (!is_array($turmasEncontradas)) {
            $turmasEncontradas = [];
        }
*/
    // 4. VALIDAR SE ESTÁ LOGADO
    // Se não estiver logado, redireciona para login
    /*  if (AuthController::isLogged() === false) {
            header("Location: public/index.php?page=entrar");
            exit;  // Para a execução aqui
        } */

    // 5. VALIDAR SE É ADMIN
    // Verifica se:
    //   - $_SESSION['user_tipo'] existe
    //   - É igual a 'admin'
    // Se for professor ou aluno, redireciona
    /*  if (!isset($_SESSION['user_tipo']) || $_SESSION['user_tipo'] !== 'admin') {
            header("Location: public/index.php?page=entrar");
            exit;  // Para a execução
        } */

    // 6. CRIAR ARRAY COM TODOS OS DADOS
    // Este array será passado para a tela HTML
    // A tela pode acessar: $dados['nome'], $dados['totalAlunos'], etc.
    /*  $dados = [
            // Dados do usuário logado (vem da sessão)
            'nome' => $_SESSION['user_name'],

            // ESTATÍSTICAS (números que aparecem no topo)
            'totalUsers' => Usuarios::contarUsuarios(),         // Quantos usuários
            'totalAlunos' => Aluno::contarAlunos(),             // Quantos alunos
            'totalProfessores' => Teacher::contarProfessores(), // Quantos professores
            'totalTurmas' => Turma::contarTurmas(),             // Quantas turmas
            'totalCursos' => Curso::contarCursos(),             // Quantos cursos

            // DADOS PARA PREENCHER FORMULÁRIOS (dropdown)
            'turmasEncontradas' => Turma::listarTurma(),        // Lista de turmas
            'cursosEncontrados' => Curso::listarCursos(),       // Lista de cursos
            'totalClasses' => Classe::totalClasses(),           // Total de classes
            'classesEncontradas' => Classe::classes(),          // Lista de classes
            'salasEncontradas' => salaModels::listarSalas(),          // Lista de salas

            // DADOS PARA MOSTRAR EM TABELAS
            'alunosRecentes' => $alunosRecentes,                // Últimos 3 alunos
            'matriculaGerada' => Matricula::listarAlunosComMatriculas(),  // Alunos com matrícula
            'alunos' => Aluno::listarAlunos(),                  // Todos os alunos
            'professores' => Teacher::listarProfessores(),      // Todos os professores
        ];*/

    /*    echo "<pre>";
        print_r($dados);
        echo "</pre>";
        exit; */


    // 8. CARREGAR A VIEW (HTML)
    // Isto mostra a página no navegador
    //require dirname(__DIR__) . '/views/adminDashboardView.php';
    /* } */

    /*  public function teste()
    {
        $dados = $_POST;

        echo "<pre>";
        print_r($dados);
        echo "<pre>";
        exit;
    } */


    public function render()
    {

        /*  $this->mostrarPagina(); */
        AuthController::iniciarSessao();
        $this->verificarLogin();
        $this->dadosUsuario();
    }
    private function verificarLogin()
    {
        if (AuthController::isLogged() === false) {
            header("Location: index.php?page=entrar");
            exit;
        }

        $this->verificarUsuario();
    }
    private function verificarUsuario()
    {
        if (!isset($_SESSION['user_tipo']) || $_SESSION['user_tipo'] !== 'admin') {
            header("Location: index.php?page=entrar");
            exit;
        }
    }

    private function dadosUsuario()
    {
        $dados = [
            'nome' => $_SESSION['user_name'],
            'tipo' => $_SESSION['user_tipo'],
            'totalUsers' => Usuarios::contarUsuarios(),
            'totalAlunos' => Aluno::contarAlunos(),
            'totalProfessores' => Teacher::contarProfessores(),
            'totalTurmas' => Turma::contarTurmas(),
            'totalCursos' => Curso::contarCursos(),



            'salasEncontradas' => salaModels::listarSalas(),
            'alunosRecentes' => Aluno::listarAlunosRecentes(),
            'matriculaGerada' => Matricula::listarAlunosComMatriculas(),
            'alunos' => Aluno::listarAlunos(),
            'professores' => Teacher::listarProfessores(),
            'turmasEncontradas' => Turma::listarTurma(),
            'disciplinasEncontradas' => Disciplina::listarDisciplinas(),
            'cursosEncontrados' => Curso::listarCursos(),
            'registros' => Turma::obterRegistro(),
            'registroProfesor' => Teacher::registroProfesor()
        ];

        /*  echo "<pre>";
        print_r($dados['obterRegistro']);
        echo "</pre>"; */

        extract($dados);
        require __DIR__ . '/../views/adminDashboardView.php';
    }

    public function teste($dados)
    {

        echo "<pre>";
        print_r($dados);
        echo "</pre>";
        exit;
    }

    /* ======= PASSOA PARA GERENCIAR O ADMIN=======
            
            1- INICIAR SESSÃO
            2-VERIFICAR SE ESTÁ LOGADO
            3-VERIFICAR SE É ADMIN
            4-CRIAR ARRAY COM TODOS OS DADOS
            5-PASSAR PARA A VIEW (HTML)        
            6- CRIAR UMA  FUNÇÃO PARA TESTAR OS DADOS (opcional, para ver se está pegando do banco)    
            */
}
