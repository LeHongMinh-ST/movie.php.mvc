<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách các danh mục</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th width="15%">Tên danh mục</th>
                        <th width="15%">Danh mục cha</th>
                        <th>Mô tả</th>
                        <th width="15%">Người tạo</th>
                        <th width="15%">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (count($categories) > 0) {
                        foreach ($categories as $category) { ?>
                            <tr>
                                <td><?php echo $category->name ?></td>
                                <td>
                                    <?php
                                    if ($category->parent_id != 0) {
                                        foreach ($categories as $item) {
                                            if ($category->parent_id == $item->id) echo $item->name;
                                        }
                                    } else echo "Không có danh mục cha";
                                    ?>
                                </td>
                                <td><?php echo $category->description ?></td>
                                <td><?php echo $category->user ?></td>
                                <td>
                                    <div class="action-column">
                                        <?php if ($category->user_id == $_SESSION['auth']['id'] || $_SESSION['auth']['role'] == 1) { ?>
                                            <a href="<?php echo URL ?>/admin/categories/<?php echo $category->id ?>/edit"
                                               class="btn btn-warning">Chỉnh sửa</a>
                                            <form action="<?php echo URL ?>/admin/categories/delete/<?php echo $category->id ?>"
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
                            <td colspan="4" style="text-align: center">Không có dữ liệu</td>
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