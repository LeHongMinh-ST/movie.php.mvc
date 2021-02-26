<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách các phim</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th width="15%">Ảnh mô tả</th>
                        <th>Tên phim</th>
                        <th width="15%">Danh mục</th>
                        <th width="15%">Loại phim</th>
                        <th width="15%">Người tạo</th>
                        <th width="20%">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (count($movies) > 0) {
                        foreach ($movies as $movie) { ?>
                            <tr>
                                <td class="image-movie">
                                    <?php if ($movie->image != "") { ?>
                                        <img src="<?php echo URL . $movie->image ?>" alt="">
                                    <?php } else { ?>
                                        <img src="<?php echo URL . "/publics/backend/img/default.png" ?>" alt="">
                                    <?php } ?>
                                </td>
                                <td class="name-movie"><a
                                            href="<?php echo URL ?>/admin/movies/show/<?php echo $movie->id ?>"><?php echo $movie->name ?></a>
                                </td>
                                <td><?php echo $movie->category_id ?></td>
                                <td>
                                    <?php
                                    if ($movie->type == 0) echo "Phim lẻ";
                                    else echo "Phim bộ";
                                    ?>
                                </td>
                                <td><?php echo $movie->user ?></td>
                                <td>
                                    <div class="action-column">
                                        <a href="<?php echo URL ?>/admin/movies/show/<?php echo $movie->id ?>"
                                           class="btn btn-secondary">Chi tiết</a>
                                        <?php if ($movie->user_id == $_SESSION['auth']['id'] || $_SESSION['auth']['role'] == 1) { ?>
                                            <a href="<?php echo URL ?>/admin/movies/<?php echo $movie->id ?>/edit"
                                               class="btn btn-warning">Chỉnh sửa</a>
                                            <form action="<?php echo URL ?>/admin/movies/delete/<?php echo $movie->id ?>"
                                                  method="post">
                                                <button class="btn btn-danger">Xóa</button>
                                            </form>
                                        <?php } ?>
                                    </div>
                                </td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td colspan="5" style="text-align: center">Không có dữ liệu</td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<script>

</script>