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
    fetch("public/index.php?page=aluno_dashboard&action=removerAluno&id=" + idaluno)
        .then(response => response.text())
        .then(msg => {
            alert("Aluno removido");
            location.reload();
        });

}
function removerProfessor(idprofessor) {
    fetch("public/index.php?page=professor_dashboard&action=removerProfessor&id=" + idprofessor)
        .then(response => response.text())
        .then(msg => {
            alert("Professor removido");
            location.reload();
        });
}


function obterAluno(idAluno) {
    fetch("index.php?page=aluno_dashboard&action=obterAlunoPorId&id=" + idAluno)
        .then(response => response.json())
        .then(aluno => {
            console.log("Resposta em JSON: ", aluno)
            document.getElementById('my_modal_1').showModal();
            preencherFormulario(aluno)
        })
}

function preencherFormulario(aluno) {

    document.getElementById('username').value = aluno.nome
    document.getElementById('email').value = aluno.email
    document.getElementById('telefone').value = aluno.telefone
    document.getElementById('nasc').value = aluno.nascimento
    document.getElementById('sexo').value = aluno.sexo
    document.getElementById('nacio').value = aluno.nacionalidade
    document.getElementById('nome_pai').value = aluno.nome_pai
    document.getElementById('nome_mae').value = aluno.nome_mae
    document.getElementById('numero_BI').value = aluno.numero_bi
    document.getElementById('provincia').value = aluno.provincia
    document.getElementById('altura').value = aluno.altura
    document.getElementById('Classe').value = aluno.id_classe
    document.getElementById('Turma').value = aluno.id_turma
    document.getElementById('Curso').value = aluno.id_curso
    document.getElementById('sala').value = aluno.sala
}