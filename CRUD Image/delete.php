<?php
    require 'connection.php';

    if(isset($_POST['delete'])){
        $id = $_POST['id'];
        
        $delete = "DELETE FROM tbl_product WHERE id = '$id'";
        $result = $conn->query($delete);
        if($result){
            header('location: table.php');
        }
    }