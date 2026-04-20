function removerClasse(idCurso) {
    fetch('index.php?page=classe&action=removerClasse&id=' + idCurso)
        .then(response => response.json())
        .then(response => {
            console.log(response)
            location.reload()
        })
}
function obterClasse(idClasse) {
    document.getElementById("id_classe").value = idClasse;
    fetch("index.php?page=classe&action=obterClassePorId&id=" + idClasse)
        .then(response => response.json())
        .then(classe => {
            console.log(classe)
            document.getElementById('modal_classe').showModal();
            preencherFormularioCurso(classe);
        })
}

function preencherFormularioCurso(classe) {
    document.getElementById('id_classe').value = classe.id;
    document.getElementById('name_classe').value = classe.nome;
}