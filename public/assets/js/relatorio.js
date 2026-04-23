const button = document.querySelectorAll('div > button');
const content = document.querySelectorAll('.container > .content');

button.forEach(btn => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();

        const data = btn.dataset.button;
        trocar(data);
    })
});

function trocar(data) {
    content.forEach(conteudo => {
        conteudo.classList.add('hidden');
    });

    document.getElementById(data).classList.remove('hidden');
}