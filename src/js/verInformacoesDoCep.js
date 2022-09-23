httpRequest = new XMLHttpRequest();

function handlerCep() {
    const stateSelect = document.querySelector('#estado');
    const citySelect = document.querySelector('#cidade');
    const bairroInput = document.querySelector('#bairro');
    const ruaInput = document.querySelector('#rua');

    if (httpRequest.readyState === XMLHttpRequest.DONE) {
        
        if (httpRequest.status === 200) {
            // Perfect!

            data = JSON.parse(httpRequest.responseText)

            stateSelect.value = data['uf']
            getCitiesByState(data['uf'])

            citySelect.selectedIndex = Array.from(document.querySelector('#cidade')).findIndex(e => e.innerHTML == data['localidade'])
            
            bairroInput.value = data['bairro']
            ruaInput.value = data['logradouro']
            



        } else {
            alert('Erro')
            // There was a problem with the request.
            // For example, the response may have a 404 (Not Found)
            // or 500 (Internal Server Error) response code.
        }
    } else {
        // Not ready yet.
    }
    
  }


function verInformacoesDoCep(cep) {
    httpRequest.onreadystatechange = handlerCep;

    httpRequest.open('GET', 'https://viacep.com.br/ws/' + cep + '/json/', false);
    httpRequest.send();


}

