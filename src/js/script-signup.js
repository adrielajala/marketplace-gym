window.onload = () => {
    let cep = document.getElementById('cep');

    let address = document.getElementById('address');
    let city = document.getElementById('city');

    function mostrarInfo(info) {
        
        if (info.erro) {
            address.value = 'CEP Inválido.';
            city.value = '';
        } else {
            address.value = `${info.logradouro}`;
            city.value = info.localidade;
        }

    }

    cep.addEventListener('focusout', () => {
        const options = {
            method: 'GET',
            mode: 'cors',
            cache: 'default'
        }

        let cepFormatado = cep.value.replace('-', '');

        fetch(`https://viacep.com.br/ws/${cepFormatado}/json/`, options)
        .then(response => {
            response.json()
            .then(data => mostrarInfo(data));
        });
    })
}