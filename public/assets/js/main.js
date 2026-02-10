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
const modal = document.querySelectorAll('.modal');
const btnClose = document.querySelectorAll('#btnClose');

/* saveBtn.addEventListener('click', function () {
    const usernameValue = username.value.trim();
    const addressValue = address.value.trim();
    const passwordValue = password.value.trim();

    let temCamposPreenchidos = false;
    if (usernameValue === '') {
        username.style.borderColor = 'red';
        temCamposPreenchidos = true;
    }
    if (addressValue === '') {
        address.style.borderColor = 'red';
        temCamposPreenchidos = true;
    }
    if (passwordValue === '') {
        password.style.borderColor = 'red';
        temCamposPreenchidos = true;
    }
    //Verifica se todos os campos estão preenchidos
    if (temCamposPreenchidos) {
        alert('Por favor, preencha todos os campos.');
        return;
    }
});
 */
btnClose.addEventListener('click', function(){
    modal.close();
});
