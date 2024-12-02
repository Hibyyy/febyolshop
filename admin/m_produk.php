<?php 
include 'header.php';
?>

<div class="container my-5">
    <h2 class="border-bottom border-4 border-dark pb-2 mb-4"><b>Lihat Produk</b></h2>
    
    <!-- Tambahkan tombol "Tambah Produk" di atas tabel -->
    <div class="mb-4">
        <a href="tm_produk.php" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Tambah Produk
        </a>
    </div>
    
    <table class="table table-bordered table-striped align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Produk</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Gambar</th>
                <th scope="col">Harga</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $result = mysqli_query($conn, "SELECT * FROM produk");
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= htmlspecialchars($row['kode_produk']); ?></td>
                    <td><?= htmlspecialchars($row['nama']); ?></td>
                    <td>
                        <img src="../image/produk/<?= htmlspecialchars($row['image']); ?>" class="img-thumbnail" style="width: 100px; height: auto;">
                    </td>
                    <td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
                    <td>
                        <a href="edit_produk.php?kode=<?= htmlspecialchars($row['kode_produk']); ?>" class="btn btn-warning btn-sm">
                            Edit
                        </a>
                        <a href="proses/del_produk.php?kode=<?= htmlspecialchars($row['kode_produk']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">
                            Hapus
                        </a>
                    </td>
                </tr>
            <?php
                $no++; 
            }
            ?>
        </tbody>
    </table>
</div>

<?php 
include 'footer.php';
?>
