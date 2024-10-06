<?php 
    include "../Connection/index.php";

    $query = "SELECT * FROM menu_makanan";
    $sql = mysqli_query($conn, $query);
    $no = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="../Admin/admin.css">
    <script src="admin.js"></script>
</head>
<body>
    <?php include_once "../Admin/navbar/index.php"; ?>
    
    <div class="container">
        <div class="top">
            <input type="text" placeholder="Search...">
        </div>
        <div class="tab">
            <div class="tab1">
                <p class="title">Menu</p>
                <button id="btnHandle" onclick="toggleHandle1()">Tambah Menu</button>
            </div>

            <div class="content">
                <div class="scroll-table">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Makanan</th>
                                <th>Jenis</th>
                                <th>Harga</th>
                                <th>Asal makanan</th>
                                <th>Rating</th>
                                <th>Tampilkan di</th>
                                <th>Edit/Delete</th>
                            </tr>
                        </thead>

                        <?php
                            while($result = mysqli_fetch_assoc($sql)){
                        ?>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php echo ++$no.".";?>
                                    </td>
                                    <td>
                                        <img src="../image/<?php echo $result['gambar'];?>" alt="" width="50" height="50">
                                    </td>
                                    <td>
                                        <?php echo $result['nama'];?>
                                    </td>
                                    <td>
                                            <?php echo $result['jenis'];?>
                                        </td>
                                    <td>
                                        <?php echo $result['harga'];?>
                                    </td>
                                    <td>
                                        <?php echo $result['asal'];?>
                                    </td>
                                    <td>
                                        <?php echo $result['rating'];?>
                                    </td>
                                    <td>
                                        <?php echo $result['tampilkan'];?>
                                    </td>
                                    <td>
                                        <div id="btn">
                                            <button onclick="toggleHandle2(<?php echo $result['id']; ?>)" id="edit">Edit</button>
                                            <a href="../Proses/P_menu.php?hapusMenu=<?php echo $result['id'];?>" id="hapus">
                                                Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        <?php
                            }
                        ?>
                    </table>
                </div>
            </div>

            <div class="switch-content">
                <form action="../Proses/P_menu.php" method="POST" id="form-input" enctype="multipart/form-data">
                    <br>
                    <label for="nama_makanan" >Gambar:</label>
                    <input type="file" name="gambar_makanan" accept="image/*" required>
                    <br>
                    <label for="nama_makanan">Nama Makanan:</label>
                    <input type="text" name="nama_makanan" required>
                    <br>
                    <label for="jenis_makanan">Jenis Makanan:</label>
                    <input type="text" name="jenis_makanan" required>
                    <br>
                    <label for="harga">Harga:</label>
                    <input type="text" name="harga" required>
                    <br>
                    <label for="asal_makanan">Asal Makanan:</label>
                    <input type="text" name="asal_makanan" required>
                    <br>
                    <label for="rating">Rating:</label>
                    <input type="text" name="rating" required>
                    <br>
                    <label for="tampilkan">Tampilkan:</label>
                    <select name="tampilkan">
                        <option value="shop" selected>Shop</option>
                        <option value="beranda" >Beranda</option>
                        <option value="promosi" >Promosi</option>
                    </select>
                    <br>
                    <button type="submit" name="aksi" value="input" id="edit" >Tambah Menu</button>
                </form>
            </div>

            <div class="switch-content1">
                <?php include_once "edit.php"?>
            </div>
        </div>
</body>
</html>
