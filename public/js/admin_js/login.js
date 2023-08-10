document.addEventListener('DOMContentLoaded', function () {
        const loginForm = document.getElementById('login-form');
    
        loginForm.addEventListener('submit', function (e) {
            e.preventDefault();
    
            const formData = new FormData(this);
    
            fetch('/login', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    Swal.fire('Successfully logged in', '', 'success').then(() => {
                        window.location.href = '/appointment-dashboard';
                    });
                } else {
                    Swal.fire('Invalid login credentials', '', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire('An error occurred', '', 'error');
            });
        });
    });