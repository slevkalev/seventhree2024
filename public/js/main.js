document.addEventListener('DOMContentLoaded', function() {
    if (window.location.href.includes("golf")) {
        console.log(window.location.href.includes("golf"))
        const loginDiv = document.querySelector('.login-div')
        loginDiv.style.display="none"
    }
})
