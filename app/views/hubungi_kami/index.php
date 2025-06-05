<div class="container my-5 shadow-lg p-4">
    <div class="row">
        <div class="col-md-12 mb-4">
            <h2>Hubungi Kami</h2>
        </div>
    </div>
    
    <div class="row p-4">
        <div class="col-md-6">
            <form action="<?= BASEURL;?>/HubungiKami/kirimPesan" method="post">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama">
                </div>
                <div class="mb-3">
                    <label for="noHp" class="form-label">Nomor Handphone</label>
                    <input type="text" class="form-control" id="noHp" name="noHp" placeholder="Masukkan Nomor Handphone">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email">
                </div>
                <div class="mb-3">
                    <label for="pesan" class="form-label">Pesan</label>
                    <textarea class="form-control" id="pesan" name="pesan" rows="5" placeholder="Masukkan pesan"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim Pesan</button>
            </form>
        </div>
    </div>
</div>