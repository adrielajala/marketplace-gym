window.onload = () => {
    let buyBtns = document.querySelectorAll('.card-button');

    for (let i = 0; i < buyBtns.length; i++) {
        
    }
}

function login() {
    window.location.href = 'login.php';
}

function logout() {
    window.location.href = '../controller/logout.php';
}

function myAccount() {
    window.location.href = 'my-account.php';
}