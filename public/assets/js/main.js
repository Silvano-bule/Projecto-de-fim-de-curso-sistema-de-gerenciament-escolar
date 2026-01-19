// Definir o ano lectivo dinamicamente no rodapé
const yearText = document.querySelector('#year');

function getFullYear() {
    const currentYear = new Date().getFullYear();
    return `Ano lectivo ${currentYear - 1}/${currentYear}`;
}

yearText.textContent = getFullYear();

// Adicionar funcionalidade de submissão ao formulário de inserção de aluno
const username = document.getElementById('username');
const address = document.getElementById('emailAddress');
const password = document.getElementById('password');
const saveBtn = document.getElementById('saveBtn');

const formulario = document.getElementById('formulario');

formulario.addEventListener('submit', function (event) {
    event.preventDefault();

    const form = new FormData(formulario);
    console.log([...form]);
   /*  const usernameValue = username.value.trim();
    const addressValue = address.value.trim();
    const passwordValue = password.value.trim();

    if (usernameValue === '' || addressValue === '' || passwordValue === '') {
        alert('Por favor, preencha todos os campos obrigatórios.');
        return;
    } */
})