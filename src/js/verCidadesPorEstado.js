httpRequest = new XMLHttpRequest();

function handler() {
    const citySelect = document.querySelector('#cidade');
    if (httpRequest.readyState === XMLHttpRequest.DONE) {

        if (httpRequest.status === 200) {
            // Perfect!

            // Remover options 
            while (citySelect.options.length > 0) {
                citySelect.remove(0);
            }
            document.querySelector('#cep').value = '';
            document.querySelector('#bairro').value = '';
            document.querySelector('#rua').value = '';
            
            Array.from(JSON.parse(httpRequest.responseText)).forEach(element => {
                cidadeOption = document.createElement('option'); 
                cidadeNome = document.createTextNode(element['municipio-nome']); 

                cidadeOption.appendChild(cidadeNome); 
                cidadeOption.setAttribute('value',cidadeNome); 

                citySelect.appendChild(cidadeOption);

            })


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

function getCitiesByState(state) {
    httpRequest.onreadystatechange = handler;

    httpRequest.open('GET', 'https://servicodados.ibge.gov.br/api/v1/localidades/estados/' + state + '/municipios?view=nivelado', false);
    httpRequest.send();

}

