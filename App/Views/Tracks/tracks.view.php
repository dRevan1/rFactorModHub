<?php

/** @var Array $data */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Core\LinkGenerator $link */
?>

<head>
    <title>Tracks</title>
</head>

<script>
    document.getElementById("tracks-nav").classList.add("active");
</script>

<div class="container">
    <div class="row main-content">
        <div class="row mt-3">
            <div class="col-xs-6 col-md-9 mt-3">
                <div class="form-group search-bar">
                    <input type="text" class="form-control" id="search-tracks" placeholder="Search...">
                </div>
            </div>

            <div class="col mt-3">
                <button type="button" class="btn btn-search">Submit</button>
            </div>
        </div>
        <div class="row mt-3">
            <h1>Available tracks</h1>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-6 mt-4">
                <div class="card home-card">
                    <a class="card-block stretched-link text-decoration-none" href="<?= $link->url("mod.mod")?>">
                        <img class="card-img-top" src="/public/images/tracks_silverstone.jpg" alt="Tracks silverstone link picture">
                        <div class="card-body">
                            <h1 class="card-title">Silverstone Circuit</h1>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-xs-12 col-md-6 mt-4">
                <div class="card home-card">
                    <a class="card-block stretched-link text-decoration-none" href="track_spa.html">
                        <img class="card-img-top" src="/public/images/tracks_spa.jpg" alt="Tracks spa link picture">
                        <div class="card-body">
                            <h1 class="card-title">Circuit de Spa-Francorchamps</h1>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-6 mt-3">
                <div class="card home-card">
                    <a class="card-block stretched-link text-decoration-none" href="<?= $link->url("mod.mod")?>">
                        <img class="card-img-top" src="/public/images/tracks_silverstone.jpg" alt="Tracks silverstone link picture">
                        <div class="card-body">
                            <h1 class="card-title">Silverstone Circuit</h1>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-xs-12 col-md-6 mt-3">
                <div class="card home-card">
                    <a class="card-block stretched-link text-decoration-none" href="track_spa.html">
                        <img class="card-img-top" src="/public/images/tracks_spa.jpg" alt="Tracks spa link picture">
                        <div class="card-body">
                            <h1 class="card-title">Circuit de Spa-Francorchamps</h1>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-6 mt-3">
                <div class="card home-card">
                    <a class="card-block stretched-link text-decoration-none" href="<?= $link->url("mod.mod")?>">
                        <img class="card-img-top" src="/public/images/tracks_silverstone.jpg" alt="Tracks silverstone link picture">
                        <div class="card-body">
                            <h1 class="card-title">Silverstone Circuit</h1>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-xs-12 col-md-6 mt-3">
                <div class="card home-card">
                    <a class="card-block stretched-link text-decoration-none" href="track_spa.html">
                        <img class="card-img-top" src="/public/images/tracks_spa.jpg" alt="Tracks spa link picture">
                        <div class="card-body">
                            <h1 class="card-title">Circuit de Spa-Francorchamps</h1>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
