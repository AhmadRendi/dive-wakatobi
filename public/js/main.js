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
                $('#detailNamaWisatawan').val(data.nama);
                $('#tanggalPemesanan').val(data.tanggal);
                $('#paket').val(data.paket).change();
                $('#status').val(data.status);
                $('#jumlahPeserta').val(data.jumlahPeserta);
                $('#harga').val(data.harga);

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
        console.log(id);
        $.ajax({
            url: 'http://localhost/dive-trip/public/Penyelam/detailPaket',
            data: {id: id},
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

        const today = new Date(); // Mendapatkan tanggal hari ini
        const day = String(today.getDate()).padStart(2, '0'); // Mengambil hari dan menambahkan 0 di depan jika perlu
        const month = String(today.getMonth() + 1).padStart(2, '0'); // Mengambil bulan (0-11) dan menambahkan 0 di depan
        const year = today.getFullYear(); // Mengambil tahun
    
        // Mengatur nilai input tanggal dengan format YYYY-MM-DD
        const formattedDate = `${year}-${month}-${day}`;
        document.getElementById('tanggalPemesanan').value = formattedDate; // Mengatur nilai input

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

    $('#pesanPaketPenyelaman').on('hidden.bs.modal', function () {
        location.reload();
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

      // Reload halaman setelah modal ditutup
      $('#success').on('hidden.bs.modal', function () {
        location.reload();
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
                $('#editId').val(data.data.id);
                $('#editNamaPaket').val(data.data.namaPaket);
                $('#editDeskripsi').val(data.data.deskripsi);
                $('#editHarga').val(formatRupiah(data.data.harga)).change();

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

    $('#table_datatables').DataTable({
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
    });

    // Batas Terbaru
    
    // edit Document
    $('#editForm').on('submit', function(e) {
        e.preventDefault();
        let data = new FormData(this);
        $.ajax({
            url: 'http://localhost/web-ic/public/Pengarsipan/updateData',
            data: data,
            method: 'post',
            processData: false, // Penting untuk FormData
            contentType: false,
            success: function(data) {
                console.log(data);
                if (data.status === 'success') {
                    $('#successEditDocument').modal('show');
                } else {
                    $('#failedEditDocument .modal-body').text(data.message);
                    $('#failedEditDocument').modal('show');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $('#failedEditDocument .modal-body').text('Terjadi kesalahan: ' + errorThrown);
                $('#failedEditDocument').modal('show');
            }
        });
    });

    $(document).on('click', '#reloadPage', function() {
        location.reload(); // Reload halaman
    });


    // // Download Document
    let idDocumentForDownload;

    $('[data-bs-target="#downloadModal"]').on('click', function() {
        idDocumentForDownload = $(this).data('id');
    });

    $('[data-bs-target="#downloadModal"]').on('click', function() {
        idDocumentForDownload = $(this).data('id');
    });

    $('#confirmDownload').on('click', function() {
        $.ajax({
            url: 'http://localhost/web-ic/public/Pengarsipan/download',
            data: {id : idDocumentForDownload},
            method: 'post',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                if (data.status === 'success') {
                    window.open(data.file, '_blank');
                } else {
                    alert('Gagal mengunduh file: ' + (data.message || 'Terjadi kesalahan'));
                }
            },
            error: function() {
                alert('Terjadi kesalahan saat menghubungi server');
            }
        });
        $('#downloadModal').modal('hide');
    });

    // delete document
    let idDocumentForDelete;

    $('[data-bs-target="#deleteModal"]').on('click', function() {
        idDocumentForDelete = $(this).data('id');
    });

    $('#confirmDelete').on('click', function() {
        $.ajax({
            url: 'http://localhost/web-ic/public/Pengarsipan/delete',
            data: {id : idDocumentForDelete},
            method: 'post',
            dataType: 'json',
            success: function (data) {
                console.log(data);
            }
        });
        $('#confirmDelete').modal('hide');
        location.reload();
    });

    


    // update user
    $('#updateProfile').on('submit', function(e) {
        e.preventDefault();
        let data = new FormData(this); 
        $('#errorUpdateProfile').modal('hide');
    
        $.ajax({
            url: 'http://localhost/web-ic/public/User/editProfile',
            data: data,
            method: 'post',
            processData: false, // Penting untuk FormData
            contentType: false, // Penting untuk FormData
            // dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    var myModal = new bootstrap.Modal(document.getElementById('successUpdate'));
                    myModal.show();
                } else {
                    $('#error-message').text(response.message || 'Terjadi kesalahan saat memperbarui profil.');
                    var myModal = new bootstrap.Modal(document.getElementById('errorUpdateProfile'));
                    myModal.show();
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $('#error-message').text('Terjadi kesalahan: ' + errorThrown);
                var myModal = new bootstrap.Modal(document.getElementById('errorUpdateProfile'));
                myModal.show();
            }
        });
    });
    // Event listener untuk reload halaman setelah modal ditutup
    var successModal = document.getElementById('successUpdate');
    successModal.addEventListener('hidden.bs.modal', function () {
        location.reload(); // Reload halaman
    });

    var errorModal = document.getElementById('errorUpdateProfile');
    errorModal.addEventListener('hidden.bs.modal', function () {
        location.reload(); // Reload halaman
    });
});

function formatRupiah(angka) {
    const formatter = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0 // Anda bisa mengubah ini jika ingin menampilkan desimal
    });
    return formatter.format(angka);
}