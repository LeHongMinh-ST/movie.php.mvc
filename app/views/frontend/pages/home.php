<!-- home -->
<section class="home">
    <!-- home bg -->
    <div class="owl-carousel home__bg">
        <div class="item home__cover" data-bg="<?php echo URL ?>/publics/frontend/img/home/home__bg.jpg"></div>
        <div class="item home__cover" data-bg="<?php echo URL ?>/publics/frontend/img/home/home__bg2.jpg"></div>
        <div class="item home__cover" data-bg="<?php echo URL ?>/publics/frontend/img/home/home__bg3.jpg"></div>
        <div class="item home__cover" data-bg="<?php echo URL ?>/publics/frontend/img/home/home__bg4.jpg"></div>
    </div>
    <!-- end home bg -->

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="home__title"><b>Phim nổi bật</b></h1>

                <button class="home__nav home__nav--prev" type="button">
                    <i class="icon ion-ios-arrow-round-back"></i>
                </button>
                <button class="home__nav home__nav--next" type="button">
                    <i class="icon ion-ios-arrow-round-forward"></i>
                </button>
            </div>

            <div class="col-12">
                <div class="owl-carousel home__carousel">

                    <?php foreach ($movies as $movie) { ?>
                        <div class="item">
                            <!-- card -->
                            <div class="card card--big">
                                <div class="card__cover">
                                    <?php if ($movie->image != "") { ?>
                                        <img class="img__cover" src="<?php echo URL . $movie->image ?>" alt="">
                                    <?php } else { ?>
                                        <img class="img__cover"
                                             src="<?php echo URL . "/publics/backend/img/default.png" ?>" alt="">
                                    <?php } ?>

                                    <?php if ($movie->type == 0) { ?>
                                        <a href="<?php echo URL . '/movies/' . $movie->slug ?>" class="card__play">
                                            <i class="icon ion-ios-play"></i>
                                        </a>
                                    <?php } else { ?>
                                        <a href="<?php echo URL . '/tv-series/' . $movie->slug ?>" class="card__play">
                                            <i class="icon ion-ios-play"></i>
                                        </a>
                                    <?php } ?>
                                </div>
                                <div class="card__content">
                                    <?php if ($movie->type == 0) { ?>
                                        <h3 class="card__title"><a
                                                    href="<?php echo URL . '/movies/' . $movie->slug ?>"><?php echo $movie->name ?></a>
                                        </h3>
                                    <?php } else { ?>
                                        <h3 class="card__title"><a
                                                    href="<?php echo URL . '/tv-series/' . $movie->slug ?>"><?php echo $movie->name ?></a>
                                        </h3>
                                    <?php } ?>
                                    <span class="card__category">
                                        <?php foreach ($movie->category as $value) { ?>
                                            <a href="<?php echo URL . '/category/' . $value->slug ?>"><?php echo $value->name ?></a>
                                        <?php } ?>
									</span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end home -->

<!-- content -->
<section class="content">
    <div class="content__head">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- content title -->
                    <h2 class="content__title">Phim mới</h2>
                    <!-- end content title -->

                    <!-- content tabs nav -->
                    <ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1"
                               aria-selected="true">SẮP RA MẮT</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2"
                               aria-selected="false">PHIM LẺ</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3"
                               aria-selected="false">PHIM BỘ</a>
                        </li>
                    </ul>
                    <!-- end content tabs nav -->

                    <!-- content mobile tabs nav -->
                    <div class="content__mobile-tabs" id="content__mobile-tabs">
                        <div class="content__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs"
                             data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <input type="button" value="New items">
                            <span></span>
                        </div>

                        <div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"><a class="nav-link active" id="1-tab" data-toggle="tab"
                                                        href="#tab-1" role="tab" aria-controls="tab-1"
                                                        aria-selected="true">SẮP RA MẮT</a></li>

                                <li class="nav-item"><a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2"
                                                        role="tab" aria-controls="tab-2"
                                                        aria-selected="false">PHIM LẺ</a></li>

                                <li class="nav-item"><a class="nav-link" id="3-tab" data-toggle="tab" href="#tab-3"
                                                        role="tab" aria-controls="tab-3" aria-selected="false">PHIM
                                        BỘ</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- end content mobile tabs nav -->
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- content tabs -->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
                <div class="row">
                    <!-- card -->
                    <?php foreach ($news as $new) { ?>
                        <div class="col-6 col-sm-12 col-lg-6">
                            <div class="card card--list">
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <div class="card__cover">
                                            <?php if ($new->image != "") { ?>
                                                <img class="img__cover_child" src="<?php echo URL . $new->image ?>"
                                                     alt="">
                                            <?php } else { ?>
                                                <img class="img__cover_child"
                                                     src="<?php echo URL . "/publics/backend/img/default.png" ?>"
                                                     alt="">
                                            <?php } ?>

                                            <?php if ($new->type == 0) { ?>
                                                <a href="<?php echo URL . '/movies/' . $new->slug ?>"
                                                   class="card__play">
                                                    <i class="icon ion-ios-play"></i>
                                                </a>
                                            <?php } else { ?>
                                                <a href="<?php echo URL . '/tv-series/' . $new->slug ?>"
                                                   class="card__play">
                                                    <i class="icon ion-ios-play"></i>
                                                </a>
                                            <?php } ?>
                                            <i class="icon ion-ios-play"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-8">
                                        <div class="card__content">
                                            <?php if ($new->type == 0) { ?>
                                                <h3 class="card__title"><a
                                                            href="<?php echo URL . '/movies/' . $new->slug ?>"><?php echo $new->name ?></a>
                                                </h3>
                                            <?php } else { ?>
                                                <h3 class="card__title"><a
                                                            href="<?php echo URL . '/tv-series/' . $new->slug ?>"><?php echo $new->name ?></a>
                                                </h3>
                                            <?php } ?>
                                            <span class="card__category">
                                                <?php foreach ($new->category as $value) { ?>
                                                    <a href="<?php echo URL . '/category/' . $value->slug ?>"><?php echo $value->name ?></a>
                                                <?php } ?>
											</span>

                                            <div class="card__wrap">
                                                <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
                                                <ul class="card__list">
                                                    <li>HD</li>
                                                </ul>
                                            </div>

                                            <div class="card__description">
                                                <p><?php echo $new->description ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- end card -->

                </div>
            </div>

            <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="2-tab">
                <div class="row">
                    <!-- card -->
                    <?php foreach ($newMovies as $newMovie) { ?>
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <?php if ($newMovie->image != "") { ?>
                                        <img class="img__cover_child" src="<?php echo URL . $newMovie->image ?>" alt="">
                                    <?php } else { ?>
                                        <img class="img__cover_child"
                                             src="<?php echo URL . "/publics/backend/img/default.png" ?>" alt="">
                                    <?php } ?>

                                    <?php if ($newMovie->type == 0) { ?>
                                        <a href="<?php echo URL . '/movies/' . $newMovie->slug ?>" class="card__play">
                                            <i class="icon ion-ios-play"></i>
                                        </a>
                                    <?php } else { ?>
                                        <a href="<?php echo URL . '/tv-series/' . $newMovie->slug ?>" class="card__play">
                                            <i class="icon ion-ios-play"></i>
                                        </a>
                                    <?php } ?>
                                </div>
                                <div class="card__content">
                                    <?php if ($newMovie->type == 0) { ?>
                                        <h3 class="card__title"><a
                                                    href="<?php echo URL . '/movies/' . $newMovie->slug ?>"><?php echo $newMovie->name ?></a>
                                        </h3>
                                    <?php } else { ?>
                                        <h3 class="card__title"><a
                                                    href="<?php echo URL . '/tv-series/' . $newMovie->slug ?>"><?php echo $newMovie->name ?></a>
                                        </h3>
                                    <?php } ?>
                                    <span class="card__category">
                                                <?php foreach ($newMovie->category as $value) { ?>
                                                    <a href="<?php echo URL . '/category/' . $value->slug ?>"><?php echo $value->name ?></a>
                                                <?php } ?>
											</span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- end card -->
                </div>
            </div>

            <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="3-tab">
                <div class="row">
                    <?php foreach ($newTVSeries as $newTVSerie) { ?>
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <?php if ($newTVSerie->image != "") { ?>
                                        <img class="img__cover_child" src="<?php echo URL . $newTVSerie->image ?>" alt="">
                                    <?php } else { ?>
                                        <img class="img__cover_child"
                                             src="<?php echo URL . "/publics/backend/img/default.png" ?>" alt="">
                                    <?php } ?>

                                    <?php if ($newTVSerie->type == 0) { ?>
                                        <a href="<?php echo URL . '/movies/' . $newTVSerie->slug ?>" class="card__play">
                                            <i class="icon ion-ios-play"></i>
                                        </a>
                                    <?php } else { ?>
                                        <a href="<?php echo URL . '/tv-series/' . $newTVSerie->slug ?>" class="card__play">
                                            <i class="icon ion-ios-play"></i>
                                        </a>
                                    <?php } ?>
                                </div>
                                <div class="card__content">
                                    <?php if ($newTVSerie->type == 0) { ?>
                                        <h3 class="card__title"><a
                                                    href="<?php echo URL . '/movies/' . $newTVSerie->slug ?>"><?php echo $newTVSerie->name ?></a>
                                        </h3>
                                    <?php } else { ?>
                                        <h3 class="card__title"><a
                                                    href="<?php echo URL . '/tv-series/' . $newTVSerie->slug ?>"><?php echo $newTVSerie->name ?></a>
                                        </h3>
                                    <?php } ?>
                                    <span class="card__category">
                                                <?php foreach ($newTVSerie->category as $value) { ?>
                                                    <a href="<?php echo URL . '/category/' . $value->slug ?>"><?php echo $value->name ?></a>
                                                <?php } ?>
											</span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- end content tabs -->
    </div>
</section>
<!-- end content -->