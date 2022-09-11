document.addEventListener('DOMContentLoaded', async() => {

    let response = await fetch('https://raw.githubusercontent.com/martinciscap/json-estados-municipios-mexico/master/estados-municipios.json')
    let selectEstado = document.getElementById("select_estado");

    if (response.ok) { // if HTTP-status is 200-299
        let json = await response.json();
        Object.entries(json).forEach(([key, value]) => {
            let option = document.createElement('option');
            option.innerText = key;
            option.setAttribute('value', key);
            selectEstado.appendChild(option);
        });

    } else {
        alert("HTTP-Error: " + response.status);
    }


})


document.getElementById('form').addEventListener('submit', (event) => {
    const validEmail = email => {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    const validPassword = password => {
        return /^[\s\S]{6,12}$/.test(password);
    }


    let dangerAlerts = Array.from(document.getElementById('form').querySelectorAll('.text-danger'));
    dangerAlerts.forEach(x => x.classList.add('d-none'));

    let isNameValid = document.getElementById('name').value.trim().length > 0;
    let isEmailValid = validEmail(document.getElementById('email').value);
    let isageValid = document.getElementById('age').value >= 18;
    let isPasswodvalid = validPassword(document.getElementById('password').value);
    let containEstadosNecesary = document.getElementById('list_estados').querySelectorAll('.form-items-submenu').length >= 2
    let notContainsNecesaryCities = Array.from(document.getElementById('list_estados').querySelectorAll('.form-items-submenu')).some(submenu => submenu.querySelectorAll('.form-control').length < 3);


    if (!isNameValid) {
        dangerAlerts[0].classList.remove('d-none');
    }

    if (!isEmailValid) {
        dangerAlerts[1].classList.remove('d-none');
    }

    if (!isPasswodvalid) {
        dangerAlerts[3].classList.remove('d-none');
    }

    if (!isageValid) {
        dangerAlerts[4].classList.remove('d-none');
    }

    if (!containEstadosNecesary) {
        dangerAlerts[5].classList.remove('d-none');
    }

    if (notContainsNecesaryCities) {
        dangerAlerts[6].classList.remove('d-none');
    }




    if (!isEmailValid || !isPasswodvalid || !containEstadosNecesary || notContainsNecesaryCities || !veryfyPasswoord() || !isageValid || !isNameValid) {
        event.preventDefault()
        event.stopPropagation()
    }

})

document.getElementById("add_estado").addEventListener('click', (event) => {

    event.preventDefault();

    let inputEstado = document.getElementById("select_estado");
    let listEstados = document.getElementById('list_estados');


    let templete = document.getElementById('templete').cloneNode(1);
    templete.setAttribute("id", '');
    templete.classList.remove("d-none");
    templete.querySelector("h3").innerText = inputEstado.options[inputEstado.selectedIndex].text;

    let selectCity = templete.querySelector('select');

    assignCity(selectCity, inputEstado.options[inputEstado.selectedIndex].text);



    listEstados.appendChild(templete);

})


function remove(input) {
    input.parentNode.parentElement.remove();
}

async function assignCity(selectCity, KeyEstado) {
    let response = await fetch('https://raw.githubusercontent.com/martinciscap/json-estados-municipios-mexico/master/estados-municipios.json')

    if (response.ok) { // if HTTP-status is 200-299
        let json = await response.json();

        json[KeyEstado].forEach(city => {
            let option = document.createElement('option');
            option.innerText = city;
            option.setAttribute('value', city);
            selectCity.appendChild(option);
        })

    } else {
        alert("HTTP-Error: " + response.status);
    }
}


function addCities(input) {
    window.event.preventDefault();

    let templete = input.parentNode.parentNode.parentNode;
    let inputCity = templete.querySelector('select');
    let cities = templete.querySelector('.d-flex');

    let div = document.createElement('div');
    div.classList.add('title-buttons', 'justify-content-center');

    let city = document.createElement('input');
    city.value = inputCity.options[inputCity.selectedIndex].text;
    city.setAttribute('name', 'city[]');
    city.classList.add('form-control', 'pt-1', 'pb-1', 'w-75');
    city.setAttribute('readonly', '');


    let deleteButton = document.createElement('button');
    deleteButton.setAttribute('onclick', "removeCity(this)");
    deleteButton.classList.add('btn-sm', 'btn-danger', 'ms-2');
    deleteButton.innerText = 'x';


    div.appendChild(city);
    div.appendChild(deleteButton);
    cities.appendChild(div);
}



function removeCity(input) {
    let container = input.parentNode;
    container.remove();
}


function veryfyPasswoord() {
    let password = document.getElementById("password").value;
    let repeat = document.getElementById("password-repeat").value;
    let submit = document.getElementById('submit');
    let errorMessage = document.getElementById('match');

    if (password != repeat) {
        submit.disabled = true;
        errorMessage.classList.remove('d-none');
    } else {
        submit.disabled = false;
        errorMessage.classList.add('d-none');
    }

    return password == repeat;
}
