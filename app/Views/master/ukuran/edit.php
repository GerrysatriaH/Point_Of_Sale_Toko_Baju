<?= $this->extend('layout/templates') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="card">
        <form>
            <div class="card-body">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" required>
                </div>
                <div class="form-group">
                    <p class="text-bold">Gender</p>
                    <label for="laki-laki">
                        <input type="radio" id="laki-laki" name="jenis_kelamin" value="Laki-laki" required> Laki-laki
                    </label>
                    <label for="perempuan" class="px-4">
                        <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan" required> Perempuan
                    </label>
                </div>
                <div class="form-group">
                    <label for="nama">Tipe</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama">
                </div>
                <div class="form-group">
                    <label for="nama">Alamat</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>