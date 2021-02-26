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
                        <th width="20%">Tên</th>
                        <th width="20%">Email</th>
                        <th width="15%">Chức vụ</th>
                        <th width="20%">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (count($users) > 0) {
                        foreach ($users as $user) { ?>
                            <tr>
                                <td class="name-video">
                                    <?php echo $user->name ?>
                                </td>
                                <td>
                                    <?php echo $user->email ?>
                                </td>
                                <td><?php echo $user->role == 1 ?  'Quản lý' : 'Nhân viên';?></td>
                                <td>
                                    <div class="action-column">
                                        <?php if ($user->id == $_SESSION['auth']['id'] || $_SESSION['auth']['id'] == 1) { ?>
                                            <a href="<?php echo URL ?>/admin/users/<?php echo $user->id ?>/edit"
                                               class="btn btn-warning">Chỉnh sửa</a>
                                        <?php } ?>

                                        <?php if ($user->id != $_SESSION['auth']['id']) { ?>
                                            <a href="<?php echo URL ?>/admin/users/reset-password/<?php echo $user->id ?>"
                                               class="btn btn-primary">Reset mật khẩu</a>
                                            <form action="<?php echo URL ?>/admin/users/delete/<?php echo $user->id ?>"
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