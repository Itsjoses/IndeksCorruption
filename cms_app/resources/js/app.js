require('./bootstrap');
import Swal from 'sweetalert2';
window.Swal = Swal;

const Toast = Swal.mixin({
  toast: true,
  position: 'top',
  showConfirmButton: false,
  timer: 1500,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});

window.Toast = Toast;

window.getCsrfToken = function(){
    return document.getElementsByName("_token")[0].value;
};

window.popUpFetch = function(targetUrl, chosenMethod, inputData){
    const fetchHeaders = {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': getCsrfToken()
    };

    fetch(targetUrl, {
        method: chosenMethod,
        headers: fetchHeaders,
        body: JSON.stringify({input_data: inputData})
    })
    .then(response => {
        if(response.ok) return response.json();
    })
    .then(data => {
        if(data)location.reload();
    })
    .catch(error => { 
        console.log(error)
    });
};

window.popupDeleteConfirmation = {
    title: 'Are you sure?',
    text: 'You won\'t be able to revert this!',
    icon: 'warning',
    iconColor: '#4EB3D3',
    showCancelButton: true,
    confirmButtonColor: '#CF3548',
    cancelButtonColor: '#CCCCCC',
    confirmButtonText: 'Delete'
}

window.confirmDelete = form => {
    form.addEventListener('submit', event => {
        event.preventDefault();
        Swal.fire(popupDeleteConfirmation).then(result => {
            if (result.isConfirmed) form.submit()
        });
    });
}

window.popupAction = (popup, targetUrl, chosenMethod) => {
    Swal.fire(popup).then(result => {
        if(!result.isConfirmed)
            return;
        let inputData = result.value;
        popUpFetch(targetUrl, chosenMethod, inputData);
    });
}