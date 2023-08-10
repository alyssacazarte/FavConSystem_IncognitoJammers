document.addEventListener('DOMContentLoaded', function () {
    if (sessionStorage.getItem('successMessage')) {
        Swal.fire(sessionStorage.getItem('successMessage'));
        sessionStorage.removeItem('successMessage');
    }
});
