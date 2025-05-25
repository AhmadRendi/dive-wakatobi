$(function () {

    // mengedit profile user
    $('#editProfileForm').on('submit', function (e) {
        e.preventDefault();
        let data = new FormData(this);
        $.ajax({
            url: baseUrl + 'Profile/updateProfile',
            data: data,
            method: 'post',
            processData: false, // Penting untuk FormData
            contentType: false,
            dataType: 'json',
            success: function (data, textStatus, jqXHR) {
                if (data.status === 'success') {
                    $('#success .modal-body').text(data.message);
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

    // melihat detail profile
    $('.lihatProfile').on('click', function (e) {
        console.log("masuk");
        $.ajax({
            url: baseUrl + 'Profile/getProfile',
            method: 'get',
            dataType: 'json',
            success: function (data, textStatus, jqXHR) {
                if (data.status === 'success') {
                    $('#namaLengkap').val(data.data.namaLengkap);
                    $('#nmrTelepons').val(data.data.noTelepon);
                    $('#editProfile').modal('show');
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

    // Membatalkan Pesanan
    $('.batalPesanan').on('click', function (e) {
        e.preventDefault();
        const id = $(this).data('id');
        $('#id').val(id);
        $('#confirm').modal('show');
    });

    $('#formBatalPesanan').on('submit', function (e) {
        e.preventDefault();
        let data = $(this).serialize();
        $.ajax({
            url: baseUrl + 'Riwayat/batalPesanan',
            data: data,
            method: 'post',
            dataType: 'json',
            success: function (data, textStatus, jqXHR) {
                if (data.status === 'success') {
                    $('#success .modal-body').text(data.message);
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

    // membayar paket yang telah dipesan
    $('.bayarPesanan').on('click', function (e) {
        e.preventDefault();
        const id = $(this).data('id');
        $('#id_pembayaran').val(id);
        $('#bayar').modal('show');
    });


    $('#bayarPaket').on('submit', function (e) {
        e.preventDefault();
        let data = new FormData(this);
        $.ajax({
            url: baseUrl + 'Riwayat/bayarPesanan',
            data: data,
            method: 'post',
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (data, textStatus, jqXHR) {
                if (data.status === 'success') {
                    $('#success .modal-body').text(data.message);
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

    // melihat pembayaran oleh admin
    $('.lihatBuktiPembayaran').on('click', function (e) {
        e.preventDefault();
        const id = $(this).data('id');
        $.ajax({
            url: baseUrl + 'Pembayaran/getBuktiPembayaran',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data, textStatus, jqXHR) {
                if (data.status === 'success') {
                    var imageUrl = baseUrl + 'img/asset/' + data.data.picture;
                    $('#butiPembayaran .card-img-top img').attr('src', imageUrl);
                    $('#butiPembayaran').modal('show');
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


    // Melakukan verifikasi pembayaran oleh admin
    $('.verifikasi').on('click', function (e) {
        e.preventDefault();
        const id = $(this).data('id');
        $('#id').val(id);
        $('#verifikasi').modal('show');
    });

    $('#verfikasiForm').on('submit', function (e) {
        e.preventDefault();
        const data = new FormData(this);
        $.ajax({
            url: baseUrl + 'Pembayaran/verifikasiPembayaran',
            data: data,
            method: 'post',
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (data, textStatus, jqXHR) {
                if (data.status === 'success') {
                    $('#success .modal-body').text(data.message);
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

    // Delete 
    $('.delete').on('click', function (e) {
        e.preventDefault();
        const id = $(this).data('id');
        $('#idDeelete').val(id);
        $('#delete').modal('show');
    });

    // Delete
    $('#deleteForm').on('submit', function (e) {
        e.preventDefault();
        const data = $(this).serialize();
        $.ajax({
            url: baseUrl + 'Paket/deletePaket',
            data: data,
            method: 'post',
            dataType: 'json',
            success: function (data, textStatus, jqXHR) {
                if (data.status === 'success') {
                    $('#success .modal-body').text(data.message);
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

    // Mengedit paket
    $('#editPaketForm').on('submit', function (e) {
        e.preventDefault();
        const data = new FormData(this);
        $.ajax({
            url: baseUrl + 'Paket/updatePaket',
            data: data,
            method: 'post',
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (data, textStatus, jqXHR) {
                if (data.status === 'success') {
                    $('#success .modal-body').text(data.message);
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

});

function backDefaultValue() {
    const idSelected = document.getElementById('tourGuide').value;
    const keahlianSelected = document.getElementById('keahlian').value;

    if (idSelected === "") {
        document.getElementById('guideName').textContent = "Select Tour Guide"; // Reset nama guide
        document.getElementById('guideRating').textContent = "Select Tour Guide"; // Reset rating
        document.getElementById('guideBio').textContent = "Select Tour Guide"; // Reset bio
        document.getElementById('guideImage').src = "";
    }
    if (keahlianSelected === "") {
        document.getElementById('guideKeahlian').textContent = "Select Tour Guide"; // Reset keahlian
    }
}

function checkSelection() {
    const tourGuideSelected = document.getElementById('tourGuide').value;
    const keahlianSelected = document.getElementById('keahlian').value;
    const btnSelanjutnya = document.getElementById('btnSelanjutnya');

    if (tourGuideSelected !== "" && keahlianSelected !== "") {
        btnSelanjutnya.disabled = false;
    } else {
        btnSelanjutnya.disabled = true;
    }
}

function updateGuide() {
    const idSelected = document.getElementById('tourGuide').value;
    backDefaultValue();
    $.ajax({
        url: baseUrl + 'Guide/getGuide',
        data: { id: idSelected },
        method: 'post',
        dataType: 'json',
        success: function (data) {
            $('#idGuide').val(data.id);
            $('#guideName').text(data.guideName);
            $('#guideRating').text(data.guideRating);
            $('#guideBio').text(data.guideBio);
            // $('#guideImage').attr('src', data.guideImage);
            checkSelection();
        },
        error: function (xhr, status, error) {
            console.error('Error fetching guide data:', error);
        }
    });
}

function updateKeahlian() {
    const keahlianSelected = document.getElementById('keahlian').value;
    backDefaultValue();

    $.ajax({
        url: baseUrl + 'Guide/getKeahlian',
        data: { id: keahlianSelected },
        method: 'post',
        dataType: 'json',
        success: function (data) {
            $('#idKeahlian').val(data.id);
            $('#guideKeahlian').text(data.keahlian);
            checkSelection();
        },
        error: function (xhr, status, error) {
            console.error('Error fetching guide data:', error);
        }
    });
}

function lakukanPemesananPaketPenyelaman(event) {
    event.preventDefault();
    const idPaket = document.getElementById('id').value;
    const idKeahlian = document.getElementById('keahlian').value;
    const idGuide = document.getElementById('idGuide').value;

    $('#idPaket').val(idPaket);
    $('#keahlianId').val(idKeahlian);
    $('#guideId').val(idGuide);
    const myModal = new bootstrap.Modal(document.getElementById('pesanPaketPenyelaman'));
    myModal.show();
}

function updateTanggal() {
    const startAt = document.getElementById('startAt');
    const endAt = document.getElementById('endAt');

    const data = {
        startAt: startAt.value,
        endAt: endAt.value
    };


    if (startAt.value !== "" && endAt.value !== "") {
        console.log("masuk");
        $.ajax({
            url: baseUrl + 'Laporan/index',
            data: data,
            method: 'post',
            error: function (jqXHR, textStatus, errorThrown) {
                $('#error .modal-body').text('Terjadi kesalahan: ' + errorThrown);
                $('#error').modal('show');
            }
        });
    }
}

// Search functionality
    document.getElementById('searchInput').addEventListener('keyup', function(e) {
        if (e.key === 'Enter') {
            this.closest('form').submit();
        }
    });
    
    // Client-side filtering for quick results
    document.getElementById('searchInput').addEventListener('input', function() {
        const searchQuery = this.value.toLowerCase();
        const messageCards = document.querySelectorAll('.message-card');
        
        messageCards.forEach(card => {
            const name = card.querySelector('.card-title').textContent.toLowerCase();
            const email = card.querySelector('.card-subtitle').textContent.toLowerCase();
            const message = card.querySelector('.card-text').textContent.toLowerCase();
            
            if (name.includes(searchQuery) || email.includes(searchQuery) || message.includes(searchQuery)) {
                card.closest('.col-lg-6').style.display = '';
            } else {
                card.closest('.col-lg-6').style.display = 'none';
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
    // Search functionality
    const searchForm = document.getElementById('searchForm');
    if (searchForm) {
        searchForm.addEventListener('submit', function(e) {
            console.log('Form submitted');
        });
    }

    // Debug: Log current URL
    console.log('Current URL:', window.location.href);
    console.log('Current search params:', window.location.search);
});
// document.getElementById('registerForm').addEventListener('sumbit', registration);
document.getElementById('selectGuideForm').addEventListener('submit', lakukanPemesananPaketPenyelaman);
document.getElementById('tourGuide').addEventListener('change', checkSelection);
document.getElementById('keahlian').addEventListener('change', checkSelection);
document.getElementById('startAt').addEventListener('change', updateTanggal);


