function previewImgPria() {
    const foto = document.querySelector('#fto_pria');
    const fotoName = document.querySelector('#fto_pria').value;
    const imgPreview = document.querySelector('.foto_pria');

    fotoName.textContent = foto.files[0].name;

    const fileFoto = new FileReader();
    fileFoto.readAsDataURL(foto.files[0]);

    fileFoto.onload = function(e) {
        imgPreview.src = e.target.result;
    }
}

function previewImgWanita() {
    const foto = document.querySelector('#fto_wanita');
    const fotoName = document.querySelector('#fto_wanita').value;
    const imgPreview = document.querySelector('.foto_wanita');

    fotoName.textContent = foto.files[0].name;

    const fileFoto = new FileReader();
    fileFoto.readAsDataURL(foto.files[0]);

    fileFoto.onload = function(e) {
        imgPreview.src = e.target.result;
    }
}