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
 * PAGINATION PICK TEMPLATE UNDANGAN
 * ========================================
 */
$(function() {
    const undangan = $(".undangan");
    const cardsperPage = 4;

    if (undangan.length > cardsperPage) {
        const totalPages = Math.ceil(undangan.length / cardsperPage);
        let currentPage = 1;
        let pagination = '';

        for (let i = 1; i <= totalPages; i++) {
            pagination += `<li class="page-item"><a class="page-link" href="#">${i}</a></li>`;
        }

        // pagination += `</ul>
        //                 </nav>`;

        $(".pagination").append(pagination);

        $(".page-item").click(function() {
            $(".page-item").removeClass("active");
            $(this).addClass("active");
            currentPage = $(this).text();
            $(".undangan").hide();
            $(".undangan").slice((currentPage - 1) * cardsperPage, currentPage * cardsperPage).show();
        });
    }
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
