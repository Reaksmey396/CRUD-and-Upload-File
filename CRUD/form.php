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
        <h2 class="text-center">Form</h2>
        <form action="insert.php" method="post">
            <div class="mb-2">
                <label for="" class="form-label fw-bold">Employee Name</label>
                <input type="text" class="form-control" name="name" placeholder="Employee name..." required>
            </div>
            <div class="mb-2">
                <label for="" class="form-label fw-bold">Gender</label>
                <select name="gender" id="" class="form-select" required>
                    <option value="" disabled selected>Other</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="mb-2">
                <label for="" class="form-label fw-bold">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email..." required>
            </div>
            <div class="mb-2">
                <label for="" class="form-label fw-bold">Position</label>
                <select name="position" id="" class="form-select" required>
                    <option value="" disabled selected>Other</option>
                    <option value="manager">Manger</option>
                    <option value="assistant manager">Assistant Manager</option>
                    <option value="hr">HR Officer</option>
                    <option value="accountant">Accountant</option>
                    <option value="developer">Software Developer</option>
                    <option value="designer">UI/UX Designer</option>
                    <option value="marketing">Marketing Officer</option>
                    <option value="sales">Sales Executive</option>
                    <option value="support">Customer Support</option>
                    <option value="intern">Intern</option>
                </select>
            </div>
            <div class="mb-2">
                <label for="" class="form-label fw-bold">Email</label>
                <input type="number" name="salary" class="form-control" placeholder="salary..." required>
            </div>
            <button name="btnSubmit" class="btn btn-success mx-auto d-flex">Submit</button>
        </form>
    </div>
</body>
</html>