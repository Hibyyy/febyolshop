<?php 
    include 'header.php';
?>

<div class="container py-5" style="min-height: 100vh;">
    <h2 class="text-center mb-4" style="border-bottom: 4px solid #5790AB; display: inline-block;">Login</h2>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-body">
                    <form action="proses/login.php" method="POST">
                        <div class="form-group mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Username" name="username" style="height: 40px; font-size: 16px;">
                        </div>

                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Password" name="pass" style="height: 40px; font-size: 16px;">
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <button type="submit" class="btn btn-success btn-lg" style="width: 48%;">Login</button>
                            <a href="register.php" class="btn btn-primary btn-lg" style="width: 48%;">Daftar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    include 'footer.php';
?>
