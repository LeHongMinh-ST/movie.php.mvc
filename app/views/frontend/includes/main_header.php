<!-- header -->
<header class="header">
    <div class="header__wrap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header__content">
                        <!-- header logo -->
                        <a href="<?php echo URL ?>/home" class="header__logo">
                            <img src="<?php echo URL ?>/publics/frontend/img/logo.svg" alt="">
                        </a>
                        <!-- end header logo -->

                        <!-- header nav -->
                        <ul class="header__nav">
                            <!-- dropdown -->
                            <li class="header__nav-item">
                                <a class=" header__nav-link" href="<?php echo URL ?>/home" role="button">Trang chủ</a>
                            </li>
                            <!-- end dropdown -->

                            <li class="header__nav-item">
                                <a class="dropdown-toggle header__nav-link" href="#" role="button"
                                   id="dropdownMenuCatalog" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">Danh mục</a>

                                <ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuCatalog">
                                    <?php foreach (get_categories() as $category) { ?>
                                        <li>
                                            <a href="<?php echo URL . '/category/' . $category->slug ?>"><?php echo $category->name ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>

                            <!-- dropdown -->
                            <li class="header__nav-item">
                                <a class="header__nav-link" href="<?php echo URL ?>/movies">Phim lẻ</a>
                            </li>
                            <!-- end dropdown -->

                            <li class="header__nav-item">
                                <a href="<?php echo URL ?>/tv-series" class="header__nav-link">Phim bộ</a>
                            </li>

                            <li class="header__nav-item">
                                <a href="<?php echo URL ?>/about" class="header__nav-link">Giới Thiệu</a>
                            </li>
                        </ul>
                        <!-- end header nav -->

                        <!-- header auth -->
                        <div class="header__auth">
                            <button class="header__search-btn" type="button">
                                <i class="icon ion-ios-search"></i>
                            </button>
                            <?php if (!empty($_SESSION['auth'])) { ?>
                                <form action="<?php echo URL ?>/admin/logout" method="post">
                                    <button class="header__sign-in">
                                        <i class="icon ion-ios-log-in"></i>
                                        <span>Đăng xuất</span>
                                    </button>
                                </form>
                            <?php } ?>


                        </div>
                        <!-- end header auth -->

                        <!-- header menu btn -->
                        <button class="header__btn" type="button">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                        <!-- end header menu btn -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- header search -->
    <form action="<?php echo URL ?>/search" method="post" class="header__search">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header__search-content">
                        <input type="text" name="key" placeholder="Nhập vào phim cần tìm...">
                        <button type="submit">Tìm kiếm</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- end header search -->
</header>
<!-- end header -->