<div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= BASE_URL; ?>/home">MVC</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?= BASE_URL; ?>/home">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?= BASE_URL; ?>/tentang">Tentang</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?= BASE_URL; ?>/player">Players</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
</div>

<div class="container mt-3">
        <!-- memanggil pesan flash -->
        <div class="row">
          <div class="col-lg-6">
              <?php Flash::flash(); ?>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-lg-6">
          <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#tambah">
          Tambah
          </button>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <form action="<?= BASE_URL; ?>/player/cari" method="post">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Cari Player" autocomplete="off" name="keyword" id="keyword">
              <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
            </div>
            </form>
          </div>
        </div>

        <div class="row">
        <div class="col-lg-6">
            <h3>Data Players</h3>
                <ul class="list-group">
                <?php foreach ($data['player'] as $p) : ?>

                    <li class="list-group-item">
                        Nama    : <?= $p["nama"] ?>
                        <a class="badge bg-danger float-end me-1" onclick="return confirm('Apakah anda yakin akan menghapus data <?=$p['nama']; ?>?')" href="<?= BASE_URL; ?>/player/hapus/<?= $p['id'] ?>">hapus</a>
                        <!-- memanggil modal ubah dan membuat data-id di script.js -->
                        <a class="badge bg-info float-end me-1 tampilModalUbah" data-bs-toggle="modal" data-bs-target="#tambah" data-id="<?= $p['id']; ?>" href="<?= BASE_URL; ?>/player/ubah/<?= $p['id'] ?>">ubah</a>
                        <a class="badge bg-primary float-end me-1" href="<?= BASE_URL; ?>/player/detail/<?= $p['id'] ?>">detail</a>
                    </li>
                
                <?php endforeach; ?>
                </ul>
        </div>
        </div>
    </div>    
</div>

<!-- Modal -->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambah" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="tambahLabel">Tambah Data Player</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASE_URL;?>/player/tambah" method="post">
        <input type="hidden" name="id" id="id">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama">
        </div>
        <div class="form-group">
            <label for="club">Club</label>
            <input type="text" class="form-control" id="club" name="club">
        </div>
        <div class="form-group">
            <label for="posisi">Posisi</label>
            <input type="text" class="form-control" id="posisi" name="posisi">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Tambah data</button>
        </form>
      </div>
    </div>
  </div>
</div>