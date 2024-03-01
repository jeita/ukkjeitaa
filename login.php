<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body style="background: rgb(227,179,179);
background: linear-gradient(90deg, rgba(227,179,179,1) 35%, rgba(187,114,114,1) 100%);">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login perpustakaan digital</h3>
                                </div>
                                <div class="card-body">
                                    <form method="post">
                                        <?php
                                        if (isset($_POST['login'])) {
                                            $username = $_POST['username'];
                                            $password = md5($_POST['password']);

                                            $data = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND pasword='$password'");
                                            $cek = mysqli_num_rows($data);

                                            if ($cek > 0) {
                                                $_SESSION['user'] = mysqli_fetch_array($data);
                                                header("Location: index.php");
                                            } else {
                                                echo '<script>alert("maaf, username/password salah")</script>';
                                            }
                                        }
                                        ?>

                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="username" name="username" placeholder="username" />
                                            <label for="inputEmail">username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Password" />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button style="background: #e3b3b3;" class="btn w-100 text-light fw-bold" type="submit" name="login" value="login">Login</button>
                                        </div>
                                        <p class="mt-3">Belum punya akun? <a href="register.php">register</a></p>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small">
                                        &copy; 2024 perpustakaan digital.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>