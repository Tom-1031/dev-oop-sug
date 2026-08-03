<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log in</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-light">

    <div class="container" style="max-width: 700px; margin-top: 80px;">

        <h1 class="text-primary text-center fw-bold mb-5">
            LOGIN<i class="fa-solid fa-right-to-bracket ms-2"></i>
        </h1>

        <form action="../actions/login.php" method="post">
            <div class="row mb-4 align-items-center">
                <label for="username" class="col-2 col-form-label">Username</label>
                <div class="col-10">
                    <input type="text" name="username" id="username" class="form-control" maxlength="15" required>
                </div>
            </div>

            <div class="row mb-4 align-items-center">
                <label for="password" class="col-2 col-form-label fw-bold">Password</label>
                <div class="col-10">
                    <input type="password" name="password" id="password" class="form-control" minlength="8" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100 mb-3">Login</button>
        </form>

        <button type="button" class="btn btn-danger d-block mx-auto w-25" data-bs-toggle="modal" data-bs-target="#registerModal">
            Create an Account
        </button>

    </div>

    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content p-4">
                <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>

                <div class="text-center mb-4">
                    <i class="fa-solid fa-user-plus text-danger" style="font-size: 2rem;"></i>
                    <h1 class="text-danger fw-bold d-inline align-middle ms-2" id="registerModalLabel">Registration</h1>
                </div>

                <form action="../actions/register.php" method="post">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" required autofocus>
                        </div>
                        <div class="col">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="reg_username" class="form-label">Username</label>
                        <input type="text" name="username" id="reg_username" class="form-control" maxlength="15" required>
                    </div>

                    <div class="mb-4">
                        <label for="reg_password" class="form-label">Password</label>
                        <input type="password" name="password" id="reg_password" class="form-control" minlength="8" required>
                    </div>

                    <button type="submit" class="btn btn-danger w-100">Register</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (required for the modal) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>