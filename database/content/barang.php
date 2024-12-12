<?php
$go = isset($_GET['go']) ? $_GET['go'] : '';

function handleImageUpload($image, $oldImage = null) {
    if ($image['error'] == 0) {
        $gambar_name_new = uniqid('', true) . '.' . strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
        $gambar_dest = '../img/' . $gambar_name_new;

        if ($oldImage && file_exists('../img/' . $oldImage)) {
            unlink('../img/' . $oldImage);
        }

        if (move_uploaded_file($image['tmp_name'], $gambar_dest)) {
            return $gambar_name_new;
        }
    }
    return null;
}

if ($go == "") {
    ?>
    <a href="?Page=barang&go=addbarang">TAMBAH BARANG</a>
    <table>
        <tr>
            <td>No</td>
            <td>Nama Barang</td>
            <td>Jenis</td>
            <td>Jumlah</td>
            <td>Tanggal</td>
            <td>Harga/pcs</td>
            <td>Total</td>
            <td align="center">Opsi</td>
        </tr>
        <?php
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM penjualan");
        while ($result = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $result['nama_produk']; ?></td>
                <td><?php echo $result['jenis']; ?></td>
                <td><?php echo $result['jumlah']; ?></td>
                <td><?php echo $result['tanggal']; ?></td>
                <td><?php echo $result['harga']; ?></td>
                <td><?php echo $result['total']; ?></td>
                <td>
                    <a class='update_delete' href="?Page=barang&go=update&id=<?php echo $result['id']; ?>">update</a> |
                    <a class='update_delete' href="?Page=barang&go=delete&id=<?php echo $result['id']; ?>">delete</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <?php
} elseif ($go == "addbarang") {
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Nama Barang</td>
                <td>:</td>
                <td><input type="text" name="nama_produk" required></td>
            </tr>
            <tr>
    <td>Kategori</td>
    <td>:</td>
    <td>
        <select name="kategori" required>
            <option value="">Pilih Kategori</option>
            <option value="Makanan">Makanan</option>
            <option value="Minuman">Minuman</option>
            <option value="Alat Tulis">Alat Tulis</option>
        </select>
    </td>
</tr>
            <tr>
                <td>Stok</td>
                <td>:</td>
                <td><input type="number" name="stock" required></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>:</td>
                <td><input type="number" name="harga" required></td>
            </tr>
            <tr>
                <td>Gambar</td>
                <td>:</td>
                <td><input type="file" name="gambar" accept="image/*" required></td>
            </tr>
            <tr>
                <td colspan="3" align="right">
                    <button type="submit" name="submit">Proses Input</button>
                </td>
            </tr>
        </table>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama_produk'];
        $kategori = $_POST['jenis'];
        $harga = $_POST['tanggal'];
        $stok = $_POST['jumlah'];
        $harga = $_POST['harga'];
        $total_harga = $stok * $harga;


        $gambar_name_new = handleImageUpload($_FILES['gambar']);
        
        if ($gambar_name_new) {
            $insert = mysqli_query($koneksi, "INSERT INTO Produk (nama_produk, kategori, stock, harga,total_harga, gambar) 
                                            VALUES ('$nama', '$kategori', '$stok', '$harga','$total_harga', '$gambar_name_new')");
            
            if ($insert) {
                echo '<script>alert("Barang berhasil ditambah"); window.location="?Page=barang";</script>';
            } else {
                echo '<script>alert("Barang gagal ditambah"); window.location="?Page=barang";</script>';
            }
        } else {
            echo '<script>alert("Gagal upload gambar"); window.location="?Page=barang";</script>';
        }
    }
} elseif ($go == "delete") {
    if (isset($_GET['id'])) {
        $id_produk = $_GET['id'];

        $query = mysqli_query($koneksi, "SELECT gambar FROM Produk WHERE id='$id_produk'");
        $data = mysqli_fetch_array($query);
        $gambar_path = '../img/' . $data['gambar'];

        if (file_exists($gambar_path)) {
            unlink($gambar_path);
        }

        $delete = mysqli_query($konek, "DELETE FROM Produk WHERE id_produk='$id_produk'");

        if ($delete) {
            echo '<script>window.location = "?Page=barang";</script>';
        } else {
            echo '<script>window.location = "?Page=barang";</script>';
        }
    }
} elseif ($go == "update") {
    if (isset($_GET['id'])) {
        $id_produk = $_GET['id'];
        $query = mysqli_query($konek, "SELECT * FROM penjualan WHERE id='$id_produk'");
        $data = mysqli_fetch_array($query);

        if ($data) { ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>Nama Barang</td>
                        <td>:</td>
                        <td><input type="text" name="nama_produk" value="<?php echo $data['nama_produk']; ?>" required></td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td>:</td>
                        <td><input type="text" name="kategori" value="<?php echo $data['kategori']; ?>" required></td>
                    </tr>
                    <tr>
                        <td>Stok Barang</td>
                        <td>:</td>
                        <td><input type="number" name="stok" value="<?php echo $data['stock']; ?>" required></td>
                    </tr>
                    <tr>
                        <td>Harga Barang</td>
                        <td>:</td>
                        <td><input type="number" name="harga" value="<?php echo $data['harga']; ?>" required></td>
                    </tr>
                    <tr>
                        <td>Gambar</td>
                        <td>:</td>
                        <td><input type="file" name="gambar" accept="image/*"></td>
                    </tr>
                    <tr>
                        <td colspan="3" align="right">
                            <button type="submit" name="update">Update</button>
                        </td>
                    </tr>
                </table>
            </form>

        <?php
        if (isset($_POST['update'])) {
            $nama = $_POST['nama_produk'];
            $kategori = $_POST['kategori'];
            $stok = $_POST['stok'];
            $harga = $_POST['harga'];

            $gambar_name_new = handleImageUpload($_FILES['gambar'], $data['gambar']);
            
            if ($gambar_name_new) {
                $update = mysqli_query($konek, "UPDATE Produk 
                                                SET nama_produk='$nama', kategori='$kategori', stock='$stok', harga='$harga', gambar='$gambar_name_new' 
                                                WHERE id_produk='$id_produk'");
            } else {
                $update = mysqli_query($konek, "UPDATE Produk 
                                                SET nama_produk='$nama', kategori='$kategori', stock='$stok', harga='$harga' 
                                                WHERE id_produk='$id_produk'");
            }

            if ($update) {
                echo '<script>alert("Barang Berhasil DiUpdate"); window.location="?Page=barang";</script>';
            } else {
                echo '<script>alert("Gagal Update Barang"); window.location="?Page=barang";</script>';
            }
        }
    }
}
}
?>
