$( function () {

    // lihat detail pemesanan oleh admin
    $('.lihatDetailPemesanan').on('click', function () {
        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/dive-trip/public/Pemesanan/detail',
            data: {id: id},
            method: 'post',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#detailNamaWisatawan').val(data.namaLengkap);
                $('#tanggalPemesanan').val(data.tanggalPemesanan);
                $('#namaPaket').val(data.namaPaket);
                $('#status').val(data.status);
                $('#jumlahPeserta').val(data.jmlPeserta);
                $('#harga').val(formatRupiah(data.harga)).change();
                $('#waktu').val(data.waktu);

                $('#lihatDetail').modal('show');
            }
        });
    });

    // Login User
    $('#login_form').on('submit', function(e) {
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
            url: 'http://localhost/dive-trip/public/Login/session',
            data: {data: dataToSend},
            method: 'post',
            dataType: 'json',
            success: function(data, textStatus, jqXHR) {
                console.log(data);
                if (data.status === 'success') {
                    if (data.role === 'ADMIN') {
                        window.location.href = "http://localhost/dive-trip/public/Dashboard";
                    }else if(data.role === 'USER') {
                        window.location.href = "http://localhost/dive-trip/public/Home";
                    }
                } else {
                    $('#errorLogin .modal-body').text(data.message);
                    $('#errorLogin').modal('show');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $('#errorLogin .modal-body').text('Terjadi kesalahan: ' + errorThrown);
                $('#errorLogin').modal('show');
            }
        });
    });

    // Lihat Detail Paket Penyelaman oleh user
    $('.lihatDetaiPaketPenyelaman').on('click', function () {
        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/dive-trip/public/Penyelam/detailPaket',
            data: {id: id},
            method: 'post',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#id').val(data.id);
                $('#namaPaket').val(data.namaPaket);
                $('#deskripsi').val(data.deskripsi);
                $('#harga').val(formatRupiah(data.harga)).change();

                $('#lihatDetailPenyelaman').modal('show');
                // $('#lihatDetailKursus').modal('show');
            }
        });
    });

    // Pesan Selanjutnya
    $('#detailPaketPenyelaman').on('click', function (event) {
        event.preventDefault();
        const idSelected = document.getElementById('tourGuide').value;
        const idPaket = document.getElementById('id').value;

        const today = new Date(); 
        const day = String(today.getDate()).padStart(2, '0'); 
        const month = String(today.getMonth() + 1).padStart(2, '0');
        const year = today.getFullYear(); 
    
        const formattedDate = `${year}-${month}-${day}`;
        document.getElementById('tanggalPemesanan').value = formattedDate;

        if (idSelected === "") {
            $('#id').val(idPaket);
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
    $("#pesanPaketPenyelam").on('submit', function(e) {
        e.preventDefault();
        let data = $(this).serialize();
        $.ajax({
            url: 'http://localhost/dive-trip/public/Penyelam/savePemesanan',
            data: data,
            method: 'post',
            dataType: 'json',
            success: function(data, textStatus, jqXHR) {
                console.log(data);
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
            error: function(jqXHR, textStatus, errorThrown) {
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
    $('#registerForm').on('submit', function(e) {
        e.preventDefault();
        let data = $(this).serialize();
        $.ajax({
            url: 'http://localhost/dive-trip/public/Register/save',
            data: data,
            method: 'post',
            dataType: 'json',
            success: function(data, textStatus, jqXHR) {
                console.log(data);
                if (data.status === 'success') {
                    $('#successRegister .modal-body').text(data.message);
                    $('#successRegister').modal('show');
                } else {
                    console.log("masuk Kedalam error");
                    $('#errorRegistration .modal-body').text(data.message);
                    $('#errorRegistration').modal('show');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
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
    $('#savePaketNyelamForm').on('submit', function(e) {
        e.preventDefault();
        let data = new FormData(this);
        $.ajax({
            url: 'http://localhost/dive-trip/public/Paket/savePaketNyelam',
            data: data,
            method: 'post',
            processData: false, // Penting untuk FormData
            contentType: false,
            dataType: 'json',
            success: function(data, textStatus, jqXHR) {
                console.log(data);
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
            error: function(jqXHR, textStatus, errorThrown) {
                $('#error .modal-body').text('Terjadi kesalahan: ' + errorThrown);
                $('#error').modal('show');
            }
        });
    });


    // Melakukan penambahakan data paket kursus
    $('#savePaketKursusForm').on('submit', function(e) {
        e.preventDefault();
        let data = new FormData(this);
        $.ajax({
            url: 'http://localhost/dive-trip/public/Paket/savePaketKursus',
            data: data,
            method: 'post',
            processData: false, // Penting untuk FormData
            contentType: false,
            dataType: 'json',
            success: function(data, textStatus, jqXHR) {
                console.log(data);
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
            error: function(jqXHR, textStatus, errorThrown) {
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
            url: 'http://localhost/dive-trip/public/Paket/getPaketById',
            data: {id: id},
            method: 'post',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#editId').val(data.data.id);
                $('#editNamaPaket').val(data.data.namaPaket);
                $('#editDeskripsi').val(data.data.deskripsi);
                $('#editHarga').val(formatRupiah(data.data.harga)).change();
                $('#editWaktu').val(data.data.waktu);
                $('#editLokasi').val(data.data.lokasi);
                $('#editPaketMenyelam').modal('show');
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

$(document).ready(function () {
    const table = $('#table_datatables').DataTable({
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
        paging: true,
        scrollCollapse: true,
        scrollY: '370px'
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