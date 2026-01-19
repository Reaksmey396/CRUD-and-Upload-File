<?php
    include 'connection.php';
    if(isset($_POST['btnDelete'])){
        $id = $_POST['id'];
        $delete="DELETE FROM btl_employee WHERE id='$id'";
        $result = mysqli_query($conn, $delete);
        if($result){
            header('location: table.php');
        }
    }
?>