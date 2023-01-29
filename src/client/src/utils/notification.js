const elNotificationsContainer = document.querySelector('.notifications > div');
const elNotificationsText = document.querySelector('.notifications > div > div');

function sendNotification() {
    elNotificationsContainer.classList.add('show');
    setInterval(function(){
       elNotificationsContainer.classList.remove('show')
    }, 3000);
 }
 function showSuccessAlert(message= 'Se registró exitosamente!') {
    elNotificationsContainer.classList.remove('alert-danger');
    elNotificationsContainer.classList.add('alert-success');
    elNotificationsText.textContent = message;
 }
 function showErrorAlert(message= '') {
   elNotificationsContainer.classList.remove('alert-success');
   elNotificationsContainer.classList.add('alert-danger');
   elNotificationsText.textContent = 'Hubo un problema con la petición: ' + message;
 }

export {sendNotification, showSuccessAlert, showErrorAlert};
