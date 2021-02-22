<!-- details -->
<section class="section details">
    <!-- details background -->
    <div class="details__bg" data-bg="img/home/home__bg.jpg"></div>
    <!-- end details background -->

    <!-- details content -->
    <div class="container">
        <div class="row">
            <!-- title -->
            <div class="col-12">
                <h1 class="details__title"><?php echo $movie->name ?></h1>
            </div>
            <!-- end title -->

            <!-- content -->
            <div class="col-10">
                <div class="card card--details card--series">
                    <div class="row">
                        <!-- card cover -->
                        <div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-3">
                            <div class="card__cover">
                                <?php if ($movie->image != "") { ?>
                                    <img class="img__cover" src="<?php echo URL . $movie->image ?>" alt="">
                                <?php } else { ?>
                                    <img class="img__cover"
                                         src="<?php echo URL . "/publics/backend/img/default.png" ?>" alt="">
                                <?php } ?>
                            </div>
                        </div>
                        <!-- end card cover -->

                        <!-- card content -->
                        <div class="col-12 col-sm-8 col-md-8 col-lg-9 col-xl-9">
                            <div class="card__content">
                                <div class="card__wrap">
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>

                                    <ul class="card__list">
                                        <li>HD</li>
                                    </ul>
                                </div>
                                <ul class="card__meta">
                                    <li><span>Danh mục:</span>
                                        <?php foreach ($movie->category as $value) { ?>
                                            <a href="<?php echo URL . '/category/' . $value->slug ?>"><?php echo $value->name ?></a>
                                        <?php } ?>
                                    </li>
                                    <li><span>Thể loại:</span>
                                        <?php if ($movie->type == 0) { ?>
                                            <a href="<?php echo URL . '/movies'?>"">Phim lẻ</a>
                                        <?php } else { ?>
                                            <a href="<?php echo URL . '/tv-series'?>">Phim bộ</a>

                                        <?php } ?>
                                    </li>
                                </ul>


                                <div class="card__description card__description--details">
                                    <?php echo $movie->description ?>
                                </div>
                            </div>
                        </div>
                        <!-- end card content -->
                    </div>
                </div>
            </div>
            <!-- end content -->

            <!-- player -->
            <div class="col-12 col-xl-6">
                <?php if(!empty($video->source)){?>
                    <iFrame src="<?php echo $video->source ?>" width="540" height="320" allowfullscreen></iFrame>
                <?php } else {?>
                    <h2 class="content__title">Phim đang cập nhật</h2>
                <?php }?>
            </div>
            <!-- end player -->

            <!-- accordion -->
            <div class="col-12 col-xl-6">
                <div class="accordion" id="accordion">
                    <div class="accordion__card">
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                             data-parent="#accordion">
                            <div class="card-body">
                                <table class="accordion__list">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tiêu để</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php $i = 1;
                                    foreach ($videos as $value) { ?>
                                        <tr>
                                            <th><?php echo $i ?></th>
                                            <td>
                                                <?php if ($value->id == $video->id){ ?>
                                                <a href="<?php echo URL . '/tv-series/' . $movie->slug . '/' . $value->id ?>"
                                                   style="color: #ff5868"><?php echo $value->name ?></a></td>
                                            <?php } else { ?>
                                                <a href="<?php echo URL . '/tv-series/' . $movie->slug . '/' . $value->id ?>"
                                                   style="color: #adb5bd"><?php echo $value->name ?></a></td>
                                            <?php } ?>
                                        </tr>
                                        <?php $i++;
                                    } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end details content -->
</section>
<!-- end details -->