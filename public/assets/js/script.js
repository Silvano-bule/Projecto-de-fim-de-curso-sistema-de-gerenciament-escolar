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
    const modal = alunoBtn.getAttribute('data-modal');
    const modalID = document.getElementById(modal);
    modalID.showModal();
});

// Fechar o modal de formulario de adicionar novo aluno 
const fecharModal = document.querySelector('#fecharModal');

fecharModal.addEventListener('click', () => {
    const modal = fecharModal.getAttribute('data-modal');
    const modalID = document.getElementById(modal);
    modalID.close();
});

const modal = document.getElementById("modalAluno");
const abrir = document.getElementById("aluno");
const fechar = document.getElementById("fecharModal");

abrir.addEventListener("click", () => {
    modal.classList.remove("hidden");
});

fechar.addEventListener("click", () => {
    modal.classList.add("hidden");
});

