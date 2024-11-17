//espera o documento ser carregado
document.addEventListener("DOMContentLoaded", function(event) {
    
    let btnHistorical = document.getElementById('btnHistorical');

    btnHistorical.addEventListener('click', function(event){
        event.preventDefault();

        fetch('/translator/text/historical', {
            method: 'GET',
            headers: {
                'accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {

            if(data.length == 0){
                document.querySelector('.offcanvas-body').innerHTML = `
                    <div class="row justify-content-md-center">
                        <div class="col-12">
                            <div class="alert alert-warning" role="alert">
                                <h4 class="alert-heading">Sem registros!</h4>
                                <p>Não há registros de traduções.</p>
                            </div>
                        </div>
                    </div>`;
            }
            else{
                let listItems = '';

                data.forEach(translation => {
                    
                    listItems += 
                        `<li class="list-group-item">
                            <div>
                                <span class="badge bg-primary">${translation.language_from}</span>
                                <i class="bi bi-arrow-right"></i>
                                <span class="badge bg-success">${translation.language_to}</span>
                                
                                <p class="mt-3"> <span class="fw-bold">Texto Original: </span> ${translation.text_input }</p>
                                
                                <p> <span class="fw-bold">Tradução: </span> ${translation.text_output}</p>

                                <p class="text-end fs-6"> <span class="fw-bold">Data: </span> ${new Date(translation.created_at).toLocaleString('pt-BR', { dateStyle: 'short', timeStyle: 'short' })}</p>
                            </div>
                        </li>`;
                });

                document.querySelector('.offcanvas-body').innerHTML = `
                    <div class="row justify-content-md-center">
                        <div class="col-12">
                            <ul class="list-group">
                                ${listItems}
                            </ul>
                        </div>
                    </div>`;
            }
                    
            const bsOffcanvas = new bootstrap.Offcanvas('#historical');
            bsOffcanvas.show();

        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
})
