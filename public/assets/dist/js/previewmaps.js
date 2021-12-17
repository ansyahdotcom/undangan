function previewMapsAkad() {
    var mpAkad = $('#mp_akad').val();
    if (mpAkad == '') {
        $('.contain-mp-old-akad').prop('hidden', false);
        $('.contain-mp-akad').prop('hidden', true);
    } else {
        $('.contain-mp-old-akad').prop('hidden', true);
        $('.contain-mp-akad').remove();
        $('.preview-mp-akad').append(`<div class="contain-mp-akad">${mpAkad}</div>`);
    }
}

function previewMapsResepsi() {
    var mpResepsi = $('#mp_resepsi').val();
    if (mpResepsi == '') {
        $('.contain-mp-old-resepsi').prop('hidden', false);
        $('.contain-mp-resepsi').prop('hidden', true);
    } else {
        $('.contain-mp-old-resepsi').prop('hidden', true);
        $('.contain-mp-resepsi').remove();
        $('.preview-mp-resepsi').append(`<div class="contain-mp-resepsi">${mpResepsi}</div>`);
    }
}