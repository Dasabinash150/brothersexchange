<?php
session_start();
include 'includes/config.php';

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query(
        $conn,
        "SELECT * FROM admins WHERE username='$username'"
    );

    if(mysqli_num_rows($query) > 0){

        $admin = mysqli_fetch_assoc($query);

        if(password_verify($password,$admin['password'])){

            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_name'] = $admin['username'];

            header("Location: admin/dashboard.php");
            exit;
        }
    }

    $error = "Invalid Username or Password";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="col-md-4 mx-auto">

        <h2>Admin Login</h2>

        <?php if(isset($error)){ ?>
            <div class="alert alert-danger">
                <?php echo $error; ?>
            </div>
        <?php } ?>

        <form method="POST">

            <input
                type="text"
                name="username"
                class="form-control mb-3"
                placeholder="Username"
                required>

            <input
                type="password"
                name="password"
                class="form-control mb-3"
                placeholder="Password"
                required>

            <button
                type="submit"
                name="login"
                class="btn btn-primary w-100">
                Login
            </button>

        </form>

    </div>

</div>

</body>
</html>