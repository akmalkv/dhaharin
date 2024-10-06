
<?php 
    include "../Connection/index.php";
    $id_menu = $_GET['edit'];

    $query = "SELECT * FROM menu_makanan WHERE id = $id_menu";
    $sql = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <form class="form" action="../Proses/P_menu.php" method="POST" enctype="multipart/form-data">
        <input name="id" type="hidden" value="<?php echo $result['id']?>">
        <label for="gambar_makanan" >Gambar:</label>
        <input type="file" name="gambar_makanan" accept="image/*" >
        <br>
        <label for="nama_makanan">Nama Makanan:</label>
        <input type="text" name="nama_makanan" value="<?php echo $result['nama']?>" required>
        <br>
        <label for="jenis_makanan">Jenis Makanan:</label>
        <input type="text" name="jenis_makanan" value="<?php echo $result['jenis']?>" required>
        <br>
        <label for="harga">Harga:</label>
        <input type="text" name="harga" value="<?php echo $result['harga']?>" required>
        <br>
        <label for="asal_makanan">Asal Makanan:</label>
        <input type="text" name="asal_makanan" value="<?php echo $result['asal']?>" required>
        <br>
        <label for="rating">Rating:</label>
        <input type="text" name="rating" value="<?php echo $result['rating']?>" required>
        <br>
        <label for="tampilkan">Tampilkan:</label>
        <select name="tampilkan">
            <option value="shop">Shop</option>
            <option value="beranda" >Beranda</option>
            <option value="promosi" >Promosi</option>
        </select>
        <br>
        <div id="flex">
            <a href="menu.php" id="hapus">Batal</a>
            <button type="submit" name="aksi" value="update" id="edit" >Edit</button>
        </div>
    </form>
</body>
</html>