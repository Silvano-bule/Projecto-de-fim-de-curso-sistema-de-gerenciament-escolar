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

btnSubmit.addEventListener('click', () => {
    if (inputNome.value === '' || inputPasse.value === '') {
        alert('Digite os campos')
        return
    }
})