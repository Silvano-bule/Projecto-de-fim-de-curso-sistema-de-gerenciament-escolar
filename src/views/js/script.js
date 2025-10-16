const btnaluno = document.querySelector('#btn_aluno')
const btnProfessor = document.querySelector('#btn_professor')
const btnAdmin = document.querySelector('#btn_admin')


const btns = [btnaluno, btnProfessor, btnAdmin]
btns.map(btn => {
    mostrarFormulario(btn)
})
function mostrarFormulario(id) {
    btns.forEach(element => {
        element.style.display = 'none'
    });

    document.getElementById(id).style.display = 'flex'
}

mostrarFormulario()