<?php
function updateDataTable($data)
{
    include 'connection.php';

    $id_fild = $data['id_fild'];
    $id = $data['id'];
    $field = $data['field'];
    $value = $data['value'];
    $table = $data['table'];

    $sql = "UPDATE $table SET $field = '$value' where $id_fild = '$id'";
    return mysqli_query($con, $sql);
}


function updateSubCatData($data)
{
    include 'connection.php';

    $id_fild = $data['id_fild'];
    $id = $data['id'];
    $field = $data['field'];
    $value = $data['value'];
    $table = $data['table'];

    $getdatas = getAllSubCategory($id);
    $count = mysqli_num_rows($getdatas);

    if ($count > 0) {
        echo $count;
    }
    else {
        $sql = "UPDATE $table SET $field = '$value' where $id_fild = '$id'";
        return mysqli_query($con, $sql);
    }
}

function editImages($data, $img)
{
    include 'connection.php';

    $id_fild = $data['id_fild'];
    $id = $data['id'];
    $field = $data['field'];
    $table = $data['table'];

    $sql = "UPDATE $table SET $field = '$img' where $id_fild = '$id'";
    return mysqli_query($con, $sql);
}


function changePageSettings($data)
{
    include 'connection.php';
    $field = $data['field'];
    $value = $data['value'];

    $sql = "UPDATE settings SET $field = '$value'";
    return mysqli_query($con, $sql);
}

function editSettingImage($data, $img)
{
    include 'connection.php';

    $field = $data['field'];

    $sql = "UPDATE settings SET $field = '$img'";
    return mysqli_query($con, $sql);
}

function editQtyinCart($data)
{
    include 'connection.php';

    $cart_id = $data['cart_id'];
    $field = $data['field'];
    $value = $data['value'];

    $sql = "UPDATE cart SET $field = '$value', date_updated = now() where cart_id = $cart_id";
    return mysqli_query($con, $sql);	
}

function changeDesc($data)
{
    include 'connection.php';
    $id = $data['id'];
    $table = $data['table'];
    $value = $data['company_description'];
    $id_field = $data['id_field'];
    $field = $data['field'];

    $sql = "UPDATE $table SET $field = '$value' WHERE $id_field = '$id'";
    return mysqli_query($con, $sql);
}

function changeDescJob($data)
{
    include 'connection.php';
    $id = $data['id'];
    $table = $data['table'];
    $value = $data['job_description'];
    $id_field = $data['id_field'];
    $field = $data['field'];

    $sql = "UPDATE $table SET $field = '$value' WHERE $id_field = '$id'";
    return mysqli_query($con, $sql);
}



?>