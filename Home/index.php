<?php
    include "./Connection/index.php";

    $query = "SELECT * from menu_makanan where jenis = 'makanan' and tampilkan = 'promosi'" ;
    $sql = mysqli_query($conn, $query);

    $query_drink = "SELECT * from menu_makanan where jenis = 'minuman' and tampilkan = 'beranda'";
    $sql_drink = mysqli_query($conn, $query_drink);

    function formatAngka($angka){
        if($angka >= 1000){
            return sprintf("%dK", $angka / 1000);
        }
        return $angka;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dhaharin</title>
    <link rel="icon" href="logo.svg">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php include_once "./Header/index.php"; ?>

    <div class="center-container">
            <form class="buy" method="POST" action="./Proses/P_menu.php">
                <div class="close">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <img src="" alt="" id="form-img">
                <p id="t-img"></p>
                <div class="t-1">
                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" name="nama" placeholder="Masukkan Nama" required>
                    <input type="hidden" id="pesanan" name="pesanan">
                    <br>
                    <label for="alamat">Alamat:</label>
                    <input type="text" id="alamat" name="alamat" placeholder="Masukkan Alamat" required>
                    <br>
                    <label for="pesan">Pesan:</label>
                    <input type="text" id="pesan" name="pesan" placeholder="Masukkan Pesan" required>
                    <input type="hidden" name="selesai">
                </div>
                <div class="count">
                    <label for="b-quantity">Jumlah:</label>
                    <input type="number" class="c-1" id="b-quantity" name="jumlah" value="1" min="1">
                </div>
                <button type="submit" name="aksi" value="add" id="btnBuy" >BELI</button>
            </form>
        </div>
    
    <div class="flex">
        <div class="teks">
            <p class="top">Cari Makanan</p>
            <p class="bottom">Dhaharin aja</p>
            <p class="garis"></p>
            <p>Dhaharin menyediakan makanan khas dari berbagai daerah<br> 
                di Indonesia yang sangat lezat dan bergizi.
            </p>
        </div>

        <div class="box">
            <div class="box1">
                <?php 
                    $max_promosi = 0; 
                    do {
                        $result = mysqli_fetch_assoc($sql);
                        if ($result) {
                ?>
                    <div class="kotak" data-menu="<?php echo $result['nama'];?>" img="./image/<?php echo $result['gambar'];?>">
                        <div id="image">
                            <img src="./image/<?php echo $result['gambar'];?>" alt="" width="200" height="200">
                        </div>
                        <p class="menuMakanan"><?php echo $result['nama'];?></p>
                        <p class="asal"><?php echo $result['asal']?></p>
                        <button type="button" id="b-1" onclick="pesan(event)"><?php echo formatAngka($result['harga'])?></button>
                    </div>
                <?php
                        $max_promosi++; 
                        }
                    } while ($result && $max_promosi < 4); 
                ?>
            </div>
        </div>
    </div>

        <div class="promosi">
            <?php
                $max_minuman = 0;
                do {
                    $result_drink = mysqli_fetch_assoc($sql_drink);
                    if ($result_drink) {
            ?>
                <div class="promosi1">
                    <img class="image" src="./image/<?php echo $result_drink['gambar'];?>" alt="">
                    <div class="isi">
                        <a href="#" class="btnK">
                            <img src="./image/bulet.svg" alt="">
                        </a>
                        <p class="menu"><?php echo $result_drink['nama'];?></p>
                        <div class="rating">
                            <p><?php echo $result_drink['rating'];?></p>
                            <img src="./image/Star.svg" alt="">
                        </div>
                        <div class="flex1">
                            <p class="harga"><?php echo formatAngka($result_drink['harga']);?></p>
                            <a href="#" class="b-Beli">
                                beli
                            </a>
                        </div>
                    </div>
                </div>
            <?php
                        $max_minuman++; 
                    }
                } while ($result_drink && $max_minuman < 3); 
            ?>
        </div>

        

        <footer class="footer">
            <p>Copyright 2022. by kv design.</p>
        </footer>
    <script src="main.js"></script>
</body>
</html>