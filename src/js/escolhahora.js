function changeSelected(active, tipo) {
    
    Array.from(document.querySelectorAll('.escolhahora')).forEach(element => {
        if (element.classList.contains('btn-primary')) {
            
            element.classList.remove('btn-primary')
            element.classList.add('btn-outline-primary')
        }
    })

    active.classList.remove('btn-outline-primary')
    active.classList.add('btn-primary')

    document.querySelector(`#hora${tipo}`).value = active.innerText
}


function criarBotoesHorarios(tipo) {
    petInput = document.querySelector('#pet')
    medicoInput = document.querySelector('#medico')
    dataInput = document.querySelector(`#data${tipo}`)

    // Passa o id da vacina ja url
    appendString = ''
    if (tipo == 'vacina'){
        appendString = '&vacina=' + document.querySelector('#vacina').value
    }
    
    // Se os campos de data e medico nao estiverem nulos chama o arquivo que pega os horarios livres do medico
    if (dataInput.value != '' && medicoInput.value != '0') {
        window.location.href=`agendamento_${tipo}.php?pet=${petInput.value}&medico=${medicoInput.value}&data${tipo}=${dataInput.value}` + appendString
    }
}

function criarSelectHorarios(id_remarcar, tipo) {
    dataInput = document.querySelector('#data'+tipo)
    
    // Se o campo de data nao estiver nulo chama o arquivo que pega os horarios livres do medico
    if (dataInput.value != '') {
        window.location.href=`agenda_pet.php?remarcar_${tipo}=${id_remarcar}&nova_data=${dataInput.value}`
    }
}