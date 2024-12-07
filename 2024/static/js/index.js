window.onload = function() {
    const id = localStorage.getItem('id');
    const email = localStorage.getItem('email');

    if(id && email) {
      window.location.href = 'actividades.html';
    }

    loadTipoDocumento();
    loadGenders();
  }

  async function loadTipoDocumento() {
    const select_documento = document.getElementById('type-doc-register');

    const response = await fetch("http://localhost/software/api/tipo_documento", {
      method: "GET",
      headers: {
        "Content-Type": "application/json"
      }
    });
    const data = await response.json();

    if(data.code != 200) {
      console.log(data.description);
      return;
    }

    const tipos = data.data;

    tipos.forEach(tipo => {
        const option = document.createElement('option');
        option.value = tipo.ID_TIPO_DOC;
        option.textContent = tipo.TIPO_DOC;
        select_documento.appendChild(option);
    });
  }

  async function loadGenders() {
    const select_genero = document.getElementById('gender-register');

    const response = await fetch("http://localhost/software/api/genero", {
      method: "GET",
      headers: {
        "Content-Type": "application/json"
      }
    });
    const data = await response.json();

    if(data.code != 200) {
      console.log(data.description);
      return;
    }

    const genders = data.data;

    genders.forEach(gender => {
        const option = document.createElement('option');
        option.value = gender.ID_GENERO;
        option.textContent = gender.GENERO;
        select_genero.appendChild(option);
    });
  }

  let last_section = 'login';
  function showSection(section) {
      if(last_section != section){
          ulErrores.innerHTML = "";
          alertContainer.classList.add("d-none");
          const spanElement = alertContainer.querySelector("span");
          if(spanElement) spanElement.remove();
      }
      last_section = section;
      const loginSection = document.getElementById('login-section');
      const registerSection = document.getElementById('register-section');
      const btnLogin = document.getElementById('btn-login');
      const btnRegister = document.getElementById('btn-register');

      if (section === 'login') {
          loginSection.style.display = 'block';
          registerSection.style.display = 'none';
          btnLogin.classList.add('active');
          btnRegister.classList.remove('active');
      } else {
          loginSection.style.display = 'none';
          registerSection.style.display = 'block';
          btnLogin.classList.remove('active');
          btnRegister.classList.add('active');
      }
  }