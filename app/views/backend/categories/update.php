<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Chỉnh sửa danh mục</h1>
    </div>
    <div class="row">

        <div class="col-lg-3"></div>

        <div class="col-lg-6">

            <!-- Default Card Example -->
            <div class="card mb-4">
                <div class="card-body">
                    <form action="<?php echo URL ?>/admin/categories/update/<?php echo $category->id ?>"
                          method="post">
                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục"
                                   value="<?php echo $category->name ?>">
                            <?php if (!empty($_SESSION['error']['name'])) {?>
                                <span style="color: red"><?php echo $_SESSION['error']['name']; unset($_SESSION['error']['name']);?></span>
                            <?php }?>
                        </div>

                        <div class="form-group">
                            <label>Danh mục cha</label>
                            <select name="parent_id" class="form-control">
                                <option value="">Chọn danh mục cha</option>
                                <?php foreach ($categories as $value) { ?>
                                    <option value="<?php echo $value->id ?>" <?php if ($value->id == $category->parent_id) { ?>
                                        selected <?php } ?> ><?php echo $value->name ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea class="form-control" name="description" id="" cols="30"
                                      rows="5"><?php echo $category->description ?></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </form>
                </div>
            </div>

        </div>

        <div class="col-lg-3"></div>

    </div>

</div>
