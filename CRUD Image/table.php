<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery (MUST be before your script) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div class="container mt-4 p-4 shadow rounded-3">
        <!-- Button trigger modal -->
        <button id="add" type="button" class="btn btn-outline-dark float-end mb-3" data-bs-toggle="modal"
            data-bs-target="#exampleModal">
            Add Product
        </button>
        <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>QTY</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Discount</th>
                    <th>Payment</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'connection.php';
                $select = "SELECT * FROM tbl_product";
                $counter = 1;                               // start numbering from 1
                $ex = mysqli_query($conn, $select);         // = $conn->query($select)
                while ($row = mysqli_fetch_assoc($ex)) {
                    echo '
                            <tr>
                                <td>' . $counter . '</td>
                                <td>' . $row['pro_name'] . '</td>
                                <td>' . $row['qty'] . '</td>
                                <td>$' . $row['price'] . '</td>
                                <td>$' . $row['total'] . '</td>
                                <td>' . $row['discount'] . '%</td>
                                <td>$' . $row['payment'] . '</td>
                                <td>
                                    <img src="image/' . $row['image'] . '" width="40px"
                                        height="40px" class="rounded-circle" alt="">
                                </td>
                                <td>
                                    <button class="btn btn-outline-danger deleteBtn" data-id="' . $row['id'] . '">Delete</button>
                                    <button id="edit" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-outline-warning">Edit</button>
                                </td>
                            </tr>
                        ';
                    $counter++;   // increase counter
                }
                ?>
            </tbody>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="form" action="insert.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" id="id">
                            <div class="mb-2">
                                <label for="product" class="form-label">Product Name</label>
                                <input name="pro_name" type="text" id="product" class="form-control" placeholder="Product..." required>
                            </div>
                            <div class="mb-2">
                                <label for="qty" class="form-label">QTY</label>
                                <input name="qty" type="number" id="qty" class="form-control" placeholder="QTY..." required>
                            </div>
                            <div class="mb-2">
                                <label for="price" class="form-label">Price</label>
                                <input name="price" type="number" id="price" class="form-control" placeholder="Price..." required>
                            </div>
                            <div class="mb-2">
                                <label for="file" class="form-label">Image</label> <br>
                                <img id="image" src="https://i.pinimg.com/736x/61/32/db/6132db29e8a8dc2a7d3c9ac4860ff254.jpg" width="100px" height="100px" class="rounded-circle" alt="">
                                <input id="file" name="file" type="file" class="form-control">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="save" name="submit" class="btn btn-primary">Save</button>
                        <button type="submit" id="update" name="update" class="btn btn-warning">Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteModalLabel">Confirm Delete</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this product?
                    </div>
                    <div class="modal-footer">
                        <form id="deleteForm" action="delete.php" method="post">
                            <input type="hidden" name="id" id="delete_id">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#file').hide()
            $('#image').click(function() {
                $('#file').click()
            })
            $('#file').change(function() {
                let file = this.files[0]
                if (file) {
                    let image = URL.createObjectURL(file)
                    $('#image').attr('src', image)
                }
            })
            // for insert in table
            $('#add').click(function() {
                $('#save').show()
                $('#update').hide()
                $('#exampleModalLabel').text('Add Product')
                $('#form').attr('action', 'insert.php')
                $('#form').trigger('reset')
            })

            // for edit in each row
            $(document).on('click', '#edit', function() {
                $('#save').hide()
                $('#update').show()
                $('#exampleModalLabel').text('Edit Product')
                $('#form').attr('action', 'update.php')
                const row = $(this).closest('tr')
                const id = row.find('td:eq(0)').text().trim()
                const pro_name = row.find('td:eq(1)').text().trim()
                const qty = row.find('td:eq(2)').text().trim()
                const price = row.find('td:eq(3)').text().trim().slice(1)

                const image = row.find('img').attr('src')

                $('#id').val(id)
                $('#product').val(pro_name)
                $('#qty').val(qty)
                $('#price').val(price)
                $('#image').attr('src', image)

            })
            // for delete
            $(document).on('click', '.deleteBtn', function() {
                const id = $(this).data('id');
                $('#delete_id').val(id); // set id in hidden input
                $('#deleteModal').modal('show'); // show modal
            });
        })
    </script>
</body>
</html>