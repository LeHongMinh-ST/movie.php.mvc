<!-- page title -->
<section class="section section--first section--bg" data-bg="img/section/section.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section__wrap">
                    <!-- section title -->
                    <h2 class="section__title"><?php if (!empty($title)) echo $title;
                        if (!empty($key)) echo $key ?></h2>
                    <!-- end section title -->

                    <!-- breadcrumb -->
                    <ul class="breadcrumb">
                        <?php if (!empty($title)) { ?>
                            <li class="breadcrumb__item"><a href="<?php echo URL . '/' ?>">Home</a></li>
                            <li class="breadcrumb__item breadcrumb__item--active"><?php echo $title ?></li>
                        <?php } ?>
                    </ul>
                    <!-- end breadcrumb -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end page title -->

<!-- filter -->
<div class="filter">
    <div class="container">
        <div class="row">
            <div class="col-12">
            </div>
        </div>
    </div>
</div>
<!-- end filter -->

<!-- catalog -->
<div class="catalog">
    <div class="container">
        <div class="row">
            <!-- card -->
            <?php foreach ($movies as $movie) { ?>
                <div class="col-6 col-sm-12 col-lg-6">
                    <div class="card card--list">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="card__cover">
                                    <?php if ($movie->image != "") { ?>
                                        <img class="img__cover_child" src="<?php echo URL . $movie->image ?>"
                                             alt="">
                                    <?php } else { ?>
                                        <img class="img__cover_child"
                                             src="<?php echo URL . "/publics/backend/img/default.png" ?>"
                                             alt="">
                                    <?php } ?>

                                    <?php if ($movie->type == 0) { ?>
                                        <a href="<?php echo URL . '/movies/' . $movie->slug ?>"
                                           class="card__play">
                                            <i class="icon ion-ios-play"></i>
                                        </a>
                                    <?php } else { ?>
                                        <a href="<?php echo URL . '/tv-series/' . $movie->slug ?>"
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

                                    <div class="card__wrap">
                                        <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
                                        <ul class="card__list">
                                            <li>HD</li>
                                        </ul>
                                    </div>

                                    <div class="card__description">
                                        <p><?php echo $movie->description ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- end card -->

            <!-- paginator -->
            <div class="col-12">
                <ul class="paginator paginator--list">
                    <li class="paginator__item paginator__item--prev">
                        <a href="#"><i class="icon ion-ios-arrow-back"></i></a>
                    </li>
                    <li class="paginator__item"><a href="#">1</a></li>
                    <li class="paginator__item paginator__item--active"><a href="#">2</a></li>
                    <li class="paginator__item"><a href="#">3</a></li>
                    <li class="paginator__item"><a href="#">4</a></li>
                    <li class="paginator__item paginator__item--next">
                        <a href="#"><i class="icon ion-ios-arrow-forward"></i></a>
                    </li>
                </ul>
            </div>
            <!-- end paginator -->
        </div>
    </div>
</div>
<!-- end catalog -->