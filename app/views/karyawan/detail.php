<div class="container mt-5">
  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title"><?= $data['dosen']['nama']; ?></h5>
      <p class="card-text"><?= $data['dosen']['email']; ?></p>
      <p class="card-text"><?= $data['dosen']['alamat']; ?></p>
      <a href="<?= BASEURL; ?>/karyawan" class="card-link">Kembali</a>
    </div>
  </div>
</div>