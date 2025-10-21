const btnAluno = document.querySelector('.btn_aluno')
const btnProfessor = document.querySelector('.btn_professor')
const btnAdmin = document.querySelector('.btn_admin')
const inputNome = document.querySelector('#input_name')
const inputPasse = document.querySelector('#input_password')
const btnSubmit = document.querySelector('#btn_submit')
const btns = [btnAdmin, btnAluno, btnProfessor]

btns.forEach(btn => {
    btn.addEventListener('click', () => {
        btns.forEach(button => button.classList.remove('bg-blue-500', 'text-white'))
        btn.classList.add('bg-blue-500', 'text-white')
    })
})
const inputs = [inputNome, inputPasse]
let verificacao = null

btnSubmit.addEventListener('click',() => {
    inputs.forEach(input => {
        if (input.value === '') {
            input.classList.remove('focus:ring-blue-400')
            input.classList.add('focus:ring-red-400')
        }
    });
})

function verificarValores() {
    inputs.forEach(input => {
        input.addEventListener('input', () => {
            input.classList.add('focus:ring-blue-400')
            input.classList.remove('focus:ring-red-400')
        })
    });

}

verificarValores()