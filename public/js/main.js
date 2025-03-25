$( function () {

    $('.tampilModalUpdate').on('click', function () {
        const id = $(this).data('id');
        // console.log(id);
        $.ajax({
            url: 'http://localhost/web-ic/public/Pengarsipan/getDocument',
            data: {id: id},
            method: 'post',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#editId').val(data.id_document);
                $('#editNomorSurat').val(data.nmr_surat);
                $('#editTanggal').val(data.date);
                $('#editJenis').val(data.jenis).change(); // Memicu event change
                $('#editKategori').val(data.kategory);
                $('#editPengirim').val(data.pengirim);
                $('#editPenerima').val(data.penerima);
                $('#editDokumen').val(data.document);
    
                // Tampilkan modal setelah semua nilai di-set
                $('#editModal').modal('show');
            }
        });
    });
    
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
                url: 'http://localhost/web-ic/public/Login/session',
                data: {data: dataToSend},
                method: 'post',
                dataType: 'json',
                success: function(data, textStatus, jqXHR) {
                    console.log(data);
                    if (data.status === 'success') {
                        // $('#successRegistration').modal('show');
                        window.location.href = "http://localhost/web-ic/public/Dashboard";
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