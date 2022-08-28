window.onload = () => {
    let btn = document.getElementById('photos-btnx');
    let fileBtn = document.getElementById('photos-btn');

    btn.addEventListener('click', () => {
        fileBtn.click();
    });

}

function getFileData(object) {
    let fileBtn = document.getElementById('photos-btnx');
    let subBtn = document.getElementById('submit-sell');
    subBtn.style.backgroundColor = '#284839';
    subBtn.style.pointerEvents = 'auto';
    fileBtn.innerHTML = '<i class="fa-solid fa-cloud-arrow-up"></i>';

    if (object.files.length > 3) {
        fileBtn.innerHTML = '<i class="fa-solid fa-circle-xmark"></i> Você pode inserir até 3 imagens';
        subBtn.style.backgroundColor = 'red';
        subBtn.style.pointerEvents = 'none';
    } else {

        for (let i = 0; i < object.files.length; i++) {
            let file = object.files[i];
            let name = file.name;
        
            let splitName = name.split('.');
            let xtension = splitName[1];
            xtension = xtension.toLowerCase();
        
            let xtensionsArray = ['jpg', 'jpeg', 'png'];
        
            if (xtensionsArray.includes(xtension)) {
                for (let i = 0; i < xtensionsArray.length; i++) {
                    if (xtension === xtensionsArray[i]) {
                        fileBtn.innerHTML += ' Foto: ' + name + '; ';
                    }
                }
            } else {
                fileBtn.innerHTML = '<i class="fa-solid fa-circle-xmark"></i> Formato Não Suportado';
                subBtn.style.backgroundColor = 'red';
                subBtn.style.pointerEvents = 'none';
            }    
        }

    }

}