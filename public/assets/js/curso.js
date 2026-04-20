function removerCurso(idCurso) {
    fetch("index.php?page=Curso&action=removerCurso&id=" + idCurso)
        .then(response => response.json())
        .then(res => {
            console.log(res);
            location.reload();
        })
}

function obterCurso(idCurso) {
    document.getElementById("id_curso").value = idCurso;
    fetch("index.php?page=Curso&action=obterCursoPorId&id=" + idCurso)
        .then(response => response.json())
        .then(curso => {
            console.log(curso)
            document.getElementById('modal_curso').showModal();
            preencherFormularioCurso(curso);
        })
}

function preencherFormularioCurso(curso) {
    document.getElementById('id_curso').value = curso.id;
    document.getElementById('Name_curso').value = curso.nome;
    document.getElementById('Desc_curso').value = curso.descricao;
}