// Definir o ano lectivo dinamicamente no rodapé
const yearText = document.querySelector('#year');

function getFullYear() {
    const currentYear = new Date().getFullYear();
    return `Ano lectivo ${currentYear - 1}/${currentYear}`;
}

yearText.textContent = getFullYear();

// Trazer o modal de formulario de adicionar novo aluno
const alunoBtn = document.querySelector('#aluno');

alunoBtn.addEventListener('click', () => {
    const modal = document.querySelector('#modalAluno');
    modal.classList.remove('hidden');
});