<?php
session_start();

if(!isset($_SESSION['username']))
{
    header("location: login.php");
    exit;
}

require_once "../classes/Product.php";

$product  = new Product;
$products = $product->getAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-light">

    <!-- Top bar -->
    <div class="d-flex justify-content-between align-items-center px-4 py-3 bg-white border-bottom">
        <a href="dashboard.php" class="text-dark fs-4">
            <i class="fa-solid fa-house"></i>
        </a>
        <span class="text-muted fw-bold">Welcome, <?= $_SESSION['username'] ?></span>
        <a href="../actions/logout.php" class="text-danger fs-4">
            <i class="fa-solid fa-user-xmark"></i>
        </a>
    </div>

    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="fw-bold mb-0">Product List</h1>
            <button type="button" class="btn text-primary fs-2 p-0 border-0 bg-transparent" data-bs-toggle="modal" data-bs-target="#addProductModal">
                <i class="fa-solid fa-circle-plus"></i>
            </button>
        </div>

        <div class="d-flex align-items-center gap-3">

            <?php if($products->num_rows > 0): ?>
            <div class="rounded-3 overflow-hidden shadow-sm flex-grow-1">
                <table class="table align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while($row = $products->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['product_name'] ?></td>
                            <td><?= $row['price'] ?></td>
                            <td><?= $row['quantity'] ?></td>
                            <td>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex gap-2">
                                        <button type="button" class="btn btn-warning btn-sm text-dark" data-bs-toggle="modal" data-bs-target="#editProductModal<?= $row['id'] ?>">
                                            <i class="fa-solid fa-pen"></i>
                                        </button>

                                        <a href="../actions/delete-product.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this product?');">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </div>

                                    <?php if($row['quantity'] >= 1): ?>
                                    <a href="../actions/pay-product.php?id=<?= $row['id'] ?>" class="btn btn-success btn-sm">
                                        <i class="fa-solid fa-cash-register"></i>
                                    </a>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            <?php else: ?>
            <div class="bg-dark rounded-3 text-center py-5 flex-grow-1">
                <h2 class="text-danger fw-bold">No Records Found</h2>
                <i class="fa-solid fa-circle-xmark text-danger" style="font-size: 4rem;"></i>
            </div>
            <?php endif; ?>

        </div>

    </div>

    <!-- Add Product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-4">
                <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>

                <div class="text-center mb-4">
                    <i class="fa-solid fa-box-open text-info" style="font-size: 2rem;"></i>
                    <h2 class="text-info fw-bold d-inline align-middle ms-2" id="addProductModalLabel">Add Product</h2>
                </div>

                <form action="../actions/add-product.php" method="post">
                    <div class="mb-3">
                        <label for="product_name" class="form-label">Product Name</label>
                        <input type="text" name="product_name" id="product_name" class="form-control" required>
                    </div>

                    <div class="row mb-4">
                        <div class="col">
                            <label for="price" class="form-label">Price</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" step="0.01" min="0" name="price" id="price" class="form-control" required>
                            </div>
                        </div>
                        <div class="col">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" min="0" name="quantity" id="quantity" class="form-control" required>
                        </div>
                    </div>

                    <button type="submit" name="btn_add" class="btn btn-info text-white w-100">Add</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Product Modals -->
    <?php $products->data_seek(0); ?>
    <?php while($row = $products->fetch_assoc()): ?>
    <div class="modal fade" id="editProductModal<?= $row['id'] ?>" tabindex="-1" aria-labelledby="editProductModalLabel<?= $row['id'] ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-4">
                <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>

                <div class="text-center mb-4">
                    <i class="fa-solid fa-pen text-warning" style="font-size: 2rem;"></i>
                    <h2 class="text-warning fw-bold d-inline align-middle ms-2" id="editProductModalLabel<?= $row['id'] ?>">Edit Product</h2>
                </div>

                <form action="../actions/edit-product.php" method="post">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">

                    <div class="mb-3">
                        <label for="product_name<?= $row['id'] ?>" class="form-label">Product Name</label>
                        <input type="text" name="product_name" id="product_name<?= $row['id'] ?>" class="form-control" value="<?= $row['product_name'] ?>" required>
                    </div>

                    <div class="row mb-4">
                        <div class="col">
                            <label for="price<?= $row['id'] ?>" class="form-label">Price</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" step="0.01" min="0" name="price" id="price<?= $row['id'] ?>" class="form-control" value="<?= $row['price'] ?>" required>
                            </div>
                        </div>
                        <div class="col">
                            <label for="quantity<?= $row['id'] ?>" class="form-label">Quantity</label>
                            <input type="number" min="0" name="quantity" id="quantity<?= $row['id'] ?>" class="form-control" value="<?= $row['quantity'] ?>" required>
                        </div>
                    </div>

                    <button type="submit" name="btn_edit" class="btn btn-warning text-dark w-100">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
    <?php endwhile; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>