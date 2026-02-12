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
