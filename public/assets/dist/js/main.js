/** == TEMPAT UNTUK NAMBAH JAVASCRIPT GLOBAL == */

/**
 * ========================================
 * MAIN JS
 * ========================================
 */
$(function() {
    //Initialize Select2 Bootstrap Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'DD-MM-YYYY'
    });

    $('.datepick').datetimepicker({
        format: {
            toValue: function(date, format, language) {
                var d = new Date(date);
                d.setDate(d.getDate() + 7);
                return new Date(d);
            }
        }

    });
});


/** 
 * ========================================
 * BS STEPPER FORM TRANSAKSI
 * ========================================
*/
document.addEventListener('DOMContentLoaded', function() {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
});


/**
 * ========================================
 * DATE TIME PICKER FORM TRANSAKSI
 * ========================================
 */
$('#akad').datetimepicker({
    icons: {
        time: 'far fa-clock'
    },
    format: 'MM/DD/YYYY HH:mm'
});
$('#resepsi').datetimepicker({
    icons: {
        time: 'far fa-clock'
    },
    format: 'MM/DD/YYYY HH:mm'
});


/**
 * ========================================
 * VALIDATE BS STEPPER FORM TRANSAKSI
 * ========================================
 */
function isChecked() {
    constNextBtn = `<button type="button" class="btn btn-primary next-btn" id="next-btn" onclick="stepper.next()">Selanjutnya <i class="fas fa-arrow-right"></i></button>`;
    $(".next-btn-copy").remove();
    $(".next-btn").remove();
    $(".data-part-actions").append(constNextBtn);
}


/**
 * ========================================
 * IF PICK TEMPLATE UNDANGAN
 * ========================================
 */
function clickCardUndangan() {
    $(".card-undangan").click(function() {
        $(".card-undangan").removeClass("card-undangan-active");
        $(this).addClass("card-undangan-active");
    });
}
$(document).ready(function() {
    $(".card-body-undangan").mouseenter(function() {
        $(".tm-name").prop("hidden", true);
        $(this).find(".tm-name").prop("hidden", false);
    });

    $(".card-body-undangan").mouseleave(function() {
        $(this).find(".tm-name").prop("hidden", true);
    });
});


/**
 * ========================================
 * OWL CARAOUSEL PREVIEW TEMPLATE UNDANGAN
 * ========================================
 */
$(document).ready(function() {
    $(".owl-carousel").owlCarousel({
        items: 1,
        lazyLoad: true,
        loop: true,
        autoplay: true,
        autoplayTimeout: 5000,
        margin: 10,
        nav: true
    });
});


/**
 * ========================================
 * RESPONSIVE DATA TABLES
 * ========================================
 */
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});
