<?php
require_once 'app/models/Category.php';
function file_upload($target_dir, $input_name, $max_size, $formats_allowed_array)
{
    $filename = strtotime(date('Y-m-d H:i:s')) . '.' . pathinfo(basename($_FILES[$input_name]["name"]), PATHINFO_EXTENSION);
    $target_file = $target_dir . "/" . $filename;
    $uploadOk = 1;

    $imageFileType = strtolower(pathinfo(basename($_FILES[$input_name]["name"]), PATHINFO_EXTENSION));
    $error_arr = array();

    $formats_allowed_array_new = [];

    foreach ($formats_allowed_array as $value) {
        $formats_allowed_array_new[] = strtolower($value);
    }

    // Check file size
    if ($_FILES[$input_name]["size"] > $max_size) {
        $error_arr[] = "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if (!in_array($imageFileType, $formats_allowed_array_new)) {
        $error_arr[] = "Sorry, only " . implode(array_values($formats_allowed_array), ',') . " files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $error_arr[] = "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES[$input_name]["tmp_name"], getcwd() . DIRECTORY_SEPARATOR . $target_file)) {
            return $target_file;
        } else {
            $error_arr[] = "Sorry, there was an error uploading your file.";
        }
    }
    return $error_arr;
}

function to_slug($str) {
    $str = trim(mb_strtolower($str));
    $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
    $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
    $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
    $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
    $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
    $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
    $str = preg_replace('/(đ)/', 'd', $str);
    $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
    $str = preg_replace('/([\s]+)/', '-', $str);
    return $str;
}

function get_categories($parent = null){
    $model = new Category();
    $category = $model;
    if($parent !=null){
        $category = $model->where(['parent_id'=>$parent]);
    }
    return $category->get();
}