const ulErrores = document.getElementById("errores");
const alertContainer = document.getElementById("error-alert");

async function login(e) {
    ulErrores.innerHTML = "";
    alertContainer.classList.add("d-none");
    const spanElement = alertContainer.querySelector("span");
    if(spanElement) spanElement.remove();

    e.preventDefault();
    const username = document.getElementById('email-login').value;
    const password = document.getElementById('password-login').value;

    const response = await fetch('http://localhost/software/api/login',{
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            email: username,
            password: password
        })
    })

    const data  = await response.json();

    if (data.code != 200) {
        const errores = data.data;
        console.log(data.description);

        const span = document.createElement("span");
        span.textContent = data.description;
        alertContainer.insertBefore(span, ulErrores);

        if(errores){
            errores.forEach((error) => {
                const li = document.createElement("li");
                li.textContent = error;
                ulErrores.appendChild(li);
            });
        }  
        alertContainer.classList.remove("d-none");
        return;
    }

    const user = data.data;

    localStorage.setItem('id', user.ID_PERSONA);
    localStorage.setItem('email', user.CORREO);

    window.location.href = "actividades.html";
}

// function registro(email, password, nombre, generoId, tipoDocId, documento){
async function registro(e){
    e.preventDefault();
    ulErrores.innerHTML = "";
    alertContainer.classList.add("d-none");
    const spanElement = alertContainer.querySelector("span");
    if(spanElement) spanElement.remove();

    const rolId = 2;

    const email = document.getElementById('email-register').value;
    const password = document.getElementById('password-register').value;
    const name = document.getElementById('name-register').value;
    const gender = document.getElementById('gender-register').value;
    const docType = document.getElementById('type-doc-register').value;
    const doc = document.getElementById('doc-register').value;

    const response = await fetch('http://localhost/software/api/registro', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            email: email,
            password: password,
            rolId: rolId,
            nombre: name,
            generoId: gender,
            tipoDocumentoId: docType,
            documento: doc
        })
    });

    const data  = await response.json();

    if (data.code != 200) {
        const errores = data.data;
        console.log(data);

        const span = document.createElement("span");
        span.textContent = data.description;
        alertContainer.insertBefore(span, ulErrores);

        if(errores){
            errores.forEach((error) => {
                const li = document.createElement("li");
                li.textContent = error;
                ulErrores.appendChild(li);
            });
        }        
        alertContainer.classList.remove("d-none");
        return;
    }

    document.getElementById("register-section").reset();

    alert("Registro exitoso, por favor inicie sesión");
}