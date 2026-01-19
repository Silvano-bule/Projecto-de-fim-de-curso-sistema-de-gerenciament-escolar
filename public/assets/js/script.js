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

saveBtn.addEventListener('click', function () {
    const usernameValue = username.value.trim();
    const addressValue = address.value.trim();
    const passwordValue = password.value.trim();

    let camposPreenchidos = false;
    if(usernameValue === ''){
        username.style.borderColor = 'red';
        camposPreenchidos = true;
    }
    if(addressValue === ''){
        address.style.borderColor = 'red';
        camposPreenchidos = true;
    }
    if(passwordValue === ''){
        password.style.borderColor = 'red';
        camposPreenchidos = true;
    }
    //Verifica se todos os campos estão preenchidos
    if(camposPreenchidos){
        alert('Por favor, preencha todos os campos.');
        return;
    }
});