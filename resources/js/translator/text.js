//espera o documento ser carregado
document.addEventListener("DOMContentLoaded", function(event) {
    
    let formTranslation = document.getElementById('formTranslation');

    formTranslation.addEventListener('submit', function(event){
        event.preventDefault();

        toogleSpinner(formTranslation);
    
        let languageFrom = document.getElementById('languageFrom').value;
        let languageTo = document.getElementById('languageTo').value;
        let txtfrom = document.getElementById('txtfrom').value;
        let txtTo = document.getElementById('txtTo'); //elemento

        let data = {
            'text': txtfrom,
            'from': languageFrom,
            'to': languageTo
        }

        //faz uma requisição fetch
        fetch('/translator/text', {
            method: 'POST',
            headers: {
                'accept': 'application/json',
                'Content-Type': 'application/json; charset=UTF-8',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            txtTo.value = data[0].translations[0].text;
            toogleSpinner(formTranslation);
        })
        .catch(error => {
            toogleSpinner(formTranslation);
            console.error('Error:', error);
        });
    });
})

function toogleSpinner(button){
    let spinner = button.querySelector('.spinner-grow');
    let statusLoading = button.querySelector('[role="andamento"]');
    let statusReady = button.querySelector('[role="pronto"]');

    spinner.hidden = !spinner.hidden;
    statusLoading.hidden = !statusLoading.hidden;
    statusReady.hidden = !statusReady.hidden;
}
