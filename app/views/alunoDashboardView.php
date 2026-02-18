<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Aluno</title>
    <link rel="stylesheet" href="assets/css/output.css">
    <link rel="shortcut icon" href="assets/img/logo cemu.jpg" type="image/x-icon">
</head>
<body>
    <h1>Dashboard do Aluno</h1>
    <h2>Turmas Disponíveis</h2>
    <ul>
        <?php if (!empty($turmas)): ?>
            <?php foreach ($turmas as $turma): ?>
                <li>
                    Nome: <?= htmlspecialchars($turma['nome']) ?><br>
                    Período: <?= htmlspecialchars($turma['periodo']) ?><br>
                    Sala: <?= htmlspecialchars($turma['sala']) ?><br>
                    Capacidade: <?= htmlspecialchars($turma['capacidade']) ?><br>
                    <button>Inscrever-se</button>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>Nenhuma turma disponível.</li>
        <?php endif; ?>
    </ul>
</body>
</html>
