<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tạo mới người dùng</h1>
    </div>
    <div class="row">

        <div class="col-lg-3"></div>

        <div class="col-lg-6">

            <!-- Default Card Example -->
            <div class="card mb-4">
                <div class="card-body">
                    <form action="<?php echo URL ?>/admin/users/reset-password/<?php echo $user_id?>" method="post">
                        <div class="form-group">
                            <label>Mật khẩu mới</label>
                            <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu mới">
                            <?php if (!empty($_SESSION['error']['password'])) {?>
                                <span style="color: red"><?php echo $_SESSION['error']['password']; unset($_SESSION['error']['password']);?></span>
                            <?php }?>
                        </div>

                        <div class="form-group">
                            <label>Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" name="confirm_password" placeholder="Nhập lại mật khẩu">
                        </div>
                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-3"></div>

    </div>

</div>
