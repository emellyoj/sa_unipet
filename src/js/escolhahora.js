function changeSelected(active) {
    Array.from(document.querySelectorAll('.escolhahora')).forEach(element => {
        if (element.classList.contains('btn-primary')) {
            
            element.classList.remove('btn-primary')
            element.classList.add('btn-outline-primary')
        }
    })

    active.classList.remove('btn-outline-primary')
    active.classList.add('btn-primary')
}


function criarBotoesHorarios() {
    dataInput = document.querySelector('#dataconsulta')
    medicoInput = document.querySelector('#medico')
    // Se os campos de data e medico nao estiverem nulos chama o arquivo que pega os horarios livres do medico
    if (dataInput.value != '' && medicoInput.value != '0') {
        window.location.href=`agendamento_consulta.php?medico=${medicoInput.value}&dataconsulta=${dataInput.value}`
    }
}