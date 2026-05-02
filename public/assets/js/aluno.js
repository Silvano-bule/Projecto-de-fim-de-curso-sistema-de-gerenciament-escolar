function removerAluno(idaluno) {
    const url = "index.php?page=aluno_dashboard&action=removerAluno&id=" + idaluno;
    console.log(url) // Verifique a URL no console
    fetch(url, {
        method: 'GET',
    })
        .then(response => response.text())
        .then(msg => {
            alert("Aluno removido");
            location.reload();
        })
        .catch(error => {
            console.error('Erro ao remover aluno:', error);
            alert("Erro ao remover aluno");
        });
}

function obterAluno(idAluno) {
    document.getElementById("id_aluno").value = idAluno;
    fetch("index.php?page=aluno_dashboard&action=obterAlunoPorId&id=" + idAluno)
        .then(response => response.json())
        .then(aluno => {
            console.log("Resposta em JSON: ", aluno)
            document.getElementById('my_modal_1').showModal();
            preencherFormulario(aluno)
        })
}
function preencherFormulario(aluno) {
    document.getElementById('id_aluno').value = aluno.id || '';
    document.getElementById('username').value = aluno.nome || '';
    document.getElementById('email').value = aluno.email || '';
    document.getElementById('telefone').value = aluno.telefone || '';
    document.getElementById('nasc').value = aluno.nascimento || '';
    document.getElementById('sexo').value = aluno.sexo || '';
    document.getElementById('nacio').value = aluno.nacionalidade || '';
    document.getElementById('nome_pai').value = aluno.nome_pai || '';
    document.getElementById('nome_mae').value = aluno.nome_mae || '';
    document.getElementById('numero_BI').value = aluno.numero_BI || '';
    document.getElementById('provincia').value = aluno.provincia || '';
    document.getElementById('altura').value = aluno.altura || '';
    document.getElementById('aluno_classe').value = aluno.classe_aluno || '';
    document.getElementById('Turma').value = aluno.id_turma || '';
    document.getElementById('Curso').value = aluno.id_curso || '';
    document.getElementById('Sala').value = aluno.sala_aluno || '';
}