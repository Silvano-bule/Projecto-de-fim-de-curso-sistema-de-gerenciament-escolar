function removerDisciplina(idDisciplina) {
    fetch("index.php?page=disciplina&action=removerDisciplina&id=" + idDisciplina)
        .then(response => response.json())
        .then(res => {
            console.log(res);
            location.reload();
        })
}

function obterDisciplina(idDisciplina) {
    document.getElementById("id_disciplina").value = idDisciplina;
    fetch("index.php?page=disciplina&action=obterDisciplinaPorId&id=" + idDisciplina)
        .then(response => response.json())
        .then(disciplina => {
            console.log(disciplina);
            document.getElementById('modal_disc').showModal();
            preencherFormularioDisciplina(disciplina);
        })
}
function preencherFormularioDisciplina(disciplina) {
    document.getElementById('id_disciplina').value = disciplina.id;
    document.getElementById('nome_disc').value = disciplina.nome;
    document.getElementById('cursoDisciplina').value = disciplina.id_curso;
}