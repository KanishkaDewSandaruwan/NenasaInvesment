<?php
include '../server/api.php';

// Downloads files
if (isset($_GET['apply_id'])) {
    $apply_id = $_GET['apply_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM apply WHERE apply_id = $apply_id";
    $result = mysqli_query($con, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../server/uploads/apply/'. $file['resume'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../server/uploads/apply/' . $file['resume']));
        readfile('../server/uploads/apply/' . $file['resume']);

        exit;
    }

}

?>