$(function() {

    $('#editProfileForm').on('submit', function(e) {
        e.preventDefault();
        let data = new FormData(this);
        $.ajax({
            url: 'http://localhost/dive-trip/public/Profile/updateProfile',
            data: data,
            method: 'post',
            processData: false, // Penting untuk FormData
            contentType: false,
            dataType: 'json',
            success: function(data, textStatus, jqXHR) {
                if (data.status === 'success') {
                    $('#success .modal-body').text(data.message);
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

      // Reload halaman setelah modal ditutup
      $('#success').on('hidden.bs.modal', function () {
        location.reload();
    });

    // $("#pesanPaketPenyelam").on('submit', function(e) {
    //     e.preventDefault();
    //     let data = $(this).serialize();
    //     $.ajax({
    //         url: 'http://localhost/dive-trip/public/Penyelam/savePemesanan',
    //         data: data,
    //         method: 'post',
    //         dataType: 'json',
    //         success: function(data, textStatus, jqXHR) {
    //             console.log(data);
    //             if (data.status === 'success') {
    //                 $('#success .modal-body').text(data.message);
    //                 $('#pesanPaketPenyelaman').modal('hide');
    //                 $('#success').modal('show');
    //             } else {
    //                 $('#error .modal-body').text(data.message);
    //                 $('#error').modal('show');
    //             }
    //         },
    //         error: function(jqXHR, textStatus, errorThrown) {
    //             $('#error .modal-body').text('Terjadi kesalahan: ' + errorThrown);
    //             $('#error').modal('show');
    //         }
    //     });
    // });

});

function backDefaultValue(){
    const idSelected = document.getElementById('tourGuide').value;
    const keahlianSelected = document.getElementById('keahlian').value;

    if(idSelected === "") {
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
        url: 'http://localhost/dive-trip/public/Guide/getGuide',
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
        url: 'http://localhost/dive-trip/public/Guide/getKeahlian',
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

function lakukanPemesananPaketPenyelaman(event){
    event.preventDefault();
    const idPaket = document.getElementById('id').value;
    const idKeahlian = document.getElementById('keahlian').value;
    const idGuide = document.getElementById('idGuide').value;

    console.log(idPaket);
    console.log(idKeahlian);
    console.log(idGuide);
    $('#idPaket').val(idPaket);
    $('#keahlianId').val(idKeahlian);
    $('#guideId').val(idGuide);
    const myModal = new bootstrap.Modal(document.getElementById('pesanPaketPenyelaman'));
    myModal.show();
}

// document.getElementById('registerForm').addEventListener('sumbit', registration);
document.getElementById('selectGuideForm').addEventListener('submit', lakukanPemesananPaketPenyelaman);
document.getElementById('tourGuide').addEventListener('change', checkSelection);
document.getElementById('keahlian').addEventListener('change', checkSelection);


