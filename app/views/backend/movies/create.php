<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tạo mới phim</h1>
    </div>
    <div class="row">

        <div class="col-lg-3"></div>

        <div class="col-lg-6">

            <!-- Default Card Example -->
            <div class="card mb-4">
                <div class="card-body">
                    <form action="<?php echo URL ?>/admin/movies" method="post" enctype="multipart/form-data">
                        <div class="form-group" >
                            <label>Tên Phim</label>
                            <input type="text" class="form-control" name="name" placeholder="Tên Phim">
                            <?php if (!empty($_SESSION['error']['name'])) {?>
                                <span style="color: red"><?php echo $_SESSION['error']['name']; unset($_SESSION['error']['name']);?></span>
                            <?php }?>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Loại phim</label>
                                <select name="type" class="form-control">
                                    <option value="0">Phim lẻ</option>
                                    <option value="1">Phim bộ</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Danh mục</label>
                                <select name="category_id" class="form-control">
                                    <option selected value="">Chọn danh mục</option>
                                    <?php foreach ($categories as $value) { ?>
                                        <option value="<?php echo $value->id?>"><?php echo $value->name?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea class="form-control" name="description" id="" cols="30" rows="5"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Ảnh</label>
                            <input type="file" class="form-control" name="image">
                        </div>

                        <button type="submit" class="btn btn-primary">Tạo mới</button>
                    </form>
                </div>
            </div>

        </div>

        <div class="col-lg-3"></div>

    </div>

</div>
<?php
