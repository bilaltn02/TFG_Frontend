(() => {
    'use strict';

    const forms = document.querySelectorAll('.needs-validation');

    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }

            form.classList.add('was-validated');
        }, false);
    });
})();

function togglePasswordVisibility() {
    var contrasenaInput = document.getElementById("contrasenaInput");
    if (contrasenaInput.type === "password") {
        contrasenaInput.type = "text";
    } else {
        contrasenaInput.type = "password";
    }
}







