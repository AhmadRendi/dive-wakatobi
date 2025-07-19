const baseUrl = 'http://localhost/dive-trip/public/';

$(function () {

    // lihat detail pemesanan oleh admin
    $('.lihatDetailPemesanan').on('click', function () {
        console.log("sampai kesini");
        const id = $(this).data('id');
        $.ajax({
            url: baseUrl + 'Pemesanan/detail',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                console.log("Data yang diterima:", data);
                $('#detailNamaWisatawan').val(data.namaLengkap);
                $('#tanggalPemesanan').val(data.tanggalPemesanan);
                $('#namaPaket').val(data.namaPaket);
                $('#status').val(data.status);
                $('#jumlahPeserta').val(data.jmlPeserta);
                $('#harga').val(formatRupiah(data.harga)).change();
                $('#namaGuide').val(data.namaGuide);
                $('#detailNoHp').val(data.noHp);

                $('#lihatDetail').modal('show');
            }
        });
    });

    // Login User
    $('#login_form').on('submit', function (e) {
        e.preventDefault();
        let data = $(this).serialize();

        var params = new URLSearchParams(data);

        var username = params.get('username');
        var password = params.get('password');

        var dataToSend = {
            username: username,
            password: password
        };

        $.ajax({
            url: baseUrl + 'Login/session',
            data: { data: dataToSend },
            method: 'post',
            dataType: 'json',
            success: function (data, textStatus, jqXHR) {
                if (data.status === 'success') {
                    if (data.role === 'ADMIN') {
                        window.location.href = baseUrl + 'Dashboard';
                    } else if (data.role === 'USER') {
                        window.location.href = baseUrl + 'Home';
                    }
                } else {
                    $('#errorLogin .modal-body').text(data.message);
                    $('#errorLogin').modal('show');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $('#errorLogin .modal-body').text('Terjadi kesalahan: ' + errorThrown);
                $('#errorLogin').modal('show');
            }
        });
    });

    // Lihat Detail Paket Penyelaman oleh user
    $('.lihatDetaiPaketPenyelaman').on('click', function () {
        const id = $(this).data('id');
        $.ajax({
            url: baseUrl + 'Penyelam/detailPaket',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id').val(data.id);
                $('#namaPaket').val(data.namaPaket);
                $('#deskripsi').val(data.deskripsi);
                $('#harga').val(formatRupiah(data.harga)).change();

                $('#lihatDetailPenyelaman').modal('show');
            }
        });
    });

    // Pesan Selanjutnya
    $('#detailPaketPenyelaman').on('click', function (event) {
        event.preventDefault();
        const idSelected = document.getElementById('tourGuide').value;
        const idPaket = document.getElementById('id').value;
        const harga = document.getElementById('harga').value;

        const today = new Date();
        const day = String(today.getDate()).padStart(2, '0');
        const month = String(today.getMonth() + 1).padStart(2, '0');
        const year = today.getFullYear();

        const formattedDate = `${year}-${month}-${day}`;
        document.getElementById('tanggalPemesanan').value = formattedDate;

        if (idSelected === "") {
            $('#id').val(idPaket);
            $('#harga').val(harga);
            document.getElementById('guideName').textContent = "Select Tour Guide"; // Reset nama guide
            document.getElementById('guideRating').textContent = "Select Tour Guide"; // Reset rating
            document.getElementById('guideKeahlian').textContent = "Select Tour Guide"; // Reset keahlian
            document.getElementById('guideBio').textContent = "Select Tour Guide"; // Reset bio
            document.getElementById('guideImage').src = "";
            $('#guideModal').modal('show');
            return;
        }
    });

    let isModalClosedByJavaScript = false;

    // melakukan pemesanan
    $("#pesanPaketPenyelam").on('submit', function (e) {
        e.preventDefault();
        let data = $(this).serialize();
        $.ajax({
            url: baseUrl + 'Penyelam/savePemesanan',
            data: data,
            method: 'post',
            dataType: 'json',
            success: function (data, textStatus, jqXHR) {
                if (data.status === 'success') {
                    $('#success .modal-body').text(data.message);
                    isModalClosedByJavaScript = true;
                    $('#pesanPaketPenyelaman').modal('hide');
                    $('#success').modal('show');
                } else {
                    $('#error .modal-body').text(data.message);
                    $('#error').modal('show');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $('#error .modal-body').text('Terjadi kesalahan: ' + errorThrown);
                $('#error').modal('show');
            }
        });
    });

    $('#pesanPaketPenyelaman').on('hidden.bs.modal', function () {
        if (!isModalClosedByJavaScript) {
            location.reload(); // Reload halaman ketika modal ditutup secara manual
        }
        // Reset flag setelah modal ditutup
        isModalClosedByJavaScript = false;
    });

    $('#guideModal').on('hidden.bs.modal', function () {
        document.getElementById('tourGuide').value = ""; // Reset tour guide
        document.getElementById('keahlian').value = ""; // Reset keahlian
        document.getElementById('guideName').textContent = "Select Tour Guide"; // Reset nama guide
        document.getElementById('guideRating').textContent = "Select Tour Guide"; // Reset rating
        document.getElementById('guideKeahlian').textContent = "Select Tour Guide"; // Reset keahlian
        document.getElementById('guideBio').textContent = "Select Tour Guide"; // Reset bio
    });


    // register user 
    $('#registerForm').on('submit', function (e) {
        e.preventDefault();
        let data = $(this).serialize();
        $.ajax({
            url: baseUrl + 'Register/save',
            data: data,
            method: 'post',
            dataType: 'json',
            success: function (data, textStatus, jqXHR) {
                if (data.status === 'success') {
                    $('#successRegister .modal-body').text(data.message);
                    $('#successRegister').modal('show');
                } else {
                    $('#errorRegistration .modal-body').text(data.message);
                    $('#errorRegistration').modal('show');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $('#errorRegister .modal-body').text('Terjadi kesalahan: ' + errorThrown);
                $('#errorRegister').modal('show');
            }
        });
    });

    // Reload halaman setelah modal ditutup
    $('#successRegister').on('hidden.bs.modal', function () {
        location.reload();
    });

    // Melakukan penambahakan data paket penyelaman
    $('#savePaketNyelamForm').on('submit', function (e) {
        e.preventDefault();
        let data = new FormData(this);
        $.ajax({
            url: baseUrl + 'Paket/savePaketNyelam',
            data: data,
            method: 'post',
            processData: false, // Penting untuk FormData
            contentType: false,
            dataType: 'json',
            success: function (data, textStatus, jqXHR) {
                if (data.status === 'success') {
                    // console.log("masuk Kedalam success");
                    $('#success .modal-body').text(data.message);
                    $('#success').modal('show');
                } else {
                    // console.log("masuk Kedalam error");
                    $('#error .modal-body').text(data.message);
                    $('#error').modal('show');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $('#error .modal-body').text('Terjadi kesalahan: ' + errorThrown);
                $('#error').modal('show');
            }
        });
    });


    // Melakukan penambahakan data paket kursus
    $('#savePaketKursusForm').on('submit', function (e) {
        e.preventDefault();
        let data = new FormData(this);
        $.ajax({
            url: baseUrl + 'Paket/savePaketKursus',
            data: data,
            method: 'post',
            processData: false, // Penting untuk FormData
            contentType: false,
            dataType: 'json',
            success: function (data, textStatus, jqXHR) {
                if (data.status === 'success') {
                    // console.log("masuk Kedalam success");
                    $('#success .modal-body').text(data.message);
                    $('#success').modal('show');
                } else {
                    // console.log("masuk Kedalam error");
                    $('#error .modal-body').text(data.message);
                    $('#error').modal('show');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $('#error .modal-body').text('Terjadi kesalahan: ' + errorThrown);
                $('#error').modal('show');
            }
        });
    });

    // Reload halaman setelah modal ditutup
    $('#success').on('hidden.bs.modal', function () {
        location.reload();
    });

    // Memunculkan modal edit paket penyelaman
    $('.editPaket').on('click', function () {
        const id = $(this).data('id');
        $.ajax({
            url: baseUrl + 'Paket/getPaketById',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#editId').val(data.data.id);
                $('#editNamaPaket').val(data.data.namaPaket);
                $('#editDeskripsi').val(data.data.deskripsi);
                $('#editHarga').val(data.data.harga);
                $('#editWaktu').val(data.data.waktu);
                $('#editLokasi').val(data.data.lokasi);
                $('#editPaketMenyelam').modal('show');
            }
        });
    });

    // Melakukan Update pesan dari unread menjadi read
    $('.updatePesan').on('click', function () {
        const id = $(this).data('id');

        $.ajax({
            url: baseUrl + 'Message/updateStatus',
            data: { id: id },
            method: 'post',
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('Response Text:', jqXHR.responseText);
                $('#error .modal-body').text('Terjadi kesalahan: ' + errorThrown);
                $('#error').modal('show');
            }
        });

    });

    $('.reloadUpdateMessage').on('hidden.bs.modal', function () {
        console.log("Modal message ditutup");
        location.reload();
    });

    // Delete Pesaanan
    $('.deletePemesanan').on('click', function () {
        console.log("sampai");
        const id = $(this).data('id');
        $.ajax({
            url: baseUrl + 'Pemesanan/delete',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                if (data.status === 'success') {
                    $('#success .modal-body').text(data.message);
                    $('#success').modal('show');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('Response Text:', jqXHR.responseText);
                $('#error .modal-body').text('Terjadi kesalahan: ' + errorThrown);
                $('#error').modal('show');
            }
        });
    });

    // Configurasi DataTable
    new DataTable('#data_table', {
        paging: true,
        scrollCollapse: true,
        scrollY: '370px'
    });

    // $('#table_datatables').DataTable({
    //     dom: 'Bfrtip',
    //     buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
    //     paging: true,
    //     scrollCollapse: true,
    //     scrollY: '370px'
    // });

    // Batas Terbaru
});

function formatRupiah(angka) {
    const formatter = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0 // Anda bisa mengubah ini jika ingin menampilkan desimal
    });
    return formatter.format(angka);
}


function rubahBank() {
    const bank = document.getElementById('bank').value;
    if( bank === 'BRI') {
        document.getElementById('rek').value = '1234567890';
    }
    else if (bank === 'MANDIRI') {
        document.getElementById('rek').value = '0987654321';
    }
    else {
        document.getElementById('rek').value = '';
    }
}

$(document).ready(function () {
    const table = $('#table_datatables').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel',
            {
                extend: 'pdfHtml5',
                footer: false, // Penting: aktifkan footer
                customize: function (doc) {
                    // Ambil total dari footer tabel
                    const totalText = document.querySelector('#table_datatables tfoot th:last-child').innerText;

                    // Tambahkan total sebagai teks di bawah tabel di PDF
                    doc.content.push({
                        text: 'TOTAL SEMUA: ' + totalText,
                        margin: [0, 20, 0, 0], // [left, top, right, bottom]
                        alignment: 'right',
                        bold: true
                    });
                }
            },
            'print'
        ],
        paging: true,
        scrollCollapse: true,
        scrollY: '370px',
        footerCallback: function (row, data, start, end, display) {
            let api = this.api();

            const parseHarga = function (value) {
                if (typeof value === 'string') {
                    let cleanText = value.replace(/<\/?[^>]+(>|$)/g, '');
                    cleanText = cleanText.replace(/[^0-9]/g, '');
                    return parseFloat(cleanText) || 0;
                }
                return typeof value === 'number' ? value : 0;
            };

            let total = api.column(5, { search: 'applied' }).data()
                .reduce((a, b) => parseHarga(a) + parseHarga(b), 0);

            $(api.column(5).footer()).html('Rp ' + total.toLocaleString('id-ID'));
        }
    });


    // Fungsi untuk memfilter data berdasarkan tanggal
    $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
        const startAt = $('#startAt').val();
        const endAt = $('#endAt').val();
        const dateField = data[3]; // Mengambil kolom tanggal pemesanan

        // Mengubah format tanggal ke objek Date
        const date = new Date(dateField);

        // Mengubah input tanggal ke objek Date
        const startDate = startAt ? new Date(startAt) : null;
        const endDate = endAt ? new Date(endAt) : null;

        // Memeriksa apakah tanggal dalam rentang yang ditentukan
        if (
            (startDate === null && endDate === null) ||
            (startDate === null && date <= endDate) ||
            (endDate === null && date >= startDate) ||
            (date >= startDate && date <= endDate)
        ) {
            return true;
        }
        return false;
    });

    // Memanggil fungsi filter saat tanggal diubah
    $('#startAt, #endAt').change(function () {
        table.draw();
    });
});

document.addEventListener('DOMContentLoaded', function () {
    // Initialize the carousel
    var testimonialCarousel = new bootstrap.Carousel(document.getElementById('testimonialCarousel'), {
        interval: 5000, // Change slides every 5 seconds
        wrap: true      // Continuous loop
    });
});

function generateStarRating(rating) {
    let stars = '';
    console.log("masuk kedalam generateStarRating");
    for (let i = 1; i <= 5; i++) {
        if (i <= rating) {
            stars += '<i class="fas fa-star text-warning"></i>';
        } else {
            stars += '<i class="far fa-star text-warning"></i>';
        }
    }
    return stars;
}

// Batas 
// Fungsi untuk menangani active state
document.addEventListener('DOMContentLoaded', function () {

    // Fungsi untuk set active berdasarkan URL saat ini
    function setActiveNavItem() {
        const currentPath = window.location.pathname;
        const navLinks = document.querySelectorAll('.nav-link');

        // Remove active class from all links
        navLinks.forEach(link => {
            link.classList.remove('active', 'pulse', 'glow');
        });

        // Add active class to current page link
        navLinks.forEach(link => {
            const href = link.getAttribute('href');
            if (href && (currentPath.includes(href.split('/').pop()) ||
                (href.includes('/Home') && (currentPath === '/' || currentPath.includes('index'))))) {
                link.classList.add('active', 'glow'); // Tambah class glow untuk efek

                // Tambah efek pulse setelah delay
                setTimeout(() => {
                    link.classList.add('pulse');
                }, 500);
            }
        });
    }

    // Set active saat halaman dimuat
    setActiveNavItem();

    // Handle click events
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function (e) {
            // Jangan prevent default untuk navigasi normal

            // Remove active from all
            document.querySelectorAll('.nav-link').forEach(l => {
                l.classList.remove('active', 'pulse', 'glow');
            });

            // Add active to clicked item
            this.classList.add('active', 'glow');

            // Add pulse effect after short delay
            setTimeout(() => {
                this.classList.add('pulse');
            }, 100);
        });
    });

    // Handle mobile menu close
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarCollapse = document.querySelector('.navbar-collapse');

    if (navbarToggler && navbarCollapse) {
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function () {
                // Close mobile menu when link is clicked
                if (window.innerWidth < 992) {
                    navbarCollapse.classList.remove('show');
                    navbarToggler.setAttribute('aria-expanded', 'false');
                }
            });
        });
    }
});

// Efek scroll untuk navbar
window.addEventListener('scroll', function () {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});