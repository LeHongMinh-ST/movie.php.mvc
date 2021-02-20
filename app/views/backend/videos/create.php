<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tạo mới video</h1>
    </div>
    <div class="row">

        <div class="col-lg-3"></div>

        <div class="col-lg-6">

            <!-- Default Card Example -->
            <div class="card mb-4">
                <div class="card-body">
                    <form action="<?php echo URL ?>/admin/videos" method="post">
                        <div class="form-group">
                            <label>Tên video</label>
                            <input type="text" class="form-control" name="name" placeholder="Nhập tên video">
                        </div>

                        <div class="form-group">
                            <label>Source</label>
                            <input type="text" class="form-control" name="source" placeholder="Nhập source video">
                        </div>

                        <div class="form-group">
                            <label>Chọn phim</label>
                            <select name="movie_id" class="form-control">
                                <option selected value="">Chọn phim</option>
                                <?php foreach ($movies as $value) { ?>
                                    <option value="<?php echo $value->id?>"><?php echo $value->name?></option>
                                <?php } ?>
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
