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
                        <th width="20%">Tên video</th>
                        <th width="20%">Phim</th>
                        <th width="15%">Người tạo</th>
                        <th width="20%">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (count($videos) > 0) {
                        foreach ($videos as $video) { ?>
                            <tr>
                                <td class="name-video">
                                    <a href="<?php echo URL ?>/admin/videos/show/<?php echo $video->id ?>/edit">
                                        <?php echo $video->name ?>
                                    </a>
                                </td>
                                <td>
                                    <?php echo $video->movie_id ?>
                                </td>
                                <td><?php echo $video->user_id ?></td>
                                <td>
                                    <div class="action-column">
                                        <a href="<?php echo URL ?>/admin/videos/show/<?php echo $video->id ?>/edit"
                                           class="btn btn-secondary">Chi tiết</a>
                                        <a href="<?php echo URL ?>/admin/videos/<?php echo $video->id ?>/edit"
                                           class="btn btn-warning">Chỉnh sửa</a>
                                        <form action="<?php echo URL ?>/admin/videos/delete/<?php echo $video->id ?>"
                                              method="post">
                                            <button class="btn btn-danger">Xóa</button>
                                        </form>
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