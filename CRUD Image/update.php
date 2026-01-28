<?php
require 'connection.php';

if (isset($_POST['update'])) {

    if (!is_dir('image')) {
        mkdir('image', 0777, true);
    }

    $id    = $_POST['id'];
    $name  = $_POST['pro_name'];
    $qty   = $_POST['qty'];
    $price = $_POST['price'];

    $total = $qty * $price;

    if ($total <= 10) {
        $dis = 5;
    } elseif ($total <= 20) {
        $dis = 10;
    } elseif ($total <= 30) {
        $dis = 15;
    } elseif ($total <= 40) {
        $dis = 20;
    } else {
        $dis = 30;
    }

    $payment = $total - ($total * $dis / 100);

    $getOld = "SELECT image FROM tbl_product WHERE id='$id'";
    $oldRs = mysqli_query($conn, $getOld);
    $oldRow = mysqli_fetch_assoc($oldRs);
    $oldImage = $oldRow['image'];


    if (!empty($_FILES['file']['name'])) {
        $file = $_FILES['file']['name'];
        $tmp_name = $_FILES['file']['tmp_name'];
        $path = 'image/' . $file;
        move_uploaded_file($tmp_name, $path);
    } else {
        $file = $oldImage;
    }

    $update = "UPDATE tbl_product
               SET pro_name='$name', qty='$qty', price='$price',
                   total='$total', discount='$dis', payment='$payment', image='$file'
               WHERE id='$id'";

    $rs = mysqli_query($conn, $update);

    if ($rs) {
        header('location: table.php');
    }
}
?>
