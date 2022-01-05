$(function() {
    $('.quickForm').validate({
        rules: {
            nm_pria: {
                required: true,
                lettersonly: true,
                noSpace: false
            },
            nm_wanita: {
                required: true,
                lettersonly: true,
                noSpace: false
            },
            no_hp: {
                required: true,
                mobileIDN: true,
                minlength: 11,
                maxlength: 15
            },
            nama: {
                required: true,
                lettersonly: true,
                noSpace: false
            },
            jml_tamu: {
                required: true,
                number: true
            },
            kehadiran: {
                required: true
            },
            namaAdmin: {
                required: true,
                lettersonly: true,
            },
            username: {
                required: true,
                alphanumdash: true,
            },
            password: {
                required: true,
                minlength: 8,
            },
            password1: {
                minlength: 8,
            }
        },
        messages: {
            nm_pria: {
                required: "Nama pria wajib diisi",
                lettersonly: "Nama pria hanya boleh huruf"
            },
            nm_wanita: {
                required: "Nama wanita wajib diisi",
                lettersonly: "Nama wanita hanya boleh huruf"
            },
            no_hp: {
                required: "Nomor HP wajib diisi",
                mobileIDN: "Format nomor HP tidak valid (08xxxxxxxxxx / +628xxxxxxxxxx)",
                minlength: "Format nomor HP tidak valid (08xxxxxxxxxx / +628xxxxxxxxxx)",
                maxlength: "Format nomor HP tidak valid (08xxxxxxxxxx / +628xxxxxxxxxx)"
            },
            nama: {
                required: "Nama wajib diisi",
                lettersonly: "Nama hanya boleh huruf"
            },
            jml_tamu: {
                required: "Jumlah tamu wajib diisi",
                number: "Masukkan angka"
            },
            kehadiran: {
                required: "Keahdiran wajib diisi"
            },
            namaAdmin: {
                required: "Nama admin wajib diisi",
                lettersonly: "Nama admin hanya boleh huruf"
            },
            username: {
                required: "Username wajib diisi",
                alphanumdash: "Username hanya boleh huruf dan angka, tanpa spasi"
            },
            password: {
                required: "Password wajib diisi",
                minlength: "Password minimal 8 karakter"
            },
            password1: {
                minlength: "Password minimal 8 karakter"
            }
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
            $(element).addClass('is-valid');
        },
    });
});