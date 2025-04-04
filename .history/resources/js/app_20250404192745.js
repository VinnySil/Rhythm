import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const rutaBase = "http://www.musicstudio.es/";



const deleteButtonsUsers = document.querySelectorAll('.delete-user-button');

for (const button of deleteButtonsUsers) {
    
    button.addEventListener('click', e => {
        e.preventDefault();

        let nick = button.getAttribute('data-id');

        fetch(rutaBase+'admin/users/'+nick, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
        })
        .then

    });
    
}

const profilePhoto = document.getElementById("profile_photo");
const file = document.getElementById("photo");


profilePhoto.addEventListener("click", () => {

    file.click();
    
});

file.addEventListener("change", e => {

    //Saco los datos del archivo subido
    let archivos = e.target.files[0];

    if(archivos !== undefined){ //Comrpuebo que no sea undefined

        //Creamos el objeto FileReader para leer la imagen
        const reader = new FileReader();
        reader.onload = e =>{profilePhoto.src=e.target.result;}

        reader.readAsDataURL(archivos);
    }
    else //Si pulsa el botón cancelar vuelvo a poner la imagen default
        profilePhoto.src=rutaBase+"/build/user.png"
});




