function removerProfessor(idprofessor) {
    fetch("public/index.php?page=professor_dashboard&action=removerProfessor&id=" + idprofessor)
        .then(response => response.text())
        .then(msg => {
            alert("Professor removido");
            location.reload();
        });
}

function obterProfessor(idProfessor) {
    document.getElementById("idProfessor").value = idProfessor;
    fetch("index.php?page=professor_dashboard&action=obterProfessorId&id=" + idProfessor)
        .then(response => response.json())
        .then(professor => {
            console.log(professor);
            document.getElementById('modal_professor').showModal();
            preencherFormularioProfessor(professor);
        })
}
function preencherFormularioProfessor(professor) {
    document.getElementById('idProfessor')
    document.getElementById('nome_professor').value = professor.nome
    document.getElementById('email_professor').value = professor.email
    document.getElementById('telefone_professor').value = professor.telefone
    document.getElementById('nascimento_professor').value = professor.nascimento
    document.getElementById('sexo_professor').value = professor.sexo
    document.getElementById('nacionalidade_professor').value = professor.nacionalidade
    document.getElementById('provincia_professor').value = professor.provincia
}