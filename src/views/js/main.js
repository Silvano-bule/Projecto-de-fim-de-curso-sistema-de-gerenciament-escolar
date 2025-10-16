const btnAluno = document.querySelector('.btn_aluno')
const btnProfessor = document.querySelector('.btn_professor')
const btnAdmin = document.querySelector('.btn_admin')

btnAluno.addEventListener('click', () => {
    mostrarFormulario('form-aluno')
})
btnProfessor.addEventListener('click', () => {
    mostrarFormulario('form-professor')
})
btnAdmin.addEventListener('click', () => {
    mostrarFormulario('form-admin')
})

function mostrarFormulario(id) {

    const forms = document.querySelectorAll('form')
    forms.forEach(form => form.classList.add('hidden'))

    const formSelecionado = document.getElementById(id)
    formSelecionado.classList.remove('hidden')
    formSelecionado.classList.add('grid')
}

const btns = [btnAdmin, btnAluno, btnProfessor]

btns.forEach(btn => {
    btn.addEventListener('click', () => {
        btns.forEach(button => button.classList.remove('bg-blue-500', 'text-white'))
        btn.classList.add('bg-blue-500', 'text-white')
    })
})