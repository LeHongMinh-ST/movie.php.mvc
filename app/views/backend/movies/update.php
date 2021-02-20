<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Chỉnh sửa  phim</h1>
    </div>
    <div class="row">

        <div class="col-lg-3"></div>

        <div class="col-lg-6">

            <!-- Default Card Example -->
            <div class="card mb-4">
                <div class="card-body">
                    <form action="<?php echo URL ?>/admin/movies/update/<?php echo $movie->id ?>" method="post"
                          enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Tên Phim</label>
                            <input type="text" class="form-control" name="name" placeholder="Tên Phim"
                                   value="<?php echo $movie->name ?>">
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Loại phim</label>
                                <select name="type" class="form-control">
                                    <option value="0" <?php if ($movie->type == 0) { ?>
                                        selected <?php } ?> >Phim lẻ
                                    </option>
                                    <option value="1"<?php if ($movie->type == 1) { ?>
                                        selected <?php } ?> >Phim bộ
                                    </option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Danh mục</label>
                                <select name="category_id" class="form-control">
                                    <option selected value="">Chọn danh mục</option>
                                    <?php foreach ($categories as $value) { ?>
                                        <option value="<?php echo $value->id ?>" <?php if ($movie->category_id == $value->id) { ?>
                                            selected <?php } ?>><?php echo $value->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea class="form-control" name="description" id="" cols="30"
                                      rows="5"><?php echo $movie->description ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Ảnh</label>
                            <input type="file" class="form-control" name="image">
                        </div>

                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </form>
                </div>
            </div>

        </div>

        <div class="col-lg-3"></div>

    </div>

</div>
<?php
