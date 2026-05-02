const turmasElement = document.querySelectorAll('.turma-item')
const corpoDaTabela = document.getElementById('corpo');

turmasElement.forEach(turma => {
    turma.addEventListener('click', (e) => {
        e.preventDefault();

        fetch('index.php?page=turma&pegarAluno&id=' + id)
    })
});

function pegarTurma(id) {
    if (!id) {
        console.log("Id não encontrado");
        return;
    }

    fetch('index.php?page=turma&action=pegarAluno&id=' + id)
        .then(response => response.json())
        .then(res => {
            if (res.length === 0) {
                corpoDaTabela.innerHTML = '<tr><td colspan="3">Nenhum Aluno Encontrado</td></tr>';
                return;
            }
            console.log(res)



            corpoDaTabela.innerText = '';
            res.forEach(aluno => {

                let novaLinha = `
                        <tr>
                            <td>${aluno.numero_matricula}</td>
                            <td>${aluno.nome_aluno}</td>
                            <td>${aluno.nome_turma}</td>
                        </tr>`

                /*  corpoDaTabela.appendChild(novaLinha); */
                corpoDaTabela.insertAdjacentHTML('beforeend', novaLinha);
            })

        })
        .catch(error => console.error('Erro na requisição', error));

}

const inputPesquisa = document.getElementById('inputPesquisa');

function detetarCarateres() {
    inputPesquisa.addEventListener('input', () => {
        const termo = inputPesquisa.value.toLowerCase();

        // Selecionamos as linhas DENTRO do evento, 
        // pois elas são criadas dinamicamente pelo fetch
        const linhas = document.querySelectorAll('#corpo tr');

        linhas.forEach(linha => {
            // Pegamos o texto de toda a linha (nome, matricula, etc)
            const conteudoLinha = linha.textContent.toLowerCase();

            // Se o termo estiver em qualquer parte da linha, ela aparece
            if (conteudoLinha.includes(termo)) {
                linha.style.display = '';
            } else {
                linha.style.display = 'none';
            }
        });
    });
}

detetarCarateres();