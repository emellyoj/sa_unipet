httpRequest = new XMLHttpRequest();

function handlerCep() {
    const stateSelect = document.querySelector('#estado');
    const citySelect = document.querySelector('#cidade');
    const bairroInput = document.querySelector('#bairro');
    const ruaInput = document.querySelector('#rua');
    const cepInput = document.querySelector('#cep');

    if (httpRequest.readyState === XMLHttpRequest.DONE) {
        
        if (httpRequest.status === 200) {

            data = JSON.parse(httpRequest.responseText)

            if (data['erro'] == true) {
                alert('Digite um CEP Válido')
                cepInput.value = ''

            } else {
                stateSelect.value = data['uf']
                getCitiesByState(data['uf'])
    
                citySelect.selectedIndex = Array.from(document.querySelector('#cidade')).findIndex(e => e.innerHTML == data['localidade'])
                
                bairroInput.value = data['bairro']
                ruaInput.value = data['logradouro']
                cepInput.value = data['cep']
            }
        } else {
            alert('Erro')
            // There was a problem with the request.
        }
    } else {
        // Not ready yet.
    }
    
  }


function verInformacoesDoCep(cep) {

    if(cep.replace(/[^0-9]/g, '').length == 8) {
        httpRequest.onreadystatechange = handlerCep;

        httpRequest.open('GET', 'https://viacep.com.br/ws/' + cep + '/json/', false);
        httpRequest.send();
    }

   


}

