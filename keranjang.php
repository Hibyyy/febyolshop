<?php 
include 'header.php';
if(isset($_POST['submit1'])){
	$id_keranjang = $_POST['id'];
	$qty = $_POST['qty'];

	$edit = mysqli_query($conn, "UPDATE keranjang SET qty = '$qty' where id_keranjang = '$id_keranjang'");
	if($edit){
			echo "
		<script>
		alert('KERANJANG BERHASIL DIPERBARUI');
		window.location = 'keranjang.php';
		</script>
		";
	}
}else if(isset($_GET['del'])){
	$id_keranjang = $_GET['id'];
	$del = mysqli_query($conn, "DELETE FROM keranjang WHERE id_keranjang = '$id_keranjang'");
	if($del){
		echo "
		<script>
		alert('1 PRODUK DIHAPUS');
		window.location = 'keranjang.php';
		</script>
		";
	}
}

?>


<div class="container py-5">
    <h2 class="text-center mb-4" style="border-bottom: 4px solid #5790AB; display: inline-block;">Keranjang</h2>
    <table class="table table-striped table-bordered text-center">
        <?php 
        if (isset($_SESSION['user'])) {
            $kode_cs = $_SESSION['kd_cs'];
            $cek = mysqli_query($conn, "SELECT * FROM keranjang WHERE kode_customer = '$kode_cs'");
            $jml = mysqli_num_rows($cek);

            if ($jml > 0) {
                ?>  
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $result = mysqli_query($conn, "SELECT k.id_keranjang as keranjang, k.kode_produk as kd, k.nama_produk as nama, k.qty as jml, p.image as gambar, p.harga as hrg FROM keranjang k JOIN produk p ON k.kode_produk=p.kode_produk WHERE kode_customer = '$kode_cs'");
                $no = 1;
                $hasil = 0;

                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                    <input type="hidden" name="id" value="<?= $row['keranjang']; ?>">
                    <tr>
                        <td><?= $no; ?></td>
                        <td><img src="image/produk/<?= $row['gambar']; ?>" alt="Produk" style="width: 100px; border-radius: 5px;"></td>
                        <td><?= $row['nama']; ?></td>
                        <td>Rp.<?= number_format($row['hrg']); ?></td>
                        <td>
                            <input type="number" name="qty" class="form-control text-center" style="width: 70px; margin: auto;" value="<?= $row['jml']; ?>">
                        </td>
                        <td>Rp.<?= number_format($row['hrg'] * $row['jml']); ?></td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <button type="submit" name="submit1" class="btn btn-warning btn-sm">Update</button>
                                <a href="keranjang.php?del=1&id=<?= $row['keranjang']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin dihapus?')">Delete</a>
                            </div>
                        </td>
                    </tr>
                </form>
                <?php 
                    $sub = $row['hrg'] * $row['jml'];
                    $hasil += $sub;
                    $no++;
                }
                ?>
                    <tr class="table-light">
                        <td colspan="6" class="text-end fw-bold">Grand Total:</td>
                        <td>Rp.<?= number_format($hasil); ?></td>
                    </tr>
                    <tr>
                        <td colspan="7" class="text-end">
                            <a href="index.php" class="btn btn-success">Lanjutkan Belanja</a>
                            <a href="checkout.php?kode_cs=<?= $kode_cs; ?>" class="btn btn-primary">Checkout</a>
                        </td>
                    </tr>
                </tbody>
                <?php 
            } else {
                echo "<tr><td colspan='7' class='text-center bg-warning'><h5><b>KERANJANG BELANJA ANDA KOSONG</b></h5></td></tr>";
            }
        } else {
            echo "<tr><td colspan='7' class='text-center bg-danger'><h5><b>SILAHKAN LOGIN TERLEBIH DAHULU SEBELUM BERBELANJA</b></h5></td></tr>";
        }
        ?>
    </table>
</div>





<?php 
include 'footer.php';
?>