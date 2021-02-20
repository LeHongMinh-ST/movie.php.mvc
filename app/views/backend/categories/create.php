<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tạo mới danh mục</h1>
    </div>
    <div class="row">

        <div class="col-lg-3"></div>

        <div class="col-lg-6">

            <!-- Default Card Example -->
            <div class="card mb-4">
                <div class="card-body">
                    <form action="<?php echo URL ?>/admin/categories" method="post">
                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục">
                        </div>

                        <div class="form-group">
                            <label>Danh mục cha</label>
                            <select name="parent_id" class="form-control">
                                <option selected value="">Chọn danh mục cha</option>
                                <?php foreach ($categories as $value) { ?>
                                    <option value="<?php echo $value->id?>"><?php echo $value->name?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea class="form-control" name="description" id="" cols="30" rows="5"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Tạo mới</button>
                    </form>
                </div>
            </div>

        </div>

        <div class="col-lg-3"></div>

    </div>

</div>
