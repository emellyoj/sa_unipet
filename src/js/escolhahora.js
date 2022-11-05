function changeSelected(active) {
    
    Array.from(document.querySelectorAll('.escolhahora')).forEach(element => {
        if (element.classList.contains('btn-primary')) {
            
            element.classList.remove('btn-primary')
            element.classList.add('btn-outline-primary')
        }
    })

    active.classList.remove('btn-outline-primary')
    active.classList.add('btn-primary')

    document.querySelector('#horaconsulta').value = active.innerText
}


function criarBotoesHorarios() {
    petInput = document.querySelector('#pet')
    medicoInput = document.querySelector('#medico')
    dataInput = document.querySelector('#dataconsulta')
    
    // Se os campos de data e medico nao estiverem nulos chama o arquivo que pega os horarios livres do medico
    if (dataInput.value != '' && medicoInput.value != '0') {
        window.location.href=`agendamento_consulta.php?pet=${petInput.value}&medico=${medicoInput.value}&dataconsulta=${dataInput.value}`
    }
}

function criarSelectHorarios(id_remarcar_consulta) {
    dataInput = document.querySelector('#dataconsulta')
    
    // Se o campo de data nao estiver nulo chama o arquivo que pega os horarios livres do medico
    if (dataInput.value != '') {
        window.location.href=`agenda_pet.php?remarcar_consulta=${id_remarcar_consulta}&nova_data=${dataInput.value}`
    }
}