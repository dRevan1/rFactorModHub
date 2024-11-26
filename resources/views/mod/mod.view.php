<?php

/** @var Array $data */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Core\LinkGenerator $link */
?>


<div class="container">
    <div class="row main-content">
        <div class="col">
            <div class="row mt-3">
                <div class="col-xs-12 col-md-5 mt-1">
                    <div class="d-flex flex-column gap-2">
                        <button type="button" class="btn gallery-btn" data-bs-toggle="modal"
                                data-bs-target="#silverstonePic1">
                            <img src="/public/images/silverstone_1.jpg" alt="silverstone picture 1">
                        </button>
                        <div id="silverstonePic1" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <img src="/public/images/silverstone_1.jpg" class="modal-img" alt="silverstone picture 1">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn gallery-btn" data-bs-toggle="modal"
                                data-bs-target="#silverstonePic2">
                            <img src="/public/images/silverstone_2.jpg" alt="silverstone picture 2">
                        </button>
                        <div id="silverstonePic2" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <img src="/public/images/silverstone_2.jpg" class="modal-img" alt="silverstone picture 2">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn gallery-btn" data-bs-toggle="modal"
                                data-bs-target="#silverstonePic3">
                            <img src="/public/images/silverstone_3.jpg" alt="silverstone picture 3">
                        </button>
                        <div id="silverstonePic3" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <img src="/public/images/silverstone_3.jpg" class="modal-img" alt="silverstone picture 3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-md-7 mt-2">
                    <p>
                        <span class="item-info">Size:</span> 700 mb
                    </p>
                    <p>
                        <span class="item-info">Author:</span> Gordon Freeman
                    </p>
                    <p>
                        <span class="item-info">Posted:</span> 17.10.2024
                    </p>
                    <p>
                        <span class="item-info">Last update:</span> 18.10.2024
                    </p>
                    <p>
                        <button type="button" class="btn btn-download">
                            Download
                        </button>
                    </p>
                </div>
            </div>

            <div class="row item-description">
                <div class="col">
                    <h1>Silverstone Circuit</h1>
                    <p>
                        Silverstone Circuit is a motor racing circuit in England, near the Northamptonshire villages of Silverstone
                        and Whittlebury. It is the home of the British Grand Prix,
                        which it first hosted as the 1948 British Grand Prix. The 1950 British Grand Prix at Silverstone was the
                        first race in the newly created World Championship of Drivers.
                        The race rotated between Silverstone, Aintree and Brands Hatch from 1955 to 1986, but settled permanently at
                        the Silverstone track in 1987. The circuit also hosts the
                        British round of the MotoGP series.
                    </p>
                </div>
            </div>

            <div class="row item-comments">
                <div class="col">
                    <h1>Comments:</h1>

                    <div class="form-group textarea-comment mt-4">
                        <textarea class="form-control" rows="5" placeholder="Leave a comment..."></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>