function removerSala(idSala) {
    fetch("index.php?page=Sala&action=removerSala&id=" + idSala)
        .then(response => response.json())
        .then(res => {
            console.log(res);
            location.reload();
        })
}

function obterSala(idSala) {
    document.getElementById("id_sala").value = idSala;
    fetch("index.php?page=Sala&action=obterSalaPorId&id=" + idSala)
        .then(response => response.json())
        .then(sala => {
            console.log(sala)
            document.getElementById('modal_sala').showModal();
            preencherFormularioCurso(sala);
        })
}

function preencherFormularioCurso(sala) {
    document.getElementById('id_sala').value = sala.id;
    document.getElementById('nome_sala').value = sala.nome;
    document.getElementById('Capacidade').value = sala.capacidade;
}