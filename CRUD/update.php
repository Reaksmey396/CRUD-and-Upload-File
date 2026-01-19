<?php
    include 'connection.php';
    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $position = $_POST['position'];
        $salary = $_POST['salary'];
        $update = "UPDATE btl_employee SET name='$name', gender='$gender', email='$email', position='$position', salary='$salary' WHERE id='$id'";

        $rs = $conn->query($update);
        if($rs){
            header('location: table.php');
        }
    }
?>