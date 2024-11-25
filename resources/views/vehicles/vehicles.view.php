<?php

/** @var Array $data */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Core\LinkGenerator $link */
?>

<head>
    <title>Vehicles</title>
</head>

<script>
    document.getElementById("vehicles-nav").classList.add("active");
</script>

<div class="container-fluid">
    <div class="row main-content">
        <div class="col-2 left-content">
            <div class="categories-border">
                <h3>Filters:</h3>
                <div class="form-check vehicle-category">
                    <input class="form-check-input" type="checkbox" id="check1" name="option1" value="">
                    <label class="form-check-label">GT4</label>
                </div>
                <div class="form-check vehicle-category">
                    <input class="form-check-input" type="checkbox" id="check2" name="option2" value="">
                    <label class="form-check-label">GT3</label>
                </div>
                <div class="form-check vehicle-category">
                    <input class="form-check-input" type="checkbox" id="check3" name="option3" value="">
                    <label class="form-check-label">GT2</label>
                </div>
                <div class="form-check vehicle-category">
                    <input class="form-check-input" type="checkbox" id="check4" name="option4" value="">
                    <label class="form-check-label">LMP3</label>
                </div>
                <div class="form-check vehicle-category">
                    <input class="form-check-input" type="checkbox" id="check5" name="option5" value="">
                    <label class="form-check-label">LMP2</label>
                </div>
                <div class="form-check vehicle-category">
                    <input class="form-check-input" type="checkbox" id="check6" name="option6" value="">
                    <label class="form-check-label">Hypercar</label>
                </div>
                <div class="form-check vehicle-category">
                    <input class="form-check-input" type="checkbox" id="check7" name="option7" value="">
                    <label class="form-check-label">F1</label>
                </div>
                <div class="form-check vehicle-category">
                    <input class="form-check-input" type="checkbox" id="check8" name="option8" value="">
                    <label class="form-check-label">F2</label>
                </div>
                <div class="form-check vehicle-category">
                    <input class="form-check-input" type="checkbox" id="check9" name="option9" value="">
                    <label class="form-check-label">F3</label>
                </div>
                <div class="form-check vehicle-category">
                    <input class="form-check-input" type="checkbox" id="check10" name="option10" value="">
                    <label class="form-check-label">F4</label>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-md-8">
            <div class="row">
                <div class="col-xs-6 col-md-9 mt-3">
                    <div class="form-group search-bar">
                        <input type="text" class="form-control" id="search-vehicles" placeholder="Search...">
                    </div>
                </div>

                <div class="col mt-3">
                    <button type="button" class="btn btn-search">Submit</button>
                </div>
            </div>

            <button type="button" class="btn btn-filters mt-3">
                Filters
            </button>

            <div class="row mt-3">
                <h1>Available vehicles</h1>
            </div>

            <div class="row main-content">
                <div class="col-xs-12 col-md-6 mt-2">
                    <div class="card home-card">
                        <a class="card-block stretched-link text-decoration-none" href="vehicle_bmw.html">
                            <img class="card-img-top" src="/public/images/vehicles_bmw_m4.jpg" alt="Vehicles BMW link picture">
                            <div class="card-body">
                                <h1 class="card-title">BMW M4 GT3</h1>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-xs-12 col-md-6 mt-2">
                    <div class="card home-card">
                        <a class="card-block stretched-link text-decoration-none" href="vehicle_oreca.html">
                            <img class="card-img-top" src="/public/images/vehicles_oreca_07.png"
                                 alt="Vehicles oreca 07 link picture">
                            <div class="card-body">
                                <h1 class="card-title">Oreca 07 LMP2</h1>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-2"></div>
    </div>

</div>