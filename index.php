<?php 
include 'header.php';
?>
<!-- IMAGE -->
<div class="container-fluid" style="margin: 0;padding: 0;">
	<div class="image" style="margin-top: -21px">
		<img src="image/home/manik.jpg" style="width: 100%;  height: 650px;">
	</div>
</div>
<br>
<br>

<!-- PRODUK TERBARU -->
<div class="container">


		<h4 class="text-center" style="font-family: arial; padding-top: 10px; padding-bottom: 10px; font-style: italic; line-height: 29px; border-top: 2px solid #5790AB; border-bottom: 2px solid #5790AB;">Beads-Shop adalah merek kerajinan Indonesia yang memproduksi gelang manik-manik (beads bracelet), tasbih, dan aksesori lainnya secara handmade dari bahan berkualitas tinggi. Menggabungkan desain modern dan nilai tradisional, kami menghadirkan koleksi yang elegan untuk kebutuhan spiritual dan mode. Dengan terus berinovasi, kami berkomitmen untuk memperluas jangkauan produk ke seluruh nusantara.</h4>


	<h2 style=" width: 100%; border-bottom: 4px solid #5790AB; margin-top: 80px;"><b>Produk Kami</b></h2>

	<div class="row">
    <?php 
    $result = mysqli_query($conn, "SELECT * FROM produk");
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <div class="col-md-3 mb-4">
            <div class="card h-100 text-center">
                <img src="image/produk/<?= $row['image']; ?>" class="card-img-top img-fluid" alt="<?= htmlspecialchars($row['nama']); ?>" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($row['nama']); ?></h5>
                    <p class="card-text">Rp <?= number_format($row['harga'], 0, ',', '.'); ?></p>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="detail_produk.php?produk=<?= $row['kode_produk']; ?>" class="btn btn-warning btn-sm">Detail</a>
                    <?php if (isset($_SESSION['kd_cs'])) { ?>
                        <a href="proses/add.php?produk=<?= $row['kode_produk']; ?>&kd_cs=<?= $kode_cs; ?>&hal=1" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-shopping-cart"></i> Tambah</a>
                    <?php } else { ?>
                        <a href="keranjang.php" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-shopping-cart"></i> Tambah</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php 
    }
    ?>
</div>

</div>
<br>
<br>
<br>
<br>
<?php 
include 'footer.php';
?>