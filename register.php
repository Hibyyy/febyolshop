<?php 
    include 'header.php';
?>

<div class="container py-5" style="min-height: 100vh;">
    <h2 class="text-center mb-4" style="border-bottom: 4px solid #5790AB; display: inline-block;">Register</h2>

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg">
                <div class="card-body">
                    <form action="proses/register.php" method="POST">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telp" class="form-label">No Telp</label>
                                    <input type="text" class="form-control" id="telp" placeholder="+62" name="telp" required>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="konfirmasi" class="form-label">Konfirmasi Password</label>
                                    <input type="password" class="form-control" id="konfirmasi" placeholder="Konfirmasi Password" name="konfirmasi" required>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <button type="submit" class="btn btn-success btn-lg" style="width: 48%;">Register</button>
                            <!-- <a href="login.php" class="btn btn-primary btn-lg" style="width: 48%;">Login</a> -->
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
