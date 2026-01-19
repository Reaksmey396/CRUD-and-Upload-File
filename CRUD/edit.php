<?php
    include 'connection.php';
    $id=$_GET['id'];
    $select = "SELECT * FROM btl_employee WHERE id='$id'";
    $ex = $conn->query($select);
    $row=mysqli_fetch_assoc($ex);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="p-4">
    <a href="table.php"><i class="fa-solid fa-arrow-left"></i></a>
    <div class="container w-50 mt-4 p-5 shadow rounded-2">
        <h2 class="text-center">Form Edit</h2>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <div class="mb-2">
                <label for="" class="form-label fw-bold">Employee Name</label>
                <input type="text" class="form-control" value="<?= $row['name'] ?>" name="name" placeholder="Employee name..." required>
            </div>
            <div class="mb-2">
                <label for="" class="form-label fw-bold">Gender</label>
                <select name="gender" id="" class="form-select" required>
                    <option value="" disabled>Other</option>
                    <option value="male"<?= $row['gender']=='male'?'selected':'' ?>>Male</option>
                    <option value="female"<?= $row['gender']=='female'?'selected':'' ?>>Female</option>
                </select>
            </div>
            <div class="mb-2">
                <label for="" class="form-label fw-bold">Email</label>
                <input type="email" name="email" value="<?= $row['email'] ?>" class="form-control" placeholder="Email..." required>
            </div>
            <div class="mb-2">
                <label for="" class="form-label fw-bold">Position</label>
                <select name="position" id="" class="form-select" required>
                    <option value="" disabled>Other</option>
                    <option value="manager"<?= $row['position']=='manager'?'selected':'' ?>>Manger</option>
                    <option value="assistant manager"<?= $row['position']=='assistant manager'?'selected':'' ?>>Assistant Manager</option>
                    <option value="hr"<?= $row['position']=='hr'?'selected':'' ?>>HR Officer</option>
                    <option value="accountant"<?= $row['position']=='accountant'?'selected':'' ?>>Accountant</option>
                    <option value="developer"<?= $row['position']=='developer'?'selected':'' ?>>Software Developer</option>
                    <option value="designer"<?= $row['position']=='designer'?'selected':'' ?>>UI/UX Designer</option>
                    <option value="marketing"<?= $row['position']=='marketing'?'selected':'' ?>>Marketing Officer</option>
                    <option value="sales"<?= $row['position']=='sales'?'selected':'' ?>>Sales Executive</option>
                    <option value="support"<?= $row['position']=='support'?'selected':'' ?>>Customer Support</option>
                    <option value="intern"<?= $row['position']=='intern'?'selected':'' ?>>Intern</option>
                </select>
            </div>
            <div class="mb-2">
                <label for="" class="form-label fw-bold">Email</label>
                <input type="number" name="salary" value="<?= $row['salary'] ?>" class="form-control" placeholder="salary..." required>
            </div>
            <button name="update" type="submit" class="btn btn-warning mx-auto d-flex">Update</button>
        </form>
    </div>
</body>
</html>