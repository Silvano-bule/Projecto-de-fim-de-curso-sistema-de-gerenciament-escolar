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

saveBtn.addEventListener('click', async function () {
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

    const data = {
        username: usernameValue,
        email: addressValue,
        password: passwordValue
    };
    try {
        const resposta = await fetch('/TCC/SGE/app/controllers/AlunoDashboardController.php', {
            //Definir o método de envio
            method: 'POST',

            //Carinbar os dados dizendo que é um JSON
            headers: {
                'Content-Type': 'application/json'
            },

            //Converter os dados para JSON
            body: JSON.stringify(data)
        });

        if (!resposta.ok) {
            throw new Error('Erro na rede ou servidor');
        }

        const resultado = await resposta.json();
        console.log('O PHP respondeu:', resultado);
        alert('Dados enviados com sucesso');

    } catch (error) {
        console.error('Erro na requisição:', error);
        alert('Ocorreu um erro ao salvar os dados. Tente novamente mais tarde.');
    }
});
