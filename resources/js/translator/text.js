//espera o documento ser carregado
document.addEventListener("DOMContentLoaded", function(event) {
    
    let formTranslation = document.getElementById('formTranslation');

    formTranslation.addEventListener('submit', function(event){
        event.preventDefault();

        toogleSpinner(formTranslation);
    
        let url = "{{ env('AZURE_URL') }}";
        const clientSecret = "{{ env('AZURE_CLIENT_SECRET') }}";
        const region = "{{ env('AZURE_REGION') }}";
        let languageFrom = document.getElementById('languageFrom').value;
        let languageTo = document.getElementById('languageTo').value;
        let txtfrom = document.getElementById('txtfrom').value;
        let txtTo = document.getElementById('txtTo'); //elemento

        url += '/translate?api-version=3.0&from=' + languageFrom + '&to=' + languageTo;
       
        //cria um objeto data
        let data =
        [
            {"Text": txtfrom}
        ];

        //faz uma requisição fetch
        fetch(url, {
            method: 'POST',
            headers: {
                'accept': 'application/json',
                'Ocp-Apim-Subscription-Key': clientSecret,
                'Ocp-Apim-Subscription-Region': region,
                'Content-Type': 'application/json; charset=UTF-8'
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
