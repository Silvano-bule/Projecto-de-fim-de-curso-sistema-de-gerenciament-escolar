// Definir o ano lectivo dinamicamente no rodapé
const yearText = document.querySelector('#year');

function getFullYear() {
    const currentYear = new Date().getFullYear();
    return `Ano lectivo ${currentYear - 1}/${currentYear}`;
}

yearText.textContent = getFullYear();

// Guardar dados do utilizador
const username = document.getElementById('username');
const address = document.getElementById('emailAddress');
const password = document.getElementById('password');
const saveBtn = document.getElementById('saveBtn');
const btnClose = document.querySelectorAll('#btnClose');

btnClose.forEach(button => {
    button.addEventListener('click', function () {
        // Encontrar o modal pai do botão clicado e fechar apenas esse
        const modalParent = button.closest('.modal');

        // Verificar se o botão foi clicado
        if (modalParent) {
            modalParent.close();
        }
    });
});

const butoes = document.querySelectorAll('nav a');
const conteudos = document.querySelectorAll('.content >  section');

const btn = butoes.forEach(button => {
    button.addEventListener('click', (e) => {
        e.preventDefault();

        const alvo = button.dataset.alvo;
        trocarConteudo(alvo);
    })
})

function trocarConteudo(alvo) {
    conteudos.forEach(conteudo => {
        conteudo.classList.add('hidden');
    })

    document.getElementById(alvo).classList.remove('hidden');
}

const inputSearch = document.querySelectorAll('#inputPesquisa');
const linhas = document.querySelectorAll('#tabelaAlunos tbody tr');
const linhasProfessores = document.querySelectorAll('#itemProfessor');
function detetarCaracter() {
    inputSearch.forEach(input => {
        input.addEventListener('input', function () {
            const termo = this.value.toLowerCase();

            function filtrarLinhas(linhas) {
                linhas.forEach(linha => {
                    const conteudoLinha = linha.textContent.toLowerCase();

                    if (conteudoLinha.includes(termo)) {
                        linha.style.display = '';
                    } else {
                        linha.style.display = 'none';
                    }

                });
            }
            filtrarLinhas(linhas);

            function filtrarLinhasProfessores(linhasProfessores) {
                linhasProfessores.forEach(linha => {
                    const conteudolinha = linha.textContent.toLowerCase();

                    if (conteudolinha.includes(termo)) {
                        linha.style.display = '';
                    } else {
                        linha.style.display = 'none';
                    }
                })
            }
            filtrarLinhasProfessores(linhasProfessores);
        });
    });
}
detetarCaracter();

function removerAluno(idaluno) {
    fetch("index.php?page=aluno_dashboard&action=removerAluno&id=" + idaluno)
        .then(response => response.text())
        .then(msg => {
            alert("Aluno removido");
            location.reload();
        });

}