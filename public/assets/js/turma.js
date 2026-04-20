function removerTurma(idTurma) {
    fetch("index.php?page=turma&action=removerTurma&id=" + idTurma)
        .then(response => response.json())
        .then(res => {
            console.log(res);
            location.reload();
        })
}

function obterTurma(idTurma) {
    document.getElementById("id_turma").value = idTurma;
    fetch("index.php?page=turma&action=obterTurmaPorId&id=" + idTurma)
        .then(response => response.json())
        .then(turma => {
            console.log(turma);
            document.getElementById('modal_turma').showModal();
            preencherFormularioTurma(turma);
        })
}
function preencherFormularioTurma(turma) {
    document.getElementById('id_turma').value = turma.id;
    document.getElementById('nome_turma').value = turma.nome;
    document.getElementById('periodo_turma').value = turma.periodo;
    document.getElementById('Sala_turma').value = turma.id_sala;
}