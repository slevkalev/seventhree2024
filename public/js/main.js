document.addEventListener('DOMContentLoaded', function() {
    if (window.location.href.includes("golf")) {
        console.log(window.location.href.includes("golf"))
        const loginDiv = document.querySelector('.login-div')
        loginDiv.style.display="none"
    }
})


import data from './field.json' with {type: "json"};

console.log(data)

const jsonString = JSON.stringify(data, null, 2);

console.log(jsonString)
