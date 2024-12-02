

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

function showLoading()
{
    loading.style.display = 'block';
}
    // Función para ocultar la imagen de carga
function hideLoading() 
{
    loading.style.display = 'none';
}

function enviar_form(endpoint)
{

    let formData = new FormData(fcrud);

    showLoading();
    
    fetch(endpoint, {
        method: 'POST',
        body: formData // El objeto FormData contiene los datos del formulario
    }).then(response => {
        if (!response.ok) {
            throw new Error(`Error HTTP: ${response.status}`);
        }
        return response.json(); // Convertir respuesta a JSON
    }).then(data => {

        console.log(data);


    }).catch(error => {
        result.innerHTML = `<p style="color: red;">Error: ${error.message}</p>`;
    }).finally(() => {
        hideLoading(); // Ocultar loading
    });;



}