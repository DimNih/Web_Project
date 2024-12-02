function showRegister() {
    document.getElementById('login-form').classList.add('hidden');
    document.getElementById('register-form').classList.remove('hidden');
}

function showLogin() {
    document.getElementById('register-form').classList.add('hidden');
    document.getElementById('login-form').classList.remove('hidden');
}

function togglePassword() {
    var passwordField = document.getElementById('password');
    var toggleIcon = document.querySelector('.toggle-password');
    if (passwordField.type === "password") {
        passwordField.type = "text";
        toggleIcon.classList.add('fa-eye-slash');
        toggleIcon.classList.remove('fa-eye');
    } else {
        passwordField.type = "password";
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
    }
}

function toggleRegisterPassword() {
    var registerPasswordField = document.getElementById('register-password');
    var toggleIcon = document.querySelector('.toggle-password');
    if (registerPasswordField.type === "password") {
        registerPasswordField.type = "text";
        toggleIcon.classList.add('fa-eye-slash');
        toggleIcon.classList.remove('fa-eye');
    } else {
        registerPasswordField.type = "password";
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
    }
}

function sendDataToPHP(event, actionType) {
    event.preventDefault(); // Mencegah submit default

    // Ambil data dari form
    let email = document.querySelector(`#${actionType}-form input[name="email"]`).value;
    let password = document.querySelector(`#${actionType}-form input[name="sandi"]`).value;
    let alamat = actionType === 'register' ? document.querySelector(`input[name="alamat"]`).value : '';

    // Kirim data ke PHP melalui fetch
    fetch('../php/user/login.php', {
        method: 'POST',
        body: new URLSearchParams({
            'email': email,
            'sandi': password,
            'alamat': alamat,
            'actionType': actionType
        }),
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        }
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById('notification').innerHTML = `<p>${data}</p>`;
    })
    .catch(error => console.error('Error:', error));
}

function showLogin() {
    document.getElementById('register-form').classList.add('hidden');
    document.getElementById('login-form').classList.remove('hidden');
}

function showRegister() {
    document.getElementById('login-form').classList.add('hidden');
    document.getElementById('register-form').classList.remove('hidden');
}
