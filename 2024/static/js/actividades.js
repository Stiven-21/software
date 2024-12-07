function logout(){
    localStorage.removeItem('id');
    localStorage.removeItem('email');
    window.location.href = 'index.html';
}

function showTable(day) {
    document.getElementById('dayTitle').innerText = capitalizeFirstLetter(day);

    const days = ['lunesBtn', 'martesBtn', 'miercolesBtn', 'juevesBtn', 'viernesBtn'];
    days.forEach(dayBtn => document.getElementById(dayBtn).classList.remove('selected-day'));

    document.getElementById(`${day}Btn`).classList.add('selected-day');
}

function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

// Función para agregar una actividad
document.getElementById('saveActivity').addEventListener('click', function (e) {
    e.preventDefault();
    const modal = bootstrap.Modal.getInstance(document.getElementById('activityModal'));
    const title = document.getElementById('activityTitle').value;
    const date = document.getElementById('activityDate').value;
    const note = document.getElementById('activityNote').value;

    console.log(title, date, note);
    


    document.getElementById('activityForm').reset();
    modal.hide();
});

showTable('lunes');