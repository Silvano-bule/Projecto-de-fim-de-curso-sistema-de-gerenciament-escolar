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

function editarAluno(idaluno) {
    fetch("public/index.php?page=aluno_dashboard&action=obterAluno&id=" + idaluno)
        .then(response => {
            // Validação 1: Verificar status HTTP
            if (!response.ok) {
                throw new Error(`Erro HTTP: ${response.status} ${response.statusText}`);
            }
            // Validação 2: Verificar Content-Type
            const contentType = response.headers.get("content-type");
            if (!contentType || !contentType.includes("application/json")) {
                throw new Error(`Content-Type inválido: ${contentType}. Esperado: application/json`);
            }
            return response.json();
        })
        .then(aluno => {
            document.getElementById('my_modal_1').showModal();

            // Pequeno delay para garantir que o modal esteja carregado
            setTimeout(() => {
                const elements = {
                    'idaluno': aluno.idaluno,
                    'username': aluno.nome,
                    'email': aluno.email,
                    'telefone': aluno.telefone,
                    'nasc': aluno.nascimento,
                    'sexo': aluno.sexo,
                    'nacio': aluno.nacionalidade,
                    'nome_pai': aluno.nome_pai,
                    'nome_mae': aluno.nome_mae,
                    'numero_BI': aluno.numero_bi,
                    'provincia': aluno.provincia,
                    'altura': aluno.altura,
                    'classe': aluno.id_classe,
                    'turma': aluno.id_turma,
                    'sala': aluno.sala,
                    'Curso': aluno.id_curso
                };

                console.log("editarAluno - payload:", aluno);

                for (const [id, value] of Object.entries(elements)) {
                    let element;
                    if (id === 'classe') {
                        element = document.querySelector('#my_modal_1 select[name="classe_aluno"]');
                    } else if (id === 'turma') {
                        element = document.querySelector('#my_modal_1 select[name="turma_aluno"]');
                    } else {
                        element = document.getElementById(id);
                    }

                    if (!element) {
                        console.warn(`Elemento com ID ou selector '${id}' não encontrado no DOM`);
                        continue;
                    }

                    const normalized = value === null || value === undefined ? '' : String(value).trim();

                    if (element.tagName === 'SELECT') {
                        const options = Array.from(element.options);
                        let option = options.find(o => String(o.value).trim() === normalized);

                        if (option) {
                            option.selected = true;
                            element.value = option.value;
                        } else if (normalized !== '') {
                            console.warn(`Option não encontrado para ${id}=${normalized}, criando opção temporária`);
                            const tempOpt = document.createElement('option');
                            tempOpt.value = normalized;
                            tempOpt.text = `Valor não listado (${normalized})`;
                            tempOpt.selected = true;
                            element.appendChild(tempOpt);
                            element.value = normalized;
                        } else {
                            element.value = '';
                        }

                        element.dispatchEvent(new Event('change', { bubbles: true }));
                    } else {
                        element.value = normalized;
                    }
                }
            }, 100);
        })
        .catch(error => {
            console.error("Erro ao editar aluno:", error);
            alert("Erro ao carregar dados do aluno: " + error.message);
        });
}

document.addEventListener('DOMContentLoaded', function () {

    document.getElementById('formulario').addEventListener('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);
        let id = formData.get("idaluno")
        let url;

        if (id) {
            url = "public/index.php?page=aluno_dashboard&action=atualizarAluno";
        } else {
            url = "public/index.php?page=aluno_dashboard&action=matricularAluno";
        }

        fetch(url, {
            method: "POST",
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: formData
        })
            .then(res => {
                // Validação 1: Verificar status HTTP
                if (!res.ok) {
                    throw new Error(`Erro HTTP: ${res.status} ${res.statusText}`);
                }
                // Validação 2: Verificar Content-Type
                const contentType = res.headers.get("content-type");
                if (!contentType || !contentType.includes("application/json")) {
                    throw new Error(`Content-Type inválido: ${contentType}. Esperado: application/json`);
                }
                return res.json();
            })
            .then(data => {
                if (data.status === "ok") {
                    const mensagem = id ? "Aluno atualizado com sucesso!" : "Aluno matriculado com sucesso!";
                    alert(mensagem);
                    location.reload();
                } else if (data.erro) {
                    alert("Erro: " + data.erro);
                }
            })
            .catch(error => {
                console.error("Erro ao processar aluno:", error);
                const operacao = id ? "atualizar" : "matricular";
                alert("Erro ao " + operacao + " aluno: " + error.message);
            });
    });

});

function editarProfessor(idprofessor) {
    fetch('public/index.php?page=professor_dashboard&action=editarProfessor&id=' + idprofessor)
        .then(response => {
            // Validação 1: Verificar status HTTP
            if (!response.ok) {
                throw new Error(`Erro HTTP: ${response.status} ${response.statusText}`);
            }
            // Validação 2: Verificar Content-Type
            const contentType = response.headers.get("content-type");
            if (!contentType || !contentType.includes("application/json")) {
                throw new Error(`Content-Type inválido: ${contentType}. Esperado: application/json`);
            }
            return response.json();
        })
        .then(professor => {
            document.getElementById('modal_professor').showModal();

            document.getElementById('nome_professor').value = professor.nome;
            document.getElementById('email_professor').value = professor.email;
            document.getElementById('telefone_professor').value = professor.telefone;
            document.getElementById('nascimento_professor').value = professor.nascimento;
            document.getElementById('sexo_professor').value = professor.sexo;
            document.getElementById('nacionalidade_professor').value = professor.nacionalidade;
            document.getElementById('provincia_professor').value = professor.provincia;
        })
        .catch(error => {
            console.error("Erro ao editar professor:", error);
            alert("Erro ao carregar dados do professor: " + error.message);
        });
}