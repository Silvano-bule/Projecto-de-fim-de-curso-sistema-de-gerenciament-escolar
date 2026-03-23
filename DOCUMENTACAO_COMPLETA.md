# 📚 DOCUMENTAÇÃO COMPLETA - SISTEMA DE GESTÃO ESCOLAR (SGE)

> **Explicado de forma que uma criança de 12 anos entenda!** 👧👦

---

## 🎯 O QUE É ESTE PROJETO?

Imagine que sua escola precisa de um **sistema de computador** para:
- **Registrar alunos** (nome, email, telefone, etc.)
- **Organizar turmas** (qual aluno está em qual turma)
- **Gerenciar professores** e seus dados
- **Criar cursos** (Matemática, Português, etc.)
- **Deixar que cada pessoa (admin, professor, aluno) faça login** e veja suas informações

**Pois é! Esse projeto faz TUDO ISSO!** ✨

---

## 🏗️ COMO O PROJETO ESTÁ ORGANIZADO?

Imagine que o projeto é uma **casa**:

```
Casa (Projeto SGE)
├── Entrada Principal (public/index.php)
├── Cozinha (Models - onde guardamos receitas/dados)
├── Salas (Views - o que as pessoas veem)
├── Gerentes (Controllers - quem controla tudo)
├── Parede com Botões (JavaScript - interações)
├── Garagem (Config - configurações)
└── Elétrica (Core - conexões importantes)
```

---

## 📂 PASTA POR PASTA

### 1️⃣ **public/** (A Porta da Casa)
```
public/
├── index.php           ← ENTRADA PRINCIPAL (primeira coisa carregada)
└── assets/
    ├── css/            ← Cores e estilos (como pintar a casa)
    ├── js/             ← Programação do navegador (botões interativos)
    └── img/            ← Imagens
```

**O que faz:** Quando você acessa `http://localhost/TCC/SGE/public/`, o arquivo `index.php` é executado primeiro. Ele é como a **porta principal** da casa.

---

### 2️⃣ **app/controllers/** (Os Gerentes)
Cada arquivo aqui é um **gerente** responsável por uma tarefa:

#### 📌 **AdminDashboardController.php** 
- **Tarefa:** Mostrar o painel (dashboard) do administrador
- **Responsabilidades:**
  - Contar total de alunos, professores, turmas, cursos
  - Buscar dados recentes
  - Processar operações

#### 📌 **AlunoDashboardController.php**
- **Tarefa:** Controlar operações de alunos
- **Responsabilidades:**
  - Adicionar novo aluno `matricularAluno()`
  - Listar alunos `listarAlunos()`
  - Obter dados de um aluno `obterAluno(id)`
  - Atualizar dados do aluno `atualizarAluno()`
  - Remover aluno `removerAluno(id)`

#### 📌 **AuthController.php**
- **Tarefa:** Verificar se pessoa está logada
- **Responsabilidades:**
  - Iniciar sessão `iniciarSessao()`
  - Verificar se está logado `isLogged()`
  - Fazer logout `logout()`

#### 📌 **entrarController.php**
- **Tarefa:** Processar login
- **Responsabilidades:**
  - Verificar email e senha
  - Redirecionar para dashboard correto (admin, professor ou aluno)

#### 📌 **cadastrarController.php**
- **Tarefa:** Registrar novos usuários
- **Responsabilidades:**
  - Validar dados (email não pode ter @ duplicado, etc.)
  - Guardar no banco de dados avec hash de senha seguro

#### 📌 **ProfessorDashboardController.php**
- **Tarefa:** Controlar operações de professores
- **Responsabilidades:** CRUD de professores (Criar, Ler, Atualizar, Deletar)

#### 📌 **ClasseController.php**, **CursoController.php**, **TurmaAlunoController.php**
- **Tarefa:** Específico para cada entidade (Classe, Curso, Turma)
- **Responsabilidades:** Operações CRUD básicas

---

### 3️⃣ **app/Models/** (A Cozinha - Dados)
Cada arquivo aqui é como uma **receita de como guardar/buscar informações** no banco de dados.

#### 📌 **Aluno.php**
```php
// Exemplo de como funciona
salvarAluno($nome, $email, ...)      // Guarda novo aluno no BD
atualizarAluno($dados)                // Altera dados existentes
obterAlunoPorId($id)                  // Pega informações de UM aluno
listarAlunos()                        // Pega TODOS os alunos
removerAluno($id)                     // Deleta um aluno
contarAlunos()                        // Diz quantos alunos existem
```

#### 📌 **Usuarios.php**, **Turma.php**, **Professor.php**, **Curso.php**, **Classe.php**, **Matricula.php**
- Cada um funciona **IGUAL**, mas com suas próprias tabelas no banco

---

### 4️⃣ **app/views/** (As Salas - O Que Se Vê)
Arquivos HTML que mostram botões, formulários, tabelas, etc.

#### 📌 **adminDashboardView.php** (Grande!)
- Mostra números (estatísticas)
- Tabela de alunos, professores
- Botões para editar/deletar
- Modais (caixas de diálogo) para adicionar dados

#### 📌 **homeViews.php**
- Página inicial bonita
- Menu de navegação
- Seção "Sobre"
- Botões "Login" e "Cadastro"

#### 📌 **entrarViews.php**, **cadastrarViews.php**
- Formulários para login e registro

#### 📌 **alunoDashboardView.php**, **professorDashboardView.php**
- Página que cada tipo vê após fazer login

---

### 5️⃣ **app/core/** (A Elétrica - Conexões)
Código técnico que faz tudo funcionar:

#### 📌 **Database.php**
```php
// Faz conexão com MySQL usando Singleton Pattern
// Garante que há apenas UMA conexão aberta (economiza energia)
$db = Database::getConnection();  // Pega a conexão
$db->prepare($sql);                // Prepara a consulta
$stmt->execute($params);           // Executa
```

#### 📌 **Router.php**
```php
// Interpreta a URL e executa a função certa
// Se acessa: http://localhost/TCC/SGE/public/index.php?page=admin_dashboard&action=render
// Faz: AdminDashboardController->render()
```

---

### 6️⃣ **config/** (Configurações)

#### 📌 **routes.php**
```php
// Define qual página (_GET['page']) vai para qual Controller
'home'             => homeController::class,
'admin_dashboard'  => AdminDashboardController::class,
'aluno_dashboard'  => AlunoDashboardController::class,
... e mais
```

---

### 7️⃣ **public/assets/js/** (Interatividade)

#### 📌 **main.js**
Controla o lado do navegador (browser):
- `editarAluno(id)` - Abre modal com dados do aluno
- `removerAluno(id)` - Deleta aluno
- Filtra/busca na tabela
- Abre/fecha modais (caixas de diálogo)
- **Usa Fetch** para comunicação com servidor sem recarregar página

---

## 🔄 COMO FUNCIONA O FLUXO?

### Exemplo: Um Administrador Cria um Novo Aluno

```
1. Admin acessa: http://localhost/TCC/SGE/public/
   └─> index.php carrega

2. index.php carrega router.php
   └─> Router vê a URL (page=admin_dashboard)
   └─> Chama: AdminDashboardController->render()

3. AdminDashboardController busca dados:
   └─> $alunos = Aluno::listarAlunos()      (vai no Model)
   └─> Aluno.php executa: SELECT * FROM aluno
   └─> Retorna dados

4. Dados são passados para View:
   └─> adminDashboardView.php recebe $alunos
   └─> Mostra tabela HTML com alunos

5. Admin clica em "Adicionar Aluno":
   └─> Modal (caixa) abre com form
   └─> Admin preenche: nome, email, telefone, ...
   └─> Clica "Salvar"

6. JavaScript (main.js) pega os dados:
   └─> fetch('public/index.php?page=aluno_dashboard&action=matricularAluno')
   └─> Envia dados por POST (escondido)

7. Servidor (PHP) recebe:
   └─> AlunoDashboardController->matricularAluno()
   └─> Valida tudo (email correto? Telefone com 9 dígitos?)
   └─> Aluno::salvarAluno($dados)  ← Salva no BD
   └─> Retorna JSON: {"status": "ok"}

8. JavaScript recebe resposta:
   └─> Alert: "Aluno matriculado com sucesso!"
   └─> location.reload() - Recarrega página
   └─> Nova tabela mostra o aluno adicionado ✨
```

---

## 💾 BANCO DE DADOS

O projeto usa **MySQL** com tabelas:

```sql
usuarios       -- Emails, senhas, tipos (admin, professor, aluno)
aluno          -- Nome, email, telefone, nascimento, classe, turma, etc.
professor      -- Nome, email, telefone, disciplinas
turma          -- Nome, período, sala, capacidade
curso          -- Nome, área técnica, status
classe         -- Nome, descrição, curso associado
matricula      -- Número de matrícula, aluno, turma
```

---

## 🔐 SEGURANÇA

- ✅ **Senhas:** Usando `password_hash()` (criptografia)
- ✅ **Sessões:** `$_SESSION` valida se está logado
- ✅ **Validações:** Cada formulário é validado (frente e trás)
- ✅ **AJAX Requests:** Header `X-Requested-With: XMLHttpRequest`

---

## 📝 TECNOLOGIAS USADAS

| Tecnologia | Para quê? | Exemplo |
|-----------|-----------|---------|
| **PHP** | Lógica do servidor | Controllers, Models |
| **MySQL** | Banco de dados | Guardar alunos, professores |
| **JavaScript** | Interatividade browser | Abrir modais, buscar |
| **HTML/CSS** | Interface Visual | Forms, tabelas, cores |
| **Tailwind CSS** | Estilos modernos | Classes como `w-full`, `bg-blue-500` |
| **DaisyUI** | Componentes prontos | Modais, botões bonitos |
| **Composer** | Gerenciador PHP | Autoload de classes |
| **PDO** | Conexão BD segura | Prepared statements |

---

## 🎮 COMO USAR O PROJETO?

### 1. Acessar a Página Inicial
```
http://localhost/TCC/SGE/public/
```

### 2. Fazer Login
- Email: (seu email registrado)
- Senha: (sua senha)
- Sistema redireciona para dashboard (admin, professor ou aluno)

### 3. Operações Comuns

#### **Admin pode:**
- ➕ Adicionar aluno (Modal "Inserir aluno")
- ✏️ Editar aluno (Clica em aluno na tabela)
- ❌ Deletar aluno (Ícone de lixeira)
- ➕ Adicionar professor
- ➕ Criar turmas, cursos, classes
- 📊 Ver estatísticas (números na tela inicial)

#### **Professor pode:**
- 👁️ Ver seu perfil
- ✏️ Editar seus dados

#### **Aluno pode:**
- 👁️ Ver turmas disponíveis
- 📝 Se inscrever em turmas

---

## 🐛 SOLUÇÃO DE PROBLEMAS

### "Erro 404"
- Verifique URL: deve ser `http://localhost/TCC/SGE/public/`
- Verifique se Apache está rodando (XAMPP)

### "Erro ao conectar banco"
- Verifique se MySQL está rodando
- Verifique credenciais em `app/core/Database.php`
- Database padrão: `sge`, usuário: `root`, sem senha

### "Página em branco"
- Abra F12 (Console do navegador)
- Procure por mensagens de erro em vermelho
- Ou verifique `php error_log`

---

## 📊 ESTRUTURA DE PASTAS VISUAL

```
SGE (Projeto Raiz)
│
├── 📂 app/
│   ├── controllers/        (12 gerentes)
│   ├── Models/             (7 receitas de dados)
│   ├── views/              (8 salas HTML)
│   └── core/               (Database.php, Router.php)
│
├── 📂 config/
│   └── routes.php          (mapa de rotas)
│
├── 📂 public/
│   ├── index.php           (entrada principal)
│   └── assets/
│       ├── css/            (estilos)
│       ├── js/             (interatividade)
│       └── img/            (imagens)
│
├── 📂 vendor/              (dependências do Composer)
│
├── composer.json           (lista de dependências)
├── package.json            (dependências de Node - TailwindCSS)
├── .htaccess              (reescrita de URLs Apache)
│
└── DOCUMENTACAO_COMPLETA.md (este arquivo!)
```

---

## 🚀 FLUXO DE EXECUÇÃO (PASSO A PASSO)

### Quando você acessa a URL:

```
http://localhost/TCC/SGE/public/index.php?page=admin_dashboard&action=render
```

1. **Apache** recebe a requisição
2. **index.php** é executado:
   ```php
   require __DIR__ . '/../vendor/autoload.php';  // Carrega classes PHP
   $router = new Router();
   $router->route();  // Interpreta a URL
   ```

3. **Router.php** lê o `?page=admin_dashboard`:
   ```php
   $page = $_GET['page'];  // 'admin_dashboard'
   $action = $_GET['action'];  // 'render'
   
   // Procura em routes.php
   $controller = AVAILABLE_ROUTES[$page];  // AdminDashboardController
   $controllerInstance = new $controller();
   $controllerInstance->$action();  // Executa render()
   ```

4. **AdminDashboardController->render()** executa:
   ```php
   // Chama Models para buscar dados
   $alunos = Aluno::listarAlunos();
   $professores = Teacher::listarProfessores();
   ...
   
   // Passa dados para View
   require '../views/adminDashboardView.php';
   ```

5. **adminDashboardView.php** mostra HTML com os dados

---

## 📖 GUIA RÁPIDO DOS MÉTODOS PRINCIPAIS

### Aluno.php
| Método | Entrada | Saída | Exemplo |
|--------|---------|-------|---------|
| `salvarAluno()` | nome, email, etc. | ID do aluno | `$id = Aluno::salvarAluno('João', 'joao@email.com', ...)` |
| `obterAlunoPorId()` | ID | Array com dados | `$aluno = Aluno::obterAlunoPorId(5)` |
| `atualizarAluno()` | Array de dados | true/erro | `Aluno::atualizarAluno(['idaluno'=>5, 'nome'=>'Maria'])` |
| `listarAlunos()` | nenhum | Array de todos | `$todos = Aluno::listarAlunos()` |
| `removerAluno()` | ID | sucesso | `Aluno::removerAluno(5)` |
| `contarAlunos()` | nenhum | Número | `$total = Aluno::contarAlunos()` |

(Mesma lógica para Teacher, Turma, Curso, Classe, etc.)

---

## 🎓 DICAS PARA ENTENDER MELHOR

### 1. **Siga uma operação completa**
Escolha: "Adicionar aluno"
- Veja a função em AlunoDashboardController
- Veja as validações
- Veja a query SQL em Aluno::salvarAluno()
- Veja o HTML do formulário em adminDashboardView

### 2. **Use o "Inspetor" do Navegador (F12)**
- Clique em "Network" → veja requisições AJAX
- Clique em "Console" → veja logs `console.log()`
- Clique em "Elements" → veja HTML gerado

### 3. **Leia um Controller em detalhe**
Exemplo: `AlunoDashboardController::matricularAluno()`
```php
public function matricularAluno() {
    // 1. Pega dados do formulário
    $nome = filter_input(INPUT_POST, 'nome_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
    
    // 2. Valida
    if (strlen($telefone) !== 9) {
        throw new Exception("Telefone inválido");
    }
    
    // 3. Salva no BD
    $idAluno = Aluno::salvarAluno($nome, $email, ...);
    
    // 4. Retorna resposta
    echo json_encode(["status" => "ok"]);
}
```

---

## 📞 CONTATO & SUPORTE

Se não entender algo:
1. Verifique este arquivo novamente
2. Procure por comentários no código (`//`)
3. Use F12 para ver erros
4. Pergunte a um desenvolvedor

---

## ✨ RESUMO FINAL

**SGE é um projeto que:**
- Permite admin gerenciar alunos, professores, turmas, cursos
- Permite professor e aluno fazer login e ver suas informações
- Usa banco de dados para guardar tudo com segurança
- Usa JavaScript para fazer interface bonita e responsiva
- Segue padrão **MVC** (Model-View-Controller): dados, telas, lógica separadas

**Com esse conhecimento você consegue:**
✅ Entender como o projeto funciona
✅ Adicionar novas funcionalidades
✅ Corrigir bugs
✅ Explicar para outras pessoas

---

**Parabéns por usar este sistema! 🎉**

