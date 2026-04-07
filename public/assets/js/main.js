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

function obterAluno(idAluno) {
    document.getElementById("id").value = idAluno;
    fetch("index.php?page=aluno_dashboard&action=obterAlunoPorId&id=" + idAluno)
        .then(response => response.json())
        .then(aluno => {
            console.log("Resposta em JSON: ", aluno)
            document.getElementById('my_modal_1').showModal();
            preencherFormulario(aluno)
        })
}
const form = document.querySelectorAll('#formulario')
function preencherFormulario(aluno) {
    const user = {
        id: document.getElementById('idaluno'),
        nome: document.getElementById('username').value = aluno.nome,
        email: document.getElementById('email').value = aluno.email,
        telefone: document.getElementById('telefone').value = aluno.telefone,
        nascimento: document.getElementById('nasc').value = aluno.nascimento,
        sexo: document.getElementById('sexo').value = aluno.sexo,
        nacionalidade: document.getElementById('nacio').value = aluno.nacionalidade,
        nome_pai: document.getElementById('nome_pai').value = aluno.nome_pai,
        nome_mae: document.getElementById('nome_mae').value = aluno.nome_mae,
        numero_bi: document.getElementById('numero_BI').value = aluno.numero_bi,
        provincia: document.getElementById('provincia').value = aluno.provincia,
        altura: document.getElementById('altura').value = aluno.altura,
        classe: document.getElementById('Classe').value = aluno.id_classe,
        turma: document.getElementById('Turma').value = aluno.id_turma,
        curso: document.getElementById('Curso').value = aluno.id_curso,
        sala: document.getElementById('sala').value = aluno.sala
    }
}

function removerTurma(idTurma) {
    fetch("index.php?page=turma&action=removerTurma&id=" + idTurma)
        .then(response => response.json())
        .then(res => {
            console.log(res);
            location.reload();
        })
}

function obterTurma(idTurma) {
    document.getElementById("idTurma").value = idTurma;
    fetch("index.php?page=turma&action=obterTurmaPorId&id=" + idTurma)
        .then(response => response.json())
        .then(turma => {
            console.log(turma);
            document.getElementById('modal_turma').showModal();
            preencherFormularioTurma(turma);
        })
}
function preencherFormularioTurma(turma) {
    document.getElementById('idTurma').value = turma.idturma;
    document.getElementById('nome_turma').value = turma.nome;
    document.getElementById('periodo_turma').value = turma.periodo;
    document.getElementById('sala_turma').value = turma.sala;
    document.getElementById('capacidade_turma').value = turma.capacidade;
}
function obterCurso(idCurso) {
    document.getElementById("idCurso").value = idCurso;
    fetch("index.php?page=curso_dashboard&action=obterCursoId&id=" + idCurso)
        .then(response => response.json())
        .then(curso => {
            console.log(curso)
            document.getElementById('modal_curso').showModal();
            preencherFormularioCurso(curso);
        })
}

function preencherFormularioCurso(curso) {
    document.getElementById('idCurso').value = curso.idcurso;
    document.getElementById('nome_curso').value = curso.nome;
    document.getElementById('duracao_curso').value = curso.area;
    document.getElementById('ementa_curso').value = curso.estado;
}
const btnFechar = document.querySelectorAll('.btn-fechar');

btnFechar.forEach(btn => {
    btn.addEventListener('click', function () {
        const form = this.closest("form");
        if (form) {
            form.reset();
            const inputId = form.querySelector('input[name="idaluno"]');
            if (inputId) {
                inputId.value = "";
            }
        }
    })
})
