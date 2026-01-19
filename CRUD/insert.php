<?php
include 'connection.php';
    if(isset($_POST['btnSubmit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $position = $_POST['position'];
        $salary = $_POST['salary'];
        $insert = "INSERT INTO btl_employee (name, gender, email, position, salary)
        VALUES ('$name', '$gender', '$email', '$position', '$salary');
        ";

        $execute = mysqli_query($conn, $insert);
        if($execute){
            echo '
                <script>
                    alert("Successfully!!!");
                </script>';
        }
    }
?>