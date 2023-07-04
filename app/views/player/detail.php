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

<div class="continer mt-5">
    <div class="row">
        <div class="col-3"></div>
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    Nama : <?= $data['player']['nama'] ?>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Posisi : <?= $data['player']['posisi'] ?></li>
                    <li class="list-group-item">Club : <?= $data['player']['club'] ?></li>
                </ul>
                <a href="<?= BASE_URL; ?>/player">  kembali</a>
            </div>
            
        </div>
    </div>
</div>