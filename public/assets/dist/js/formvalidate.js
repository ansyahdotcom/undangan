$(function() {
    $('.quickForm').validate({
        rules: {
            fto_pria: {
                accept: "jpg,jpeg,gif,png",
                extension: "jpg|jpeg|gif|png",
                maxsize: 2097152
            },
            fto_wanita: {
                accept: "jpg,jpeg,gif,png",
                extension: "jpg|jpeg|gif|png",
                maxsize: 2097152
            },
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
            pgl_pria: {
                required: true,
                lettersonly: true
            },
            pgl_wanita: {
                required: true,
                lettersonly: true
            },
            ayh_pria: {
                required: true,
                lettersonly: true,
                noSpace: false
            },
            ibu_pria: {
                required: true,
                lettersonly: true,
                noSpace: false
            },
            ayh_wanita: {
                required: true,
                lettersonly: true,
                noSpace: false
            },
            ibu_wanita: {
                required: true,
                lettersonly: true,
                noSpace: false
            },
            tgl_akad: {
                // datetime: true
            },
            tgl_resepsi: {
                required: true,
                // datetime: true
            },
            mp_resepsi: {
                required: true
            },
            almt_resepsi: {
                required: true
            },
            no_hp: {
                required: true,
                mobileIDN: true,
                minlength: 11,
                maxlength: 15
            },
            custom_link: {
                alphadash: true
            }
        },
        messages: {
            fto_pria: {
                accept: "Format foto harus jpg, jpeg, gif, png",
                extension: "Format foto harus jpg, jpeg, gif, png",
                maxsize: "Ukuran foto maksimal 2MB"
            },
            fto_wanita: {
                accept: "Format foto harus jpg, jpeg, gif, png",
                extension: "Format foto harus jpg, jpeg, gif, png",
                maxsize: "Ukuran foto maksimal 2MB"
            },
            nm_pria: {
                required: "Nama pria wajib diisi",
                lettersonly: "Nama pria hanya boleh huruf"
            },
            nm_wanita: {
                required: "Nama wanita wajib diisi",
                lettersonly: "Nama wanita hanya boleh huruf"
            },
            pgl_pria: {
                required: "Nama panggilan pria wajib diisi",
                lettersonly: "Nama panggilan pria hanya boleh huruf"
            },
            pgl_wanita: {
                required: "Nama panggilan wanita wajib diisi",
                lettersonly: "Nama panggilan wanita hanya boleh huruf"
            },
            ayh_pria: {
                required: "Nama ayah pria wajib diisi",
                lettersonly: "Nama ayah pria hanya boleh huruf"
            },
            ibu_pria: {
                required: "Nama ibu pria wajib diisi",
                lettersonly: "Nama ibu pria hanya boleh huruf"
            },
            ayh_wanita: {
                required: "Nama ayah wanita wajib diisi",
                lettersonly: "Nama ayah wanita hanya boleh huruf"
            },
            ibu_wanita: {
                required: "Nama ibu wanita wajib diisi",
                lettersonly: "Nama ibu wanita hanya boleh huruf"
            },
            tgl_akad: {
                // datetime: "Format tanggal tidak valid (DD/MM/YYYY HH:mm)"
            },
            tgl_resepsi: {
                required: "Tanggal resepsi wajib diisi",
                // datetime: "Format tanggal tidak valid (DD/MM/YYYY HH:mm)"
            },
            mp_resepsi: {
                required: "Maps resepsi wajib diisi"
            },
            almt_resepsi: {
                required: "Alamat resepsi wajib diisi"
            },
            no_hp: {
                required: "Nomor HP wajib diisi",
                mobileIDN: "Format nomor HP tidak valid (08xxxxxxxxxx / +628xxxxxxxxxx)",
                minlength: "Format nomor HP tidak valid (08xxxxxxxxxx / +628xxxxxxxxxx)",
                maxlength: "Format nomor HP tidak valid (08xxxxxxxxxx / +628xxxxxxxxxx)"
            },
            custom_link: {
                alphadash: "Format custom url hanya boleh huruf dengan pemisah dash '-'"
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