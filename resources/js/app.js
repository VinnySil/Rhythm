import './bootstrap';
import '../css/app.css';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', function () {

    const rutaBase = "http://www.musicstudio.es/";

    const formsDelete = document.querySelectorAll('.delete-user-button');

    for (const form of formsDelete) {
        
        form.addEventListener('click', e => {
            e.preventDefault();

            console.log(form.action);
            
            const confirmar = confirm('¿Estás seguro de que quieres borrar?');

            if(!confirmar) return;

            fetch(form.action, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
            })
            .then(respose =>{
                if(!respose.ok)
                    throw new Error('Error en la solicitud DELETE');

                return respose.json();
            })
            .then(data =>{
                console.log('Elemento eliminado', data);
                location.reload();
            })
            .catch(error => {
                console.error('Hubo un problema con la solicitud DELETE:', error);
                location.reload();
            });

        });
        
    }

    const profilePhoto = document.getElementById("profile_photo");
    const file = document.getElementById("photo");


    if(profilePhoto){
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
    }

    //Funcionalidad del input file dinamico
    const inputFileSong = document.getElementById('music-artist-file');
    const bUploadSong = document.getElementById('button-upload-song');
    const fileArtistName = document.getElementById('file-name-artists');
    const fileNameContainer = document.getElementById('file-name-container');
    const bDeleteSongFile = document.getElementById('delete-file-artists');

    if(bUploadSong) bUploadSong.addEventListener('click', e => {inputFileSong.click();});

    if(inputFileSong){
        inputFileSong.addEventListener('change', e => {

            let songFile= e.target.files[0];
    
            if(songFile !== undefined){ //Comrpuebo que no sea undefined
                fileArtistName.innerText = songFile.name;
                fileNameContainer.style.display = 'flex';
    
                const reader = new FileReader();
                reader.onload = e =>{profilePhoto.src=e.target.result;}
    
                reader.readAsDataURL(archivos);
            }
        });
    }

    if(bDeleteSongFile){
        bDeleteSongFile.addEventListener('click', e =>{

            e.preventDefault();

            inputFileSong.value = '';
            fileNameContainer.style.display = 'none';
        });
    }




    //Funcionalidad del reproducto de música
    const bPlay = document.getElementById('bPlay');
    const sourceMusic = document.getElementById('source-music');
    const playImg = document.getElementById("imgPlay");
    const rangeTimeMusic = document.getElementById("rangeTime");
    rangeTimeMusic.value = 0;
    const currentTimeMusic = document.getElementById("currentTime");
    const durationTime = document.getElementById("durationTime");
    
    console.log(rangeTimeMusic);
    


    bPlay.addEventListener('click', playMusic)
    


    function playMusic(){

        if(sourceMusic.paused){
            sourceMusic.play()
            playImg.src=rutaBase+"storage/img/musics/svg/pause.svg"
        }
        else{
            sourceMusic.pause();
            playImg.src=rutaBase+"storage/img/musics/svg/play.svg"
        }
    }

    
    sourceMusic.addEventListener("timeupdate", () =>{

        let secTime = sourceMusic.currentTime.toFixed(2);
        currentTimeMusic.textContent = formatTime(secTime);
    
    });

    sourceMusic.addEventListener("loadedmetadata", () =>{

        let secTime = sourceMusic.duration.toFixed(2);
        durationTime.textContent = formatTime(secTime);
    });


    rangeTimeMusic.addEventListener("input", () =>{
        rangeTimeMusic.style.setProperty("--value", rangeTimeMusic.value+"%")
        
    })


    function formatTime(seconds) {
        const minutes = Math.floor(seconds / 60);
        const secs = Math.floor(seconds % 60);
        return `0${minutes}:${secs < 10 ? '0' : ''}${secs}`;
    }
    



});

