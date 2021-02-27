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
                    <form action="<?php echo URL ?>/admin/users" method="post">
                        <div class="form-group">
                            <label>Tên người dùng</label>
                            <input type="text" class="form-control" name="name" placeholder="Nhập tên người dùng">
                            <?php if (!empty($_SESSION['error']['name'])) {?>
                                <span style="color: red"><?php echo $_SESSION['error']['name']; unset($_SESSION['error']['name']);?></span>
                            <?php }?>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Nhập email">
                            <?php if (!empty($_SESSION['error']['email'])) {?>
                                <span style="color: red"><?php echo $_SESSION['error']['email']; unset($_SESSION['error']['email']);?></span>
                            <?php }?>
                        </div>

                        <div class="form-group">
                            <label>Chọn chức vụ</label>
                            <select name="role" class="form-control">
                                <option  value="0">Nhân viên</option>
                                <option  value="1">Quản lý</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Tạo mới</button>
                    </form>
                </div>
            </div>

        </div>

        <div class="col-lg-3"></div>

    </div>

</div>
