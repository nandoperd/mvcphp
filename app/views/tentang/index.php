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

<div class="container">
    <div class="text-center">
        <img width="25%" src="<?= BASE_URL; ?>/img/profile.png" alt="MVC" class="mt-3 rounded-circle">
    </div>

    <div class="text-center">
        <div class="jumbotron">
                <p class="lead">Halo, catatan MVC ini dibuat oleh <strong><?= $data['nama'] ?></strong> yang sedang belajar menjadi
                <b><?= $data['profesi'] ?></b></p>
                <hr class="my-4">
        </div>
    </div>
</div>